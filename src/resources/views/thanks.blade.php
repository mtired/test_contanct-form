@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')

<body>
  <div class="thankyou-wrapper">
    <div class="bg-text">Thank you</div>
    <p class="message">お問い合わせありがとうございました</p>
    <a href="/" class="home-button">HOME</a>
  </div>
</body>
@endsection