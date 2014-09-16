@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('artist/labels.artist-galleries') }} - {{ $artist->name }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('artist.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        @foreach ($galleries as $gallery)
            {!!
            HTML::linkRoute('artist.galleryByGalleryName', $gallery->name, array(
                $artist->name_slug,
                $gallery->name_slug,
            ))
            !!}<br>
        @endforeach
    </div>
</div>

@stop