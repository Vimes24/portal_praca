@extends('admin.layout.app')

@section('heading', 'Dane Szczegółowe Instytucji')

@section('button')
<div>
    <a href="{{ route('admin_companies') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Powrót</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="w_200">Logo</th>
                                <td>
                                    <img src="{{ asset('uploads/'.$companies_detail->logo) }}" alt="" class="w_100">
                                </td>
                            </tr>
                            <tr>
                                <th class="w_200">Nazwa Instytucji</th>
                                <td>{{ $companies_detail->company_name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Dane osobowe</th>
                                <td>{{ $companies_detail->person_name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Login</th>
                                <td>{{ $companies_detail->username }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Email</th>
                                <td>{{ $companies_detail->email }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Telefon</th>
                                <td>{{ $companies_detail->phone }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Adres</th>
                                <td>{{ $companies_detail->address }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Charakter</th>
                                <td>{{ $companies_detail->rCompanyIndustry->name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Lokalizacja</th>
                                <td>{{ $companies_detail->rCompanyLocation->name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Rozmiar</th>
                                <td>{{ $companies_detail->rCompanySize->name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Data założenia</th>
                                <td>{{ $companies_detail->founded_on }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Strona internetowa</th>
                                <td>{{ $companies_detail->website }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Opis</th>
                                <td>{!! $companies_detail->description !!}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Godziny pracy</th>
                                <td>
                                    Poniedziałek: {{ $companies_detail->oh_mon }}<br>
                                    Wtorek: {{ $companies_detail->oh_tue }}<br>
                                    Środa: {{ $companies_detail->oh_wed }}<br>
                                    Czwartek: {{ $companies_detail->oh_thu }}<br>
                                    Piątek: {{ $companies_detail->oh_fri }}<br>
                                    Sobota: {{ $companies_detail->oh_sat }}<br>
                                    Niedziela: {{ $companies_detail->oh_sun }}
                                </td>
                            </tr>
                            <tr>
                                <th class="w_200">Facebook</th>
                                <td>{{ $companies_detail->facebook }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Twitter</th>
                                <td>{{ $companies_detail->twitter }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Linkedin</th>
                                <td>{{ $companies_detail->linkedin }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Instagram</th>
                                <td>{{ $companies_detail->instagram }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Mapy Google</th>
                                <td>{!! $companies_detail->map_code !!}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Zdjęcia</th>
                                <td>
                                    @foreach($photos as $item)
                                    <img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_300">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="w_200">Filmy</th>
                                <td>
                                    @foreach($videos as $item)
                                    <iframe class="w_300 h_200" width="560" height="315" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection