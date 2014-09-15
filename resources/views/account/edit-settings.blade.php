@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('account/labels.account-edit') }} - {{ Lang::get('account/links.navigation-main.settings') }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('account.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        {!! Form::open() !!}

        {!! Form::label('values['.AccountService::FIELD_NAME.']', Lang::get('account/labels.edit.settings.name')) !!}
        {!! Form::text('values['.AccountService::FIELD_NAME.']', $formData[AccountService::FIELD_NAME]) !!}

        {!! Form::label('values['.AccountService::FIELD_EMAIL.']', Lang::get('account/labels.edit.settings.email')) !!}
        {!! Form::text('values['.AccountService::FIELD_EMAIL.']', $formData[AccountService::FIELD_EMAIL]) !!}

        {!! Form::button(Lang::get('account/labels.save'), array('type'=>'submit')) !!}

        {!! Form::close() !!}
    </div>
</div>


@stop