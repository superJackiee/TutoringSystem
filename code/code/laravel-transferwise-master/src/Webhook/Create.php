<?php

namespace TransferWise\Webhook;


use TransferWise\TransferWiseAbstract;

/**
*  Example Request
curl -X POST https://api.transferwise.com/v1/subscriptions/ \
-H "Authorization: Bearer <your api token>" \
-H "Content-Type: application/json" \
-d '{
"name": "Webhook Subscription #1",
"channel_id": "WEBHOOK",
"callback_url": "<URL of your server>",
"profile_id": <ID of the profile you want to receive notifications from>,
"enabled_notifications": ["transfers", "balance"]
}'
 */
/**
 * Class Create
 * @package TransferWise\Webhook
 */
class Create extends TransferWiseAbstract {



    static function subscribe() {

    }


}
