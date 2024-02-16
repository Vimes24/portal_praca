@extends('admin.layout.app')

@section('heading', 'Edytuj Pakiet')

@section('button')

<div>
    <a href="{{ route('admin_package') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz wszystko</a>
</div>

@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_package_update', $package_single->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nazwa pakietu *</label>
                                    <input type="text" class="form-control" name="package_name" value="{{ $package_single->package_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Cena pakietu *</label>
                                    <input type="text" class="form-control" name="package_price" value="{{ $package_single->package_price }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Liczba dni *</label>
                                    <input type="text" class="form-control" name="package_days" value="{{ $package_single->package_days }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Czas wyświetlania *</label>
                                    <input type="text" class="form-control" name="package_display_time" value="{{ $package_single->package_display_time }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych ofert *</label>
                                    <input type="text" class="form-control" name="total_allowed_jobs" value="{{ $package_single->total_allowed_jobs }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych polecanych ofert *</label>
                                    <input type="text" class="form-control" name="total_allowed_featured_jobs" value="{{ $package_single->total_allowed_featured_jobs }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych zdjęć *</label>
                                    <input type="text" class="form-control" name="total_allowed_photos" value="{{ $package_single->total_allowed_photos }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych filmów *</label>
                                    <input type="text" class="form-control" name="total_allowed_videos" value="{{ $package_single->total_allowed_videos }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Zaktualizuj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection