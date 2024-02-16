@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Panel Instytucji</h2>
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
                <h3>Witaj, {{ Auth::guard('company')->user()->person_name }} ({{ Auth::guard('company')->user()->company_name }})</h3>
                <p>Zobacz swoje statystyki poniżej:</p>

                <div class="row box-items">
                    <div class="col-md-4">
                        <div class="box1">
                            <h4>{{ $total_opened_jobs }}</h4>
                            <p>Aktualne oferty</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box2">
                            <h4>{{ $total_featured_jobs }}</h4>
                            <p>Polecane oferty</p>
                        </div>
                    </div>
                </div>

                <h3 class="mt-5">Ostatnie oferty</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Nazwa</th>
                                <th>Kategoria</th>
                                <th>Lokalizacja</th>
                                <th>Wyróżniona?</th>
                                <th>Pilna?</th>
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
                                    @if ($item->is_urgent == 1)
                                    <span class="badge bg-danger">Pilne</span>
                                    @else
                                    <span class="badge bg-primary">Niepilne</span>
                                    @endif
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