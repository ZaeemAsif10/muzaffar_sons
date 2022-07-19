@extends('admin_side.setup.master')

@section('content')
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
                                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <a href="{{ url('blogs/create') }}" type="button" class="btn btn-outline-primary" >Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->



            <!--Table Start-->
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="blogsTable">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Table End-->
        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->





    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- CDN for Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            getBlogs();

            function getBlogs() {

                $.ajax({

                    url: '{{ url('/get-blogs') }}',
                    type: 'get',
                    async: false,
                    dataType: 'json',

                    success: function(data) {

                        var html = '';
                        var i;
                        var c = 0;

                        for (i = 0; i < data.length; i++) {

                            c++;
                            html += '<tr>' +
                                '<td>' + c + '</td>' +
                                '<td>' + data[i].title + '</td>' +
                                '<td><img src="{{ asset('storage/app/public/uploads/blogs') }}/' +data[i].image +'" width="80px" height="80px" ></td>' +
                                '<td>' + data[i].created_at + '</td>' +
                                '<td> <div class="d-flex align-items-center gap-3 fs-6">' +
                                '<a href="{{ url('edit-blogs/') }}/'+data[i].id+'" class="text-warning btn_edit_blogs"><ion-icon name="pencil-sharp" role="img" class="md hydrated" aria-label="pencil sharp"></ion-icon></a>' +
                                '<a href="javascript:;" class="text-danger btn_delete_blogs" data="' +
                                data[i].id +
                                '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        }


                        $('#blogsTable').html(html);

                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });
            }


            // script for delete data
            $('#blogsTable').on('click', '.btn_delete_blogs', function(e) {
                e.preventDefault();

                var id = $(this).attr('data');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to Delete this Data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "{{ url('delete-blogs') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                if (response.status == 200) {
                                    toastr.success(response.message);
                                    getBlogs();
                                }
                            }
                        });
                    }
                })

            });

        });
    </script>
@endsection
