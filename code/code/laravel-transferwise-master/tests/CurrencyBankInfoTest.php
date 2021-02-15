<?php
namespace TransferWise\Test;

use Tests\TestCase;
use TransferWise\CurrencyBankInfo;

class CurrencyBankInfoTest extends TestCase {

    /** @test */
    public function it_tests_if_it_returns_a_currency_info()
    {
        $currency = 'INR';

        $response = CurrencyBankInfo::get($currency);
        $this->assertContains('ifscCode', array_keys($response['details']));
    }

    /** @test */
    public function it_tests_if_a_currency_is_supported()
    {
        $this->assertTrue(CurrencyBankInfo::isSupported('INR'));
        $this->assertFalse(CurrencyBankInfo::isSupported('SOM')); // just something fake :)
    }

    /** @test */
    public function it_tests_if_with_country_name_it_returns_banking_information()
    {
        $country = 'india';
        $response = CurrencyBankInfo::get($country);
        $this->assertContains('ifscCode', array_keys($response['details']));
    }
}
