@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:40%;">İsim</th>
                                        <th style="width:20%;">Durum</th>
                                        <th style="width:20%;">Tarih</th>
                                        <th class="actions">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $cat)
                                        <tr>
                                            <td>{{ $cat->cat_name }}</td>
                                            <td>
                                                @if ($cat->status == 1)
                                                    <a href="{{ route('dashboard.admin.categories.status.update',$cat->id) }}" class="btn btn-space btn-success active"><i
                                                            class="icon icon-left mdi mdi-check"></i>Aktif</a>
                                                @else
                                                    <a href="{{ route('dashboard.admin.categories.status.update',$cat->id) }}" class="btn btn-space btn-danger active"><i
                                                            class="icon icon-left mdi mdi-alert-circle"></i>Pasif</a>
                                                @endif
                                            </td>
                                            <td>{{ $cat->created_at->diffForHumans() }}</td>
                                            <td class="actions">
                                                <a class="icon"
                                                    href="{{ route('dashboard.admin.categories.edit', $cat->id) }}"><i
                                                        class="text-primary mdi mdi-edit"></i></a>
                                                <a class="icon"
                                                    href="{{ route('dashboard.admin.categories.delete', $cat->id) }}"><i
                                                        class="text-danger mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>Kategori Bulunamadı</p>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
