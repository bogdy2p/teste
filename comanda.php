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
            '/de/neuheiten',
        );

        $randomId = rand(0, count($categoriesArray) - 1);




        return $categoriesArray[$randomId];
    }

    public function testMyTestCase()
    {


        //Get a random category
        $randomCategory = $this->getRandomCategoryPath();
        //Access the random category
        $this->url("$randomCategory");
        //Sleep for 2 seconds
        sleep(2);

        //Get xpath for the item on the product page , and click it.
        $xpathForFirstItem = '//*[@id="amshopby-page-container"]/div[3]/ul/li[1]/div/div[1]/a';
        $this->byXPath($xpathForFirstItem)->click();
        //Sleep for 5 seconds
        sleep(1);


        $superAttributeOptionsPath = "//*[contains(@class, 'super-attribute-select')]";


        //Initialize path for product options button here:
        $addToCartSelector = '#product_addtocart_form > div.row > div.product-shop-right.col-sm-4 > div.add-to-box > div.add-to-cart > button';

        try {
            $selectDiv = $this->byXPath($superAttributeOptionsPath);
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
        
        sleep(3);

//        $options = $this->byId('attribute153')->size();
//       $test =  $this->select($options)->se();
//        var_dump($selectDiv);

//        sleep(5);
//        product-options-wrapper
//
//
//
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