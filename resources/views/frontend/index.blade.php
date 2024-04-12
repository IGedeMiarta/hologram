@extends('frontend.app')

@section('content')
    <div class="container-fluid-style2">
        <div class="align-wrapper">
            @foreach ($porto as $i => $item)
                @if ($i % 2 == 0)
                    <div class="img-block-wrapper text-left-style2 fadeInUp">
                        <div class="empty-space h70-xs h70-md h90-lg"></div>
                        <div class="img-block wow fadeInUp" data-wow-offset="100">
                            <a href="#" style="height: 400px;">
                                <div class="bg" style="background-image: url({{ $item->project_img }})">
                                </div>
                            </a>
                            <div class="description-wrapper">
                                <div class="description">
                                    <a class="biggest-1 mouseover-1">{{ $item->project_name }}</a>
                                    <div class="empty-space h5-xs"></div>
                                    <p class="small-3">{{ $item->client_name }}</p>
                                    <p class="small-1">{{ date('d M Y', strtotime($item->complate_date)) }}</p>

                                    <img src="{{ asset($item->client_img) }}" alt="{{ $item->client_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="img-block-wrapper text-right-style2 fadeInUp">
                        <div class="empty-space h55-xs h75-md h150-lg"></div>
                        <div class="img-block wow fadeInUp" data-wow-offset="100">
                            <a href="#" style="height: 524px;">
                                <div class="bg" style="background-image: url({{ $item->project_img }})">
                                </div>
                            </a>
                            <div class="description-wrapper">
                                <div class="description">
                                    <a class="biggest-1 mouseover-1">{{ $item->project_name }}</a>
                                    <div class="empty-space h5-xs"></div>
                                    <p class="small-3">{{ $item->client_name }}</p>
                                    <p class="small-1">{{ date('d M Y', strtotime($item->complate_date)) }}</p>
                                    <img src="{{ asset($item->client_img) }}" alt="{{ $item->client_name }}">

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div style="display: flex; justify-content: center; margin-top: 30px;">
            {{ $porto->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection
