@extends('admin.layout.app')

@section('heading', 'Warunki użycia')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_term_page_update') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nagłówek *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $page_term_data->heading }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Treść *</label>
                            <textarea name="content" class="form-control editor" cols="30" rows="10">{{ $page_term_data->content }}</textarea>
                        </div>

                        {{-- seo_section - nagłówek oraz krótki opis w wyszukiwarce --}}
                        <h4 class="seo_section">Opis karty</h4>
                        <div class="form-group mb-3">
                            <label>Tytuł</label>
                            <input type="text" class="form-control" name="title" value="{{ $page_term_data->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Opis</label>
                            <textarea name="description" class="form-control h_100" cols="30" rows="10">{{ $page_term_data->description }}</textarea>
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