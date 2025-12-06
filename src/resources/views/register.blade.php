@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@push('header-buttons')
<a href="/login" class="header-link">login</a>
@endpush

@section('content')

<body>
  <main>
    <h2 class="page-title">Register</h2>
    <div class="form-wrapper">
      <form action="/register" method="post">
        @csrf
        <div class="form-group">
          <label>お名前</label>
          <input type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">
        </div>
        <div class="form-group">
          <label>メールアドレス</label>
          <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
        </div>
        <div class="form-group">
          <label>パスワード</label>
          <input type="password" name="password" placeholder="例: coachtech1106">
        </div>
        <button class="submit-btn">登録</button>
      </form>
    </div>
  </main>
</body>
@endsection