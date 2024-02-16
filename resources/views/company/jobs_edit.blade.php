@extends('front.layout.app')



@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->baner_company_panel) }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2>Edytuj ofertę</h2>
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
                <form action="{{ route('company_jobs_update', $job_single->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Tytuł *</label>
                            <input type="text" class="form-control" name="title" value="{{ $job_single->title }}"/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Opis</label>
                        <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $job_single->description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Zakres obowiązków</label>
                            <textarea name="responsibility" class="form-control editor" cols="30" rows="10">{{ $job_single->responsibility }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Umiejętności</label>
                            <textarea name="skill" class="form-control editor" cols="30" rows="10">{{ $job_single->skill }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Wykształcenie</label>
                            <textarea name="education" class="form-control editor" cols="30" rows="10">{{ $job_single->education }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Korzyści</label>
                            <textarea name="benefit" class="form-control editor" cols="30" rows="10">{{ $job_single->benefit }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Czas trwania ogłoszenia *</label>
                            <input type="text" name="deadline" class="form-control datepicker" value="{{ $job_single->deadline }}"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Ilość stanowisk *</label>
                            <input type="number" class="form-control" name="vacancy" min="1" max="500" value="{{ $job_single->vacancy }}"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Kategoria *</label>
                            <select name="job_category_id" class="form-control select2">
                                @foreach ($job_categories as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $job_single->job_category_id) selected @endif>{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Lokalizacja *</label>
                            <select name="job_location_id" class="form-control select2">
                                @foreach ($job_locations as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $job_single->job_location_id) selected @endif>{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Stanowisko *</label>
                            <select name="job_type_id" class="form-control select2">
                                @foreach ($job_types as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $job_single->job_type_id) selected @endif>{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Doświadczenie *</label>
                            <select name="job_experience_id" class="form-control select2">
                                @foreach ($job_experiences as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $job_single->job_experience_id) selected @endif>{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Płeć *</label>
                            <select name="job_gender_id" class="form-control select2">
                                @foreach ($job_genders as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $job_single->job_gender_id) selected @endif>{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Uposażenie *</label>
                            <select name="job_salary_range_id" class="form-control select2">
                                @foreach ($job_salaries as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $job_single->job_salary_range_id) selected @endif>{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Lokalizacja (kod mapy)</label>
                            <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ $job_single->map_code }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Czy wyróżniona?</label>
                            <select name="is_featured" class="form-control select2" cols="30" rows="10">
                                <option value="0" @if ($job_single->is_featured == 0) selected @endif>Nie</option>
                                <option value="1" @if ($job_single->is_featured == 1) selected @endif>Tak</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Czy pilna?</label>
                            <select name="is_urgent" class="form-control select2" cols="30" rows="10">
                                <option value="0" @if ($job_single->is_urgent == 0) selected @endif>Nie</option>
                                <option value="1" @if ($job_single->is_urgent == 1) selected @endif>Tak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="submit" class="btn btn-primary" value="Zaktualizuj"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection