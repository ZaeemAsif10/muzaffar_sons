@extends('web-side.setup.master')
@section('content')
    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Gallery</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gallery
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
                    @foreach ($galleries as $allGallery)
                        <div class="col-md-4">
                            <div class="card-box-b card-shadow news-box">
                                <div class="img-box-b">
                                    <img src="{{ asset('storage/app/public/uploads/gallery/' . $allGallery->images) }}"
                                        alt="" class="img-b img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-header-b">
                                        <div class="card-date">
                                            <span class="date-b">{{ \Carbon\Carbon::parse($allGallery->created_at)->isoFormat('MMM - Do - YYYY') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </section><!-- End Blog Grid-->

    </main><!-- End #main -->
@endsection
