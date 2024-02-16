@extends('front.layout.app')

@section('main_title'){{ $pricing_page_item->title }}@endsection
@section('main_description'){{ $pricing_page_item->description}} @endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_pricing) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>{{ $pricing_page_item->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content pricing">
    <div class="container">
        <div class="row pricing">

            @foreach ($packages as $item)
            <div class="col-lg-4 mb_30">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->package_name }}</h2>
                        <h3 class="card-price">{{ $item->package_price }} PLN</h3>
                        <h4 class="card-day">({{ $item->package_display_time }})</h4>
                        <hr />
                        <ul class="fa-ul">
                            <li>
                                @php
                                    if ($item->total_allowed_jobs == -1) {
                                        $text = "Nielimitowana ilość";
                                        $icon_code = "fas fa-check";
                                    } elseif ($item->total_allowed_jobs == 0) {
                                        $text = "Brak dozwolonych";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_jobs;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} dozwolonych ogłoszeń
                            </li>
                            <li>
                                @php
                                    if ($item->total_allowed_featured_jobs == -1) {
                                        $text = "Nielimitowana ilość";
                                        $icon_code = "fas fa-check";
                                    } elseif ($item->total_allowed_featured_jobs == 0) {
                                        $text = "Brak dozwolonych";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_featured_jobs;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} polecanych ogłoszeń
                            </li>
                            <li>
                                @php
                                    if ($item->total_allowed_photos == -1) {
                                        $text = "Nielimitowana ilość";
                                        $icon_code = "fas fa-check";
                                    } elseif ($item->total_allowed_photos == 0) {
                                        $text = "Brak dozwolonych";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_photos;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} zdjęć instytucji
                            </li>
                            <li>
                                @php
                                    if ($item->total_allowed_videos == -1) {
                                        $text = "Nielimitowana ilość";
                                        $icon_code = "fas fa-check";
                                    } elseif ($item->total_allowed_videos == 0) {
                                        $text = "Brak dozwolonych";
                                        $icon_code = "fas fa-times";
                                    } else {
                                        $text = $item->total_allowed_videos;
                                        $icon_code = "fas fa-check";
                                    }
                                @endphp
                                <span class="fa-li"><i class="{{ $icon_code }}"></i></span>
                                {{ $text }} filmów instytucji
                            </li>
                        </ul>
                        <div class="buy">
                            <a href="{{ route('company_make_payment') }}" class="btn btn-primary">Wybierz</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection