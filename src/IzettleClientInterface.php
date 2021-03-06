<?php

namespace LauLamanApps\IzettleApi;

use LauLamanApps\IzettleApi\API\Universal\IzettlePostable;
use LauLamanApps\IzettleApi\Client\AccessToken;
use LauLamanApps\IzettleApi\Client\ApiScope;
use Psr\Http\Message\ResponseInterface;

interface IzettleClientInterface
{
    const API_BASE_URL = 'https://oauth.izettle.net';
    const API_AUTHORIZE_USER_LOGIN_URL = self::API_BASE_URL . '/authorize';

    const API_ACCESS_TOKEN_REQUEST_URL = self::API_BASE_URL . '/token';
    const API_ACCESS_TOKEN_PASSWORD_GRANT = 'password';
    const API_ACCESS_TOKEN_REFRESH_TOKEN_URL = self::API_BASE_URL . '/token';
    const API_ACCESS_TOKEN_REFRESH_TOKEN_GRANT = 'refresh_token';

    public function setAccessToken(AccessToken $accessToken): void;

    public function authoriseUserLogin(string $redirectUrl, ApiScope $apiScope): string;

    public function getAccessTokenFromUserLogin(string $username, string $password): AccessToken;

    public function refreshAccessToken(?AccessToken $accessToken =  null): AccessToken;

    public function get(string $url, ?array $queryParameters = null): ResponseInterface;

    public function post(string $url, IzettlePostable $object): ResponseInterface;

    public function put(string $url, string $jsonData): void;

    public function delete(string $url): void;

    public function getJson(ResponseInterface $response): string;
}
