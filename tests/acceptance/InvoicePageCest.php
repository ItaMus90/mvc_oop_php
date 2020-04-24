<?php 

class InvoicePageCest{

    public function _before(AcceptanceTester $I){
    }

    /**
     * @param AcceptanceTester $I
     *
     * @group invoice
     */
    public function invoiceListTest(AcceptanceTester $I){

        $I->wantTo("Test the response code for Invoice list page");
        $I->amOnPage('/invoice');
        $I->canSee('This is a invoice');
        $I->seeResponseCodeIs(200);

    }

    /**
     * @param AcceptanceTester $I
     *
     * @group invoice
     * @group invoice-get-by-id
     */
    public function invoiceTest(AcceptanceTester $I){

        $I->wantTo("Test the response code for Invoice");
        $I->amOnPage('/invoice/123');
        $I->canSee('This is a invoice with the ID of 123');
        $I->seeResponseCodeIs(200);

    }

    /**
     * @param AcceptanceTester $I
     *
     * @group invoice
     * @group invoice-not-found
     */
    public function pageNotFoundTest(AcceptanceTester $I){

        $I->wantTo("Test the response code for Invoice");
        $I->amOnPage('/invoice/aaa/edit/ddd');
        $I->seeResponseCodeIs(404);

    }

}
