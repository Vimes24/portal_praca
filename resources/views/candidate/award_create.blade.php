@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Dodaj wyróżnienie</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('candidate.sidebar')
                </div>
            </div>
            
            <div class="col-lg-9 col-md-12">
                <a href="{{ route('candidate_award') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Zobacz wszystko</a>
                    <form action="{{ route('candidate_award_store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Wyróżnienie *</label>
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Opis *</label>
                                <div class="form-group">
                                    <textarea name="description" class="form-control h-100"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Data uzyskania *</label>
                                <div class="form-group">
                                    <input type="text" name="date" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Zatwierdź"/>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection