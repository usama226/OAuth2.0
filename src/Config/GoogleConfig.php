<?php

namespace App\Config;

class GoogleConfig
{
    private static $clientId = '1080131230200-ihqmiifu15736r28occ0p9fbu6p5lf9c.apps.googleusercontent.com';
    private static $clientSecret = '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';
    private static $redirectUri = 'http://localhost:8000/callback.php';

    public static function getClientId()
    {
        return self::$clientId;
    }

    public static function getClientSecret()
    {
        return self::$clientSecret;
    }

    public static function getRedirectUri()
    {
        return self::$redirectUri;
    }
}
