@extends('admin.layout.app')

@section('heading', 'Baner')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_banner_update') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Wyszukiwanie ofert</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_job_listing) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_job_listing">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Szczegóły ofert</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_job_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_job_detail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Kategorie ofert</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_job_categories) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_job_categories">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Wyszukiwanie instytucji</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_company_listing) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_company_listing">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Szczegóły instytucji</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_company_detail) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_company_detail">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Płatności</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_pricing) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_pricing">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Blog</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_blog) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_blog">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Post</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_post) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_post">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>FAQ</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_faq) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_faq">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Kategorie ofert</h4>
                        <div class="form-group mb-3">
                            <label>Kontakt</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_contact) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_contact">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Warunki użycia</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_terms) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_terms">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Kategorie ofert</h4>
                        <div class="form-group mb-3">
                            <label>Polityka prywatności</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_privacy) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_privacy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Rejestracja</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_signup) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_signup">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Logowanie</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_login) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_login">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Kategorie ofert</h4>
                        <div class="form-group mb-3">
                            <label>Zapomniane hasło</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_forget_password) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_forget_password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Panel instytucji</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_company_panel) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_company_panel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Panel kandydata</h4>
                        <div class="form-group mb-3">
                            <label>Aktualny baner</label>
                            <div>
                                <img src="{{ asset('uploads/'.$banner_data->baner_candidate_panel) }}" alt="" class="w_200">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień baner</label>
                            <div>
                                <input type="file" name="baner_candidate_panel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Aktualizuj</button>
        </div>
    </form>
</div>

@endsection