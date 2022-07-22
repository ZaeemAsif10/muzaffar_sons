@extends('web-side.setup.master')
@section('content')
    <!-- ======= Intro Section ======= -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($news_slider as $key => $news_slid)
                <div class="carousel-item {{ $key == 0 ? ' active' : '' }}">
                    <img src="{{ asset('storage/app/public/uploads/news/slider/' . $news_slid->image) }}" class="w-100 img-fluid"
                        alt="">
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Intro Section -->

    <main id="main">

        <!-- ======= Latest Properties Section ======= -->
        <section class="section-property section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="title-a">NEWS</h2>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="news-carousel" class="swiper">
                    <div class="swiper-wrapper">

                        @foreach ($news as $new)
                            <div class="carousel-item-c swiper-slide">
                                <div class="card-box-b card-shadow news-box">
                                    <div class="img-box-b">
                                        <img src="{{ asset('storage/app/public/uploads/news/' . $new->image) }}"
                                            alt="" class="img-b img-fluid">
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-header-b">
                                            <div class="card-title-b">
                                                <h2 class="title-2">
                                                    <a href="#">{{ $new->title }}</a>
                                                </h2>
                                            </div>
                                            <div class="card-date">
                                                <span
                                                    class="date-b">{{ \Carbon\Carbon::parse($new->created_at)->isoFormat('MMM - Do - YYYY') }}
                                                </span>
                                                
                                            </div>
                                            <a href="{{ url('more/news/' . $new->id) }}" class="link-a">Read More
                                                <span class="bi bi-chevron-right"></span>
                                              </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End carousel item -->
                    </div>
                </div>
                <div class="propery-carousel-pagination carousel-pagination"></div>

            </div>
        </section><!-- End Latest Properties Section -->
    </main>
    <!-- End #main -->
@endsection
