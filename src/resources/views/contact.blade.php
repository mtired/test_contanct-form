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
      <!-- お名前 -->
      <div class="form-row">
        <label>お名前 <span class="required">※</span></label>
        <div class="input-area">
          <div class="inputs-double">
            <input type="text" name="first_name" placeholder="例: 山田" value="{{ $contact['first_name'] ?? old('first_name') }}">
            <input type="text" name="last_name" placeholder="例: 太郎" value="{{ $contact['last_name'] ?? old('last_name') }}">
          </div>
          <div class="error-row">
            <div class="error-box">
              @error('first_name') <div class="error-message">{{ $message }}</div> @enderror
            </div>
            <div class="error-box">
              @error('last_name') <div class="error-message">{{ $message }}</div> @enderror
            </div>
          </div>
        </div>
      </div>
      <!-- 性別 -->
      <div class="form-row">
        <label>性別 <span class="required">※</span></label>
        <div class="input-area">
          <div class="radio-group">
            <label><input type="radio" name="gender" value="1" {{ ($contact['gender'] ?? old('gender')) == 1 ? 'checked' : '' }}> 男性</label>
            <label><input type="radio" name="gender" value="2" {{ ($contact['gender'] ?? old('gender')) == 2 ? 'checked' : '' }}> 女性</label>
            <label><input type="radio" name="gender" value="3" {{ ($contact['gender'] ?? old('gender')) == 3 ? 'checked' : '' }}> その他</label>
          </div>
          <div class="error-box">
            @error('gender') <div class="error-message">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
      <!-- メールアドレス -->
      <div class="form-row">
        <label>メールアドレス <span class="required">※</span></label>
        <div class="input-area">
          <input type="email" name="email" placeholder="例: test@example.com" value="{{ $contact['email'] ?? old('email') }}">
          <div class="error-box">
            @error('email') <div class="error-message">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
      <!-- 電話番号 -->
      <div class="form-row">
        <label>電話番号 <span class="required">※</span></label>
        <div class="input-area">
          <div class="tel-group">
            <input type="text" name="tel1" placeholder="080" value="{{ $contact['tel1'] ?? old('tel1') }}">
            <span class="hyphen">-</span>
            <input type="text" name="tel2" placeholder="1234" value="{{ $contact['tel2'] ?? old('tel2') }}">
            <span class="hyphen">-</span>
            <input type="text" name="tel3" placeholder="5678" value="{{ $contact['tel3'] ?? old('tel3') }}">
          </div>
          <div class="error-row">
            <div class="error-box">@error('tel1') <div class="error-message">{{ $message }}</div> @enderror</div>
            <div class="error-box">@error('tel2') <div class="error-message">{{ $message }}</div> @enderror</div>
            <div class="error-box">@error('tel3') <div class="error-message">{{ $message }}</div> @enderror</div>
          </div>
        </div>
      </div>
      <!-- 住所 -->
      <div class="form-row">
        <label>住所 <span class="required">※</span></label>
        <div class="input-area">
          <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value=" {{ $contact['address'] ?? old('address') }}">
          <div class="error-box">
            @error('address') <div class="error-message">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
      <!-- 建物名 -->
      <div class="form-row">
        <label>建物名</label>
        <div class="input-area">
          <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ $contact['building'] ?? old('building') }}">
        </div>
      </div>
      <!-- お問い合わせ種類 -->
      <div class="form-row">
        <label>お問い合わせの種類 <span class="required">※</span></label>
        <div class="input-area">
          <select name="category_id">
            <option value="" disabled selected>選択してください</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
              {{ ($contact['category_id'] ?? old('category_id')) == $category->id ? 'selected' : '' }}>
              {{ $category->content }}
            </option>
            @endforeach
          </select>
          <div class="error-box">
            @error('category_id') <div class="error-message">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
      <!-- お問い合わせ内容 -->
      <div class="form-row">
        <label>お問い合わせ内容 <span class="required">※</span></label>
        <div class="input-area">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ $contact['detail'] ?? old('detail') }}</textarea>
          <div class="error-box">
            @error('detail') <div class="error-message">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
      <div class="submit-area">
        <button type="submit">確認画面</button>
      </div>
    </form>
  </div>
</main>
@endsection