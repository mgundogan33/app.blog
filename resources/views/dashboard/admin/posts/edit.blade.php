@extends('layouts.dashboard')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary">

                <div class="card-header card-header-divider">Yazı Düzenle</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.admin.posts.update',$post->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Yazı
                                Başlığı</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input class="form-control" type="text" name="post_title" value="{{ $post->post_title }}">
                                @error('post_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Yazıya Ait
                                Resim</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input class="form-control" type="file" name="post_image">
                                @error('post_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Afiş - Pankart
                                </label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input class="form-control" type="file" name="post_banner">
                                @error('post_banner')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Yazı Kategorisi</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="category_id" class="form-control" id="">
                                    <option value="{{$post->category->id}}" selected>{{$post->category->cat_name}}</option>                                    
                                    @forelse ($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                                @error('post_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputTextarea3">Yazı
                                Özeti</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="post_summary" class="form-control">{{ $post->post_summary }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputTextarea3">Yazı
                                İçeriği</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea id="editor" name="post_content" class="form-control">{{ $post->post_content }}</textarea>
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
