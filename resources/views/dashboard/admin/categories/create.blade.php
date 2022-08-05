@extends('layouts.dashboard')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary">

                <div class="card-header card-header-divider">Kategori Formu Oluştur</div>
                                
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.admin.categories.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Kategori
                                Adı</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input class="form-control" type="text" name="cat_name">
                                @error('cat_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <input class="form-control" name="user_id" type="number" value="{{ auth()->id() }}" hidden>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                for="inputTextarea3">Açıklama</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="cat_desc" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
