@extends('layouts.backend')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary"data-toggle="modal" data-target="#formInput">Input</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Sub Kegiatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{($loop->iteration)}}</td>
                                <td>{{($d->name)}}</td>
                                <td>
                                    @if (($d->status)==1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                    @endif
                                </td>
                                <td>
                                    @foreach ($d->code as $code)
                                    {{($code->title)}}
                                    @endforeach
                                </td>
                                <td>
                                    <form action="event/activate/{{$d->id}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="status" @if ($d->status == 1)
                                            value=0
                                        @else
                                            value=1
                                        @endif>
                                    <button type="submit" class="btn btn-dark btn-block mb-1" >Aktivasi</button>
                                    </form>
                                    <a href="event/delete/{{$d->id}}" class="btn btn-danger btn-block mb-1">Hapus</a>
                                </td>
                            </tr>
                            @include('backend.master_data.event.__formInput')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- @include('backend.master_data.event.__modalMember') --}}
        @endsection

@section('js')

@endsection
