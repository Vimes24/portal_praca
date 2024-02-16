@extends('admin.layout.app')

@section('heading', 'Oferty Instytucji: '.$companies_detail->company_name)

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
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>Lp.</th>
                                <th>Nazwa</th>
                                <th>Kategoria</th>
                                <th>Lokalizacja</th>
                                <th>Czy wyróżniona?</th>
                                <th>Szczegóły oferty</th>
                                <th>Aplikujący</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($companies_jobs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->rJobCategory->name }}</td>
                                    <td>{{ $item->rJobLocation->name }}</td>
                                    <td>
                                        @if($item->is_featured == 1)
                                        <span class="badge bg-success">Wyróżniona</span>
                                        @else
                                        <span class="badge bg-danger">Nie wyróżniona</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('job',$item->id) }}" class="badge bg-primary text-white">Szczegóły</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin_companies_applicants',$item->id) }}" class="badge bg-primary text-white">Aplikujący</a>
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
</div>
@endsection