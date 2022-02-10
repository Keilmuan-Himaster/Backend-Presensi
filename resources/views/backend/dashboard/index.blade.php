@extends('layouts.backend')

@section('content')
<!-- Content Row -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Divisi Himaster</h1>
</div>
<div class="row">


    @foreach ($structure as $data)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{$data->name}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->event()->count()}} Kegiatan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kegiatan</h1>
</div>
<div class="row">

    @foreach ($event as $data)
        <div class="col-xl-3 col-md-6 mb-4">
            @if ($data->status == 1)
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{$data->name}}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->code()->count()}} Pertemuan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card border-left-warning shadow h-100 py-2 bg-danger">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                    {{$data->name}}</div>
                                <div class="h5 mb-0 font-weight-bold text-light">{{$data->code()->count()}} Pertemuan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    @endforeach

</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jumlah Peserta</h1>
</div>
<div class="row">

    @foreach ($code as $data)
        <div class="col-xl-3 col-md-6 mb-4">
            @if ($data->status == 1)
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{$data->title}}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->data()->count()}} Pertemuan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card border-left-warning shadow h-100 py-2 bg-danger">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                    {{$data->title}}</div>
                                <div class="h5 mb-0 font-weight-bold text-light">{{$data->data()->count()}} Peserta</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    @endforeach

</div>
@endsection
