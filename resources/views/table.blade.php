@extends('partials.app')

@section('content')
    {{-- Table --}}
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="background-color: #102840;">
                        <h3 class="text-white">Manage</h3>
                        <a href="{{ route('upload') }}" class="btn btn-success float-end fw-bold ">
                            <i class="fa-solid fa-circle-plus m-1"></i>
                            Add
                        </a>
                    </div>
                    <div class="card-body table-responsive align-center">
                        <table id="myTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Filename</th>
                                    <th>Folder</th>
                                    <th>Path</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        <i class="fa-solid fa-pen-to-square fa-bounce m-1"></i>Edit & Update Data
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="update_file_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <ul id="update_status"></ul>
                        <input type="hidden" id="file_id" name="file_id" />

                        <div class="form-group mb-3">
                            <label class="">File Name</label>
                            <input type="text" class="form-control" id="file_name" name="file_name"
                                placeholder="Enter File Name" required>
                            <label class="">Folder</label>
                            <input type="text" class="form-control" id="folder" name="folder"
                                placeholder="Enter Folder">
                            <label class="">Path</label>
                            <input type="text" class="form-control" id="path" name="path"
                                placeholder="Enter Path">
                            <label class="">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Enter Description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm" id="update_file"><i
                                class="fa-solid fa-check fa-beat m-1"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><i
                            class="fa-solid fa-trash fa-shake m-1"></i>Delete Data</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="delete_file_form" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this?</h6>
                        <input type="hidden" id="del_id" name="del_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-sm" id="delete_file"><i
                                class="fa-solid fa-trash fa-beat-fade m-1"></i>Yes, delete it!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            fetchData();

            // FETCH DATA
            function fetchData() {
                $.ajax({
                        type: "GET",
                        url: "/fetch-files",
                        dataType: "json"
                    })
                    .then(function(res) {
                        // console.log(res.files)
                        let table = $('#myTable').DataTable();
                        table.clear();

                        $.each(res.files, function(key, item) {
                            const editBtn = '<button type="button" value="' + item.FileId +
                                '" class="btn btn-primary btn-sm edit_file_btn"><i class="fa-solid fa-pen-to-square m-1"></i>Edit</button>';
                            const deleteBtn = '<button type="button" value="' + item.FileId +
                                '" class="btn btn-danger btn-sm delete_file_btn" ><i class="fa-solid fa-trash m-1"></i>Delete</button>';

                            table.row.add([
                                item.FileId,
                                item.Filename,
                                item.FileFolder,
                                item.FilePath,
                                item.FileDescription,
                                editBtn,
                                deleteBtn,
                            ]).draw(false);
                        });
                    })
            }

            // EDIT
            $(document).on('click', '.edit_file_btn', function(e) {
                e.preventDefault();

                const id = $(this).val();
                $('#editModal').modal('show');

                $.ajax({
                        type: "GET",
                        url: "/file/" + id + "/edit"
                    })
                    .then(function(res) {
                        // console.log(res.file)
                        $('#file_name').val(res.file.Filename);
                        $('#folder').val(res.file.FileFolder);
                        $('#path').val(res.file.FilePath);
                        $('#description').val(res.file.FileDescription);
                        $('#file_id').val(id);
                    })
                    .catch(function(error) {
                        console.error(error);
                        $('#editModal').modal('hide');
                    })
            });

            // UPDATE
            $(document).on('submit', '#update_file_form', function(e) {
                e.preventDefault();

                $('#update_file').text('Updating...');

                const id = $('#file_id').val();
                const data = new FormData(this);

                $.ajax({
                        type: "POST",
                        url: "/file/update/" + id,
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                    })
                    .then(function(res) {
                        console.log(res)
                        $('#update_status').html("");
                        $('#update_status').removeClass('alert alert-danger');
                        Swal.fire(
                            'Update',
                            res.message,
                            'success'
                        )
                        $("#update_file_form")[0].reset();
                        $('#update_file').text('Update');
                        $('#editModal').modal('hide');

                        // Fetch Data to avoid page reload
                        fetchData();
                    })
                    .catch(function(error) {
                        console.error(error);
                        $('#update_status').html("");
                        $('#update_status').addClass('alert alert-danger');
                        if (error.status === 500) {
                            $('#update_status').append('<li>' + "Something's wrong. Check your code!" +
                                '</li>');
                        }
                        $.each(error.responseJSON.errors, function(key, err_value) {
                            $('#update_status').append('<li>' + err_value + '</li>');
                        });
                    });
            });

            // DELETE
            $(document).on('click', '.delete_file_btn', function() {
                let id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#del_id').val(id);
            });

            $(document).on('submit', '#delete_file_form', function(e) {
                e.preventDefault();

                $('#delete_file').text('Deleting...');
                let id = $('#del_id').val();

                $.ajax({
                        type: "DELETE",
                        url: "/file/delete/" + id,
                        dataType: "json"
                    })
                    .then(function(res) {
                        console.log(res)
                        Swal.fire(
                            'Delete',
                            res.message,
                            'success'
                        )
                        $('#delete_file').text('Yes Delete');
                        $('#DeleteModal').modal('hide');

                        // Fetch Data to avoid page reload
                        fetchData();
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
            });
        });
    </script>
@endsection
