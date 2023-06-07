@extends('partials.app')
@section('content')
    <div class="container-fluid">
        <div class="px-0 w-50 my-2">
            <form class="d-none d-md-flex ms-4" method="GET">
                @csrf
                <input class="form-control border-2" type="search" name="Search" id="search" placeholder="Search File">
                <button class="btn btn-primary border-0 mx-2">Search</button>
            </form>
        </div>
        <!-- Page Heading -->
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">
                            <h4>No.</h4>
                        </th>
                        <th scope="col">
                            <h4>Folder</h4>
                        </th>
                        <th scope="col">
                            <h4>Filename</h4>
                        </th>
                        <th scope="col">
                            <h4>Path</h4>
                        </th>
                        <th scope="col">
                            <h4>Description</h4>
                        </th>
                        <th scope="col">
                            <h4>Operation</h4>
                        </th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    {{-- loop to display db content --}}
                    @if (isset($files))
                        @foreach ($files as $file)
                            <tr>
                                <td>{{ $file->FileId }}</td>
                                <td>{{ $file->FileFolder }}</td>
                                <td>{{ $file->Filename }}</td>
                                <td>{{ $file->FilePath }}</td>
                                <td>{{ $file->FileDescription }}</td>
                                <td>
                                    <button type="button"
                                        onclick="edit('{{ $file->FileId }}','{{ $file->FileFolder }}','{{ $file->Filename }}','{{ $file->FileDescription }}','{{ $file->FilePath }}')"
                                        class="btn btn-info">Edit</button>
                                    <button type="button" id="btnDelete" onclick="deleteData('{{ $file->FileId }}')"
                                        class=" btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    {{-- EDIT FILE MODAL --}}
    <div class="modal fade" id="edit_file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content " style="background-color:#ffffffe8 !important">
                <div class="modal-body">
                    <div class="rounded h-200 p-6">
                        <h6 class="mb-4">Update File Info</h6>
                        @if (isset($Success))
                            <div class="alert alert-success" role="alert">
                                {{ $Success }}
                            </div>
                        @elseif(isset($Error))
                            <div class="alert alert-danger" role="alert">
                                {{ $Error }}
                            </div>
                        @endif
                        {{-- FILE UPLOAD FORM --}}
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            {{-- ID --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control id" id="floatingInput"
                                    placeholder="Filename" name="Filename" disabled>
                                <label for="floatingInput">ID</label>
                            </div>
                            {{-- PROGRAM TYPE --}}
                            <select class="form-select mb-3" id="filefolder" aria-label="Default select example"
                                name="FileFolder">
                                aria-placeholder="Folder Location">
                                <option value="SETUP">SETUP</option>
                                <option value="GIA">GIA</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                            {{-- FILENAME --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control filename" id="floatingInput"
                                    placeholder="Filename" name="Filename">
                                <label for="floatingInput">Filename</label>
                            </div>
                            {{-- DESCRIPTION --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control filedesc" id="floatingInput"
                                    placeholder="Description" name="FileDescription">
                                <label for="floatingInput">Description</label>
                            </div>
                            {{-- LOCATION --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control filepath" id="floatingInput" placeholder="Path"
                                    name="FilePath">
                                <label for="floatingInput">Path</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="saveEdit()" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // DELETE DATA
        function deleteData(FileId) {
            // alert("Button clicked!");
            var file_Data = new FormData()
            file_Data.append('FileId', FileId)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "{{ route('delete') }}",
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        data: file_Data,
                    }).done(function(msg) {
                        if (msg.result == true) {
                            Swal.fire(
                                'Delete',
                                msg.message,
                                'success'
                            )
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        } else {
                            Swal.fire(
                                'Delete',
                                msg.message,
                                'error'
                            )
                        }
                    });
                }
            })
        }
        // SAVE EDIT
        function saveEdit() {
            var FileId = $('.id').val();
            var FileFolder = $('#filefolder').val();
            var Filename = $('.filename').val();
            var FileDescription = $('.filedesc').val();
            var FilePath = $('.filepath').val();

            var file_Data = new FormData()
            file_Data.append('FileId', FileId)
            file_Data.append('FileFolder', FileFolder)
            file_Data.append('Filename', Filename)
            file_Data.append('FileDescription', FileDescription)
            file_Data.append('FilePath', FilePath)

            $.ajax({
                method: "POST",
                url: "{{ route('store') }}",
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                data: file_Data,
            }).done(function(msg) {
                if (msg.result == true) {
                    Swal.fire(
                        'Update',
                        msg.message,
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Update',
                        msg.message,
                        'error'
                    )
                }
            });
        }
        // SHOW EDIT MODAL
        function edit(FileId,FileFolder, Filename, FileDescription, FilePath) {
            // get inputs & display to modal fields
            $('#edit_file').modal('toggle');
            $('.id').val(FileId);
            $('#filefolder').val(FileFolder);
            $('.filename').val(Filename);
            $('.filedesc').val(FileDescription);
            $('.filepath').val(FilePath);
        }
    </script>
@endsection
