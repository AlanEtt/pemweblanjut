@extends('layouts.app')

@section('content')
    <h1>Detail User</h1>
    <p>Nama: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>pw: {{ $user->password }}</p>
@endsection
