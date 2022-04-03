<?php

if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    throw new Exception(sprintf('Please run "composer require google/apiclient:~2.0" in "%s"', __DIR__));
}
require_once __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('API code samples');
$client->setScopes([
    'https://www.googleapis.com/auth/youtube.readonly',
]);

$client->setAuthConfig('client.json');
$client->setAccessType('offline');

if (!isset($_COOKIE['authCode'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit();
}

if ($_GET['return'])
    setcookie('authCode', null, -1);

$authCode = $_COOKIE['authCode'];

// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
$client->setAccessToken($accessToken);

// Define service object for making API requests.
$service = new Google_Service_YouTube($client);

$queryParams = [
    'maxResults' => 50,
    'playlistId' => 'PLOzb-otnODaMKnqZN3j0P3RqSsOERY_TK'
];

$response = $service->playlistItems->listPlaylistItems('snippet', $queryParams);
if (file_put_contents('data.json', json_encode($response)))
    die('Done!');