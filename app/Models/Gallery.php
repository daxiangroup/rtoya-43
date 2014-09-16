<?php namespace Rtoya\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
    protected $table = 'arts_gallery';

    public function arts()
    {
        return $this->belongsToMany('Art', 'arts_gallery_art');
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }
}
