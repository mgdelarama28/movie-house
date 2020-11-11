@extends('layouts.app')

@section('pageTitle', 'Actors')

@section('content')
    <actors-index
        :api-key="'{{ $apiKey }}'"
    ></actors-index>
@endsection