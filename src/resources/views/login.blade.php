@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@push('header-buttons')
<a href="/register" class="header-link">register</a>
@endpush

@section('content')

<body>
  <main>
    <div class="login-wrapper">
      <h2 class="login-title">Login</h2>
      <div class="login-card">
        <form method="POST" action="/login">
          @csrf
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" type="email" name="email" placeholder="例: test@example.com">
          </div>
          <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" type="password" name="password" placeholder="例: coachtech1106">
          </div>
          <button class="login-btn" type="submit">ログイン</button>
        </form>
      </div>
    </div>
  </main>
</body>

@endsection