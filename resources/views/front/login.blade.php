@extends('front.layout.app')

@section('main_title'){{ $other_page_item->login_page_title }}@endsection
@section('main_description'){{ $other_page_item->login_page_description}} @endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_login) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>{{ $other_page_item->login_page_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-form">
                    <ul
                        class="nav nav-pills mb-3"
                        id="pills-tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link active"
                                id="pills-home-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-home"
                                type="button"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true">
                                <i class="far fa-user"></i> Kandydat
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link"
                                id="pills-profile-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-profile"
                                type="button"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false">
                                <i class="fas fa-briefcase"></i>
                                Instytucja
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div
                            class="tab-pane fade show active"
                            id="pills-home"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab"
                            tabindex="0">

                            <form action="{{ route('candidate_login_submit') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Login</label>
                                    <input type="text" class="form-control" name="username"/>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Hasło</label>
                                    <input type="password" class="form-control" name="password"/>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary bg-website">
                                        Zaloguj się
                                    </button>
                                    <a href="{{ route('candidate_forget_password') }}" class="primary-color">
                                        Zapomniałeś hasło?</a>
                                </div>
                            </form>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="pills-profile"
                            role="tabpanel"
                            aria-labelledby="pills-profile-tab"
                            tabindex="0">

                            <form action="{{ route('company_login_submit') }}" method="post">
                                @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Login</label>
                                <input type="text" class="form-control" name="username"/>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Hasło</label>
                                <input type="password" class="form-control" name="password"/>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Zaloguj się
                                </button>
                                <a href="{{ route('company_forget_password') }}" class="primary-color">
                                    Zapomniałeś hasło?
                                </a>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('signup') }}"   class="primary-color"
                            >Nie posiadasz konta? Zarejestruj się.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection