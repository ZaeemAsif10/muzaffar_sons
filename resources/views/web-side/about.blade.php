@extends('web-side.setup.master')
@section('content')
    <main id="main">
        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">ABOUT US</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    About
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= About Section ======= -->
        <section class="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 position-relative">
                        <div class="about-img-box">
                            <img src="{{ asset('public/assets/images/Al-Jalil-Gardens-SlideShow-07.jpg') }}"
                                alt="" class="img-fluid">
                        </div>
                        <div class="sinse-box">
                            <h3 class="sinse-title">RealEstate
                                <span></span>
                                <br> Sinse 2017
                            </h3>
                            <p>Art & Creative</p>
                        </div>
                    </div>
                    <div class="col-md-12 section-t8 position-relative">
                        <div class="row">
                            <div class="col-md-6 col-lg-5 section-md-t3">
                                <div class="title-box-d">
                                    <h3 class="title-d">MESSAGE FROM CHAIRMAN
                                    </h3>
                                </div>
                                <p class="color-text-a">
                                    Excellence, a quality that sets the best ones apart from everyone else, is
                                    what we seek in our business. Our talented team that strives for your trust, goes the
                                    extra mile to provide you the
                                    safest,
                                    securest, and the most profitable investment opportunities across the country. Our
                                    mission is to
                                    help to grow
                                    your wealth, build your dream home and secure your loved ones' future. Our vision is to
                                    make the
                                    Pakistani
                                    real estate industry transparent and trustworthy.

                                </p>

                            </div>
                            <div class="col-md-6 col-lg-5">
                                <img src="{{ asset('public/assets/images/01-Arsalan-Ghous.png.jpg') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>


                <section class="allBox">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="box text-center mt-3">
                                
                                <h5 class="mt-4 state">REAL ESTATE <br> CONSULTANCY</h5>
                                <p class="mt-4 help">Our experienced team of investment consultants helps to you enhance your
                                    decision making
                                    perspective by
                                    providing authentic information, so that you make the right investment decision.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box1 text-center mt-3">
                                <h5 class="mt-4 state">REAL ESTATE <br> MANAGEMENT</h5>
                                <p class="mt-4 help">The A Team is experienced in managing multi-million real estate
                                    properties for its
                                    national and international clients.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box2 text-center mt-3">
                                <h5 class="mt-4 state">REAL ESTATE <br> DEVELOPMENT</h5>
                                <p class="mt-4 help">The A Team has planned strategic partnerships and collaborations to
                                    bring its
                                    investors with exclusive opportunities.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
