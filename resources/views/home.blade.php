@extends('layout.layout')

@section('content')
    @include('shared.flash-message')
    @include('home.mobility')
    @include('home.advantages')
    @include('home.new-approach')
    @include('home.popular')
    @include('home.carousel')
    @include('home.free-parking')
    @include('home.accordion')
    @include('home.contact-us')
@endsection
