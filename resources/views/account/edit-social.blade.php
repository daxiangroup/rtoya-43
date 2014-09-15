@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('account/labels.account-edit') }} - {{ Lang::get('account/links.navigation-main.social') }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('account.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        {!! Form::open() !!}

        {!! Form::label('values['.AccountService::FIELD_WEBSITE_URL.']', Lang::get('account/labels.edit.social.websiteUrl')) !!}
        {!! Form::text('values['.AccountService::FIELD_WEBSITE_URL.']', $formData[AccountService::FIELD_WEBSITE_URL]) !!}

        {!! Form::label('values['.AccountService::FIELD_FACEBOOK_URL.']', Lang::get('account/labels.edit.social.facebookUrl')) !!}
        {!! Form::text('values['.AccountService::FIELD_FACEBOOK_URL.']', $formData[AccountService::FIELD_FACEBOOK_URL]) !!}

        {!! Form::label('values['.AccountService::FIELD_TWITTER.']', Lang::get('account/labels.edit.social.twitter')) !!}
        {!! Form::text('values['.AccountService::FIELD_TWITTER.']', $formData[AccountService::FIELD_TWITTER]) !!}

        {!! Form::button(Lang::get('account/labels.save'), array('type'=>'submit')) !!}

        {!! Form::close() !!}
    </div>
</div>


@stop