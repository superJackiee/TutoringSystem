# TransferWise PHP Webhook

## Introduction
If you have a (free) [TransferWise](https://transferwise.com) account, you have free access to both:
* an API interface to interact with your account, and
* a Webhook callback to notify you of events/changes in your account.

## Basic Details
In this tutorial, you will learn how to use PHP to:
* Create a webhook that will notify your webserver on deposits (credits), 
* Parse and verify the data passed to your webserver, and
* Use the API to get details of the transaction.

Importantly, all code here is standalone, and does not use Composer to pull in other code. As such it is light-weight and easy to re-use.

## TransferWise 'Issue' (bug?)
Occasionally, when the calllback code queries your TransferWise account and gets the latest statement, the transaction details are not (yet) known and the transaction details look like this:

```
[details] => stdClass Object
        (
            [type] => UNKNOWN
            [description] => No information
        )
```
Here is what TransferWise says about this:

*Current set up of our system though has an issue , the data which populates to statements can be delayed, that is why in some cases you're missing data.*

*The best work around at this moment is to hard code the hold off 1-5 minutes and/or in case of missing data do the delayed retry.* 

*I am in conversations with team, we'll be looking for appropriate solution for this, but can't do an estimate on the time line for it to be delivered*

## Reference Information
* [TransferWise API docs](https://api-docs.transferwise.com/)
* [TransferWise Profile Webhooks](https://api-docs.transferwise.com/#profile-webhooks)

## Requirements
1. A public webserver, responding to https requests on port 443, with a valid HTTPS certificate, and allowing you execute PHP scripts
1. A [TransferWise account](https://transferwise.com/)
1. You have previously installed and tested [TransferWise Simple API PHP Class](https://github.com/robclark56/TransferWise_PHP_SimpleAPIclass)

## Create your PHP Endpoint
1. Login to your webserver
1. Create [TransferWise_callback.php](code/TransferWise_callback.php) on your webserver
1. Edit the CHANGE ME section of `TransferWise_callback.php`

## Test your PHP endpoint
Use your favorite web browser to go to (e.g.): https://your.webserver.domain/TransferWise/TransferWise_callback.php

You should receive an email like this:
```
To: me@my.domain.com
Subject: TransferWise Callback

File: /xxx/TransferWise/TransferWise_callback.php
Signature not verified. Exiting
```

## Create your Webhook
1. Login to your TransferWise account (Note: Webhooks will not be called from sandbox accounts)
1. Goto Settings
1. Click [Create a new webhook]
1. Give it a name and enter the URL of the Webhook end-point you tested in the step above
1. Check **Balance deposit events**
1. Click [Create webhook]
1. Click [Edit webhook]
1. Click [Test webhook]

You should see on the TransferWise acct page:  **Everything looks good!**

You should receive an email as below. 
```
File: /xxx/TransferWise/TransferWise_callback.php

event_type not set

PAYLOAD:
stdClass Object
(
    [message] => this is a test request
)

```

## Test your Webhook
Sandbox accounts do NOT call Webhooks. The only way to fully test the webhook is to cause a real financial payment into your TransferWise account. When that happens you should receive an email something like this:
```
File: /xxx/TransferWise/TransferWise_callback.php

currency=USD
amount=88
senderName=FRED BLOGGS
paymentReference=TEST-1234
```

