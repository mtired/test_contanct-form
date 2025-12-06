@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection

@section('content')
<main>
  <div class="contact__content">
    <div class="contact__heading">
      <a>Contact</a>
    </div>
    <form class="form" action="/confirm" method="post">
      @csrf
      <!-- 名前 -->
      <div class="form-row">
        <label>お名前 <span class="required">※</span></label>
        <div class="inputs-double">
          <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}">
          <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}">
        </div>
      </div>

      <!-- 性別 -->
      <div class="form-row">
        <label>性別 <span class="required">※</span></label>
        <div class="radio-group">
          <label>
            <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
            男性
          </label>
          <label>
            <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
            女性
          </label>
          <label>
            <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>
            その他
          </label>
        </div>
      </div>

      <!-- メール -->
      <div class="form-row">
        <label>メールアドレス <span class="required">※</span></label>
        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
      </div>

      <!-- 電話番号 -->
      <div class="form-row">
        <label>電話番号 <span class="required">※</span></label>
        <div class="tel-group">
          <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
          <span class="hyphen">-</span>
          <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
          <span class="hyphen">-</span>
          <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
        </div>
      </div>

      <!-- 住所 -->
      <div class="form-row">
        <label>住所 <span class="required">※</span></label>
        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
      </div>

      <!-- 建物名 -->
      <div class="form-row">
        <label>建物名</label>
        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
      </div>

      <!-- お問い合わせ種類 -->
      <div class="form-row">
        <label>お問い合わせの種類 <span class="required">※</span></label>
        <select>
          @foreach($categories as $category)
          <option value="{{ $category->id }}"
            {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->content }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- お問い合わせ内容 -->
      <div class="form-row">
        <label>お問い合わせ内容 <span class="required">※</span></label>
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
      </div>

      <div class="submit-area">
        <button type="submit">確認画面</button>
      </div>
    </form>
  </div>
</main>

@endsection