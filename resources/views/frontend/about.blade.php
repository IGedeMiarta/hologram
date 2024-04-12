@extends('frontend.app')

@section('content')
    <div class="empty-space h35-xs h90-sm"></div>
    <div class="container-fluid-style2">
        <div class="banner">
            <span class="bg top" style="background-image: url({{ asset($about->banner_img) }})"></span>
            <div class="banner-element">
                <img src="{{ asset($app->logo) }}" alt="" style="border-radius: 50%;">
            </div>
        </div>
        <div class="empty-space h100-xs h175-md"></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <article class="top-title">
                    <span>Tentang Kami</span>
                    <h1 class="h1">{{ $about->title }}</h1>
                    <div class="empty-space h15-xs"></div>
                    {{-- <p class="normal-l grey-dark"></p> --}}
                </article>
            </div>
        </div>
        <div class="empty-space h30-xs"></div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center section">
                <p>{{ $about->desc }}</p>

            </div>
        </div>
        <div class="empty-space h70-xs h140-md"></div>
        <div class="benefits">
            <div class="cell-view">
                <img src="{{ asset($about->banefit_img) }}" alt="">
            </div>
            <div class="empty-space h35-xs h0-md"></div>
            <div class="cell-view">
                <article>
                    <h4 class="h4 text-left">Keunggulan Kami</h4>
                    <div class="empty-space h15-xs"></div>
                    @foreach ($benefit as $i => $item)
                        <div class="empty-space h20-xs"></div>
                        <p><span>{{ $i + 1 }}</span>{{ $item->text }}</p>
                        <div class="empty-space h20-xs"></div>
                    @endforeach
                </article>
            </div>
        </div>
        <div class="empty-space h70-xs h140-md fl"></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <article class="top-title">
                    <span>OUR SERVICES</span>
                    <h1 class="h1">{{ $about->service_title }}</h1>
                    <div class="empty-space h15-xs"></div>
                    <p class="normal-l grey-dark">{{ $about->service_sub_title }}</p>
                </article>
            </div>
        </div>
        <div class="empty-space h40-xs h90-md"></div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    @foreach ($service as $item)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <a href="#">
                                    <img src="{{ asset($item->image) }}" alt="" style="max-width: 150px">
                                    <span>{{ $item->title }}</span>
                                </a>
                                <p>{{ $item->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="empty-space h70-xs h140-md"></div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="quote-wrapper">
                    <div class="quote section cell-view">
                        <img src="{{ asset('frontend') }}/img/quote-left.png" alt="">
                        <div class="empty-space h5-xs"></div>
                        <p class="biggest-1">{{ $about->quote }}</p>
                        <div class="empty-space h15-xs"></div>
                        <img src="{{ asset('frontend') }}/img/quote-right.png" alt="">
                        <div class="empty-space h10-xs"></div>
                        <p class="big-2">{{ $about->quote_by_name }}</p>
                        <div class="empty-space h5-xs"></div>
                        <p class="grey">{{ $about->quote_by_title }}</p>
                    </div>
                    <div class="cell-view"><img src="{{ asset($about->quote_by_img) }}" alt=""></div>

                </div>
            </div>
        </div>
        <div class="empty-space h35-xs h100-md"></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <article class="top-title">
                    <span>TESTIMONY</span>
                    <h1 class="h1">{{ $about->testi_title }}</h1>
                    <div class="empty-space h15-xs"></div>
                    <p class="normal-l grey-dark">{{ $about->testi_sub_title }}</p>
                </article>
            </div>
        </div>
        <div class="empty-space h40-xs h80-md"></div>
        <div class="swiper-with-pagination style2">
            <div class="swiper-container" data-speed="1000" data-breakpoints="1" data-space="30" data-slides-per-view="4"
                data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3">
                <div class="swiper-wrapper">
                    @foreach ($testi as $item)
                        <div class="swiper-slide">
                            <a href="#"><img src="{{ asset($item->testi_img) }}" alt=""
                                    style="width: 350px; height: 350px; object-fit: cover; filter: brightness(70%);"></a>
                            <div class="team-description" style="margin-top: 50px;">
                                {{ $item->testi_name }}
                                <br>
                                <span>{{ $item->testi_title ?? '-' }}</span>
                                <div class="empty-space h10-xs"></div>
                                <p style="font-size: 13px">{{ $item->testimoni }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="empty-space h35-xs"></div>
                <div class="swiper-pagination-wrapper">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="empty-space h70-xs h140-md fl"></div>



    </div>
@endsection
