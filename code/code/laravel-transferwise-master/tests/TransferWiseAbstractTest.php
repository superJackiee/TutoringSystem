<?php
namespace TransferWise\Test;

use App\User;
use http\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TransferWise\TransferWiseAbstract;

class TransferWiseAbstractMock extends TransferWiseAbstract {
}

class TransferWiseAbstractTest extends TestCase {
	use DatabaseMigrations;

	protected $instance;

    protected function setUp(): void
    {
        parent::setUp();
        $this->instance = new TransferWiseAbstractMock;
    }

    /** @test */
    public function it_tests_if_http_connection_is_default_to_unirest_http_client_if_null_provided() {
    	$this->assertTrue(method_exists($this->instance, 'getHttpClient'));
        $ins = new TransferWiseAbstractMock();
        $httpClient = $ins->getHttpClient();
        $this->assertInstanceOf(Client::class, $httpClient);
    }

    /** @test */
    public function it_tests_if_http_connection_is_set_with_mock_if_provided() {
        $this->assertTrue(method_exists($this->instance, 'getHttpClient'));

        $httpClient = $this->instance->getHttpClient();
        $this->assertInstanceOf(Client::class, $httpClient);
    }

    /** @test */
    public function it_tests_if_api_token_can_be_set() {
        $token = 'test-token';
        $this->assertTrue(method_exists($this->instance, 'setApiToken'));
        $this->instance->setApiToken($token);
        $this->assertEquals('test-token', $this->instance->_apiKey);
    }

    /** @test */
    public function it_tests_if_transferwise_credentials_are_getting_setup() {
        $this->assertEquals(env('TRANSFERWISE_API_KEY'), $this->instance->_apiKey);
    }




}
