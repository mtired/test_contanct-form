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

  <!-- ▼ 一覧表示（Livewire コンポーネント） -->
  @livewire('admin-contacts')

</div>
@endsection