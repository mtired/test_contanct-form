@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@push('header-buttons')
<form action="/logout" method="post">
  @csrf
  <button class="header-link">logout</button>
</form>
@endpush

@section('content')
<div class="admin-container">
  <h2 class="admin-title">Admin</h2>
  <!-- 検索フォーム -->
  <div class="search-area">
    <form class="search-form">
      <div class="search-row">
        <input type="text" class="search-input" placeholder="名前やメールアドレスを入力してください">

        <select class="search-select">
          <option>性別</option>
        </select>

        <select class="search-select">
          <option>お問い合わせの種類</option>
        </select>

        <select class="search-select">
          <option>年/月/日</option>
        </select>

        <button class="search-btn">検索</button>
        <button class="reset-btn">リセット</button>
      </div>
    </form>
  </div>

  <!-- ⭐ 検索と同じ親の中にヘッダーを置く -->
  <div class="table-header">
    <button class="export-btn">エクスポート</button>
    <div class="pagination-wrapper">
      {{ $contacts->links() }}
    </div>
  </div>

  <!-- 一覧表示 -->
  <table class="admin-table">
    <thead>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
        <td>
          @if($contact->gender == 1)
          男性
          @elseif($contact->gender == 2)
          女性
          @else
          その他
          @endif
        </td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->category->content }}</td>
        <td><button class="detail-btn">詳細</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection