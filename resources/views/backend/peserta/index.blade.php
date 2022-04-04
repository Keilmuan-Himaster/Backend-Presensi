@extends('layouts.backend')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#formInput">Input</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama</th>
                            <th>Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                                @foreach ($data->data as $user)
                                <tr>
                                    <td>{{($loop->iteration)}}</td>
                                    <td>{{($user->user)}}</td>
                                    <td>{{$user->created_at}}</td>
                                </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
