@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Panel Kandydata</h2>
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
                <h3>Witaj, {{ Auth::guard('candidate')->user()->name }}</h3>
                <p>Poniżej zobacz swoje statystyki:</p>

                <div class="row box-items">
                    <div class="col-md-4">
                        <div class="box1">
                            <h4>{{ $total_applied_jobs }}</h4>
                            <p>Zgłoszone oferty</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box2">
                            <h4>{{ $total_approved_jobs }}</h4>
                            <p>Zatwierdzone oferty</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box3">
                            <h4>{{ $total_rejected_jobs }}</h4>
                            <p>Odrzucone oferty</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection