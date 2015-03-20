#!/usr/bin/env php
<?php

chdir(__DIR__);

$base_path = __DIR__;
$phpunit_priority = array(
    $base_path . '/vendor/bin/phpunit',
    $base_path . '/../vendor/bin/phpunit'
);

$phpunit_bin = 'phpunit';
foreach ($phpunit_priority as $path) {
    if (file_exists($path)) {
        $phpunit_bin = $path;
        break;
    }
}

$phpunit_conf = $base_path.'/phpunit.xml';
if (file_exists($phpunit_conf) === false) {
    $phpunit_conf = $base_path.'/phpunit.xml.dist';
}

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