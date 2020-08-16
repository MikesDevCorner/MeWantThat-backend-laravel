@extends('layouts.around')

@section('content')

  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/home') }}">oAuth</a>
      @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}">Register</a>
        @endif
      @endauth
    </div>
  @endif

  <div class="content">
    <div class="title m-b-xs">
      Me Want That
    </div>
    <div class="subtitle m-b-md">
      Shopping List - Backend
    </div>

    <div class="links">
      <a href="/api/docs" target="_blank">API Docs</a>
      <a href="/downloads/Masterthesis.pdf" target="_blank">Thesis PDF</a>
      <a href="/downloads/MeWantThatFlutter.apk">Flutter Build</a>
      <a href="/downloads/MeWantThatIonic.apk">Ionic Build</a>
      <a href="http://github.com/mikesdevcorner" target="_blank">GitHub</a>
      <a href="mailto:wagnmich@gmail.com">Mail</a>
    </div>
  </div>

@endsection
