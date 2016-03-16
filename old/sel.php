<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://simulate.com/");
    $this->open("/");
    $this->type("id=search", "tiani");
    $this->click("id=product-collection-image-3272");
    $this->waitForPageToLoad("30000");
    $this->click("css=#swatch234 > span.swatch-label");
    $this->click("css=button.button.btn-cart-custom");
    $this->click("link=Zur Kasse");
    $this->waitForPageToLoad("30000");
  }
}
?>