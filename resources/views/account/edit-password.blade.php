@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('account/labels.account-edit') }} - {{ Lang::get('account/links.navigation-main.password') }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('account.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        {!! Form::open() !!}

        {!! Form::label('values['.AccountService::FIELD_PASSWORD.']', Lang::get('account/labels.edit.password.password')) !!}
        {!! Form::password('values['.AccountService::FIELD_PASSWORD.']') !!}

        {!! Form::label('values['.AccountService::FIELD_NEWPASSWORD.']', Lang::get('account/labels.edit.password.newpassword')) !!}
        {!! Form::password('values['.AccountService::FIELD_NEWPASSWORD.']') !!}

        {!! Form::button(Lang::get('account/labels.save'), array('type'=>'submit')) !!}

        {!! Form::close() !!}
    </div>
</div>


@stop