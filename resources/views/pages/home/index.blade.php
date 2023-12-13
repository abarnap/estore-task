@extends('layouts.app')
@section('title', 'Home')
@section('content')

@include('pages.home.category-list')
@include('pages.home.sub-category-list')
@include('pages.home.latest-item-list')

@endsection