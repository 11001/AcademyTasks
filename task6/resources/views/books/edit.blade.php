@extends('layout.master')

@section('content-header')
    {!! trans('books.your_books') !!}
@stop

@section('content')
    @include('books.form')
@stop
