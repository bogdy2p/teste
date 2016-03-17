<?php

class Selenium2ExampleTest extends PHPUnit_Extensions_Selenium2TestCase
{

    public function setUp()
    {

        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser("firefox");
        $this->setBrowserUrl("http://google.com/");


    }

    public function testSelenium2AlertCase()
    {

        $this->url("/");
        
        $javascriptCode = 'alert("Hellow");';

        $this->execute(array(
            'script' => $javascriptCode,
            'args' => array()
        ));
        sleep(5);



    }

    public function tearDown()
    {

    }
}
?>