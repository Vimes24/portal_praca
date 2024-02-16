@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Wykształcenie</h2>
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
                <a href="{{ route('candidate_education_create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Dodaj</a>
                @if (!$educations->count())
                    <div>Brak danych.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Lp.</th>
                                    <th>Wykształcenie</th>
                                    <th>Szkoła/Uczelnia</th>
                                    <th>Stopień</th>
                                    <th>Rok ukończenia</th>
                                    <th class="w-100">Akcja</th>
                                </tr>

                                @foreach($educations as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->institute }}</td>
                                    <td>{{ $item->degree }}</td>
                                    <td>{{ $item->passing_year }}</td>
                                    <td> 
                                        <a href="{{ route('candidate_education_edit', $item->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i>Zmień</a>
                                        <a href="{{ route('candidate_education_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Jesteś pewien?');"><i class="fas fa-trash-alt"></i>Usuń</a>
                                    </td>
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