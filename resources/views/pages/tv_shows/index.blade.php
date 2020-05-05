@extends('layouts.app')

@section('pageTitle', 'TV Shows')

@section('content')
    <tv-shows-index
        :api-key="'{{ $apiKey }}'"
    ></tv-shows-index>
@endsection