<?php namespace Rtoya;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserMeta extends Model {

    protected $table = 'users_meta';

    public function user()
    {
        $this->belongsTo('User');
    }

}
