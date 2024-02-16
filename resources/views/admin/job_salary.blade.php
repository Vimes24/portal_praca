@extends('admin.layout.app')

@section('heading', 'Rodzaje wypłaty')

@section('button')

<div>
    <a href="{{ route('admin_job_salary_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Dodaj nowy</a>
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
                                <th>Akcja</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_salaries as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_job_salary_edit', $item->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
                                            <a href="{{ route('admin_job_salary_delete', $item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Jesteś pewny?')">Usuń</a>
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