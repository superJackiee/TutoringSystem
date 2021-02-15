<?php

namespace TransferWise;

use TransferWise\Contracts\WebhookContract;

/**
 * Class Webhook
 * @package TransferWise
 */
class Webhook extends TransferWiseAbstract implements WebhookContract {

    /**
     * It will hold name of the webhook you are creating
     * @var string
     */
    protected $name;

    /**
     * It will be webhook always
     * @var string
     */
    protected $channel_id;

    /**
     * The url of your server where your code will be triggered for certain
     * events
     * @var string
     */
    protected $callback_url;

    /**
     * profile id for which you are interested to listen events
     * @var string
     */
    protected $profile_id;

    /**
     * holds types of subscription
     * @var array
     */
    protected $subscriptionType;

    /**
     * list of allowed subscription
     * @var array
     */
    protected $allowed_subscription = ['transfers', 'balance'];

    /**
     * @param string $channelId
     * @return Webhook
     */
    public function setCallbackUrl(string $channelId) : Webhook
    {
        $this->callback_url = $channelId;
        return $this;
    }

    /**
     * @param string $profileId
     * @return Webhook
     */
    public function setProfileId(string $profileId) : Webhook
    {
        $this->profile_id = $profileId;
        return $this;
    }

    /**
     * @param string $channelId
     * @return Webhook
     */
    public function setChannelId(string $channelId) : Webhook
    {
        $this->channel_id = $channelId;
        return $this;
    }

    /**
     * @param array $options
     * @return Webhook
     * @throws \Exception
     */
    public function setSubscriptionType(array $options) : Webhook
    {
        $this->_validateSubscriptionTypes($options, $this->allowed_subscription);
        $this->subscriptionType = $options;
        return $this;
    }

    /**
     * @return mixed
     */
    public function subscribe()
    {
        return $this->_httpClient->post('/subscriptions', [
            'channel_id'            => $this->channel_id,
            'profile_id'            => $this->profile_id,
            'enabled_notifications' => $this->subscriptionType,
            'callback_url'          => $this->callback_url
        ]);
    }

    /**
     * @param string $subscriptionId
     * @return mixed
     */
    public function unsubscribe(string $subscriptionId)
    {
        return $this->_httpClient->delete('/subscriptions/'.$subscriptionId);
    }

    /**
     * @return mixed
     */
    public function list()
    {
        return $this->_httpClient->get('/subscriptions?channel_id=webhook');
    }

    /**
     * @param string $subscriptionId
     * @return mixed
     */
    public function getById(string $subscriptionId)
    {
        return $this->_httpClient->get('/subscriptions/'.$subscriptionId);
    }

    /**
     * @param array $options
     * @param array $allowedSubscription
     * @return bool
     * @throws \Exception
     */
    private function _validateSubscriptionTypes(array $options, array $allowedSubscription)
    {
        $allPresent = count(array_intersect($options, $allowedSubscription)) == count($options);
        if (!$allPresent) {
            throw new \Exception('Invalid subscription type provided.');
        }
    }
}
