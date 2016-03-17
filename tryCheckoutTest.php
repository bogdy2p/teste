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
    $this->click("//li[3]/div/div/div/div/div/ul/li[3]/a/span");
    $this->waitForPageToLoad("30000");
    $this->click("id=product-collection-image-147");
    $this->waitForPageToLoad("30000");
    $this->click("css=button.button.btn-cart-custom");
    $this->click("css=i.icon-mini-cart");
    $this->open("/de/onepage/");
    $this->waitForPageToLoad("30000");
    $this->click("name=billing[prefix]");
    $this->type("id=billing:firstname", "FirstName");
    $this->type("id=billing:lastname", "LastName");
    $this->type("id=billing:street1", "MyHomeAdressTesting");
    $this->type("id=billing:postcode", "8080");
    $this->type("id=billing:city", "County");
    $this->type("id=billing:email", "bogdy2p@gmail.com");
    $this->click("id=s_method_matrixrate_matrixrate_3");
    $this->click("xpath=(//button[@type='button'])[7]");
    $this->click("id=p_method_paypal_standard");
  }
}
?>
