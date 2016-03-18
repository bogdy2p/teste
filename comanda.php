<?php

use WebDriverKeys as Keys;

class ExampleTest extends PHPUnit_Extensions_Selenium2TestCase
{

    public function setUp()
    {

        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowser("firefox");
        $this->setBrowserUrl("http://simulate.com/");
    }

    public function getRandomCategoryPath()
    {

        $categoriesArray = array(
            '/de/fur-sie',
            '/de/fur-ihn',
            '/de/fur-paare',
            '/de/dessous',
            '/de/drogerie',
            '/de/sale',
            '/de/lovebox',
            // '/de/neuheiten',
        );
        $randomId        = rand(0, count($categoriesArray) - 1);
        return $categoriesArray[$randomId];
    }

    public function findElementWaitUntilbyCssPath($elementCssPath)
    {
        $this->waitUntil(function() use($elementCssPath) {
            if ($this->byCssSelector($elementCssPath)) {
                return true;
            }
            return null;
        }, 10000);
        try {
            $object = $this->byCssSelector($elementCssPath);
            return $object;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function testMyTestCase()
    {


        //Get a random category
        $randomCategory    = $this->getRandomCategoryPath();
        //Access the random category
        $this->url("$randomCategory");
        //Sleep for 2 seconds
//        sleep(2);
        //Get xpath for the item on the product page , and click it.
        $xpathForFirstItem = '//*[@id="amshopby-page-container"]/div[3]/ul/li[1]/div/div[1]/a';
        $this->byXPath($xpathForFirstItem)->click();
        //Sleep for 1 seconds
        sleep(1);


        $superAttributeOptionsPath = "//*[contains(@class, 'super-attribute-select')]";


        //Initialize path for product options button here:
        $addToCartSelector = '#product_addtocart_form > div.row > div.product-shop-right.col-sm-4 > div.add-to-box > div.add-to-cart > button';

        try {
            $selectDiv         = $this->byXPath($superAttributeOptionsPath);
            $selectDiv->click();
            $this->keys(Keys::ARROW_DOWN);
            $this->keys(Keys::ARROW_DOWN);
            $this->keys(Keys::ENTER);
            $addToCartSelector = '#product_addtocart_form > div.row > div.product-shop-right.col-sm-4 > div.product-options-bottom > div.add-to-cart > button';
        } catch (Exception $ex) {

        }
        sleep(1);
        //Add selected product (with option if available , to cart)
        $this->byCssSelector($addToCartSelector)->click();
        sleep(1);

        //Zur Kasse Xpath
        //    /html/body/div[2]/div/div[2]/div[2]/div[1]/div[3]/div/div/div[2]/a
        //Zur Kasse Selector:
        $zurKasseSelector = 'body > div.wrapper > div > div.header-container.type4 > div.header.container > div.cart-area > div.mini-cart > div > div > div.actions > a';

        $this->byCssSelector($zurKasseSelector)->click();
        sleep(1);

        $form = $this->byId("opc-address-form-billing");


        $sexSelector           = '#billing-new-address-form > fieldset > ul > li:nth-child(1) > div > div.field.name-prefix > div > input[type="radio"]:nth-child(1)';
        sleep(1);
        //Click option 1 for MALE.
        $this->byCssSelector($sexSelector)->click();
        sleep(1);
        $this->byName('billing[firstname]')->value('FirstnameValueHere');
        $this->byName('billing[lastname]')->value('LastnameValueHere');
        $this->byName('billing[street][]')->value('StreetValueHere');
        $this->byName('billing[postcode]')->value('8085');
        sleep(1);
        $this->byName('billing[city]')->value('CityName');
        sleep(1);
        $this->byName('billing[email]')->value('bogdan.popa@reea.net');
        sleep(1);
        $this->byName('billing[use_for_shipping]')->value('1');
        sleep(1);
        $paymentMethodSelector = '#p_method_banktransfer';
        $this->byCssSelector($paymentMethodSelector)->click();
        sleep(5);

//        sleep(10);
        $economyShippingSelector = '#s_method_matrixrate_matrixrate_3';
        $economyShipping         = $this->findElementWaitUntilbyCssPath($economyShippingSelector);
        $economyShipping->click();
//        $this->byCssSelector($economyShippingSelector)->click();


        $giftWrapCssSelector = '#opc-review-block > div.product-giftwrap > ul > li > div > input';

        $giftwrapInput = $this->findElementWaitUntilbyCssPath($giftWrapCssSelector);
        $giftwrapInput->click();



//        ->click();

        sleep(10);


//        sleep(10);
//        //        $items = $this->byClassName('item');
//
//        if($items){
//            echo "\n";
//            echo count($items);
//            echo "\n";
//
//            var_dump($items);
//            echo "WE HAVE FOUND ITEMS \n";
//        }
//        $element = $this->byId('search')->value('justtesting');
//        $form = $this->byId('search_mini_form')->submit();
        //        $this->deleteAllVisibleCookies();
//        $javascriptCode = 'alert("Hellow");';
//        $searchbox = $this->byId('search')->click();
//        $this->execute(array(
//            'script' => $javascriptCode,
//            'args' => array()
//        ));
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
        echo "Teardown called";
//        $this->stop();
    }
}
?>