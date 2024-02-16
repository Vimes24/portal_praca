@extends('admin.layout.app')

@section('heading', 'Kandydaci')

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
                                <th>Imię</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Login</th>
                                <th>Szczegóły</th>
                                <th>Akcja</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($candidates as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        <a href="{{ route('admin_candidates_detail', $item->id) }}" class="badge bg-primary text-white w-100 mb-1">Szczegóły</a>
                                        <a href="{{ route('admin_candidates_applied_jobs', $item->id) }}" class="badge bg-primary text-white w-100 mb-1">Zgłoszone oferty</a>
                                    </td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_candidates_delete',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Jesteś pewien?')">Usuń</a>
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