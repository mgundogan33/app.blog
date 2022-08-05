@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider">Düzenle</div>                                
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.admin.categories.update',$category->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Kategori
                                Adı</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input class="form-control" type="text" name="cat_name" value="{{ $category->cat_name }}">
                                @error('cat_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                for="inputTextarea3">Açıklama</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="cat_desc" class="form-control">{{ $category->cat_desc }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary" type="submit">Düzenle</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
