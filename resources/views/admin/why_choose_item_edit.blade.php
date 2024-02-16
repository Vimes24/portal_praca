@extends('admin.layout.app')

@section('heading', 'Edytuj opcję Dlaczego My')

@section('button')

<div>
    <a href="{{ route('admin_why_choose_item') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz wszystko</a>
</div>

@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_why_choose_item_update', $why_choose_item_single->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Podgląd</label>
                            <div>
                                <i class="{{ $why_choose_item_single->icon }}"></i>
                            </div>                        
                        </div>
                        <div class="form-group mb-3">
                            <label>Ikona *</label>
                            <input type="text" class="form-control" name="icon" value="{{ $why_choose_item_single->icon }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Nagłówek *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $why_choose_item_single->heading }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Tekst *</label>
                            <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $why_choose_item_single->text }}</textarea>
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