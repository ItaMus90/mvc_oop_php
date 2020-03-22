<?php 

class HomePageCest{

    public function _before(AcceptanceTester $I){
    }

    // tests
    public function defaultResponseTest(AcceptanceTester $I){

        $I->wantTo("Test the response code for the homepage");
        $I->amOnPage("/");
        $I->seeResponseCodeIs(200);
        $I->seeInTitle("Home Page");

    }
}
