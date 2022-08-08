@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card card-table">
                        <div class="card-body">
                            <table class="table" id="post-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Yazı Başlığı</th>
                                        <th>Kategori</th>
                                        <th>Yazı Hakkında</th>
                                        <th>Durum</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function() {

            var table = $('#post-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.admin.posts.all') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    }, 
                    {
                        data: 'post_title',
                        name: 'post_title'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'post_summary',
                        name: 'post_summary'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endsection
