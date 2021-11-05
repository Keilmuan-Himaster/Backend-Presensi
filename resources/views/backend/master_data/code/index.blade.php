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
                            <th>Name</th>
                            <th>Kode</th>
                            <th>Status</th>
                            <th>start</th>
                            <th>end</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{($loop->iteration)}}</td>
                                <td>{{($data->title)}}</td>
                                <td>{{($data->code)}}</td>
                                <td>
                                    @if (($data->status)==1)
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif
                                </td>
                                <td>{{($data->start)}}</td>
                                <td>{{($data->end)}}</td>
                                <td>{{($data->event->name)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('backend.master_data.code.__formInput')
@endsection
