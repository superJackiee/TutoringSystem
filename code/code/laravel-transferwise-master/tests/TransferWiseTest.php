<?php
namespace TransferWise\Test;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use TransferWise\Quote;
use TransferWise\Test\Utilities\Mocks;
use TransferWise\TransferWise;

class TransferWiseTest extends TestCase {
    use DatabaseMigrations;

    /** @test */
    public function it_tests_if_transferwise_class_is_available_on_user() {
        $user = new User();
        $this->assertTrue(method_exists($user, 'transferWise'));
        $this->assertInstanceOf(TransferWise::class, $user->transferWise());
    }

    /** @test */
    public function it_tests_if_quote_gets_created() {

        $sourceCurrency     = 'USD';
        $recipientCurrency  = 'INR';
        $amount             = '1200'; // in cents. It's $12
        $response = ['user' => 5466311];

        $mock = Mocks::getHttpMock($response);

        $user  = factory(User::class)->create();
        $quote = $user->transferWise($mock)->getQuote($amount, $sourceCurrency, $recipientCurrency);
        $this->assertNotNull($quote['id']);
    }



}


