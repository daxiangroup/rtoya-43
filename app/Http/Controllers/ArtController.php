<?php namespace Rtoya\Http\Controllers;

use \Auth;
use Illuminate\Routing\Controller;
use \Config;
use Rtoya\Models\User;
use \View;

use Rtoya\Services\ArtService;
use Rtoya\Services\UserService;

class ArtController extends Controller {

    public function __construct(ArtService $artService, UserService $userService)
    {
        $this->artService  = $artService;
        $this->userService = $userService;
    }

    public function getIndex()
    {
        $featuredArts      = $this->artService
            ->retrieveFeaturedArts(Config::get('art::defaults.featuredLimitArts'));
        $featuredArtists   = $this->artService
            ->retrieveFeaturedArtists($this->userService, Config::get('art::defaults.featuredLimitArtists'));
        $featuredGalleries = $this->artService
            ->retrieveFeaturedGalleries(Config::get('art::defaults.featuredLimitGalleries'));

        return View::make('art.featured')
            ->with('featuredArts', $featuredArts)
            ->with('featuredArtists', $featuredArtists)
            ->with('featuredGalleries', $featuredGalleries);
    }

    // Route: /art/{id}/{empty?}
    public function getArtByid($id)
    {
        $art  = $this->artService
            ->retrieveArtById($id);

        if (count($art) === 0) {
            return View::make('art::unknown-art')
                ->with('id', $id);
        }

        $user = $this->userService
            ->retrieveUserById($art->user->id);

        return View::make('art.display')
            ->with('artist', $user)
            ->with('art', $art);
    }

    // Route: /art/{name}/{id}/{empty?}
    public function getArtByUserId($name, $id)
    {
        $user = $this->userService
            ->retrieveUserByName($name);
        $art  = $this->artService
            ->retrieveArtById($id);

        if (count($user) === 0) {
            return View::make('art::unknown-artist')
                ->with('artist', $name);
        }

        if (count($art) === 0) {
            return View::make('art::unknown-art')
                ->with('artist', $user)
                ->with('id', $id);
        }

        return View::make('art::art-display')
            ->with('artist', $user)
            ->with('art', $art);
    }

    // Route: /art/gallery/{user_id}/{name?}
    public function getGalleriesByUserId($user_id)
    {
        $user      = $this->userService
            ->retrieveUserById($user_id);
        $galleries = $this->artService
            ->retrieveGalleriesById($user->id);

        return View::make('art::artist-galleries')
            ->with('artist', $user)
            ->with('galleries', $galleries);
    }

    // Route: /art/{name}/gallery
    public function getGalleriesByName($name)
    {
        $user      = $this->userService
            ->retrieveUserByName($name);
        $galleries = $this->artService
            ->retrieveGalleriesById($user->id);

        return View::make('art::artist-galleries')
            ->with('user', $user)
            ->with('galleries', $galleries);
    }

    // Route: /art/gallery/{user_id}/{user_name}/{gallery_id}/{gallery_name?}
    public function getGallery($user_id, $user_name, $gallery_id)
    {
        $user    = $this->userService
            ->retrieveUserById($user_id);
        $gallery = $this->artService
            ->retrieveGalleryById($gallery_id);

        return View::make('art::artist-gallery')
            ->with('user', $user)
            ->with('gallery', $gallery);
    }

    // Route:: /art/featured
    public function getFeaturedArt()
    {
        $featuredArts    = $this->artService
            ->retrieveFeaturedArts();

        return View::make('art.featured-art')
            ->with('featuredArts', $featuredArts);
    }

    // Route: /artist/{user_id}/{user_name?}
    public function getArtistByUserId($user_id)
    {
        $user = $this->userService
            ->retrieveUserById($user_id);

        return View::make('art::artist-display')
            ->with('user', $user);
    }

    // Route:: /artist/featured
    public function getFeaturedArtist()
    {
        $featuredArtists = $this->artService
            ->retrieveFeaturedArtists($this->userService);

        return View::make('art::art-featured-artist')
            ->with('featuredArtists', $featuredArtists);
    }

    // Route:: /art/gallery/featured
    public function getFeaturedGallery()
    {
        $featuredGalleries = $this->artService
            ->retrieveFeaturedGalleries();

        return View::make('art::art-featured-gallery')
            ->with('featuredGalleries', $featuredGalleries);
    }
}
