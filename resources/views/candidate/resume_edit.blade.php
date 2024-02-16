@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Edytuj załącznik</h2>
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
                <a href="{{ route('candidate_resume') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Zobacz wszystko</a>
                    <form action="{{ route('candidate_resume_update', $resumes_single->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Nazwa *</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ $resumes_single->name }}"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Załącznik *</label>
                                <div class="form-group">
                                    <a href="{{ asset('uploads/'.$resumes_single->file) }}" target="_blank">{{ $resumes_single->file }}</a>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Nowy załącznik *</label>
                                <div class="form-group">
                                    <input type="file" name="file"/>
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