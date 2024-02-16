@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_candidate_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Umiejętności</h2>
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
                <a href="{{ route('candidate_skills_create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Dodaj</a>
                @if (!$skills->count())
                    <div>Brak danych.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Lp.</th>
                                    <th>Umiejetność</th>
                                    <th>Poziom umiejętności</th>
                                    <th class="w-100">Akcja</th>
                                </tr>

                                @foreach($skills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->percentage }}</td>
                                    <td> 
                                        <a href="{{ route('candidate_skills_edit', $item->id) }}" class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i>Zmień</a>
                                        <a href="{{ route('candidate_skills_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Jesteś pewien?');"><i class="fas fa-trash-alt"></i>Usuń</a>
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