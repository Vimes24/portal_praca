@extends('admin.layout.app')

@section('heading', 'Zawartość strony głównej')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_home_page_update') }}" method="post" enctype="multipart/form-data">
                        @csrf      
                        <div class="row custom-tab">
                            <div class="col-lg-3 col-md-12">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Szukaj</button>
                                    <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Kategorie</button>
                                    <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Dlaczego My</button>
                                    <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Oferty</button>
                                    <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Opinie</button>
                                    <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">Blog</button>
                                    <button class="nav-link" id="v-pills-7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-7" type="button" role="tab" aria-controls="v-pills-7" aria-selected="false">Sekcja Opis SEO</button>

                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">
                                      {{-- Początek sekcji wyszukiwania --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                              {{-- Kod do zmiany nagłówka strony tytułowej frontu użytkownika --}}
                                              <div class="mb-4">
                                                  <label class="form-label">Nagłówek *</label>
                                                  <input type="text" class="form-control" name="heading" value="{{ $home_page_data->heading }}">
                                              </div>
                                              {{-- Kod do zmiany opisu nagłówka strony tytułowej frontu użytkownika --}}
                                              <div class="mb-4">
                                                  <label class="form-label">Tekst</label>
                                                  <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $home_page_data->text }}</textarea>
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-6 col-md-6">
                                                      {{-- Kod do zmiany opisu stanowisk strony tytułowej frontu użytkownika --}}
                                                      <div class="mb-4">
                                                      <label class="form-label">Tytuł oferty *</label>
                                                      <input type="text" class="form-control" name="job_title" value="{{ $home_page_data->job_title }}">
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6">
                                                      {{-- Kod do zmiany lokalizacji stanowisk strony tytułowej frontu użytkownika --}}
                                                      <div class="mb-4">
                                                      <label class="form-label">Lokalizacja *</label>
                                                      <input type="text" class="form-control" name="job_location" value="{{ $home_page_data->job_location }}">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-6 col-md-6">
                                                      {{-- Kod do zmiany kategorii stanowisk strony tytułowej frontu użytkownika --}}
                                                      <div class="mb-4">
                                                      <label class="form-label">Kategoria *</label>
                                                      <input type="text" class="form-control" name="job_category" value="{{ $home_page_data->job_category }}">
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-md-6">
                                                      {{-- Kod do zmiany treści wyszukiwarki strony tytułowej --}}
                                                      <div class="mb-4">
                                                      <label class="form-label">Szukaj *</label>
                                                      <input type="text" class="form-control" name="search" value="{{ $home_page_data->search }}">
                                                      </div>
                                                  </div>
                                              </div>
                                              {{-- Tło strony tytułowej frontu użytkownika --}}
                                              <div class="mb-4">
                                                  <label class="form-label">Obecny podkład *</label>
                                                  <div>
                                                      <img src="{{ asset('uploads/'.$home_page_data->background) }}" alt="" class="w_300">
                                                  </div>
                                              </div>
                                              {{-- Kod do zmiany tła strony tytułowej frontu użytkownika --}}
                                              <div class="mb-4">
                                                  <label class="form-label">Zmień podkład *</label>
                                                  <div>
                                                      <input type="file" class="form-control mt_10" name="background">
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                    
                                      {{-- Koniec sekcji wyszukiwania --}}
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="0">
                                      {{-- Początek sekcji kategorii --}}
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="mb-4">
                                              <label class="form-label">Nagłówek *</label>
                                              <input type="text" class="form-control" name="job_category_heading" value="{{ $home_page_data->job_category_heading }}">
                                          </div>
                                          <div class="mb-4">
                                            <label class="form-label">Tekst</label>
                                            <input type="text" class="form-control" name="job_category_text" value="{{ $home_page_data->job_category_text }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Status *</label>
                                            <select name="job_category_status" class="form-control">
                                                <option value="Show" @if ($home_page_data->job_category_status == 'Show') selected @endif>Pokaż</option>
                                                <option value="Hide" @if ($home_page_data->job_category_status == 'Hide') selected @endif>Ukryj</option>
                                            </select>
                                        </div>
                                        </div>
                                      </div>
                                      {{-- Koniec sekcji kategorii --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab" tabindex="0">
                                        {{-- Początek sekcji Dlaczego My --}}
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Nagłówek *</label>
                                                <input type="text" class="form-control" name="why_choose_heading" value="{{ $home_page_data->why_choose_heading }}">
                                            </div>
                                            <div class="mb-4">
                                              <label class="form-label">Tekst</label>
                                              <input type="text" class="form-control" name="why_choose_text" value="{{ $home_page_data->why_choose_text }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Obecny podkład *</label>
                                                <div>
                                                    <img src="{{ asset('uploads/'.$home_page_data->why_choose_background) }}" alt="" class="w_300">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Zmień podkład *</label>
                                                <div>
                                                    <input type="file" class="form-control mt_10" name="why_choose_background">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Status *</label>
                                                <select name="why_choose_status" class="form-control">
                                                    <option value="Show" @if ($home_page_data->why_choose_status == 'Show') selected @endif>Pokaż</option>
                                                    <option value="Hide" @if ($home_page_data->why_choose_status == 'Hide') selected @endif>Ukryj</option>
                                                </select>
                                            </div>
                                          </div>
                                        </div>
                                        {{-- Koniec sekcji Dlaczego My --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab" tabindex="0">
                                        {{-- Początek sekcji Oferty --}}
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Nagłówek *</label>
                                                <input type="text" class="form-control" name="featured_jobs_heading" value="{{ $home_page_data->featured_jobs_heading }}">
                                            </div>
                                            <div class="mb-4">
                                              <label class="form-label">Tekst</label>
                                              <input type="text" class="form-control" name="featured_jobs_text" value="{{ $home_page_data->featured_jobs_text }}">
                                          </div>
                                          <div class="mb-4">
                                              <label class="form-label">Status *</label>
                                              <select name="featured_jobs_status" class="form-control">
                                                  <option value="Show" @if ($home_page_data->featured_jobs_status == 'Show') selected @endif>Pokaż</option>
                                                  <option value="Hide" @if ($home_page_data->featured_jobs_status == 'Hide') selected @endif>Ukryj</option>
                                              </select>
                                          </div>
                                          </div>
                                        </div>
                                        {{-- Koniec sekcji Oferty --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab" tabindex="0">
                                        {{-- Początek sekcji Opinii --}}
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Nagłówek *</label>
                                                <input type="text" class="form-control" name="testimonial_heading" value="{{ $home_page_data->testimonial_heading }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Obecny podkład *</label>
                                                <div>
                                                    <img src="{{ asset('uploads/'.$home_page_data->testimonial_background) }}" alt="" class="w_300">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Zmień podkład *</label>
                                                <div>
                                                    <input type="file" class="form-control mt_10" name="testimonial_background">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Status *</label>
                                                <select name="testimonial_status" class="form-control">
                                                    <option value="Show" @if ($home_page_data->testimonial_status == 'Show') selected @endif>Pokaż</option>
                                                    <option value="Hide" @if ($home_page_data->testimonial_status == 'Hide') selected @endif>Ukryj</option>
                                                </select>
                                            </div>
                                          </div>
                                        </div>
                                        {{-- Koniec sekcji Opinii --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab" tabindex="0">
                                        {{-- Początek sekcji Blog --}}
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Nagłówek *</label>
                                                <input type="text" class="form-control" name="blog_heading" value="{{ $home_page_data->blog_heading }}">
                                            </div>
                                            <div class="mb-4">
                                              <label class="form-label">Tekst</label>
                                              <input type="text" class="form-control" name="blog_text" value="{{ $home_page_data->blog_text }}">
                                          </div>
                                          <div class="mb-4">
                                              <label class="form-label">Status *</label>
                                              <select name="blog_status" class="form-control">
                                                  <option value="Show" @if ($home_page_data->blog_status == 'Show') selected @endif>Pokaż</option>
                                                  <option value="Hide" @if ($home_page_data->blog_status == 'Hide') selected @endif>Ukryj</option>
                                              </select>
                                          </div>
                                          </div>
                                        </div>
                                        {{-- Koniec sekcji Blog --}}
                                    </div>

                                    <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab" tabindex="0">
                                        {{-- Początek sekcji SEO --}}
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Tytuł *</label>
                                                <input type="text" class="form-control" name="title" value="{{ $home_page_data->title }}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Opis *</label>
                                                <textarea name="description" class="form-control h_100" cols="30" rows="10">
                                                    {{ $home_page_data->description }}
                                                </textarea>
                                            </div>
                                          </div>
                                        </div>
                                        {{-- Koniec sekcji Blog --}}
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