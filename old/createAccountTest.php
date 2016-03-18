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

        for ($i = 0; $i < 1; $i++) {

            $this->open("/");
            $this->click("css=#wrapper-account > a > span");
            $this->waitForPageToLoad("30000");
            $this->click("css=div.buttons-set > button.button");
            $this->waitForPageToLoad("30000");
            $this->type("id=firstname", "testname_$i");
            $this->type("id=middlename", "middlename_$i");
            $this->type("id=lastname", "lastname_$i");
            $this->type("id=email_address", "testadress_$i@test.com");
            $this->type("id=password", "testpassword$i");
            $this->type("id=confirmation", "testpassword$i");
            $this->click("css=div.buttons-set > button.button");
            $this->waitForPageToLoad("30000");
            $this->assertTrue($this->isElementPresent("css=div.dashboard"));
            $this->click("css=#wrapper-logout > a > span");
            $this->waitForPageToLoad("30000");
        }
    }
}
?>