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
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddFile"><i
                                class="fa-solid fa-circle-plus m-1"></i>Add</button>
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
                        let table = $('#myTable').DataTable();
                        table.clear();

                        $.each(res.files, function(key, item) {
                            const editBtn = '<button type="button" value="' + item.FileId +
                                '" class="btn btn-primary btn-sm edit_file_btn"><i class="fa-solid fa-pen-to-square m-1"></i>Edit</button>';
                            const deleteBtn = '<button type="button" value="' + item.FileId +
                                '" class="btn btn-danger btn-sm delete_cat_btn" ><i class="fa-solid fa-trash m-1"></i>Delete</button>';

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
        });
    </script>
@endsection
