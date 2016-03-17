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
    $this->open("/admin");
    $this->type("id=username", "admin");
    $this->type("id=login", "admin123");
    $this->click("css=input.form-button");
    $this->waitForPageToLoad("30000");
    $this->click("css=a[title=\"schliessen\"] > span");
    $this->select("id=interface_locale", "label=English (United States) / Englisch (Vereinigte Staaten)");
    $this->waitForPageToLoad("30000");
    $this->click("css=span.config");
    $this->waitForPageToLoad("30000");
    $this->click("//ul[@id='system_config_tabs']/li[20]/dl/dd[9]/a/span");
    $this->waitForPageToLoad("30000");
    $this->click("id=payment_wps-head");
    try {
        $this->assertEquals("bogdy2p@gmail.com", $this->getValue("id=payment_wps_required_settings_business_account"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->type("id=payment_express_checkout_required_express_checkout_business_account", "bogdy2p@gmail.com");
    $this->type("id=payment_wps_required_settings_business_account", "bogdy2p@gmail.com");
    $this->click("id=payment_settings_payments_standart_advanced-head");
    $this->select("id=payment_settings_payments_standart_advanced_sandbox_flag", "label=Yes");
    $this->select("id=payment_settings_payments_standart_advanced_debug", "label=Yes");
    $this->submit("id=config_edit_form");
    $this->waitForPageToLoad("30000");
  }
}
?>