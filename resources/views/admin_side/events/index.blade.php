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
                                    <li class="breadcrumb-item active" aria-current="page">Events</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#AddEventsModal">Add New</button>
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
                                    <th>Events Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="eventsTable">

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


    <!--Add Events Modal Start -->
    <div id="AddEventsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="Add_events_Form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Events Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_events">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Events Modal End -->


    <!--Edit Events Modal Start -->
    <div id="edit_events_modal" class="modal custom-modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="Edit_events_Form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="events_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_events">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit Events Modal End -->



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- CDN for Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            getEvents();

            function getEvents() {

                $.ajax({

                    url: '{{ url('/get-events') }}',
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
                                '<td>' + data[i].name + '</td>' +
                                '<td>' + data[i].created_at + '</td>' +
                                '<td> <div class="d-flex align-items-center gap-3 fs-6">' +
                                '<a href="#" class="text-warning btn_edit_events" data="' + data[i].id +
                                '"><ion-icon name="pencil-sharp" role="img" class="md hydrated" aria-label="pencil sharp"></ion-icon></a>' +
                                '<a href="javascript:;" class="text-danger btn_delete_events" data="' +
                                data[i].id +
                                '" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        }


                        $('#eventsTable').html(html);

                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });
            }


            //Add Events
            $('#Add_events_Form').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData($('#Add_events_Form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('store-events') }}",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.add_events').text('Saving...');
                        $(".add_events").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            toastr.success(response.message);
                            $('.add_events').text('Save');
                            $(".add_events").prop("disabled", false);
                            $(".close").click();
                            $('#Add_events_Form').find('input').val("");
                            getEvents();

                        }

                        if (response.error) {
                            toastr.error(response.error);
                        }
                    },
                    error: function() {
                        $('.add_events').text('Save');
                        $(".add_events").prop("disabled", false);
                        toastr.error('something went wrong');
                    },
                });

            });


            //Edit Events
            $('#eventsTable').on('click', '.btn_edit_events', function(e) {
                e.preventDefault();

                var id = $(this).attr('data');

                $('#edit_events_modal').modal('show');

                $.ajax({

                    type: 'ajax',
                    method: 'get',
                    url: '{{ url('edit-events') }}',
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {

                        $('input[name=events_id]').val(data.id);
                        $('input[name=name]').val(data.name);
                    },

                    error: function() {

                        toastr.error('something went wrong');

                    }

                });

            });


            //Update Events
            $('.update_events').on('click', function(e) {
                e.preventDefault();


                let EditFormData = new FormData($('#Edit_events_Form')[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('update-events') }}",
                    data: EditFormData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        $('.update_events').text('Updating...');
                        $(".update_events").prop("disabled", true);
                    },
                    success: function(response) {

                        if (response.status == 200) {
                            $('#edit_events_modal').modal('hide');
                            $('#Edit_events_Form').find('input').val("");
                            $('.update_events').text('Update');
                            $(".update_events").prop("disabled", false);
                            toastr.success(response.message);
                            getEvents();
                        }
                    },
                    error: function() {
                        toastr.error('something went wrong');
                        $('.update_events').text('Update');
                        $(".update_events").prop("disabled", false);
                    }
                });

            });


            // script for delete data
            $('#eventsTable').on('click', '.btn_delete_events', function(e) {
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
                            url: "{{ url('delete-events') }}",
                            data: {
                                id: id
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {

                                toastr.success(response.message);
                                getEvents();
                            }
                        });
                    }
                })

            });

        });
    </script>
@endsection
