@extends('front.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Dane kandydatów: {{ $job_single->title }}</h2>
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
                <h4>Kandydaci na stanowisko</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Lp.</th>
                                <th>Imię</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Aktualny status</th>
                                <th>Działanie</th>
                                <th>Szczegóły</th>
                                <th>CV</th>
                            </tr>

                            @php $i = 0; @endphp
                            @foreach ($applicants as $item)
                            @php $i++; @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->rCandidate->name }}</td>
                                <td>{{ $item->rCandidate->email }}</td>
                                <td>{{ $item->rCandidate->phone }}</td>
                                <td>
                                    @if ($item->status == 'Zgłoszono')
                                        @php $color = "primary"; @endphp
                                    @elseif($item->status == 'Zatwierdzono')
                                        @php $color = "success"; @endphp
                                    @elseif($item->status == 'Odrzucono')
                                        @php $color = "danger"; @endphp
                                    @endif
                                    <span class="badge bg-{{ $color }}">{{ $item->status }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('company_application_status_change') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job_single->id }}">
                                    <input type="hidden" name="candidate_id" value="{{ $item->candidate_id }}">
                                    <select name="status" class="form-control select2 w_100" onchange="this.form.submit()">
                                        <option value="">Zaznacz</option>
                                        <option value="Zgłoszono">Zgłoszone</option>
                                        <option value="Zatwierdzono">Zatwierdzone</option>
                                        <option value="Odrzucono">Odrzucone</option>
                                    </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('company_applicant_detail', $item->candidate_id) }}" class="badge bg-primary" target="_blank">Szczegóły</a>
                                </td>
                                <td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $i }}">CV</a>
                                        
                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">CV</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! nl2br($item->cover_letter) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

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