@extends('layouts.admin')

@section('content')
    <h2 class="text-xl font-semibold text-gray-700 mb-6">Selamat datang, {{ Auth::guard('admin')->user()->name }}</h2>

    <div class="bg-white rounded-lg shadow p-6">
        <p class="text-gray-500">Belum ada permohonan masuk.</p>
    </div>
@endsection