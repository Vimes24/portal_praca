@extends('admin.layout.app')

@section('heading', 'Utwórz FAQ')

@section('button')

<div>
    <a href="{{ route('admin_faq') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Zobacz wszystko</a>
</div>

@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_faq_store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Pytanie *</label>
                            <input type="text" class="form-control" name="question">
                        </div>
                        <div class="form-group mb-3">
                            <label>Odpowiedź *</label>
                            <textarea name="answer" class="form-control editor" cols="30" rows="10"></textarea>
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