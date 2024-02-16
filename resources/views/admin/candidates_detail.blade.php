@extends('admin.layout.app')

@section('heading', 'Szczegóły kandydata')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h5>Podstawowe informacje</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="w_200">Zdjęcie</th>
                                <td>
                                    <img src="{{ asset('uploads/'.$candidate_single->photo) }}" alt="" class="w_100">
                                </td>
                            </tr>
                            <tr>
                                <th class="w_200">Imię</th>
                                <td>{{ $candidate_single->name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Stanowisko</th>
                                <td>{{ $candidate_single->designation }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Login</th>
                                <td>{{ $candidate_single->username }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Email</th>
                                <td>{{ $candidate_single->email }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Telefon</th>
                                <td>{{ $candidate_single->phone }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Województwo</th>
                                <td>{{ $candidate_single->country }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Adres</th>
                                <td>{{ $candidate_single->address }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Powiat</th>
                                <td>{{ $candidate_single->state }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Miasto</th>
                                <td>{{ $candidate_single->city }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Kod pocztowy</th>
                                <td>{{ $candidate_single->zip_code }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Płeć</th>
                                <td>{{ $candidate_single->gender }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Stan cywilny</th>
                                <td>{{ $candidate_single->marital_status }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Data urodzenia</th>
                                <td>{{ $candidate_single->date_of_birth }}</td>
                            </tr>
                        </table>
                    </div>


                    @if($candidate_educations->count())
                    <h5>Wykształcenie</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>Lp.</th>
                                    <th>Poziom wykształcenia</th>
                                    <th>Uczelnia</th>
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
                    <h5>Umiejętności</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>Lp.</th>
                                    <th>Nazwa</th>
                                    <th>Poziom umiejętności </th>
                                </tr>
                                @foreach($candidate_skills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->percentage }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($candidate_experiences->count())
                    <h5>Doświadczenie</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
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
                    <h5>Wyróżnienia</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>Lp.</th>
                                    <th>Tytuł</th>
                                    <th>Opis</th>
                                    <th class="w_100">Data</th>
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
                    <h5>Załączniki</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
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
</div>
@endsection