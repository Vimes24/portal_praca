@extends('front.layout.app')

@section('main_title'){{ $contact_page_item->title }}@endsection
@section('main_description'){{ $contact_page_item->description}} @endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_contact) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>{{ $contact_page_item->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                    <form action="{{ route('contact_submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Imię</label>
                            <input type="text" class="form-control" name="person_name"/>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="person_email"/>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Wiadomość</label>
                            <textarea class="form-control" rows="3" name="person_message"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Wyślij wiadomość</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {!! $contact_page_item->map_code !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection