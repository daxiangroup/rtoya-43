<?php namespace Rtoya\Services;

use Rtoya\User;

class UserService
{
    const REGEXP_USER_ID   = '[0-9]+';
    const REGEXP_USER_SLUG = '[a-zA-Z\d-]+';

    public function retrieveUserByName($name)
    {
        return User::where('name', '=', $name)
            ->first();
    }

    public function retrieveUserByNameSlug($nameSlug)
    {
        return User::where('name_slug', '=', $nameSlug)
            ->first();
    }

    public function retrieveUserById($user_id)
    {
        return User::find($user_id);
    }
}
