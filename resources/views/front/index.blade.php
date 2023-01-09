@extends('layouts.app')
@section('content')
    {{--    <x-slider1/>--}}

    {{--    <x-slider2/>--}}
    @include('components.slider1')
    {{--    @include('components.slider2')--}}

    {{--    <x-has_project/>--}}

{{--    <x-about/>--}}
    {{--<x-start />--}}
    {{--    <x-services services ="{{$services}}"/>--}}
    {{--    @include('components.slider2')--}}
    @include('components.match')
    @include('components.our-blogs')
    @include('components.team')
    {{--    @include('components.services')--}}
    @include('components.partners')
    @include('components.clients')
    @include('components.championships')

    {{--        <x-clients/>--}}
    {{--    <x-blog/>--}}
    {{--    <x-our-blogs />--}}
    {{--    <x-numbers/>--}}
    {{--    <x-faqs/>--}}


    {{--    <x-articles-slider2/>--}}
    {{--    <x-articles-slider1 />--}}

    <x-map/>
    {{--    <x-hours_work/>--}}
    {{--<x-call-to-action />--}}
@endsection
