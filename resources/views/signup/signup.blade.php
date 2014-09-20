@extends('layouts.master')

@section('content')

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

{!! Form::open(['route' => 'signup.post']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}

    {!! Form::submit('Signup!',['class' => 'form-control']) !!}
{!! Form::close() !!}

@stop