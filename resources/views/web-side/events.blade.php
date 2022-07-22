@extends('web-side.setup.master')
@section('content')
    <!-- ======= Intro Section ======= -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($event_slider as $key => $event)
                <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                    <img src="{{ asset('storage/app/public/uploads/events/slider/' . $event->image) }}"
                        class="w-100 img-fluid" alt="">
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Intro Section -->

    <main id="main">
        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Events</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Events
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- =======  Blog Grid ======= -->
        <section class="news-grid grid">
            <div class="container">
                <div class="row">
                    @foreach ($annual_events as $annual_event)
                        <div class="col-md-4">
                            <div class="card-box-a card-shadow">
                                <div class="img-box-a">
                                    <img src="{{ asset('storage/app/public/uploads/annual_events/' . $annual_event->images) }}"
                                        alt="" class="img-a img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </section><!-- End Blog Grid-->

    </main><!-- End #main -->
@endsection
