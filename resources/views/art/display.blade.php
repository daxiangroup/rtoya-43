@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('art/labels.art-display') }} - {{ $art->name }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('art.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        Artist: {!! HTML::linkRoute('artist.galleriesByArtistName', $artist->name, array(
            $artist->name_slug
        ))
        !!}<p>
        Name: {{ $art->name }}<br>

        Galleries:<br>
        @foreach ($art->galleries as $gallery)
        &nbsp;&nbsp;&nbsp;&nbsp;{!! HTML::linkRoute('artist.galleryByGalleryName', $gallery->name, array(
            $gallery->user->name_slug,
            $gallery->name_slug
        ))
        !!}<br>
        @endforeach

        Photos:<br>
        @foreach ($art->photos as $photo)
        &nbsp;&nbsp;&nbsp;&nbsp;{{ $photo->path }}<br>
        @endforeach
    </div>
</div>

@stop