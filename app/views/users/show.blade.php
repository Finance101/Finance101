@extends('layouts.master')

@section('content')
	<h1>{{{ $user->first_name }}} {{{ $user->last_name }}}</h1>
	<h2>{{{ $user->email }}}</h2>
@stop