@extends('front.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Zgłoszenia kandydatów</h2>
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
                <h4>Wszystkie oferty pracy</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Nazwa</th>
                                <th>Kategoria</th>
                                <th>Lokalizacja</th>
                                <th>Wyróżniona?</th>
                                <th>Szczegóły</th>
                                <th>Dane kandydata</th>
                            </tr>

                            @foreach ($jobs as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->rJobCategory->name }}</td>
                                <td>{{ $item->rJobLocation->name }}</td>
                                <td>
                                    @if ($item->is_featured == 1)
                                    <span class="badge bg-success">Wyróżnione</span>
                                    @else
                                    <span class="badge bg-success">Niewyróżnione</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('job', $item->id) }}" class="badge bg-primary">Szczegóły</a>
                                </td>
                                <td>
                                    <a href="{{ route('company_applicants', $item->id) }}" class="badge bg-primary">Dane kandydata</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection