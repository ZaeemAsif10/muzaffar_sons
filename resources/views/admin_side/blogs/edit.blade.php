@extends('admin_side.setup.master')

@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Home</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0 align-items-center">
                                    <li class="breadcrumb-item"><a href="javascript:;">
                                            <ion-icon name="home-outline" role="img" class="md hydrated"
                                                aria-label="home outline"></ion-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->



            <!--Create Form Start-->
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <h5>Add Blogs</h5>
                        <form action="{{ url('update-blogs') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="blogs_id" value="{{ $blogs->id }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $blogs->title }}">
                                        <span class="text-danger"> @error('title')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control" rows="4">{{ $blogs->description }}</textarea>
                                        <span class="text-danger"> @error('description')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <img src="{{ asset('storage/app/public/uploads/blogs/' . $blogs->image) }}"
                                            class="mt-4" width="70px" height="70px" alt="">
                                        <span class="text-danger"> @error('image')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 text-center">
                                    <button type="submit" class="btn btn-primary add_blogs">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!--Create Form End-->

        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->



    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ url('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('confidentail_info', {
            filebrowserUploadUrl: "{{ url('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('rules', {
            filebrowserUploadUrl: "{{ url('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
@endsection
