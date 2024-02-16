@extends('admin.layout.app')

@section('heading', 'Edytuj lokalizację oferty')

@section('button')

<div>
    <a href="{{ route('admin_job_location') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz wszystko</a>
</div>

@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_job_location_update', $job_location_single->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nazwa *</label>
                            <input type="text" class="form-control" name="name" value="{{ $job_location_single->name }}">
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