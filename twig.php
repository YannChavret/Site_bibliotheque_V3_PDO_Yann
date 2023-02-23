<?php

require_once __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

$twig->addGlobal("session", $_SESSION);
$twig->addGlobal("userRegistering", $userRegistering);
$twig->addGlobal("matchMdp", $matchMdp);
$twig->addGlobal("missingValue", $missingValue);
