@extends('front.layout.app')

@section('main_title'){{ $other_page_item->job_listing_page_title }}@endsection
@section('main_description'){{ $other_page_item->job_listing_page_description}} @endsection

@section('main_content')
<div class="page-top page-top-job-single" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_job_detail) }}')">
    <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 job job-single">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/'.$job_single->rCompany->logo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>{{ $job_single->title }}, {{ $job_single->rCompany->company_name }}</h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">
                                    {{ $job_single->rJobCategory->name }}
                                </div>
                                <div class="location">
                                    {{ $job_single->rJobLocation->name }}
                                </div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">
                                    {{ $job_single->created_at->diffForHumans() }}
                                </div>
                                <div class="budget">
                                    {{ $job_single->rJobSalary->name }}
                                </div>
                                @if(date('Y-m-d') > $job_single->deadline)
                                <div class="expired">
                                    Wygasło
                                </div>
                                @endif
                            </div>
                            <div class="special d-flex justify-content-start">
                                @if($job_single->is_featured == 1)
                                <div class="featured">
                                    Wyróżnione
                                </div>
                                @endif
                                <div class="type">
                                    {{ $job_single->rJobType->name }}
                                </div>
                                @if($job_single->is_urgent == 1)
                                <div class="urgent">
                                    Pilne
                                </div>
                                @endif
                            </div>

                            @if(!Auth::guard('company')->check())
                            <div class="apply">
                                @if(date('Y-m-d') <= $job_single->deadline)
                                <a href="{{ route('candidate_apply', $job_single->id) }}" class="btn btn-primary">Zapisz się</a>

                                <a href="{{ route('candidate_bookmark_add', $job_single->id) }}" class="btn btn-primary save-job">Zaznaczenie</a>
                                @endif
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="job-result pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Opis</h2>
                    <p> {!! $job_single->description !!}</p>
                </div>
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Zakres obowiązków</h2>
                    {!! $job_single->responsibility !!}
                </div>
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Umiejętności</h2>
                    {!! $job_single->skill !!}
                </div>
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Wymagane wykształcenie</h2>
                    {!! $job_single->education !!}
                </div>

                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Korzyści</h2>
                    {!! $job_single->benefit !!}
                </div>

                @if(date('Y-m-d') <= $job_single->deadline)
                <div class="left-item">
                    <div class="apply">
                        <a href="apply.html" class="btn btn-primary">Zapisz się</a>
                    </div>
                </div>
                @endif

                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Powiązane oferty</h2>
                    <div class="job related-job pt-0 pb-0">
                        <div class="container">
                            <div class="row">

                                @php $i = 0; @endphp
                                @foreach($jobs as $item)
                                @if ($item->id == $job_single->id)
                                    @continue
                                @endif
                                @php $i++; @endphp

                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="{{ asset('uploads/'.$item->rCompany->logo) }}" alt=""/>
                                        </div>
                                        <div class="text">
                                        <h3><a href="{{ route('job', $item->id) }}" >{{ $item->title }}, {{ $item->rCompany->company_name }}</a>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    {{ $item->rJobCategory->name }}
                                                </div>
                                                <div class="location">
                                                    {{ $item->rJobLocation->name }}
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </div>
                                                <div class="budget">
                                                    {{ $item->rJobSalary->name }}
                                                </div>
                                                @if(date('Y-m-d') > $item->deadline)
                                                <div class="expired">
                                                    Wygasło
                                                </div>
                                                @endif
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                @if($item->is_featured == 1)
                                                <div class="featured">
                                                    Wyróżnione
                                                </div>
                                                @endif
                                                <div class="type">
                                                    {{ $item->rJobType->name }}
                                                </div>
                                                @if($item->is_urgent == 1)
                                                <div class="urgent">
                                                    Pilne
                                                </div>
                                                @endif
                                            </div>
                                            @if(!Auth::guard('company')->check())
                                            <div class="bookmark">
                                                @if (Auth::guard('candidate')->check())
                                                @php
                                                $count = \App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->
                                                user()->id)->where('job_id', $item->id)->count();
                                                if($count > 0){
                                                    $bookmark_status = 'active';
                                                } else{
                                                    $bookmark_status = '';
                                                }
                                                @endphp
                                                @else
                                                @php $bookmark_status = ''; @endphp
                                                @endif
                                                <a href="{{ route('candidate_bookmark_add', $item->id) }}"><i class="fas fa-bookmark {{ $bookmark_status }}"></i></a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if ($i == 0)
                                    <div class="text-danger">Nie znaleziono podobnych ofert</div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i>Podsumowanie oferty</h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Opublikowano:</b></td>
                                    <td>{{ $job_single->created_at->format('d F, Y') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Zakończenie:</b></td>
                                    <td>
                                        @php
                                        $dt = DateTime::createFromFormat('Y-m-d', $job_single->deadline);
                                        @endphp  
                                        {{ $dt->format('d F, Y') }}                                                                                  
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Ilość stanowisk:</b></td><td>{{ $job_single->vacancy }}</td>
                                </tr>
                                <tr>
                                    <td><b>Kategoria:</b></td>
                                    <td>{{ $job_single->rJobCategory->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Lokalizacja:</b></td>
                                    <td>{{ $job_single->rJobLocation->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Rodzaj:</b></td>
                                    <td>{{ $job_single->rJobType->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Doświadczenie:</b></td>
                                    <td>{{ $job_single->rJobExperience->name }}</td>
                                </tr>
                                
                                <tr>
                                    <td><b>Płeć:</b></td>
                                    <td>{{ $job_single->rJobGender->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Uposażenie:</b></td>
                                    <td>{{ $job_single->rJobSalary->name }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i>Wyślij zapytanie</h2>
                    <div class="enquery-form">
                        <form action="{{ route('job_enquery_send_email') }}" method="post">
                            @csrf
                            <input type="hidden" name="receive_email" value="{{ $job_single->rCompany->email }}">
                            <input type="hidden" name="job_title" value="{{ $job_single->title }}">
                            <div class="mb-3">
                                <input type="text" name="visitor_name" class="form-control" placeholder="Imię"/>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="visitor_email" class="form-control" placeholder="Adres email"/>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="visitor_phone" class="form-control" placeholder="Numer telefonu"/>
                            </div>
                            <div class="mb-3">
                                <textarea name="visitor_message" class="form-control h-150" rows="3" placeholder="Wiadomość..."></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Wyślij</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if($job_single->map_code != null)Lokalizacja na mapie</h2>
                    <div class="location-map">
                        {!! $job_single->map_code !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection