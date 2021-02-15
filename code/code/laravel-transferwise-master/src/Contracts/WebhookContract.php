<?php

namespace TransferWise\Contracts;


interface WebhookContract
{
    public function subscribe();

    public function unsubscribe(string $subscriptionId);

    public function list();

    public function getById(string $subscriptionId);
}
