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
      <form action="#" method="POST">
        <div class="form-group">
          <label>お名前</label>
          <input type="text" placeholder="例: 山田　太郎">
        </div>
        <div class="form-group">
          <label>メールアドレス</label>
          <input type="email" placeholder="例: test@example.com">
        </div>
        <div class="form-group">
          <label>パスワード</label>
          <input type="password" placeholder="例: coachtech1106">
        </div>
        <button class="submit-btn">登録</button>
      </form>
    </div>
  </main>
</body>
@endsection