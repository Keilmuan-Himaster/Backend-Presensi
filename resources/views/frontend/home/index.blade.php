@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="page-banner home-banner">
      <div class="row align-items-center flex-wrap-reverse h-100">
        <div class="col-md-6 py-5 wow fadeInLeft">
        @if (Auth::check())
        <h1 class="mb-4">Selamat Pagi</h1>
        <h1 class="mb-4">{{$user->name}}</h1>
        {{-- @foreach ($event as $event)
            {{$event->name}}
        @endforeach --}}
        <div class="form__group field">
          <input type="input" class="form__field" placeholder="Masukan Kode" name="code" id='code' required />
        </div>

        @else
        <h1 class="mb-4">Selamat Datang</h1>
        <p class="text-lg text-grey mb-5">Silakan login terlebih dahulu</p>
        <a href="{{route('login')}}" class="btn btn-primary btn-split">Login <div class="fab"><span class="mai-play"></span></div></a>
        @endif
        {{-- @foreach ($event_check->code as $event_check)
            <h1 class="mb-4">{{$event_check->title}}</h1>
        @endforeach --}}
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
