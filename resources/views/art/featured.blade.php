@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('art/labels.art') }} - {{ Lang::get('art/labels.art.featured') }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('art.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        <div class="row">
            <div class="columns small-12 medium-6">
                <h3>{{ Lang::get('art/labels.art.featured-arts') }}</h3>
                @foreach ($featuredArts as $featuredArt)
                    {!!
                    HTML::linkRoute('art.artById', $featuredArt->name, array(
                        $featuredArt->id,
                        $featuredArt->name_slug
                    ))
                    !!}<br>
                @endforeach

                <br /><br />
            </div>
            <div class="columns small-12 medium-6">
                <h3>{{ Lang::get('art/labels.art.featured-artists') }}</h3>
                @foreach ($featuredArtists as $featuredArtist)
                    {!!
                    HTML::linkRoute('artist.byArtistName', $featuredArtist->name, array(
                        $featuredArtist->name_slug
                    ))
                    !!}<br>
                @endforeach

                <br /><br />
            </div>
        </div>

        <div class="row">
            <div class="columns small-12 medium-6">
                {!! HTML::linkRoute('art.featuredArt', Lang::get('art/labels.art.more-featured-arts')) !!}
            </div>
            <div class="columns small-12 medium-6">
                {!! HTML::linkRoute('artist.featuredArtists', Lang::get('art/labels.art.more-featured-artists')) !!}
            </div>
        </div>

        <div class="row">
            <div class="columns small-12 medium-6">
                <h3>{{ Lang::get('art/labels.art.featured-galleries') }}</h3>
                @foreach ($featuredGalleries as $featuredGallery)
                    {!!
                    HTML::linkRoute('artist.galleryByGalleryName', $featuredGallery->name, array(
                        $featuredGallery->user->name_slug,
                        $featuredGallery->name_slug
                    ))
                    !!}<br>
                @endforeach

                <br /><br />
            </div>
        </div>

        <div class="row">
            <div class="columns small-12 medium-6">
                {!! HTML::linkRoute('artist.featuredGalleries', Lang::get('art/labels.art.more-featured-galleries')) !!}
            </div>
        </div>

    </div>
</div>

@stop