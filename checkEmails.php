<?php

require 'specialconfiguration.php';

use WebDriverKeys as Keys;

class CheckEmailsTest extends PHPUnit_Extensions_Selenium2TestCase
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
        // Go-to Configuration page
        $configurationSelector = '#nav > li:nth-child(12) > ul > li:nth-child(21) > a > span';
        $this->byCssSelector($configurationSelector)->click();
        sleep(1);

        $smtpProSelector = '#system_config_tabs > li:nth-child(25) > dl > dd > a';
        $this->byCssSelector($smtpProSelector)->click();
        sleep(10);

        $emailConnectionSelector = '#smtppro_general_option';
        $googleAppsEmailAdressSelector='#smtppro_general_googleapps_email';
        $googleAppsPasswordSelector='#smtppro_general_googleapps_gpassword';
        $log1Selector = '#smtppro_debug_logenabled';
        $log2Selector= '#smtppro_debug_log_debug';

        

        // //Click on Sales -> Payment Methods;
        // $salesPaymentMethodsSelector = '#system_config_tabs > li:nth-child(20) > dl > dd:nth-child(10) > a';
        // $this->byCssSelector($salesPaymentMethodsSelector)->click();
        // sleep(1);
        // //Click on Paypal Paymen Solutions -> Configure
        // $paypalConfigure = '#payment_wps-head';
        // $this->byCssSelector($paypalConfigure)->click();
        
        // $inputEmailSelector = 'payment_wps_required_settings_business_account';
        // $this->assertEquals('bogdy2p@gmail.com', $this->byId($inputEmailSelector)->value());

        // //Click on ADVANCED settings here
        // $this->byId('payment_settings_payments_standart_advanced-head')->click();

        // //Assert that paypal is in SANDBOX MODE.
        // $this->assertEquals('1', $this->byId('payment_settings_payments_standart_advanced_sandbox_flag')->value());
        // //Assert that paypal is in DEBUG MODE
        // $this->assertEquals('1', $this->byId('payment_settings_payments_standart_advanced_debug')->value());
        // sleep(10);
    }
}
