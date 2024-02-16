@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Utwórz ofertę</h2>
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
                <form action="{{ route('company_jobs_create_submit') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Tytuł *</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Opis</label>
                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Zakres obowiązków</label>
                            <textarea name="responsibility" class="form-control editor" cols="30" rows="10">{{ old('responsibility') }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Umiejętności</label>
                            <textarea name="skill" class="form-control editor" cols="30" rows="10">{{ old('skill') }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Wykształcenie</label>
                            <textarea name="education" class="form-control editor" cols="30" rows="10">{{ old('education') }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Korzyści</label>
                            <textarea name="benefit" class="form-control editor" cols="30" rows="10">{{ old('benefit') }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Czas trwania ogłoszenia *</label>
                            <input type="text" name="deadline" class="form-control datepicker" value="{{ old('deadline') ? old('deadline') : date('Y-m-d') }}"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Ilość stanowisk *</label>
                            <input type="number" class="form-control" name="vacancy" min="1" max="500" value="{{ old('vacancy') }} ? old('vacancy') : '1' }}"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Kategoria *</label>
                            <select name="job_category_id" class="form-control select2">
                                @foreach ($job_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Lokalizacja *</label>
                            <select name="job_location_id" class="form-control select2">
                                @foreach ($job_locations as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Stanowisko *</label>
                            <select name="job_type_id" class="form-control select2">
                                @foreach ($job_types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Doświadczenie *</label>
                            <select name="job_experience_id" class="form-control select2">
                                @foreach ($job_experiences as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Płeć *</label>
                            <select name="job_gender_id" class="form-control select2">
                                @foreach ($job_genders as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Uposażenie *</label>
                            <select name="job_salary_range_id" class="form-control select2">
                                @foreach ($job_salaries as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Lokalizacja (kod mapy)</label>
                            <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ old('map_code') }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Czy wyróżniona?</label>
                            <select name="is_featured" class="form-control select2" cols="30" rows="10">
                                <option value="0">Nie</option>
                                <option value="1">Tak</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Czy pilna?</label>
                            <select name="is_urgent" class="form-control select2" cols="30" rows="10">
                                <option value="0">Nie</option>
                                <option value="1">Tak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-primary" value="Zatwierdź"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection