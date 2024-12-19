<?php

namespace App\OAuth;

use App\Config\GoogleConfig;

class GoogleAuth
{
    private $tokenEndpoint = 'https://oauth2.googleapis.com/token';
    private $authEndpoint = 'https://accounts.google.com/o/oauth2/v2/auth';
    private $userInfoEndpoint = 'https://www.googleapis.com/oauth2/v1/userinfo';

    public function getAuthUrl($state, $scope = 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email')
    {
        return $this->authEndpoint . '?' . http_build_query([
            'client_id'     => GoogleConfig::getClientId(),
            'redirect_uri'  => GoogleConfig::getRedirectUri(),
            'response_type' => 'code',
            'scope'         => $scope,
            'state'         => $state
        ]);
    }

    public function getAccessToken($code)
    {
        $postData = [
            'code'          => $code,
            'client_id'     => GoogleConfig::getClientId(),
            'client_secret' => GoogleConfig::getClientSecret(),
            'redirect_uri'  => GoogleConfig::getRedirectUri(),
            'grant_type'    => 'authorization_code'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->tokenEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $tokenData = json_decode($response, true);

        return $tokenData['access_token'] ?? null;
    }

    public function getUserInfo($accessToken)
    {
        $response = file_get_contents($this->userInfoEndpoint . '?access_token=' . $accessToken);
        return json_decode($response, true);
    }
}
