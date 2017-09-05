<?php
require 'vendor/autoload.php';
require 'config.php';

$login_url = "http://twitter.com/login";

$client = new \Goutte\Client();
$client->setClient(new \GuzzleHttp\Client([
    \GuzzleHttp\RequestOptions::VERIFY => false,
]));

$crawler = $client->request('GET', $login_url);

$form = $crawler->selectButton('ログイン')->form();
$crawler = $client->submit($form, array(
    'session[username_or_email]' => USER_ID,
    'session[password]' => PASSWORD
));

var_dump($crawler);