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
    $this->click("css=option[value=\"en_US\"]");
    $this->waitForPageToLoad("30000");
    $this->click("css=span.config");
    $this->waitForPageToLoad("30000");
    $this->click("css=a.separator-top. > span.active");
    $this->waitForPageToLoad("30000");

    $this->click("id=trans_email_ident_general-head");
    $this->click("id=trans_email_ident_sales-head");
    $this->click("id=trans_email_ident_support-head");
    $this->click("id=trans_email_ident_custom1-head");
    $this->click("id=trans_email_ident_custom2-head");
    $this->type("id=trans_email_ident_general_email", "bogdan.popa@reea.net");
    $this->type("id=trans_email_ident_sales_email", "bogdan.popa@reea.net");
    $this->type("id=trans_email_ident_support_email", "bogdan.popa@reea.net");
    $this->type("id=trans_email_ident_custom1_email", "bogdan.popa@reea.net");
    $this->type("id=trans_email_ident_custom2_email", "bogdan.popa@reea.net");
    $this->submit("id=config_edit_form");
    $this->waitForPageToLoad("30000");
    $this->click("//ul[@id='system_config_tabs']/li[4]/dl/dd[6]/a/span");
    $this->waitForPageToLoad("30000");
    $this->click("id=contacts_contacts-head");
    $this->click("id=contacts_email-head");
    $this->type("id=contacts_email_recipient_email", "bogdan.popa@reea.net");
    $this->submit("id=config_edit_form");
    $this->waitForPageToLoad("30000");
    $this->click("//ul[@id='system_config_tabs']/li[20]/dl/dd/a/span");
    $this->waitForPageToLoad("30000");
    $this->click("id=sales_general-head");
    $this->click("id=sales_general-head");
    $this->click("id=sales_totals_sort-head");
    $this->click("id=sales_totals_sort-head");
    $this->click("id=sales_reorder-head");
    $this->click("id=sales_reorder-head");
    $this->click("id=sales_identity-head");
    $this->click("id=sales_identity-head");
    $this->click("id=sales_minimum_order-head");
    $this->click("id=sales_minimum_order-head");
    $this->click("id=sales_dashboard-head");
    $this->click("id=sales_dashboard-head");
    $this->click("id=sales_gift_options-head");
    $this->click("id=sales_gift_options-head");
    $this->click("id=sales_msrp-head");
    $this->click("id=sales_msrp-head");
    $this->click("//ul[@id='system_config_tabs']/li[20]/dl/dd[2]/a/span");
    $this->waitForPageToLoad("30000");
    $this->click("id=sales_email_order-head");
    $this->click("id=sales_email_order-head");
    $this->click("id=sales_email_order_comment-head");
    $this->click("id=sales_email_order_comment-head");
    $this->click("id=sales_email_invoice-head");
    $this->type("id=sales_email_invoice_copy_to", "bogdan.popa@reea.net");
    $this->click("id=sales_email_invoice_comment-head");
    $this->submit("id=config_edit_form");
    $this->waitForPageToLoad("30000");
    $this->click("//ul[@id='system_config_tabs']/li[4]/dl/dd[5]/a/span");
    $this->waitForPageToLoad("30000");
    try {
        $this->assertEquals("bogdan.popa@reea.net", $this->getValue("id=trans_email_ident_support_email"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
  }
}
?>