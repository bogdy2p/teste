<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://simulate.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/");
    $this->type("id=search", "tiani");
    $this->sendKeys("id=search", "\13");
    $this->click("id=product-collection-image-3272");
    $this->waitForPageToLoad("30000");
    $this->click("css=#swatch234 > span.swatch-label");
    $this->click("css=button.button.btn-cart-custom");
    $this->click("link=Zur Kasse");
    $this->waitForPageToLoad("15000");

  }

  public function tearDown() {

  	file_put_contents('result.png', base64_decode($this->captureEntirePageScreenshotToString()));

  }

}
?>