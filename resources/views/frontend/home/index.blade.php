@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="page-banner home-banner">
      <div class="row align-items-center flex-wrap-reverse h-100">
        <div class="col-md-6 py-5 wow fadeInLeft">
        @if (Auth::check())
            <h1 class="mb-4">Selamat {{$currentTime}}</h1>
            <h1 class="mb-4">{{$user->name}}</h1>
            @foreach ($check_code as $code)
                @foreach ($code->code as $code)
                        @if ($code->status == 0)
                            @continue
                        @else
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{$code->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body mx-auto">
                                    {!! QrCode::size(250)->generate($code->code); !!}
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                                <h5 class="my-1">Ada absen {{$code->title}}</h5>
                                <a type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    Show QR Code
                                </a>
                                <form action="{{route('input')}}" method="post" enctype="multipart/form">
                                        @csrf
                                        <div class="form_group">
                                            <input type="text"id="code" name="code" class="form-control" placeholder="CODE....">
                                            <input type="text" id='id' name='id' hidden value="{{$code->id}}">
                                            <input type="text" id="cek" name="cek" hidden value="{{$code->code}}">
                                            <input type="text" id="code_id" name="code_id" hidden value="{{$code->id}}">
                                            <input type="text" id="description" name="description" hidden value="web">
                                            <input type="text" id="title" name="title" hidden value="{{$code->title}}">
                                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                        </div>
                                </form>
                                <!-- Button trigger modal -->

                        @endif
                @endforeach
            @endforeach
        @else
        <h1 class="mb-4">Selamat Datang</h1>
        <p class="text-lg text-grey mb-5">Silakan login terlebih dahulu</p>
        <a href="{{route('login')}}" class="btn btn-primary btn-split">Login <div class="fab"><span class="mai-play"></span></div></a>
        @endif
        {{-- <p class="text-lg text-grey mb-5">Tidak ada absen</p> --}}
        {{-- <a href="#" class="btn btn-primary btn-split">Watch Video <div class="fab"><span class="mai-play"></span></div></a> --}}
    </div>
    <div class="col-md-6 py-5 wow zoomIn">
        <div class="img-fluid text-center">
            <img src="{{asset('img/HIMASTER.png')}}"  width="400"  alt="">
          </div>
        </div>
      </div>
      <a href="#jadwal" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
    </div>
  </div>
@endsection
