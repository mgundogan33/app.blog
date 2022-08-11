@extends('layouts.dashboard');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-border-color card-border-color-primary">
            <div class="card-header card-header-divider">Hesap</div>
            <div class="card-body">

                <form action="{{route('dashboard.admin.admin.account.update')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">
                            İsim</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">
                            Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="email" name="email" value="{{$user->email}}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">
                            Telefon</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">
                            Eski Şifre</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="password" name="old_password" value="" autocomplete="off">
                            @error('old_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">
                            Yeni Şifre</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input class="form-control" type="password" name="new_password" value="">
                            @error('new_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row text-center justify-content-center">
                        <button class="btn btn-primary " type="submit">Kaydet</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection