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
    $this->click("id=search");
    $this->click("//li[3]/div/div/div/div/div/ul/li[3]/a/span");
    $this->waitForPageToLoad("30000");
    $this->click("id=product-collection-image-147");
    $this->waitForPageToLoad("30000");
    $this->click("css=button.button.btn-cart-custom");
    $this->click("css=span.cart-qty");
    $this->open("/de/onepage/");
    $this->waitForPageToLoad("30000");
    $this->click("name=billing[prefix]");
    $this->type("id=billing:firstname", "name");
    $this->type("id=billing:lastname", "lastname");
    $this->type("id=billing:street1", "streetadress");
    $this->type("id=billing:postcode", "8080");
    $this->click("id=p_method_banktransfer");
    $this->type("id=billing:city", "citiyame");
    $this->type("id=billing:email", "bogdan.popa@reea.net");
    $this->type("id=billing:postcode", "8081");
    
    
    
     for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("id=s_method_matrixrate_matrixrate_4")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=s_method_matrixrate_matrixrate_4");
   
   
    $this->click("xpath=(//button[@type='button'])[7]");

    $this->waitForPageToLoad("30000");
  }
}
?>