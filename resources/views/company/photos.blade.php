@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Zdjęcia</h2>
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
                <h4>Dodaj zdjęcie</h4>
                    <form action="{{ route('company_photos_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="file" name="photo" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm" value="Zatwierdź"/>
                            </div>
                        </div>
                    </form>

                <h4 class="mt-4">Obecne zdjęcia</h4>
                    <div class="photo-all">
                        @if ($photos->count() == 0)
                        <div class="row">
                            <div class="col-md-12 text-danger">
                                Brak zdjęć
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            @foreach ($photos as $item)
                            <div class="col-md-6 col-lg-3">
                                <div class="item mb-1">
                                    <a href="{{ asset('uploads/'.$item->photo) }}" class="magnific">
                                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="company photos"/>
                                        <div class="icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="bg"></div>
                                    </a>
                                </div>
                                <a href="{{ route('company_photos_delete', $item->id) }}" class="btn btn-danger btn-sm mb-4" onClick="return confirm('Jesteś pewny?')">Usuń</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection