<?php

namespace TransferWise\Test;


use Tests\TestCase;
use TransferWise\Webhook;

class WebhookTest extends TestCase
{

    protected $webhook;

    protected function setUp() : void
    {
        parent::setUp();
        $this->webhook = new Webhook();
    }

    /** @test */
    function it_should_subscribe_for_event()
    {
        $response = $this->webhook
            ->setCallbackUrl('https://remoteanalyticsjobs.com')
            ->setProfileId('12345')
            ->setChannelId('WEBHOOK')
            ->setSubscriptionType(['transfers'])
            ->subscribe();
        dd($response);
    }

    /** @test */
    function it_should_unsubscribe()
    {
        $response = $this->webhook->unsubscribe('1234');
        dd($response);
    }

    /** @test */
    function it_should_list_all_subscriptions()
    {
        $response = $this->webhook->list();
        dd($response);
    }

    /** @test */
    function it_should_get_subscription_by_id()
    {
        $response = $this->webhook->getById('1235');
        dd($response);
    }




}
