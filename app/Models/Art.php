<?php namespace Rtoya\Models;

use Illuminate\Database\Eloquent\Model;
use Rtoya\Models\Gallery;

class Art extends Model {

    public function photos()
    {
        return $this->hasMany('ArtPhoto');
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }

    public function galleries()
    {
        return $this->belongsToMany('Gallery', 'arts_gallery_art');
    }
}
