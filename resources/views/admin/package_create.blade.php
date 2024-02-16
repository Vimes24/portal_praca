@extends('admin.layout.app')

@section('heading', 'Utwórz Pakiet')

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
                    <form action="{{ route('admin_package_store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Nazwa pakietu *</label>
                                    <input type="text" class="form-control" name="package_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Cena pakietu *</label>
                                    <input type="text" class="form-control" name="package_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Liczba dni *</label>
                                    <input type="text" class="form-control" name="package_days">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Czas wyświetlania *</label>
                                    <input type="text" class="form-control" name="package_display_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych ofert *</label>
                                    <input type="text" class="form-control" name="total_allowed_jobs">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych polecanych ofert *</label>
                                    <input type="text" class="form-control" name="total_allowed_featured_jobs">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych zdjęć *</label>
                                    <input type="text" class="form-control" name="total_allowed_photos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Ilość dozwolonych filmów *</label>
                                    <input type="text" class="form-control" name="total_allowed_videos">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Zatwierdź</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection