@extends('admin.layout.app')

@section('heading', 'Zawartość pozostałych')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_other_page_update') }}" method="post" enctype="multipart/form-data">
                        @csrf      
                        <div class="row custom-tab">
                            <div class="col-lg-3 col-md-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Logowanie</button>
                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Rejestracja</button>
                                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Zapomniane hasło</button>
                                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Wyszukiwanie ofert</button>
                                    <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Instytucje</button>

                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">
                                      {{-- Początek sekcji logowania --}}
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Nagłówek *</label>
                                                <input type="text" class="form-control" name="login_page_heading" value="{{ $page_other_data->login_page_heading }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Tytuł </label>
                                                <input type="text" class="form-control" name="login_page_title" value="{{ $page_other_data->login_page_title }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Opis </label>
                                                <textarea name="login_page_description" class="form-control h_100" cols="30" rows="10">{{ $page_other_data->login_page_description }}</textarea>
                                            </div>
                                          </div>
                                        </div>
                                    
                                      {{-- Koniec sekcji logowania --}}
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="0">
                                      {{-- Początek sekcji rejestracji --}}
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="mb-4">
                                              <label class="form-label">Nagłówek *</label>
                                              <input type="text" class="form-control" name="signup_page_heading" value="{{ $page_other_data->signup_page_heading }}">
                                          </div>
                                          <div class="mb-4">
                                              <label class="form-label">Tytuł </label>
                                              <input type="text" class="form-control" name="signup_page_title" value="{{ $page_other_data->signup_page_title }}">
                                          </div>
                                          <div class="mb-4">
                                              <label class="form-label">Opis </label>
                                              <textarea name="signup_page_description" class="form-control h_100" cols="30" rows="10">{{ $page_other_data->signup_page_description }}</textarea>
                                          </div>
                                        </div>
                                      </div>
                                      {{-- Koniec sekcji rejestracji --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab" tabindex="0">
                                        {{-- Początek sekcji Zapomniane hasło --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                              <div class="mb-4">
                                                  <label class="form-label">Nagłówek *</label>
                                                  <input type="text" class="form-control" name="forget_page_heading" value="{{ $page_other_data->forget_page_heading }}">
                                              </div>
                                              <div class="mb-4">
                                                  <label class="form-label">Tytuł </label>
                                                  <input type="text" class="form-control" name="forget_page_title" value="{{ $page_other_data->forget_page_title }}">
                                              </div>
                                              <div class="mb-4">
                                                  <label class="form-label">Opis </label>
                                                  <textarea name="forget_page_description" class="form-control h_100" cols="30" rows="10">{{ $page_other_data->forget_page_description }}</textarea>
                                              </div>
                                            </div>
                                          </div>
                                        {{-- Koniec sekcji Zapomniane hasło --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab" tabindex="0">
                                        {{-- Początek sekcji Wyszukiwanie ofert --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                              <div class="mb-4">
                                                  <label class="form-label">Nagłówek *</label>
                                                  <input type="text" class="form-control" name="job_listing_page_heading" value="{{ $page_other_data->job_listing_page_heading }}">
                                              </div>
                                              <div class="mb-4">
                                                  <label class="form-label">Tytuł </label>
                                                  <input type="text" class="form-control" name="job_listing_page_title" value="{{ $page_other_data->job_listing_page_title }}">
                                              </div>
                                              <div class="mb-4">
                                                  <label class="form-label">Opis </label>
                                                  <textarea name="job_listing_page_description" class="form-control h_100" cols="30" rows="10">{{ $page_other_data->job_listing_page_description }}</textarea>
                                              </div>
                                            </div>
                                          </div>
                                        {{-- Koniec sekcji Wyszukiwanie ofert --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab" tabindex="0">
                                        {{-- Początek sekcji Instytucje --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                              <div class="mb-4">
                                                  <label class="form-label">Nagłówek *</label>
                                                  <input type="text" class="form-control" name="company_listing_page_heading" value="{{ $page_other_data->company_listing_page_heading }}">
                                              </div>
                                              <div class="mb-4">
                                                  <label class="form-label">Tytuł </label>
                                                  <input type="text" class="form-control" name="company_listing_page_title" value="{{ $page_other_data->company_listing_page_title }}">
                                              </div>
                                              <div class="mb-4">
                                                  <label class="form-label">Opis </label>
                                                  <textarea name="company_listing_page_description" class="form-control h_100" cols="30" rows="10">{{ $page_other_data->company_listing_page_description }}</textarea>
                                              </div>
                                            </div>
                                          </div>
                                        {{-- Koniec sekcji Instytucje --}}
                                    </div>

                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Aktualizuj</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection