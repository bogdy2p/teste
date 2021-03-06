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

    public function testMyTestCase()
    {
        //Access the admin
        $this->url('admin');
        
        //Fill login form and submit
        $this->byName('login[username]')->value('admin');
        $this->byName('login[password]')->value('admin123');
        $this->byId('loginForm')->submit();

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
        $systemMenuSelector = '#nav > li:nth-child(12) > a > span';
        $this->byCssSelector($systemMenuSelector)->click();
        //Go-to Configuration page
        $configurationSelector = '#nav > li:nth-child(12) > ul > li:nth-child(21) > a > span';
        $this->byCssSelector($configurationSelector)->click();
        //Click on Sales -> Payment Methods;
        $salesPaymentMethodsSelector = '#system_config_tabs > li:nth-child(20) > dl > dd:nth-child(10) > a';
        $this->byCssSelector($salesPaymentMethodsSelector)->click();
        sleep(1);

        $paymillPriv = 'payment_paymill_private_key';
        $paymillPub = 'payment_paymill_public_key';
        $paymillDebug = 'payment_paymill_debugging_active';
        $paymillLog = 'payment_paymill_logging_active';

        $this->assertEquals('4c3f99c00461b79d5f7afb9a8976ee92', $this->byId($paymillPriv)->value(),'Pamill private key is not correctly set to testing !');
        $this->assertEquals('9876206115299d35297777008cc48c01', $this->byId($paymillPub)->value(),'Pamill public key is not correctly set to testing !');
        $this->assertEquals('1', $this->byId($paymillDebug)->value(),'Pamill Debug is ON !');
        $this->assertEquals('1', $this->byId($paymillLog)->value(),'Pamill Log is not ON!');

        sleep(10);
    }
}