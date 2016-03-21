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

    public function testMyTestCase()
    {

        //Access the admin
        $this->url('admin');


        //Fill login form and submit
        $this->byName('login[username]')->value('admin');
        $this->byName('login[password]')->value('admin123');
        $this->byId('loginForm')->submit();

//        sleep(1);
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

        //Click on general -> store email adresses;

        $storeEmailAdressesSelector = '#system_config_tabs > li:nth-child(4) > dl > dd:nth-child(6) > a';
        $this->byCssSelector($storeEmailAdressesSelector)->click();

        //Click on each of the 5 links to expand email settings
        $email_fields = array(
            'trans_email_ident_general-head',
            'trans_email_ident_sales-head',
            'trans_email_ident_support-head',
            'trans_email_ident_custom1-head',
            'trans_email_ident_custom2-head'
        );

        foreach ($email_fields as $emailfield) {
            $this->byId($emailfield)->click();
//            sleep(1);
        }

        //Assert that store emails are set to bogdan.popa@reea.net

        $email_inputs = array(
            'trans_email_ident_general_email',
            'trans_email_ident_sales_email',
            'trans_email_ident_support_email',
            'trans_email_ident_custom1_email',
            'trans_email_ident_custom2_email'
        );

        foreach ($email_inputs as $email_input_field) {
            $this->assertEquals('bogdan.popa@reea.net',
                $this->byId($email_input_field)->value(),"$email_input_field has wrong value!");
        }

        sleep(2);

        $generalContactsSelector = '#system_config_tabs > li:nth-child(4) > dl > dd:nth-child(7) > a';
        $this->byCssSelector($generalContactsSelector)->click();

        $contacts_fields = array(
            'contacts_contacts-head',
            'contacts_email-head'
        );

        foreach ($contacts_fields as $contactsfield) {
            $this->byId($contactsfield)->click();
            sleep(1);
        }

        $contacts_inputs = array(
            'contacts_email_recipient_email'
        );

        foreach ($contacts_inputs as $contacts_input) {
            $this->assertEquals('bogdan.popa@reea.net',
                $this->byId($contacts_input)->value(),"$contacts_input has wrong value!");
        }

        sleep(1);
        //Go to SALES->Sales Emails tab.

        $salesSalesEmailsSelector = '#system_config_tabs > li:nth-child(20) > dl > dd:nth-child(3) > a';
        $this->byCssSelector($salesSalesEmailsSelector)->click();

        $salesEmailInvoiceID = 'sales_email_invoice-head';
        //Check if sales email invoice tab is open // If not open , open it !
         if (!$this->byId('sales_email_invoice_copy_to')) {
                $this->byId($salesEmailInvoiceID)->click();
            }
       
        sleep(1);
        $this->assertEquals('bogdan.popa@reea.net', $this->byId('sales_email_invoice_copy_to')->value(),'Sales invoice copy to has wrong value!');
        sleep(1);
    }

    public function tearDown()
    {
        echo "Teardown called";
    }
}
?>