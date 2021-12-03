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
                            <th>Email</th>
                            <th>Kegiatan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{($loop->iteration)}}</td>
                                <td>{{($data->name)}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    @foreach ($data->event as $a)
                                    {{$a->name}},
                                    @endforeach
                                </td>
                                <td>
                                    <form method="POST" action="{{route('member.input.event')}}">
                                        @csrf
                                        <div class="form-group">
                                          <label for="event_id">Divisi</label>
                                          <select class="form-control" id="event_id" name="event_id">
                                            <option hidden>Select Divisi</option>
                                            @foreach ($event as $e)
                                                <option value="{{$e->id}}">{{$e->name}}</option>
                                            @endforeach
                                            <input type="text" name="user_id" value="{{$data->id}}" hidden>
                                            <input type="text" name="name" value="{{$data->name}}" hidden>
                                          </select>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
