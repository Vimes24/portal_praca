@extends('front.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Dane kandydata: "{{ $candidate_single->name }}"</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('company.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <h4 class="resume">Dane podstawowe</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th class="w-200">Zdjęcie:</th>
                            <td>
                                @if ($candidate_single->photo == '')
                                <img src="{{ assets('uploads/default_candidate_photo.png') }}" alt="" class="w-100"/>   
                                @else
                                <img src="{{ assets('uploads/'.$candidate_single->photo) }}" alt="" class="w-100"/>                                    
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Imię:</th>
                            <td>{{ $candidate_single->name }}</td>
                        </tr>

                        @if($candidate_single->designation != null)
                        <tr>
                            <th>Stanowisko:</th>
                            <td>{{ $candidate_single->designation }}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>Email:</th>
                            <td>{{ $candidate_single->email }}</td>
                        </tr>

                        @if($candidate_single->phone != null)
                        <tr>
                            <th>Telefon:</th>
                            <td>{{ $candidate_single->phone }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->region != null)
                        <tr>
                            <th>Województwo:</th>
                            <td>{{ $candidate_single->region }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->address != null)
                        <tr>
                            <th>Adres:</th>
                            <td>{{ $candidate_single->address }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->state != null)
                        <tr>
                            <th>Powiat:</th>
                            <td>{{ $candidate_single->state }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->city != null)
                        <tr>
                            <th>Miasto:</th>
                            <td>{{ $candidate_single->city }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->zip_code != null)
                        <tr>
                            <th>Kod pocztowy:</th>
                            <td>{{ $candidate_single->zip_code }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->gender != null)
                        <tr>
                            <th>Płeć:</th>
                            <td>{{ $candidate_single->gender }}</td>
                        </tr>
                        @endif
                        
                        @if($candidate_single->marital_status != null)
                        <tr>
                            <th>Stan cywilny:</th>
                            <td>{{ $candidate_single->marital_status }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->date_of_birth != null)
                        <tr>
                            <th>Data urodzenia:</th>
                            <td>{{ $candidate_single->date_of_birth }}</td>
                        </tr>
                        @endif

                        @if($candidate_single->website != null)
                        <tr>
                            <th>Strona internetowa:</th>
                            <td><a href="{{ $candidate_single->website }}" target="_blank">{{ $candidate_single->website }}</a></td>
                        </tr>
                        @endif

                        @if($candidate_single->biography != null)               
                        <tr>
                            <th>Życiorys:</th>
                            <td>{!! $candidate_single->biography !!}</td>
                        </tr>
                        @endif

                    </table>
                </div>

                @if($candidate_educations->count())
                <h4 class="resume mt-5">Wykształcenie</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Poziom wykształcenia</th>
                                <th>Instytucja</th>
                                <th>Stopień</th>
                                <th>Data ukończenia</th>
                            </tr>
                            @foreach($candidate_educations as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ $item->institute }}</td>
                                <td>{{ $item->degree }}</td>
                                <td>{{ $item->passing_year }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                @if($candidate_skills->count())
                <h4 class="resume mt-5">Umiejętności</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Nazwa</th>
                                <th>Poziom umiejętności</th>
                            </tr>
                            @foreach($candidate_skills as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->percentage }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                @if($candidate_experiences->count())
                <h4 class="resume mt-5">Doświadczenie</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Instytucja</th>
                                <th>Stanowisko</th>
                                <th>Data rozpoczęcia</th>
                                <th>Data zakończenia</th>
                            </tr>
                            @foreach($candidate_experiences as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->company }}</td>
                                <td>{{ $item->designation }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                @if($candidate_awards->count())
                <h4 class="resume mt-5">Wyróżnienia</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Nazwa</th>
                                <th>Opis</th>
                                <th class="w-100">Data</th>
                            </tr>
                            @foreach($candidate_awards as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                @if($candidate_resumes->count())
                <h4 class="resume mt-5">Załączniki</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Nazwa</th>
                                <th>Plik</th>
                            </tr>
                            @foreach($candidate_resumes as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td><a href="{{ asset('uploads/'.$item->file) }}" target="_blank">{{ $item->file }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection