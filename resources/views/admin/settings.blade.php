@extends('admin.layout.app')

@section('heading', 'Ustawienia')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_settings_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Obecne logo</label>
                            <div>                        
                                <img src="{{ asset('uploads/'.$settings->logo) }}" alt="" class="w_150">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień logo</label>
                            <div>
                                <input type="file" name="logo">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Obecna ikona</label>
                            <div>                        
                                <img src="{{ asset('uploads/'.$settings->favicon) }}" alt="" class="w_50">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Zmień ikonę</label>
                            <div>
                                <input type="file" name="favicon">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nr telefonu w nagłówku</label>
                            <input type="text" name="top_bar_phone" class="form-control" value="{{ $settings->top_bar_phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Adres email w nagłówku</label>
                            <input type="text" name="top_bar_email" class="form-control" value="{{ $settings->top_bar_email }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Nr telefonu w stopce</label>
                            <input type="text" name="footer_phone" class="form-control" value="{{ $settings->footer_phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Adres email w stopce</label>
                            <input type="text" name="footer_email" class="form-control" value="{{ $settings->footer_email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Adres w stopce</label>
                            <input type="text" name="footer_address" class="form-control" value="{{ $settings->footer_address }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{ $settings->facebook }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{ $settings->twitter }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Pinterest</label>
                            <input type="text" name="pinterest" class="form-control" value="{{ $settings->pinterest }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" value="{{ $settings->linkedin }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{ $settings->instagram }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Prawa własności</label>
                            <input type="text" name="copyright_text" class="form-control" value="{{ $settings->copyright_text }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Aktualizuj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection