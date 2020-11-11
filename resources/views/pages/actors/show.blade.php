@extends('layouts.app')

@section('content')
    <actors-show
        :api-key="'{{ $apiKey }}'"
        :id="{{ $id }}"
    ></actors-show>
@endsection