@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Edytuj zatrudnienie</h2>
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
                <a href="{{ route('candidate_experience') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Zobacz wszystko</a>
                    <form action="{{ route('candidate_experience_update', $experiences_single->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Instytucja *</label>
                                <div class="form-group">
                                    <input type="text" name="company" class="form-control" value="{{ $experiences_single->company }}"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Stanowisko *</label>
                                <div class="form-group">
                                    <input type="text" name="designation" class="form-control" value="{{ $experiences_single->designation }}"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Data rozpoczęcia *</label>
                                <div class="form-group">
                                    <input type="text" name="start_date" class="form-control" value="{{ $experiences_single->start_date }}"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Data zakończenia *</label>
                                <div class="form-group">
                                    <input type="text" name="end_date" class="form-control" value="{{ $experiences_single->end_date }}"/>
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