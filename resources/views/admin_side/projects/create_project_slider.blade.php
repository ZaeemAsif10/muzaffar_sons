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
                                     <li class="breadcrumb-item active" aria-current="page">Add Project Slider</li>
                                 </ol>
                             </nav>
                         </div>
                         <div class="ms-auto">
                             <div class="btn-group">
                                 <a href="{{ url('project/slider') }}" class="btn btn-outline-primary">Back</a>
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
                         <h5>Add Project Slider</h5>
                         <form action="{{ url('store_project_slider') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group">
                                         <label for="">Title</label>
                                         <input type="text" class="form-control" name="title">
                                     </div>
                                 </div>

                                 <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="">Project Name</label>
                                        <select name="project_id" id="" class="form-control">
                                            <option value="" selected disabled>Choose project</option>
                                            @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
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
                                         <textarea name="description" class="form-control" rows="4"></textarea>
                                     </div>
                                 </div>
                                 <div class="col-md-12 mt-3">
                                     <div class="form-group">
                                         <label for="">Image</label>
                                         <input type="file" class="form-control" name="image">
                                         <span class="text-danger"> @error('image')
                                                 {{ $message }}
                                             @enderror </span>
                                     </div>
                                 </div>
                                 <div class="col-md-12 mt-3 text-center">
                                     <button type="submit" class="btn btn-primary add_blogs">Save</button>
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
 @endsection
