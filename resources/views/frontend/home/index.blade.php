@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="page-banner home-banner">
      <div class="row align-items-center flex-wrap-reverse h-100">
        <div class="col-md-6 py-5 wow fadeInLeft">
        @if (Auth::check())
            <h1 class="mb-4">Selamat Pagi</h1>
            <h1 class="mb-4">{{$user->name}}</h1>
            @foreach ($check_code as $code)
                @foreach ($code->code as $code)
                        @if ($code->status == 0)
                            @continue
                        @else
                            <h5 class="my-3">Ada absen {{$code->title}}</h5>
                            <form action="{{route('input')}}" method="post" enctype="multipart/form">
                                    @csrf
                                    <div class="form_group">
                                        <input type="text"id="code" name="code" class="form-control" placeholder="CODE....">
                                        <input type="text" id='id' name='id' hidden value="{{$code->id}}">
                                        <input type="text" id="cek" name="cek" hidden value="{{$code->code}}">
                                        <input type="text" id="code_id" name="code_id" hidden value="{{$code->id}}">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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
            <img src="{{asset('assets/img/banner_image_1.svg')}}" alt="">
          </div>
        </div>
      </div>
      <a href="#jadwal" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
    </div>
  </div>
@endsection
