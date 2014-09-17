@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('artist/labels.art') }} - {{ Lang::get('artist/labels.featured-galleries') }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('artist.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        <div class="row">
            <div class="columns small-12 medium-6">
                @foreach ($featuredGalleries as $featuredGallery)
                    {!!
                    HTML::linkRoute('artist.galleryByGalleryName', $featuredGallery->name, array(
                        $featuredGallery->user->name_slug,
                        $featuredGallery->name_slug
                    ))
                    !!}<br>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop