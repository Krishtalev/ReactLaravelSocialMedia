<?php

require_once __DIR__ . "/../vendor/autoload.php";

$client = new \phpcent\Client("http://centrifugo:8000/api", "api_key");

$token = $client->setSecret("secret")->generateConnectionToken(1);
file_put_contents(__DIR__ . '/token.txt', $token);

while (true) {
    sleep(10);
    $client->publish("channel", ["value" => mt_rand()]);
}
