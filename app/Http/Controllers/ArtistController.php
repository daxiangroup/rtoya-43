<?php namespace Rtoya\Http\Controllers;

use \Auth;
use Illuminate\Routing\Controller;
use \Config;
use \View;

use Redirect;
use Rtoya\Services\ArtService;
use Rtoya\Services\ArtistService;
use Rtoya\Services\UserService;

class ArtistController extends Controller {

    public function __construct(ArtistService $artistService, ArtService $artService, UserService $userService)
    {
        $this->artistService = $artistService;
        $this->artService    = $artService;
        $this->userService   = $userService;
    }

    // public function getIndex()
    // {
    //     $featuredArts      = $this->artService
    //         ->retrieveFeaturedArts(Config::get('art::defaults.featuredLimitArts'));
    //     $featuredArtists   = $this->artService
    //         ->retrieveFeaturedArtists($this->userService, Config::get('art::defaults.featuredLimitArtists'));
    //     $featuredGalleries = $this->artService
    //         ->retrieveFeaturedGalleries(Config::get('art::defaults.featuredLimitGalleries'));

    //     return View::make('art::art-featured')
    //         ->with('featuredArts', $featuredArts)
    //         ->with('featuredArtists', $featuredArtists)
    //         ->with('featuredGalleries', $featuredGalleries);
    // }

    /**
     * A page displaying all of the featured artists
     *
     * @method get
     * @route  /artist/featured
     * @return View
     */
    public function getFeaturedArtists()
    {
        $featuredArtists = $this->artistService
            ->retrieveFeaturedArtists($this->userService);

        return View::make('artist.featured')
            ->with('featuredArtists', $featuredArtists);
    }

    /**
     * A page displaying all of the featured galleries
     *
     * @method get
     * @route  /artist/featured/galleries
     * @return View
     */
    public function getFeaturedGalleries()
    {
        $featuredGalleries = $this->artistService
            ->retrieveFeaturedGalleries();

        return View::make('artist::artist-featured-galleries')
            ->with('featuredGalleries', $featuredGalleries);
    }

    /**
     * A single artists main display. Associated galleries along with their
     * arts.
     *
     * @method get
     * @route  /artist/featured
     * @param  string   $userName
     * @return View / Redirect
     */
    public function getArtistByArtistName($userName)
    {
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', $userName);
        }

        $art  = $this->artService
            ->retrieveArtById($user->id);

        return View::make('artist.display')
            ->with('user', $user)
            ->with('art', $art);
    }

    /**
     * A page displaying all galleries belonging to an artist.
     *
     * @method get
     * @route  /artist/{userName}/galleries
     * @param  string   $userName
     * @return View / Redirect
     */
    public function getArtistGalleriesByArtistName($userName)
    {
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', [ $userName ]);
        }

        $galleries = $this->artistService
            ->retrieveGalleriesByUserId($user->id);

        return View::make('artist.galleries')
            ->with('artist',      $user)
            ->with('galleries', $galleries);
    }

    /**
     * Displaying a single gallery based on a artist name and gallery name
     *
     * @method get
     * @route  /artist/{userName}/gallery/{galleryName}
     * @param  string   $userName
     * @param  string   $galleryName
     * @return View / Redirect
     */
    public function getArtistGalleryByGalleryName($userName, $galleryName)
    {
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', [ $userName ]);
        }

        $gallery = $this->artistService
            ->retrieveGalleryByNameSlug($user->id, $galleryName);
        if (empty($gallery) === true) {
            return Redirect::route('artist.galleryNotFound', [ $userName, $galleryName ]);
        }

        return View::make('artist.gallery')
            ->with('user', $user)
            ->with('gallery', $gallery);
    }

    /**
     * An error page displayed when a URI contains an artist name that cannot
     * be found in the system.
     *
     * @method get
     * @route  /artist/{userName}/not-found
     * @param  string   $userName
     * @return View / Redirect
     */
    public function getArtistNotFound($userName)
    {
        // Check if the user actually does exist (broken urls?). If so, redirect
        // to artist page instead.
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === false) {
            return Redirect::route('artist.byArtistName', $user->name_slug);
        }

        return View::make('artist.unknown-artist')
            ->with('userName', $userName);
    }

    /**
     * An error page displayed when a URI contains a gallery name that cannot
     * be found in the system.
     *
     * @method get
     * @route  /artist/{userName}/gallery/{galleryName}/not-found
     * @param  string   $userName
     * @param  string   $galleryName
     * @return View / Redirect
     */
    public function getGalleryNotFound($userName, $galleryName)
    {
        // Check if the user actually does exist (broken urls?). If not, redirect
        // to artist not-found page instead.
        $user = $this->userService
            ->retrieveUserByNameSlug($userName);
        if (empty($user) === true) {
            return Redirect::route('artist.notFound', [ $userName ]);
        }

        // Check if the gallery actually does exist (broken urls?). If so, redirect
        // to the gallery page instead.
        $gallery = $this->artistService
            ->retrieveGalleryByNameSlug($user->id, $galleryName);
        if (empty($gallery) === false) {
            return Redirect::route('artist.galleryByGalleryName', [ $userName, $galleryName ]);
        }

        return View::make('artist.unknown-gallery')
            ->with('userName', $userName)
            ->with('galleryName', $galleryName);
    }

    /**
     * An error page displayed when a URI is encountered that does not have a
     * route specified for it.
     *
     * @method get
     * @route  /artist/*
     * @return View / Redirect
     */
    public function getCatchAll($path)
    {
        return 'You\'re looking for something that doesn\'t exist';
    }
}
