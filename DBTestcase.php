<?php
namespace Tests;

abstract class DBTestcase extends \Zend\Db\TestCase
{
    static private $_config;
    protected function getDbConfig()
    {
		if (self::$_config === null) {
           $dbconfig = array(
               "driver" =>getenv('DBTYPE'),
               "hostname"=>getenv('DBHOST'),
               "username"=>getenv('DBUSER'),
               "password"=>getenv('DBPASSWORD'),
               "dbname"=>getenv('DBNAME')
           );

           self::$_config = $dbconfig;
		}

        return self::$_config;
    }
}