@extends('admin.layout.app')

@section('heading', 'Utwórz post')

@section('button')

<div>
    <a href="{{ route('admin_post') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz wszystko</a>
</div>

@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Zdjęcie *</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Nagłówek *</label>
                            <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Podpis *</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Krótki opis *</label>
                            <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ old('short_description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Opis *</label>
                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        {{-- seo_section - nagłówek poszczególnych postów oraz krótki opis w wyszukiwarce --}}
                        <h4 class="seo_section">Opis karty</h4>
                        <div class="form-group mb-3">
                            <label>Tytuł</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Dodatkowy opis</label>
                            <textarea name="meta_description" class="form-control h_100" cols="30" rows="10">{{ old('meta_description') }}</textarea>
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