@extends('web-side.setup.master')
@section('content')
    <style>
        iframe {
            width: 100%;
            height: 315px;
        }
    </style>


    <!-- ======= Intro Section ======= -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($project_slider as $key => $project_slid)
                <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                    <img src="{{ asset('storage/app/public/uploads/projects/slider/' . $project_slid->image) }}"
                        class="w-100 img-fluid" alt="">
                </div>
            @endforeach
        </div>
    </div>

    <!-- End Intro Section -->

    <main id="main">
        <!-- ======= Testimonials Section ======= -->
        <section class="section-testimonials section-t8 nav-arrow-a">
            <div class="container">

                <div id="testimonial-carousel" class="swiper">

                    <div class="carousel-item-a swiper-slide">
                        <div class="testimonials-box">
                            @foreach ($project_details as $project_detail)
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="title-wrap d-flex justify-content-between">
                                            <div class="title-box">
                                                <h2 class="title-a">{{ $project_detail->title }}</h2>
                                            </div>
                                        </div>


                                        <div class="testimonials-content">
                                            <span class="desc">{!! $project_detail->desc !!}</span>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="testimonial-img">
                                            <x-embed url="https://www.youtube.com/watch?v={{ $project_detail->link }}" />
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End carousel item -->
                </div>
            </div>
        </section>

        <!-- ======= Contact Single ======= -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-single-box text-center">
                            <h4 class="title-single fw-bold">THE LOCATION MAP</h4>
                        </div>
                        <div class="contact-map box mt-4">
                            <p class="text-secondary text-center">{{ $projects->location }}</p>
                            <div id="map" class="contact-map">
                                <iframe
                                    src="https://www.google.com/maps?q={{ $projects->latitude }},{{ $projects->longitud }}&hl=es;z=1&output=embed"
                                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row section-t3">
                            <div class="col-sm-12">
                                <div class="title-box-d">
                                    <h3 class="title-d">FOR BOOKING & DETAILS</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <img src="{{ asset('public/assets/sons.jpeg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="property-agent">
                                    <h4 class="title-agent">MUZAFFAR & SONS</h4>
                                    <p class="color-text-a">
                                        Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet
                                        dui. Quisque velit nisi,
                                        pretium ut lacinia in, elementum id enim.
                                    </p>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <strong>Phone:</strong>
                                            <span class="color-text-a">(222) 4568932</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Mobile:</strong>
                                            <span class="color-text-a">777 287 378 737</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Email:</strong>
                                            <span class="color-text-a">annabella@example.com</span>
                                        </li>
                                        
                                    </ul>
                                    <div class="socials-a mt-5">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="bi bi-twitter" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="bi bi-instagram" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="bi bi-linkedin" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="property-contact">
                                    <form class="form-a">
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-a" id="inputName"
                                                        placeholder="Name *" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-a" id="inputEmail1"
                                                        placeholder="Email *" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                                                        rows="8" required=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="submit" class="btn btn-a">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Single-->
    </main>
    <!-- End #main -->
@endsection
