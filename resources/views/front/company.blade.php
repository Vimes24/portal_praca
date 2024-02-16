@extends('front.layout.app')

@section('main_title'){{ $other_page_item->company_listing_page_title }}@endsection
@section('main_description'){{ $other_page_item->company_listing_page_description}} @endsection

@section('main_content')
<div class="page-top page-top-job-single page-top-company-single" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_detail) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 job job-single">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset('uploads/'.$company_single->logo) }}" alt="" />
                    </div>
                    <div class="text">
                        <h3>{{ $company_single->company_name }}</h3>
                        <div class="detail-1 d-flex justify-content-start">
                            <div class="category">{{ $company_single->rCompanyIndustry->name }}</div>
                            <div class="location">{{ $company_single->rCompanyLocation->name }}</div>
                            <div class="email">{{ $company_single->email }}</div>
                            @if($company_single->phone != null)
                            <div class="phone">
                                {{ $company_single->phone }}
                            </div>
                            @endif
                        </div>
                        <div class="special">
                            <div class="type">{{ $company_single->r_job_count }} podobnych ofert</div>
                                
                                @if($company_single->facebook != null||$company_single->twitter != null||$company_single->linkedin != null||$company_single->instagram != null)
                                <div class="social">
                                    <ul>
                                        @if($company_single->facebook != null)
                                        <li>
                                            <a href="{{ $company_single->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif

                                        @if($company_single->twitter != null)
                                        <li>
                                            <a href="{{ $company_single->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif

                                        @if($company_single->linkedin != null)
                                        <li>
                                            <a href="{{ $company_single->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        @endif

                                        @if($company_single->instagram != null)
                                        <li>
                                            <a href="{{ $company_single->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                @endif

                            </div>
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
                    <h2><i class="fas fa-file-invoice"></i>
                        O instytucji
                    </h2>
                    {!! $company_single->description !!}
                </div>

                @if($company_single->oh_mon != null||$company_single->oh_tue != null||$company_single->oh_wed != null
                ||$company_single->oh_thu != null||$company_single->oh_fri != null||$company_single->oh_sat != null||$company_single->oh_sun != null)
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>
                        Godziny pracy
                    </h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Poniedziałek</td>
                                    <td>{{ $company_single->oh_mon }}</td>
                                </tr>
                                <tr>
                                    <td>Wtorek</td>
                                    <td>{{ $company_single->oh_tue }}</td>
                                </tr>
                                <tr>
                                    <td>Środa</td>
                                    <td>{{ $company_single->oh_wed }}</td>
                                </tr>
                                <tr>
                                    <td>Czwartek</td>
                                    <td>{{ $company_single->oh_thu }}</td>
                                </tr>
                                <tr>
                                    <td>Piątek</td>
                                    <td>{{ $company_single->oh_fri }}</td>
                                </tr>
                                <tr>
                                    <td>Sobota</td>
                                    <td>{{ $company_single->oh_sat }}</td>
                                </tr>
                                <tr>
                                    <td>Niedziela</td>
                                    <td>{{ $company_single->oh_sun }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                @if($company_photos != "")
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Zdjęcia</h2>
                    <div class="photo-all">
                        <div class="row">
                            @foreach($company_photos as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a href="{{ asset('uploads/'.$item->photo) }}" class="magnific">
                                        <img src="{{ asset('uploads/'.$item->photo) }}" alt=""/>
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if($company_videos != "")
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Filmy</h2>
                    <div class="video-all">
                        <div class="row">
                            @foreach($company_videos as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="item">
                                    <a class="video-button" href="http://www.youtube.com/watch?v={{ $item->video_id }}">
                                        <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg" alt=""/>
                                        <div class="icon">
                                            <i class="far fa-play-circle"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>Wszystkie oferty</h2>
                    <div class="job related-job pt-0 pb-0">
                        <div class="container">
                            <div class="row">

                                @foreach($jobs as $item)
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="{{ asset('uploads/'.$company_single->logo) }}" alt=""/>
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('job', $item->id) }}">{{ $item->title }}, {{ $company_single->company_name }}</a></h3>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i>Dane instytucji</h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><b> Osoba do kontaktu:</b></td>
                                    <td>{{ $company_single->person_name }}</td>
                                </tr>
                                <tr>
                                    <td><b> Charakter:</b></td>
                                    <td>{{ $company_single->rCompanyIndustry->name }}</td>
                                </tr>
                                <tr>
                                    <td><b> Lokalizacja:</b></td>
                                    <td>{{ $company_single->rCompanyLocation->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Wielkość instytucji:</b></td>
                                    <td>{{ $company_single->rCompanySize->name }}</td>
                                </tr>
                                @if($company_single->address != null)
                                <tr>
                                    <td><b>Adres:</b></td>
                                    <td>{{ $company_single->address }}</td>    
                                </tr>
                                @endif
                                <tr>
                                    <td><b>Data założenia:</b></td>
                                    <td>{{ $company_single->founded_on }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email:</b></td>
                                    <td>{{ $company_single->email }}</td>
                                </tr>
                                @if($company_single->phone != null)
                                <tr>
                                    <td><b>Telefon:</b></td>
                                    <td>{{ $company_single->phone }}</td>
                                </tr>
                                @endif
                                @if($company_single->region != null)
                                <tr>
                                    <td><b>Województwo:</b></td>
                                    <td>{{ $company_single->region }}</td>
                                </tr>
                                @endif
                                @if($company_single->website != null)
                                <tr>
                                    <td><b>Strona internetowa:</b></td>
                                    <td><a href="{{ $company_single->website }}" target="_blank">{{ $company_single->website }}</a></td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                @if($company_single->map_code != null)
                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i>Lokalizacja na mapie</h2>
                    <div class="location-map">
                        {!! $company_single->map_code !!}
                    </div>
                </div>
                @endif

                <div class="right-item">
                    <h2><i class="fas fa-file-invoice"></i>Skontaktuj się</h2>
                    <div class="enquery-form">
                        <form action="{{ route('company_enquery_send_email') }}" method="post">
                            @csrf
                            <input type="hidden" name="receive_email" value="{{ $company_single->email }}">
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
            </div>
        </div>
    </div>
</div>

@endsection