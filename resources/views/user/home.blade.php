@extends('layouts.user')

@section('title', 'Home')

@section('content')

{{-- === HERO SECTION (Optional above) === --}}
@include('components.user.hero')

{{-- === CURATED EXCLUSIVE PRODUCTS === --}}
@include('user.product')
{{-- === blog SECTION  === --}}
@include('user.blog')
{{-- === about SECTION  === --}}
@include('user.about', ['about' => $about])


@endsection
