@extends('layouts.app')

@section('pageTitle', 'Movies')

@section('content')
    <movies-index
        :api-key="'{{ $apiKey }}'"
    ></movies-index>
@endsection