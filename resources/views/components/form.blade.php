<section class=" bg-image "
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp'); width:100%">
    <div class="mask flex items-center h-100 gradient-custom-3">
        <div class="container mx-auto h-100 sm:px-4 h-full">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-3">File Upload</h2>
                            @if (isset($Success))
                                <div class="alert alert-success" role="alert">
                                    {{ $Success }}
                                </div>
                            @elseif(isset($Error))
                                <div class="alert alert-danger" role="alert">
                                    {{ $Error }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('store') }}">
                                @csrf
                                {{-- PROGRAM TYPE --}}
                                <select class="form-select mb-3" aria-label="Default select example" name="FileFolder">
                                    aria-placeholder="Folder Location">
                                    <option value="SETUP">SETUP</option>
                                    <option value="GIA">GIA</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>
                                {{-- FILENAME --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Filename"
                                        name="Filename">
                                    <label for="floatingInput">Filename</label>
                                </div>
                                {{-- DESCRIPTION --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Description" name="FileDescription">
                                    <label for="floatingInput">Description</label>
                                </div>
                                {{-- LOCATION --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Location"
                                        name="FilePath">
                                    <label for="floatingInput">Location</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary ">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
