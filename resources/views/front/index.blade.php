@extends('layouts.app')
@section('content')

    {{--    <x-slider2/>--}}
    @include('components.slider2')

    <x-has_project/>

    <x-about/>
    {{--<x-start />--}}
    {{--    <x-services services ="{{$services}}"/>--}}
    {{--    @include('components.slider2')--}}
    @include('components.services')
    @include('components.clients')


    {{--    <x-clients/>--}}
    {{--    <x-slider1/>--}}
    <x-blog/>
    <x-numbers/>
    <x-faqs/>
    {{--    <x-team/>--}}

    <x-articles-slider2/>
    {{--<x-articles-slider1 />--}}

    <x-map/>
    {{--<x-call-to-action />--}}
@endsection
