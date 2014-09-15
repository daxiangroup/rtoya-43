<?php namespace Rtoya;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

    protected $table = 'users_meta';

    public function user()
    {
        $this->belongsTo('User');
    }

}
