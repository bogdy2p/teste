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

        $emailConnectionSelector = 'smtppro_general_option';
        $googleAppsEmailAdressSelector='smtppro_general_googleapps_email';
        $googleAppsPasswordSelector='smtppro_general_googleapps_gpassword';
        $log1Selector = 'smtppro_debug_logenabled';
        $log2Selector= 'smtppro_debug_log_debug';

        $this->assertEquals('google', $this->byId($emailConnectionSelector)->value(),'SmtpProEmailConnection not correctly set');
        $this->assertEquals('bogdy2p@gmail.com', $this->byId($googleAppsEmailAdressSelector)->value(),'SmtpProEmail not correctly set');
        $this->assertEquals(THEPASSWORD, $this->byId($googleAppsPasswordSelector)->value(),'SmtpProEmai Password not correctly set');
        $this->assertEquals('1', $this->byId($log1Selector)->value(),'SmtpProEmail Logging1 not correctly set');
        $this->assertEquals('1', $this->byId($log2Selector)->value(),'SmtpProEmail Logging2 not correctly set');

        sleep(2);
    }
}
