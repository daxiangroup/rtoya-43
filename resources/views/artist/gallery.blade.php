@extends('layouts.master')

@section('content')

<div class="row">
    <div class="small-12">
        <h2>{{ Lang::get('artist/labels.artist-gallery') }} - {{ $gallery->name }}</h2>
    </div>
</div>

<div class="row">
    <div class="columns small-12 medium-3">
        @include('artist.navigation-main')
    </div>

    <div class="columns small-12 medium-9">
        @foreach ($gallery->arts as $art)
            {!!
            HTML::linkRoute('art.artById', $art->name, array(
                $art->id,
                $art->name_slug
            ))
            !!}<br>
        @endforeach
    </div>
</div>

@stop