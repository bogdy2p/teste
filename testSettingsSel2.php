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

    public function fillBillingAdressForm()
    {

        $sexSelector           = '#billing-new-address-form > fieldset > ul > li:nth-child(1) > div > div.field.name-prefix > div > input[type="radio"]:nth-child(1)';
        sleep(1);
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

        $economyShippingSelector = '#s_method_matrixrate_matrixrate_3';
        $economyShipping         = $this->findElementWaitUntilbyCssPath($economyShippingSelector);
        $economyShipping->click();
    }

    public function testMyTestCase()
    {

        //Access the admin
        $this->url('admin');


        //Fill login form and submit
        $this->byName('login[username]')->value('admin');
        $this->byName('login[password]')->value('admin123');
        $this->byId('loginForm')->submit();

        sleep(1);
        //Close details if exist (Try/Catch)
        try {
            $popUpCloseSelector = '#message-popup-window > div.message-popup-head > a';
            $this->byCssSelector($popUpCloseSelector)->click();
        } catch (Exception $ex) {
            echo "Popup close selector was not found";
        }

        sleep(1);

        //Switch admin language to en_US :
        $languageSelector = $this->byId("interface_locale");
        $this->select($languageSelector)->selectOptionByValue('en_US');

        
        
        sleep(15);
        //Get xpath for the item on the product page , and click it.
//        $xpathForFirstItem = '//*[@id="amshopby-page-container"]/div[3]/ul/li[1]/div/div[1]/a';
//        $this->byXPath($xpathForFirstItem)->click();
//        //Sleep for 1 seconds
//        sleep(1);
//        $superAttributeOptionsPath = "//*[contains(@class, 'super-attribute-select')]";
//        //Initialize path for product options button here:
//        $addToCartSelector = '#product_addtocart_form > div.row > div.product-shop-right.col-sm-4 > div.add-to-box > div.add-to-cart > button';
//
//        try {
//            $selectDiv         = $this->byXPath($superAttributeOptionsPath);
//            $selectDiv->click();
//            $this->keys(Keys::ARROW_DOWN);
//            $this->keys(Keys::ARROW_DOWN);
//            $this->keys(Keys::ENTER);
//            $addToCartSelector = '#product_addtocart_form > div.row > div.product-shop-right.col-sm-4 > div.product-options-bottom > div.add-to-cart > button';
//        } catch (Exception $ex) {
//
//        }
//        sleep(1);
//        //Add selected product (with option if available , to cart)
//        $this->byCssSelector($addToCartSelector)->click();
//        sleep(1);
//
//        $zurKasseSelector = 'body > div.wrapper > div > div.header-container.type4 > div.header.container > div.cart-area > div.mini-cart > div > div > div.actions > a';
//
//        $this->byCssSelector($zurKasseSelector)->click();
//        sleep(1);
//
//        $this->fillBillingAdressForm();
//
//        $this->clickGiftWrapAndWait(10);
        //Click Place Order
//        $checkoutButton = $this->byCssSelector('#checkout-review-submit > button > span > span');
//
//        try {
//            $resultz = $checkoutButton->click();
//        } catch (Exception $ex) {
//            var_dump($ex->getMessage());
//        }
//        //Wait 10 seconds.
//        sleep(15);
//
//        //Assert that the url we were redirected to contains the success.
//        $this->assertContains('onepage/success', $this->url());
    }

    public function tearDown()
    {
        echo "Teardown called";
    }
}
?>