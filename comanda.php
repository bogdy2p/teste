<?php

class ExampleTest extends PHPUnit_Extensions_Selenium2TestCase
{

    public function setUp()
    {

        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser("firefox");
        $this->setBrowserUrl("http://simulate.com/");

//        var_dump($this);
    }

    public function testMyTestCase()
    {

        $random_postal = rand (1000,9999);


        $this->url("/");
//        $this->deleteAllVisibleCookies();

        $searchbox = $this->byId('search')->click();
        sleep(10);

        

//        $this->click("id=search");
//        $this->click("//li[3]/div/div/div/div/div/ul/li[3]/a/span");
//        $this->waitForPageToLoad("30000");
//        $this->click("id=product-collection-image-147");
//        $this->waitForPageToLoad("30000");
//        $this->click("css=button.button.btn-cart-custom");
//        for ($second = 0;; $second++) {
//            if ($second >= 60) $this->fail("timeout");
//            try {
//                if ($this->isElementPresent("css=p.qty-price")) break;
//            } catch (Exception $e) {
//
//            }
//            sleep(1);
//        }
//
//        $this->click("link=Zur Kasse");
//        $this->waitForPageToLoad("30000");
//        $this->click("name=billing[prefix]");
//        $this->type("id=billing:firstname", "name");
//        $this->type("id=billing:lastname", "lastname");
//        $this->type("id=billing:street1", "streetadress");
//        $this->type("id=billing:postcode", "8080");
//        $this->click("id=p_method_banktransfer");
//        $this->type("id=billing:city", "citiyame");
//        $this->type("id=billing:email", "bogdan.popa@reea.net");
//        sleep(3);
//        $this->type("id=billing:postcode", "$random_postal");
//
////        $billing = $this->byId('billing');
////        $this->moveto($billing);
////
////        $checkout = $this->byId('checkout-review-table-wrapper');
////        $this->moveto($checkout);
//        var_dump($this);
//        for ($second = 0;; $second++) {
//            if ($second >= 60) $this->fail("timeout");
//            try {
//                if ($this->isElementPresent("id=s_method_matrixrate_matrixrate_4"))
//                        break;
//            } catch (Exception $e) {
//
//            }
//            sleep(1);
//        }
//
//        $this->click("id=s_method_matrixrate_matrixrate_4");
//        $this->click("xpath=(//button[@type='button'])[7]");
//        $this->waitForPageToLoad("30000");
    }

    public function tearDown()
    {
//        $this->stop();
    }
}
?>