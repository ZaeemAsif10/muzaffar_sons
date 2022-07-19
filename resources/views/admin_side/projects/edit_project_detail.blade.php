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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Project Details</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <a href="{{ url('project/slider') }}" type="button"
                                    class="btn btn-outline-primary">Back</a>
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
                        <h5>Edit Project Details</h5>
                        <form action="{{ url('update-project-detail') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="project_detail_id" value="{{ $project_detail->id }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $project_detail->title }}">
                                        <span class="text-danger"> @error('title')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="">Video Link</label>
                                        <input type="text" class="form-control" name="link"
                                            value="{{ $project_detail->link }}">
                                        <span class="text-danger"> @error('link')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Project Name</label>
                                        <select name="project_id" id="" class="form-control">
                                            <option value="" selected disabled>Choose project</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}"
                                                    {{ $project_detail->project_id == $project->id ? 'selected' : '' }}>
                                                    {{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"> @error('project_id')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="desc" class="form-control" rows="4">{{ $project_detail->desc }}</textarea>
                                        <span class="text-danger"> @error('desc')
                                                {{ $message }}
                                            @enderror </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Payment Plan</label>
                                        <input type="file" class="form-control" name="payment_plain">
                                        <iframe class="mt-4" width="70px" height="70px"
                                            src="{{ asset('storage/app/public/uploads/detail/payment_plan/' . $project_detail->payment_plain) }}">
                                        </iframe>
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
        CKEDITOR.replace('desc', {
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
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
@endsection
