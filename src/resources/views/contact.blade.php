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
    <form class="form">
      <!-- 名前 -->
      <div class="form-row">
        <label>お名前 <span class="required">※</span></label>
        <div class="inputs-double">
          <input type="text" placeholder="例: 山田">
          <input type="text" placeholder="例: 太郎">
        </div>
      </div>

      <!-- 性別 -->
      <div class="form-row">
        <label>性別 <span class="required">※</span></label>
        <div class="radio-group">
          <label><input type="radio" name="gender"> 男性</label>
          <label><input type="radio" name="gender"> 女性</label>
          <label><input type="radio" name="gender"> その他</label>
        </div>
      </div>

      <!-- メール -->
      <div class="form-row">
        <label>メールアドレス <span class="required">※</span></label>
        <input type="email" placeholder="例: test@example.com">
      </div>

      <!-- 電話番号 -->
      <div class="form-row">
        <label>電話番号 <span class="required">※</span></label>
        <div class="tel-group">
          <input type="text" placeholder="080">
          <span class="hyphen">-</span>
          <input type="text" placeholder="1234">
          <span class="hyphen">-</span>
          <input type="text" placeholder="5678">
        </div>
      </div>

      <!-- 住所 -->
      <div class="form-row">
        <label>住所 <span class="required">※</span></label>
        <input type="text" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
      </div>

      <!-- 建物名 -->
      <div class="form-row">
        <label>建物名</label>
        <input type="text" placeholder="例: 千駄ヶ谷マンション101">
      </div>

      <!-- お問い合わせ種類 -->
      <div class="form-row">
        <label>お問い合わせの種類 <span class="required">※</span></label>
        <select>
          <option selected>選択してください</option>
          <option>ご質問</option>
          <option>ご相談</option>
          <option>その他</option>
        </select>
      </div>

      <!-- お問い合わせ内容 -->
      <div class="form-row">
        <label>お問い合わせ内容 <span class="required">※</span></label>
        <textarea placeholder="お問い合わせ内容をご記載ください"></textarea>
      </div>

      <div class="submit-area">
        <button type="submit">確認画面</button>
      </div>
    </form>
  </div>
</main>

@endsection