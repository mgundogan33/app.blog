@extends('layouts.dashboard')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider">Kayıtlı Email</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</td>
                                <th>Kayıt</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($emails as $email)
                                <tr>
                                    <td>{{ $email->email }}</td>
                                    <td>{{ $email->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <p>Email Bulunamadı</p>
                            @endforelse
                        </tbody>

                    </table>
                    {{ $emails->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
@endsection
