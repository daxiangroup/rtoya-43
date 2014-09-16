<?php namespace Rtoya\Services;

use Rtoya\Models\Art;
use Rtoya\Models\Gallery;
use Rtoya\Services\UserService;

class ArtistService
{
    const REGEXP_ART_ID       = '[0-9]+';
    const REGEXP_GALLERY_ID   = '[0-9]+';
    const REGEXP_GALLERY_SLUG = '[a-zA-Z\d-]+';

    const DEFAULT_FEATURED_LIMIT_ARTS      = 5;
    const DEFAULT_FEATURED_LIMIT_ARTISTS   = 5;
    const DEFAULT_FEATURED_LIMIT_GALLERIES = 5;

    public function retrieveFeaturedArts($limit = null)
    {
        if (is_null($limit) === true) {
            // TODO: Paging needs to be sorted out here
            $limit = 100;
        }

        $ids = array(1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1,2);

        foreach ($ids as $id) {
            $arts[] = $this->retrieveArtById($id);

            if (count($arts) == $limit) {
                return $arts;
            }
        }

        return $arts;
    }

    public function retrieveFeaturedArtists(UserService $userService, $limit = null)
    {
        if (is_null($limit) === true) {
            // TODO: Paging needs to be sorted out here
            $limit = 100;
        }

        $ids = array(2,2,2,2,2,2,2,2,2,2,2,2,2,2);

        foreach ($ids as $id) {
            $artists[] = $userService->retrieveUserById($id);

            if (count($artists) == $limit) {
                return $artists;
            }
        }

        return $artists;
    }

    public function retrieveFeaturedGalleries($limit = null)
    {
        if (is_null($limit) === true) {
            // TODO: Paging needs to be sorted out here
            $limit = 100;
        }

        $ids = array(2,1,2,1,2,1,2,1,2,1,2,1,2,1,2,1);

        foreach ($ids as $id) {
            $galleries[] = Gallery::find($id);

            if (count($galleries) == $limit) {
                return $galleries;
            }
        }

        return $galleries;
    }

    public function retrieveGalleriesByUserId($userId)
    {
        return Gallery::where('user_id', '=', $userId)
            ->get();
    }

    public function retrieveGalleryByNameSlug($userId, $galleryName)
    {
        return Gallery::where('name_slug', '=', $galleryName)
            ->where('user_id', '=', $userId)
            ->first();
    }
}
