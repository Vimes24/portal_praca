@extends('front.layout.app')

@section('main_title'){{ $other_page_item->job_listing_page_title }}@endsection
@section('main_description'){{ $other_page_item->job_listing_page_description}} @endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_job_listing) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>{{ $other_page_item->job_listing_page_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="job-result">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="job-filter">
                    
                    <form action="{{ url('job-listing') }}" method="get">

                    <div class="widget">
                        <h2>Nazwa oferty</h2>
                        <input type="text" name="title" class="form-control" placeholder="Wyszukaj nazwę ..." value="{{ $form_title }}"/>
                    </div>
                    <div class="widget">
                        <h2>Kategoria</h2>
                        <select name="category" class="form-control select2">
                            <option value="">Kategoria</option>
                            @foreach ($job_categories as $item)
                                <option value="{{ $item->id }}" @if($form_category == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Lokalizacja</h2>
                        <select name="location" class="form-control select2">
                            <option value="">Lokalizacja</option>
                            @foreach ($job_locations as $item)
                                <option value="{{ $item->id }}" @if($form_location == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Rodzaj</h2>
                        <select name="type" class="form-control select2">
                            <option value="">Rodzaj</option>
                            @foreach ($job_types as $item)
                                <option value="{{ $item->id }}" @if($form_type == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Doświadczenie</h2>
                        <select name="experience" class="form-control select2">
                            <option value="">Doświadczenie</option>
                            @foreach ($job_experiences as $item)
                                <option value="{{ $item->id }}" @if($form_experience == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Płeć</h2>
                        <select name="gender" class="form-control select2">
                            <option value="">Płeć</option>
                            @foreach ($job_genders as $item)
                                <option value="{{ $item->id }}" @if($form_gender == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="widget">
                        <h2>Uposażenie</h2>
                        <select name="salary_range" class="form-control select2">
                            <option value="">Uposażenie</option>
                            @foreach ($job_salary_ranges as $item)
                                <option value="{{ $item->id }}" @if($form_salary_range == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-button">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filtruj
                        </button>
                    </div>
                    </form>
                </div>
            </div>

            <div class="col-md-9">
                <div class="job">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-result-header">
                                    <i class="fas fa-search"></i> Wyniki wyszukiwania
                                </div>
                            </div>

                            @if(!$jobs->count())
                                <div class="text-danger">Nie znaleziono wyników.</div>
                            @else
                            @foreach ($jobs as $item)
                            {{-- Sprawdzanie czy upłynął okres ważności pakietu, w takim przypadku oferty instytucji nie pojawią się na stronie --}}
                            @php
                            $this_company_id = $item->rCompany->id;
                            $order_data = \App\Models\Order::where('company_id', $this_company_id)->where('currently_active', 1)->first();
                            if(date('Y-m-d') > $order_data->expire_date){
                                continue;
                            }
                            @endphp
                            <div class="col-md-12">
                                <div class="item d-flex justify-content-start">
                                    <div class="logo">
                                        <img src="{{ asset('uploads/'.$item->rCompany->logo) }}" alt=""/>
                                    </div>
                                    <div class="text">
                                        <h3><a href="{{ route('job', $item->id) }}" >{{ $item->title }}, {{ $item->rCompany->company_name }}</a>
                                        </h3>
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
                            <div class="col-md-12">
                                {{ $jobs->appends($_GET)->links() }}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection