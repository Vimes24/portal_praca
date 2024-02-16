@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')s">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Edytuj profil</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('candidate.sidebar')
                </div>
            </div>
            
            <div class="col-lg-9 col-md-12">
                <form action="{{ route('candidate_edit_profile_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Obecne zdjęcie</label>
                            <div class="form-group">
                                @if(Auth::guard('candidate')->user()->photo == '')
                                <img src="{{ asset('uploads/default_candidate_photo.png') }}" alt="" class="user_photo">
                                @else
                                <img src="{{ asset('uploads/'.Auth::guard('candidate')->user()->photo) }}" alt="" class="user_photo"/>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Zmień zdjęcie</label>
                            <div class="form-group">
                                <input type="file" name="photo" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Imię *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{ Auth::guard('candidate')->user()->name }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Zawód</label>
                            <div class="form-group">
                                <input type="text" name="designation" class="form-control" value="{{ Auth::guard('candidate')->user()->designation }}"/>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">O sobie</label>
                            <textarea name="biography" class="form-control editor" cols="30" rows="10">{{ Auth::guard('candidate')->user()->biography }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Login *</label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" value="{{ Auth::guard('candidate')->user()->username }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" value="{{ Auth::guard('candidate')->user()->email }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Telefon</label>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{ Auth::guard('candidate')->user()->phone }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Województwo</label>
                            <div class="form-group">
                                <input type="text" name="region" class="form-control" value="{{ Auth::guard('candidate')->user()->region }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Adres</label>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" value="{{ Auth::guard('candidate')->user()->address }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Powiat</label>
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" value="{{ Auth::guard('candidate')->user()->state }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Miasto</label>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" value="{{ Auth::guard('candidate')->user()->city }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Kod pocztowy</label>
                            <div class="form-group">
                                <input type="text" name="zip_code" class="form-control" value="{{ Auth::guard('candidate')->user()->zip_code }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Płeć</label>
                            <div class="form-group">
                                <select name="gender" class="form-control select2">
                                    <option value="Male" @if(Auth::guard('candidate')->user()->gender == 'Male') selected  @endif>Mężczyzna</option>
                                    <option value="Female" @if(Auth::guard('candidate')->user()->gender == 'Female') selected  @endif>Kobieta</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Stan cywilny</label>
                            <div class="form-group">
                                <select name="marital_status" class="form-control select2">
                                    <option value="Married" @if(Auth::guard('candidate')->user()->marital_status == 'Married') selected  @endif>W związku</option>
                                    <option value="Unmarried" @if(Auth::guard('candidate')->user()->marital_status == 'Unmarried') selected  @endif>Stan wolny</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Data urodzenia *</label>
                            <div class="form-group">
                                <input type="text" name="date_of_birth" class="form-control datepicker" value="{{ Auth::guard('candidate')->user()->date_of_birth }}"/>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Strona internetowa</label>
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" value="{{ Auth::guard('candidate')->user()->website }}"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Aktualizuj"/>
                            </div>
                        </div>
                    </div>
                </form>                    
            </div>
        </div>
    </div>
</div>

@endsection