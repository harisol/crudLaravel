@extends('layouts.app')

@section('title', $title)
 
@section('sidebar')
    @parent
    <li>PHP</li>
@endsection

@section('content')
    <center>
        <h1>{{ $content }}</h1>
        <p>This is my body content.</p>
    </center>
@endsection