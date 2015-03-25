<?php
namespace Tests\LibTest;

class DbTest extends \Tests\DBTestcase
{
    function getDataSet()
    {
        $classname = str_replace(__NAMESPACE__. '\\', '', __CLASS__);
        return $this->createFlatXMLDataSet(
            __DIR__.'/files/'.$classname.'_ds.xml'
        );
    }

    function testSample()
    {
        $this->assertTrue(true);
    }
}