<?php namespace Rtoya\Services;

use Rtoya\Models\User;
use \Hash;

class AccountService
{
    const FIELD_NAME         = 'name';
    const FIELD_EMAIL        = 'email';
    const FIELD_PASSWORD     = 'password';
    const FIELD_NEWPASSWORD  = 'newpassword';
    const FIELD_WEBSITE_URL  = 'website_url';
    const FIELD_FACEBOOK_URL = 'facebook_url';
    const FIELD_TWITTER      = 'twitter';

    public function formData(User $user)
    {
        $data[self::FIELD_NAME]         = isset($user->name)               ? $user->name : '';
        $data[self::FIELD_EMAIL]        = $user->email;
        $data[self::FIELD_WEBSITE_URL]  = isset($user->meta->website_url)  ? $user->meta->website_url : '';
        $data[self::FIELD_FACEBOOK_URL] = isset($user->meta->facebook_url) ? $user->meta->facebook_url : '';
        $data[self::FIELD_TWITTER]      = isset($user->meta->twitter)      ? $user->meta->twitter : '';

        return $data;
    }

    public function prepareSave(User $user, Array $values)
    {
        $fieldsUser = array(
            self::FIELD_NAME,
            self::FIELD_EMAIL,
        );

        $fieldsUserMeta = array(
            self::FIELD_WEBSITE_URL,
            self::FIELD_FACEBOOK_URL,
            self::FIELD_TWITTER,
        );

        foreach ($fieldsUser as $field) {
            if (empty($values[$field]) === false) {
                $user->{$field} = $values[$field];
            }
        }

        $user->name_slug = slugify($user->{self::FIELD_NAME}, true, false);

        if (empty($values[self::FIELD_NEWPASSWORD]) === false) {
            $user->{self::FIELD_PASSWORD} = Hash::make($values[self::FIELD_NEWPASSWORD]);
        }

        foreach ($fieldsUserMeta as $field) {
            if (empty($values[$field]) === false) {
                $user->meta->{$field} = $values[$field];
            }
        }

        return $user;
    }
}

// TODO: Move this into a proper helper location, not at the bottom of a Service Class
function slugify($input, $trimShortWords = true, $toLower = true)
{
    $shortWords = array(
        'to', 'the', 'and',
    );

    $input = preg_replace('/[\ \~\!\@\#\$\%\^&\*\(\)_\+\`\-\=\{\}\|\[\]\\\;\'\:\"\,\.\/\<\>\?\']/', '-', $input);

    foreach ($shortWords as $shortWord) {
        $input = str_replace($shortWord, '', $input);
    }

    while (preg_match('/--/', $input)) {
        $input = str_replace('--', '-', $input);
    }

    $input = $toLower === true ? strtolower($input) : $input;

    return trim($input, '-');
}
