<?php

namespace TransferWise\Test\Webhook;

use Tests\TestCase;
use TransferWise\Webhook\Create as WebhookCreate;

class CreateTest extends TestCase
{
    protected $webhook;

    protected function setUp() : void
    {
        parent::setUp();
        $this->webhook = new WebhookCreate();
    }



    function it_tests_if_subscribe_will_register_new_webhook_with_transferwise()
    {
    }


}
