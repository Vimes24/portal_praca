@extends('admin.layout.app')

@section('heading', 'Utwórz opinię')

@section('button')

<div>
    <a href="{{ route('admin_testimonial') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz wszystko</a>
</div>

@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_testimonial_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Zdjęcie *</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Nazwa *</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Stanowisko *</label>
                            <input type="text" class="form-control" name="designation">
                        </div>
                        <div class="form-group mb-3">
                            <label>Komentarz *</label>
                            <textarea name="comment" class="form-control h_100" cols="30" rows="10"></textarea>
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