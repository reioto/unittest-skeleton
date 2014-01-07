#!/usr/bin/env php
<?php

chdir(__DIR__);

$phpunit_bin = __DIR__ . '/../vendor/bin/phpunit';
$phpunit_bin = file_exists($phpunit_bin) ? $phpunit_bin : 'phpunit';
$phpunit_conf = file_exists('phpunit.xml') ? 'phpunit.xml' : 'phpunit.xml.dist';
$phpunit_opts = "-c $phpunit_conf";

if (getenv('PHPUNIT_OPTS') !== false) {
    $phpunit_opts .= ' ' . getenv('PHPUNIT_OPTS');
}

if ($argc > 1) {
    $opt = '';
    for ($i = 1; $i < $argc; $i++) {
        $opt .= ' ' . $argv[$i];
    }
    $phpunit_opts .= $opt;
}

system("$phpunit_bin $phpunit_opts" , $result);
echo "\n\n";
exit($result);