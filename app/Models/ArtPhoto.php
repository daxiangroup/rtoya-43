<?php namespace Rtoya\Models;

use Illuminate\Database\Eloquent\Model;

class ArtPhoto extends Model {
    protected $table = 'arts_photos';

    public function art()
    {
        $this->belongsTo('Art');
    }
}
