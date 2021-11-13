@extends('layouts.backend')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button data-toggle="modal" data-target="#formInput"></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kegiatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{($loop->iteration)}}</td>
                                <td>{{($d->name)}}</td>
                                <td>{{$d->email}}</td>
                                <td>
                                    @foreach ($d->event as $a)
                                        {{$a->name}},
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#formInput">Add</button>
                                </td>
                            </tr>
                            @include('backend.master_data.member.__formInput')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
