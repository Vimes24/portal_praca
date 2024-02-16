@extends('front.layout.app')

@section('main_title'){{ $term_page_item->title }}@endsection
@section('main_description'){{ $term_page_item->description}} @endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_terms) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>{{ $term_page_item->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!!$term_page_item->content !!}
            </div>
        </div>
    </div>
</div>
@endsection