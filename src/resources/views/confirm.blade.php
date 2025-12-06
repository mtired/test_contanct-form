@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<main class="container">
  <h2 class="page-title">Confirm</h2>
  <form action="/thanks" method="post">
    <table class="confirm-table">
      <tr>
        <th>お名前</th>
        <td>{{ $contact['first_name'] }}　{{ $contact['last_name'] }}</td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          @if($contact['gender'] == 1)
          男性
          @elseif($contact['gender'] == 2)
          女性
          @else
          その他
          @endif
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $contact['email'] }}</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>{{ $contact['tel'] }}</td>
      </tr>
      <tr>
        <th>住所</th>
        <td>{{ $contact['address'] }}/td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{ $contact['building'] }}</td>
      </tr>
      <tr>
        <th>お問い合わせの種類</th>
        <td>{{ $category->content }}</td>
      </tr>
      <tr>
        <th>お問い合わせ内容</th>
        <td>
          {!! nl2br(e($contact['detail'])) !!}
        </td>
      </tr>
    </table>

    <div class="button-area">
      <button class="btn submit">送信</button>
      <button class="btn back">修正</button>
    </div>
  </form>
</main>

@endsection