@extends('front.layout.app')

@section('main_title'){{ $other_page_item->forget_page_title }}@endsection
@section('main_description'){{ $other_page_item->forget_page_description}} @endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_forget_password) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>{{ $other_page_item->forget_page_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <form action="{{ route('company_forget_password_submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Adres Email</label>
                            <input type="text" class="form-control" name="email"/>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Zatwierdź
                            </button>
                            <a href="{{ route('login') }}" class="primary-color" >Powrót do strony logowania</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection