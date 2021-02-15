<?php
namespace TransferWise\Test;


use GuzzleHttp\Client;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use TransferWise\Recipient;
use TransferWise\Test\Traits\Mocks;

class RecipientTest extends TestCase {
    use DatabaseMigrations;

    /** @var Recipient */
    protected $recipient;

    protected function setUp(): void {
        parent::setUp();
        $this->recipient = new Recipient(factory(User::class)->create());
    }

    /** @test */
    public function it_tests_if_type_can_be_set() {
        $type = 'indian';

        $this->assertTrue(method_exists($this->recipient, 'setType'));

        $this->recipient->setType($type);
        $this->assertEquals($type, $this->recipient->_type);
    }

    /** @test */
    public function it_tests_if_currency_can_be_set() {
        $currency = 'INR';

        $this->assertTrue(method_exists($this->recipient, 'setCurrency'));
        $this->recipient->setCurrency($currency);
        $this->assertEquals($currency,$this->recipient->_currency);
    }

    /** @test */
    public function it_tests_if_legalType_can_be_set() {
        $legalType = 'PRIVATE';

        $this->assertTrue(method_exists($this->recipient, 'setLegalType'));
        $this->recipient->setLegalType($legalType);
        $this->assertEquals($legalType, $this->recipient->_legalType);
    }

    /** @test */
    public function it_tests_if_bank_account_can_be_set() {
        $accountDetails = [
            'accountNumber' => '1234567890',
            'ifscCode' => 'KKBK000000'
        ];

        $this->assertTrue(method_exists($this->recipient, 'setBankAccount'));

        $this->recipient->setBankAccount($accountDetails);
        $this->assertEquals($accountDetails, $this->recipient->_bankAccount);
    }

    /** @test */
    public function it_tests_if_fullName_can_be_set() {
        $fullName = 'John J Doe';

        $this->assertTrue(method_exists($this->recipient, 'setFullName'));

        $this->recipient->setFullName($fullName);
        $this->assertEquals($fullName, $this->recipient->_fullName);
    }

    /** @test */
    public function it_tests_if_user_can_be_set() {
        $user = factory(User::class)->create();

        $this->assertTrue(method_exists($this->recipient, 'setUser'));
        $this->recipient->setUser($user);

        $this->assertTrue($user->is($this->recipient->_user));
    }

    /** @test */
    public function it_tests_if_recipient_can_be_saved() {
        $this->assertTrue(method_exists($this->recipient, 'save'));

        $responseMock = ['user' => 5466311];

        $mock = $this->getHttpMock($responseMock);

        $user = factory(User::class)->create();

        $recipient = new Recipient($user, $mock);

        $response = $recipient
                ->setType('indian')
                ->setFullName('John J Doe')
                ->setLegalType('PRIVATE')
                ->setCurrency('INR')
                ->setBankAccount([
                    'ifscCode' => 'KKBK0000000',
                    'accountNumber' => '123454678990'
                ])
                ->save();
        $this->assertEquals($responseMock, $response);
    }

    public static function getHttpMock($response) {
        $responseMock = json_encode($response);

        $mockedContentsResponse = \Mockery::mock(Client::class)
            ->shouldReceive('getContents')
            ->once()
            ->andReturn($responseMock)
            ->getMock();

        $mockedResponse = \Mockery::mock(Client::class)
            ->shouldReceive('getBody')
            ->once()
            ->andReturn($mockedContentsResponse)
            ->getMock();

        $mock = \Mockery::mock(Client::class)
            ->shouldReceive('request')
            ->once()
            ->andReturn($mockedResponse)
            ->getMock();
        return $mock;
    }

}
