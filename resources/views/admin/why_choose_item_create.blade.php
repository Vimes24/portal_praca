@extends('admin.layout.app')

@section('heading', 'Utwórz opcję Dlaczego My')

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
                    <form action="{{ route('admin_why_choose_item_store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Ikona *</label>
                            <input type="text" class="form-control" name="icon">
                        </div>
                        <div class="form-group mb-3">
                            <label>Nagłówek *</label>
                            <input type="text" class="form-control" name="heading">
                        </div>
                        <div class="form-group mb-3">
                            <label>Tekst *</label>
                            <textarea name="text" class="form-control h_100" cols="30" rows="10"></textarea>
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