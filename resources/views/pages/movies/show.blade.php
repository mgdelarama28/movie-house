@extends('layouts.app')

@section('content')
    <movies-show
        :id="{{ $id }}"
    ></movies-show>
@endsection