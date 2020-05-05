@extends('layouts.app')

@section('content')
    <tv-shows-show
        :id="{{ $id }}"
    ></tv-shows-show>
@endsection