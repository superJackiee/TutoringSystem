# Payouts Guide
Welcome to the TransferWise payouts API documentation. 
Before you start coding, please take few moments to review some important information about TransferWise and our API.

## Getting started
### 1. Learn about TransferWise. 
TransferWise and its borderless account features and pricing are best explained below.

[https://transferwise.com/gb/borderless/pricing](https://transferwise.com/gb/borderless/pricing)

### 2. Sign up for your TransferWise account, activate your borderless account, and complete verification.
Using the product before integrating with our API will help you understand how our payment flow works. 
Just follow these four steps. 

* Sign up for your TransferWise account [https://transferwise.com/gb/borderless](https://transferwise.com/gb/borderless). 

* Complete verification – you need to do this before you start your technical integration. Also ensure you’re compliant with our [Terms and Conditions](https://transferwise.com/terms-and-conditions) and [Acceptable Use Policy](https://transferwise.com/gb/legal/acceptable-use-policy-eea). Also make sure two-step log in is set up.

* Activate at least one currency in your borderless account, deposit small amount (via card or bank transfer) and setup your first payment. 
This penny-testing is not mandatory of course, but we do recommended it so you will understand how TransferWise payment flow works.   

* Verify that our coverage includes your currency route(s). Check [Supported Currencies](https://transferwise.com/help/article/1569835/basic-information/supported-currencies).
Please note that there are few restrictions for businesses, please review [Restricted Business Routes](https://transferwise.com/help/article/2319498/business/restricted-business-routes)

* Please note that our Fixed Rate functionality is intended to provide time for customers to send funds to TransferWise, while holding the rate for them. TransferWise is not a trading platform and the Fixed Rate functionality is automatically disabled if abusive behaviour (such as multiple transfer creation and selective completion) is detected.

### 3. Choose the best tool for you

You don’t necessarily need to integrate with the API to make a large number of payouts. We have two ways you can do it: 

* *Batch payments.* Create and send up to 1,000 transfers with just one payment using our [Batch Payments tool](https://transferwise.com/batch). All you need to do is fill a CSV file with all the transfer details, upload it to TransferWise, and pay for the batch. No development effort needed. 

* *API integration.* Completely automate your payment process by sending payment orders via the TransferWise API.  

## API access

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/profiles \
     -H "Authorization: Bearer xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxx"
```

### Authentication

Sign up for a developer account and get your personal API token for our sandbox. [https://sandbox.transferwise.tech/register](https://sandbox.transferwise.tech/register)

NB! Two factor authentication (2FA) code for sandbox login is `111111`.

Your developer account will have some test money that you can use to start making payments in same way as you would in a live environment. You can get your API tokens in the Settings tab of your account page. 

Add your API token as header parameter to every request like this:

```Authorization: Bearer xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxx```

### Acquiring your API token

Your API tokens section can be found at the bottom of the Settings page inside your TransferWise account.
By default, you have no active tokens. You can issue new tokens after enabling 2-step login.

We support tokens of two permission levels:

* **Read only** - List and show transfers, recipients and balances
* **Full access** - Create, manage and fund transfers

Issue a Read only token unless you specifically need the capabilities of Full access. Token permission level
can be changed after issuance. The lifetime of the token is 10 years.

### Keeping your API token safe

Your API tokens should be guarded closely. They represent your identity and authorization and can be used to interact
with your TransferWise account on your behalf. Whoever has access to your token can access your account details
and history. In the case of a *Full access* token, they can also send transfers.
Once you obtain an API token from us, it is on you to keep it safe.

Below is technical advise and guidance on how to protect your tokens. Not everything may apply to the application you
are building and the goal is not to provide a long checklist of things to do. Rather, we attempt to provide
generic guidance and best-practices, to send you in the right direction. You will have to do additional research and
consider the specific technology and purpose of your application.

**Source code**

> Don't store API tokens as plaintext files in Git

```bash
$ git clone https://github.com/mycompany/myapp.git
$ cat myapp.git/apiconfig.json
{
  "token": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxx",
  "url": "api.transferwise.com"
}
```

A common mistake made by engineers is storing access tokens in source code, in plaintext - which is then shared in a
version control system, sometimes publicly. 

When an API token is stored like this, it can be accessed and used by
anyone who has access to the source code. Avoid storing secrets in code.

Instead:

- Use [environment variables](https://12factor.net/config) to pass secrets into your application. You can configure them in your web server
  settings, startup script or platform-specific tools such as Docker or Kubernetes.
- If your deployment platform has a dedicated mechanism for [storing secrets](https://kubernetes.io/docs/concepts/configuration/secret/),
  use it
- Use a [configuration file](https://www.npmjs.com/package/dotenv#should-i-commit-my-env-file) that is excluded
  from your version control. It can be created manually, or put into the deployment server by automated tools.
  Make sure the file can only be read by your web application

> Limit permissions of a sensitive configuration file

```bash
$ cp .env.sample .env
$ echo .env >> .gitignore
$ chown myapp:root .env && chmod 600 .env
```

**Token lifecycle**

If you suspect that your token has leaked, revoke and rotate it.
If you accidentally push a token to a remote public repository, rotate it. Quickly deleting an access token from VCS
might not be enough - remember that VCS stores historical changes, is distributed and might have automation assigned to
new pushes.

Revoke old tokens that you no longer need or use.

During the lifetime of an active token, limit the amount of people and systems who can access it. E-mail inboxes and chat
logs are archived and not a secure place to hold tokens. Ideally, your access token would live only in TransferWise
systems and your production system(s) that actually need it. You do not need to hold a backup copy of the token,
as you can reveal an existing token from your profile settings page.

**Encryption**

TransferWise API is using HTTPS with `>=TLS 1.2`. Non-encrypted HTTP connections are not accepted.
Do not connect to our API with unencrypted HTTP, as this will transmit your access token in plaintext over the network.


> Verifying certificates in client code

```php
<?php
// Secure - this will fail when an invalid HTTPS certificate is returned.
// Such failure is not normal and most likely means there is something
// in-between you and TransferWise, intercepting communications.
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, 'https://api.transferwise.com');


// Insecure - do not do this. This will not validate certificates and
// might leak your access token to an attacker.
// See https://curl.haxx.se/libcurl/c/CURLOPT_SSL_VERIFYPEER.html
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_URL, 'https://api.transferwise.com');
```

Validate certificates. You should not proceed with a connection when you receive a certificate validation error from
TransferWise. Make sure all parts of your application are using encryption and HTTPS and failing when certificate
validation fails.

**Application design**

Secure your application against common security flaws ([OWASP Top 10](https://www.owasp.org/index.php/Top_10-2017_Top_10)).
Think how an attacker could leverage Unrestricted File Upload or Insecure Direct Object Reference to read the contents
of your server's environment or config files.

If your application is larger, consider extracting TransferWise-specific functionality into a separate middleware or
service layer. This would enable you to move API tokens there, separate from the main application.

Do not store the token in user-accessible code such as browser-side JavaScript or Android apps that can be decompiled.
The token should always live server-side, exposing domain-logic via API-s.

If you need to pass the token around via HTTP requests, use HTTP headers or POST body - do not store the token in URI
or query parameters. Web servers usually log the URL and browsers pass it between websites via the Referrer header.

### Limiting token access by IP

You can enhance your integration security by only allowing certain IP addresses to use your API token.

Typically, you would integrate with our API from a set number of fixed IP addresses.
Restricting access from all other IPs will make it harder to misuse your API token, should it ever leak.
IP whitelisting does not protect against cases where several clients egress from the same whitelisted IP
(shared external IP for the office network, an egress proxy in front of all of your servers).

Each token can be limited to single IP addresses, a set of IP addresses or entire IP ranges.
You can do this in the API token edit view.

Please note:

* IP addresses should use only IPv4 format e.g. `192.168.100.14`
* IP ranges should use [CIDR notation](https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing#CIDR_notation) e.g. 
`192.168.100.0/24` which would include `192.168.100.0` up to `192.168.100.255`
* You can authorize multiple discrete IP-s or IP ranges for one token

If a request is being made using an IP address that is not in the whitelisted IP addresses,
the server will respond with a [401 Unauthorized HTTP status code](https://tools.ietf.org/html/rfc7235#page-6).

## Strong customer authentication

**NB** The following will be enforced starting from October 1, 2020. Please see the testing section 
below on how to prepare your integration.

There are some actions such as funding a transfer from your balance or viewing the statement that require additional 
authentication.

In those cases a [403 Forbidden HTTP status code](https://tools.ietf.org/html/rfc7231#section-6.5.3) is returned 
together with a one-time token (OTT) value which needs to be signed and the resulting signature included in the retry 
of the original request.

We use a digital signature scheme based on public-key cryptography. It involves creating a
signature using a private key on the client side and verifying the signature authenticity on
the server side using the corresponding public key the client has uploaded.

To call the endpoints requiring additional authentication:

* Create a key pair consisting of a public and a private key
* Upload the public key to TransferWise
* Set up response handling to retry with the signed OTT

**Creating the key pair**

> Keys can be generated with the [OpenSSL](https://www.openssl.org/) toolkit:

```bash
$ openssl genrsa -out private.pem 2048
$ openssl rsa -pubout -in private.pem -out public.pem
```

The following requirements apply:

* The cryptographic algorithm has to be RSA
* The key length has to be at least 2048 bits
* The public key should be stored in PEM file format using a `.pem` file extension

**Managing uploaded public keys**

The public keys management page can be accessed via the "Manage public keys" button under the API tokens section 
of your TransferWise account settings.

You will be prompted to perform 2FA when uploading new public keys.

The maximum number of public keys you can store is limited to 5.

**Signing the data**

We will only accept the signatures created with *SHA256 with RSA* (SHA256 hash of the data is signed with RSA) algorithm.
There are different ways of creating the required digital signature, for example:

> The shell one-liner to sign a string, encode it with Base64 and print to standard output:

```bash
$ printf '<string to sign>' | openssl sha256 -sign <path to private key.pem> | base64 -w 0
```

* OpenSSL

    The CLI toolkit command is `openssl sha256 -sign private.pem data.bin` 
    (consult the openssl man pages for additional info if required).
    Note that the signature returned by OpenSSL (to standard output in the example above) is in binary format and to 
    send it over HTTP it should be encoded to [Base64](https://en.wikipedia.org/wiki/Base64)  (RFC 4648)).
    
    There is also an extensive [C API](https://www.openssl.org/docs/manmaster/man3/) available.

* Our [reference implementation Java library](https://github.com/transferwise/digital-signatures)
   
**Detailed workflow**

> Here is a step-by-step workflow with example commands 
> (which may vary slightly depending on the exact versions of utilities used).

> 1\. Client performs a request:

```bash
$ curl -i -X POST 'https://api.sandbox.transferwise.tech/v3/profiles/{profileId}/transfers/{transferId}/payments' \
       -H 'Content-Type: application/json' \
       -H 'Authorization: Bearer <your api token>' \
       -d '{"type": "BALANCE"}'
```

> 2\. Client receives the response indicating that strong authentication is required:

```
HTTP/1.1 403 Forbidden
Date: Fri, 03 Jan 2020 12:34:56 GMT
Content-Type: application/json;charset=UTF-8
x-2fa-approval-result: REJECTED
x-2fa-approval: be2f6579-9426-480b-9cb7-d8f1116cc8b9
...
{
    "timestamp": "2020-01-03T12:34:56.789+0000",
    "status": 403,
    "error": "Forbidden",
    "message": "You are forbidden to send this request",
    "path": "/v3/profiles/{profileId}/transfers/{transferId}/payments"
}
```

> 3\. Client signs the one-time token from the response using OpenSSL:

```bash
$ printf 'be2f6579-9426-480b-9cb7-d8f1116cc8b9' | openssl sha256 -sign private.pem | base64 -w 0
1ZCN1MIDdmonOJvNQvsCxRHMXihsqZ/xNvybhb3oYNQgRkyj2P0hCVVaWUbr313LicFGwRTW8kcxTwvpXQdeurGtcN2zGoweVTopI06dmJ8vQMfTkrqjMZG3UUX0EcU+tJaDlBemvS7gv2aNGyHDMiRPZOZRPA6TH0LPJvLdVRMsEbXrbj8HqEopczmf1jChRxftmg2XoeQUMhhlOiSjSbJmlyAIegioI40/BTii+Q7f/HWZqk6N2vmHWPomwHQMz8Hy6frLYJb5tchjg/i+RRvZjEVbUH53QfG8Tbmx4JM/wN1LYeR8rebSdGEpLOd8QRcjuDur54qHNWXvKRM8aQ==
```

> with `private.pem` private key:

```
-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEA3qfjPkhbTPKJQqLm+KfHP14wJ2U318Rh/4TV8xLi605xFW7r
ApzXzLLxBb7zSkBc9wFIEH7wU7/BaFivg440R7ktYR07/QXZi+i0grKbfhEBW1nU
jkI2eZxT3vE4VIK7Yt2jr84JiCYmjL2b/w1DatXZM9Xoa3j9YHda5cKLOfCCIeTs
I3beYI9UmSnidYaXpX7q4gfHME+A/1F/19L8jFvX+c7MXapdCdY/NUHXBCJFfBzg
OBlXbPKhdjtEnx+Hg5Sq/Frsld6dKwF1CDMO96YoeXBdi58JkLL/CLyy1i7UcXTb
SRy0Gbd3NWSAamWdpJDDg51UR6yRJdXjtnhpdQIDAQABAoIBAGs3/4bzgvvH428y
UPU2ng0WxyuBY2XEzMgl6H04AAv95xjCI+tLKeQJ22S/8ho0alALzu8aoZJCydj8
s/Au32AWfRLB6CxMz9i+w4YYiiYn/DZISMIEgoUHUaAPGugfWCsgvf0fw5lLfc7S
U7d7ZJaiyghbHqP6TFFSyHPRvge0so+8eRvPMxIGdfJR3gagJqKB5JbTGAnQ5Kn2
eb5flDOobmCfpLDfIYH9u94Yj671xymtNYXwWxic4gA+aqWJKaqkI8JL7bFdjvjn
Jer5RHeXmY9UZtDhSrZWSEKniw3m02QPpgqhhhPr8xToNA/7G1/P9994fuDKKnRk
edn3FEECgYEA8iTPuaNGswyx/3zCkOPHHu82CSoWRZQapegN0YoXKsCyEWcHgQJV
jZlF39OK14+y4PWWPJ3AlkhrchAJbUbgpw0P+G1uiRmXVpqcaEI4xIFd8oSOG+Vr
s06YZYUrb7C73mi8x3sXdOpmehMYdnSbuxrRXyk0MwpLO2PkC0wXzEUCgYEA62WY
RuZMAHR4PEZA+sDBG6XzjZGw1QQvF7H6u+JOfgPbRgZ+NnLQ/ZpYiDvrJGqAp1B1
NIj69zVBN0p7PuRg2v9I4tHlmWC4eyYnVCf3dM6Fhsyb7RC3MHXVNOErxRoHVNqL
4iywSUnboJyvdyKc7S5wQ5gdM14HogD/i1FHs3ECgYBMuMcsfYRgJOydE82eFN25
ene3jaNC5ntPB+ig9M0EWcvR4cAp6zBqTh8qnR9Hz5sQ1h+FE0K7GzUYDea+vg9e
PrBJuXqla/tckF5wVlMgSBEZT1CrnBR02rlEqV4q5GeSP8NYvTKgc8iGc1hz59yT
+xpNuYN1jJRru+m8fp6ntQKBgQDd7Iglv5TDkQqR+MHmJbdpM4lsXIBUM3+aXUc/
vtm1YDlnyVNQTerOTKdOuP609FuaYfY9sy63xVNYpzWOU40kqiyy+qP1eAQ0xgGq
C4v2aYXlUh1m4K10WILLOcYkKqfiza+3ad5BGgqfX1jlfpJn4bIhZ9WPygR0LXC+
jcCFYQKBgQCelF/LIocwZ1ZW/Cx2OqMi/lkI56nLeBl7jRNiBSNIs0deN0cw4sHp
BN9459NojAKBKJK1pyqajzrHae66V+8/2Zz2/gmTK1dDjznyw6TZmV3QyHTFhUtY
NI7wvIG9K8gFaoSiGD/OLlLRaGiAdejKBsBx2hK73M58YQsgqIpdIQ==
-----END RSA PRIVATE KEY-----
```

> 4\. Client repeats the initial request with the addition of the one-time token and the signature headers:

```bash
$ curl -i -X POST 'https://api.sandbox.transferwise.tech/v3/profiles/{profileId}/transfers/{transferId}/payments' \
       -H 'Content-Type: application/json' \
       -H 'Authorization: Bearer <your api token>' \
       -H 'x-2fa-approval: be2f6579-9426-480b-9cb7-d8f1116cc8b9' \
       -H 'X-Signature: RjXBO5SpAuMGdgTyqPryOt8AyIKY0t5gHqj36MzR2UwH9SvSY1V1wKIQCqXRvLMLyWBGXDkLvv9JdAni+H87k3hsClRiyfpdzcg3uOP+d/jSagNDSjHixPh4/rWQh+eEhBRo4V+pPBH+r5APtIwFY/fvvdMbZ/QnnmcPHxi/t7uS7+qvRZCC17q47T0ZpSwEK9x+nG/wcJ4S4Yrk0E2yQlLz8F35C+E2gt/KGTt6Tf5z6GonM1H2gJWoHpxuOUomh09b/k3teLjIfEirWmnO2XuOe0oDCUH8i10dokzk+QrM4t/Yv/Rb18JvTeugDAKMydGo7KTgqKGCXZauicX0Ew==' \
       -d '{"type": "BALANCE"}'
```

> 5\. Client receives the processed response with authentication status `APPROVED`:

```
HTTP/1.1 200 OK
Date: Fri, 03 Jan 2020 12:34:56 GMT
Content-Type: application/json;charset=UTF-8
x-2fa-approval-result: APPROVED

{
  "type": "BALANCE",
  "status": "COMPLETED",
  "errorCode": null
}
```

1. Client makes a request which requires strong authentication.
2. The request is declined with HTTP status `403 / Forbidden` with the following response headers 
  * `X-2FA-Approval-Result`: `REJECTED`
  * `X-2FA-Approval` containing the one-time token (OTT) value which is what needs to be signed
3. Client signs the OTT with the private key corresponding to a public key previously uploaded for 
signature verification.
4. Client repeats the initial request with the OTT provided in the `X-2FA-Approval` request header and the signed OTT in 
the `X-Signature` request header.  

Note: as the name implies, a one-time token can be used only once. If it was successfully processed then further 
requests with the same token signature will be rejected.

### Testing ###
By default in our [sandbox environment](https://sandbox.transferwise.tech) strong customer authentication is 
disabled. You can enable it for your account on the [public keys management page](https://sandbox.transferwise.tech/public-keys).

The option for toggling the check yourself will also be available in production as long as it is optional.

### TEST and LIVE environments

* You can access the Sandbox API at [https://api.sandbox.transferwise.tech](https://api.sandbox.transferwise.tech)
* The LIVE API is located at [https://api.transferwise.com](https://api.transferwise.com)

**Please note** Sandbox environment is limited. We do not send any emails from it as well as transfer processing is not simulated. 
Please consider [Simulation endpoints](https://api-docs.transferwise.com/#simulation) to change transfer state after funding. 

## Get your profile id

> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/profiles \
     -H "Authorization: Bearer <your api token>"
```

> Example Response:

```json
[
  {
    "id": 217896,
    "type": "personal",
    "details": {
      "firstName": "Oliver",
      "lastName": "Wilson",
      "dateOfBirth": "1977-07-01",
      "phoneNumber": "+3725064992",
      "avatar": "https://lh6.googleusercontent.com/-XzeFZ2PJE1A/AAAAAAAI/AAAAAAAAAAA/RvuvhXFsqs0/photo.jpg",
      "occupation": null,
      "primaryAddress": 236532
    }
  },
  {
    "id": 220192,
    "type": "business",
    "details": {
      "name": "ABC Logistics Ltd",
      "registrationNumber": "12144939",
      "acn": null,
      "abn": null,
      "arbn": null,
      "companyType": "LIMITED",
      "companyRole": "OWNER",
      "descriptionOfBusiness": "Information and communication",
      "primaryAddress": 240402,
      "webpage": "https://abc-logistics.com"
    }
  }
]
```

You only need to call this endpoint once to obtain your user profile id.
Your personal and business profiles have different IDs. Profile id values are required when making payouts. 

It’s recommended to always provide profileId when you’re creating new resources later (Create Quote, Create Recipient Account, Create Transfer). 
If you omit profileId then resource will by default belong to your personal profile. This might not be your intention, as you most probably want to execute transfers under your business profile.

### Request

**`GET https://api.sandbox.transferwise.tech/v1/profiles`**

### Response

Personal Profile Fields

Field                   | Description | Format
---------               | -------               | -----------
id                      | Personal profile id   | Integer
type                    | Profile type          | Text
details.firstName       | Person first name     | Text
details.lastName        | Person last name      | Text
details.dateOfBirth     | Date of birth         | "yyyy-mm-dd"
details.phoneNumber     | Phone number          | Text
details.avatar          | Link to avatar image  | Text
details.occupation      | Occupation            | Text
details.primaryAddress  | Address object id     | Integer 

Business Profile Fields

Field | Description | Format
--------- | ------- | -----------
id                              | Business profile id                             | Integer
type                            | Profile type                                    | Text
details.name                    | Business name                                   | Text
details.registrationNumber      | Business registration number                    | Text
details.acn                     | ACN (only applicable for Australian business)   | Text
details.abn                     | ABN (only applicable for Australian business)   | Text
details.arbn                    | ARBN (only applicable for Australian business)  | Text
details.companyType             | Company legal type                              | Text
details.companyRole             | Person's role in the company                    | Text
details.descriptionOfBusiness   |  Business description                           | Text
details.primaryAddress          |  Address object id                              | Integer
details.webpage                 |  Webpage URL                                    | Text

## Create quote

> Example Request:

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/quotes \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "source": "EUR",
          "target": "GBP",
          "rateType": "FIXED",
          "targetAmount": 600,
          "type": "BALANCE_PAYOUT"
        }'
```

> Example Response:

```json
{
    "id": 10451930,
    "source": "EUR",
    "target": "GBP",
    "sourceAmount": 663.84,
    "targetAmount": 600.00,
    "type": "BALANCE_PAYOUT",
    "rate": 0.9073,
    "createdTime": "2018-08-27T14:35:44.553Z",
    "createdByUserId": <your user id>,
    "profile": <your profile id>,
    "rateType": "FIXED",
    "deliveryEstimate": "2018-08-27T14:35:44.496Z",
    "fee": 2.34,
    "allowedProfileTypes": [
        "PERSONAL",
        "BUSINESS"
    ],
    "guaranteedTargetAmount": false,
    "ofSourceAmount": true
}
```

There are four steps to execute payouts: 

**Step 1: Create a quote**

Step 2: Create a recipient account

Step 3: Create a transfer

Step 4: Fund a transfer

<br/>
Quote fetches current mid-market exchange rate that will be used for your transfer. Quote also calculates our fee and estimated delivery time.  

### Request
**`POST https://api.sandbox.transferwise.tech/v1/quotes`**

Field                 | Description                                   | Format
---------             | -------                                       | -----------
profile               | Personal or business profile id               | Text
source                | Source(send) currency code                          | Text
target                | Target(receive) currency code                          | Text
rateType              | Always use constant 'FIXED'                   | Text
targetAmount          | Amount in target currency                     | Decimal
sourceAmount          | Amount in source currency. <br/>Either sourceAmount or targetAmount is required, never both.   | Decimal
type                  | 'BALANCE_PAYOUT' for payments <br/> 'BALANCE_CONVERSION' for conversion between balances | Text

### Response
Quote id is needed for creating transfers in step 3.

Field                 | Description                                   | Format
---------             | -------                                       | -----------
id                    | Quote id                                      | Integer
source                | Source(send) currency code                    | Text
target                | Target(receive) currency code                 | Text
sourceAmount          | Amount in source currency                     | Decimal
targetAmount          | Amount in target currency                     | Decimal
type                  | Quote type                                    | Text
rate                  | Exchange rate value                           | Decimal
createdTime           | Quote created timestamp                       | Timestamp
createdByUserId       | Your used id                                  | Integer
profile               | Personal or business profile id               | Integer
rateType              | Always 'FIXED'                                | Text
deliveryEstimate      | Estimated timestamp when recipient would receive funds, assuming transfer will be created now. | Timestamp
fee                   | TransferWise fee in source currency for this payment (deducted from source amount).                   | Decimal
allowedProfileTypes   | PERSONAL, BUSINESS or both. Specifies which legal entities can use this quote. There are a few currency routes that we don’t support for business customers yet. | Text
guaranteedTargetAmount| Not relevant for fixed rate quotes. Please ignore. | Boolean
ofSourceAmount        | Not relevant for fixed rate quotes. Please ignore. | Boolean

## Create recipient account
> Example Request (Create GBP recipient):

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/accounts \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "currency": "GBP", 
          "type": "sort_code", 
          "profile": <your profile id>, 
          "accountHolderName": "Ann Johnson",
          "legalType": "PRIVATE",
           "details": { 
              "sortCode": "231470", 
              "accountNumber": "28821822" 
           } 
         }'
```

> Example Response (Create GBP recipient):
```json
{
    "id": 31273058,
    "profile": <your profile id>, 
    "accountHolderName": "Ann Johnson",
    "type": "sort_code", 
    "country": "GB", 
    "currency": "GBP",
    "details": {
        "accountNumber": "28821822",
        "sortCode": "231470"
    }
}
```

There are four steps to execute payouts: 

Step 1: Create a quote

**Step 2: Create a recipient account**

Step 3: Create a transfer

Step 4: Fund a transfer

<br/>
Recipient is a person or institution who is the ultimate beneficiary of your payment. 

Recipient bank account details are different for different currencies. For example, you only need to know the IBAN number to send payments to most European and Nordic countries. 
But in order to send money to Canada, you’d need to fill out four fields: You recipient’s institution number, transit number, account number, and account type.

A UK GBP example is provided here. You can find other currency examples in [Recipient Accounts](#recipient-accounts) section below.  

### Request

**`POST https://api.sandbox.transferwise.tech/v1/accounts`**

Field                 | Description                                   | Format
---------             | -------                                       | -----------
currency              | 3 character currency code                     | Text
type                  | Recipient type                                | Text
profile               | Personal or business profile id               | Integer
accountHolderName     | Recipient full name                           | Text
legalType             | Recipient legal type: PRIVATE or BUSINESS     | Text
details               | Currency specific fields   | Group
details.sortCode      | Recipient bank sort code (GBP example)        | Text
details.accountNumber | Recipient bank account no (GBP example)       | Text

### Response
Recipient id is needed for creating transfers in step 3.

Field                 | Description                                   | Format
---------             | -------                                       | -----------
id                    | recipientAccountId                            | Integer
profile               | Personal or business profile id               | Integer
acccountHolderName    | Recipient full name                           | Text
currency              | 3 character country code                      | Text
country               | 2 character currency code                     | Text
type                  | Recipient type                                | Text
details               | Currency specific fields   | Group 
details.sortCode      | Recipient bank sort code (GBP example)        | Text
details.accountNumber | Recipient bank account no (GBP example)       | Text

### Send money to email recipient
If you don't know your recipient’s bank account details, you can still send money using their email address. You need to set up **email recipient** and then  TransferWise  will collect bank details directly from your recipient. 

When you set up the transfer, we’ll email your recipient a secure link to collect their bank account details. 
Once your recipient provides their bank account details to us, we’re able to complete your transfer.

See below under [Recipient Accounts.Create Email Recipients](#recipient-accounts-create-email-recipient) for more details.

## Create transfer
> Example Request:

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/transfers \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "targetAccount": <recipient account id>,   
          "quote": <quote id>,
          "customerTransactionId": "<the unique identifier you generated for the transfer attempt>",
          "details" : {
              "reference" : "to my friend",
              "transferPurpose": "verification.transfers.purpose.pay.bills",
              "sourceOfFunds": "verification.source.of.funds.other"
            } 
         }'
```

> Example Response:

```json
{
    "id": 468956,
    "user": <your user id>,
    "targetAccount": <recipient account id>,
    "sourceAccount": null,
    "quote": <quote id>,
    "status": "incoming_payment_waiting",
    "reference": "to my friend",
    "rate": 0.9065,
    "created": "2018-08-28 07:43:55",
    "business": <your business profile id>,
    "transferRequest": null,
    "details": {
        "reference": "to my friend"
    },
    "hasActiveIssues": false,
    "sourceCurrency": "EUR",
    "sourceValue": 661.89,
    "targetCurrency": "GBP",
    "targetValue": 600,
    "customerTransactionId": "bd244a95-dcf8-4c31-aac8-bf5e2f3e54c0"
}
```

There are four steps to execute payouts: 

Step 1: Create a quote

Step 2: Create a recipient account

**Step 3: Create a transfer**

Step 4: Fund a transfer

<br/>
A transfer is a payout order you make to a recipient account based on a quote. Once created, a transfer will need to be funded within the next 14 days (7 days for [email transfers](#recipient-accounts-create-email-recipient)) or it’ll automatically get cancelled.  

### Request

**`POST https://api.sandbox.transferwise.tech/v1/transfers`**

Field                          | Description                                   | Format
---------                      | -------                                       | -----------
targetAccount                  | Recipient account id. You can create multiple transfers to same recipient account.   | Integer
quote                          | Quote id. You can only create one transfer per one quote. <br/>You cannot use same quote ID to create multiple transfers. | Integer
customerTransactionId     | This is required to perform idempotency check to avoid duplicate transfers in case of network failures or timeouts.                          | Text
details.reference (optional)    | Recipient will see this reference text in their bank statement. Maximum allowed characters depends on the currency route. Read the [Business Payments Tips](https://transferwise.com/help/article/2348295/business/business-payment-tips) article for more information. | Text
details.transferPurpose (conditionally required)| For example when target currency is THB. See more about conditions at [Transfers.Requirements](#transfers-requirements)  | Text
details.sourceOfFunds (conditionally required) | For example when target currency is USD and transfer amount exceeds 10k. See more about conditions at [Transfers.Requirements](#transfers-requirements) | Text

There are two options to deal with conditionally required fields: <br/>
<ul>
 <li>Always provide values for these fields</li>
 <li>Always call transfers-requirements endpoint and submit values only if indicated so</li>
</ul>

### Response
You need to save the transfer id for tracking its status later.

Field                     | Description                                   | Format
---------                 | -------                                       | -----------
id                        | Transfer id                                   | Integer
user                      | Your user id                                  | Integer
targetAccount             | Recipient account id                          | Integer
sourceAccount             | Not used                                      | Integer
quote                     | Quote id                                      | Integer
status                    | Transfer current status | Text
reference                 | Deprecated, use details.reference instead     | Text
rate                      | Exchange rate value                           | Decimal
created                   | Timestamp when transfer was created | Timestamp 
business                  | Your business profile id                     | Integer
transferRequest           | Not used   | Integer
details.reference         | Payment reference text        | Text
hasActiveIssues           | Are there any pending issues which stop executing the transfer?  | Boolean 
sourceCurrency            | Source currency code   | Text
sourceValue               | Transfer amount in source currency   |  Decimal
targetCurrency            | Target currency code  | Text
targetValue               | Transfer amount in target currency   | Decimal
customerTransactionId     | Unique identifier assigned by customer. Used for idempotency check purposes.  | Text 

### Avoiding duplicate transfers
We use **customerTransactionId** field to avoid duplicate transfer requests. 
When your first call fails (error or timeout) then you should use the same value in **customerTransactionId** field that you used in the original call when you are submitting a retry message. 
This way we can treat subsequent retry messages as **repeat messages** and will not create duplicate transfers to your account. 

## Fund transfer
> Example Request:

```shell
curl -X POST https://api.sandbox.transferwise.tech/v3/profiles/{profileId}/transfers/{transferId}/payments \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "type": "BALANCE"   
         }'
```

> Example Response:

```json
{
  "type": "BALANCE",
  "status": "COMPLETED",
  "errorCode": null
}
```

There are four steps to execute payouts: 

Step 1: Create a quote

Step 2: Create a recipient account

Step 3: Create a transfer

**Step 4: Fund a transfer**

<br/>
This API call is the final step for executing payouts. TransferWise will now debit funds from your borderless account balance and start processing your transfer. 
If your borderless balance is short of funds then this call will fail with "insufficient funds" error.

Initial developer account has by default plentiful funds available for EUR, USD, GBP, and AUD.  
You can add new currencies to your account via the user interface: [https://sandbox.transferwise.tech](https://sandbox.transferwise.tech)

You can then top up your new currencies by converting funds from other currencies.

**NB!**: This endpoint is subject to [additional authentication requirements]
(#payouts-guide-strong-customer-authentication). There are scenarios where those could be 
bypassed, such as:

* the recipient of the transfer is marked as trusted on the website
* the profile you are sending from is in one of the following countries:
  * United States
  * Canada
  * Australia
  * New Zealand
  * Singapore

Unless you are sending to a small number of recipients who you trust, it is recommended to 
implement the referenced measures for your integration.

### Request

**`POST https://api.sandbox.transferwise.tech/v3/profiles/{profileId}/transfers/{transferId}/payments`**

Use transfer id that you obtained in previous step. 

Field          | Description                                   | Format
---------      | -------                                       | -----------
type           | "BALANCE".  <br/>This indicates that your transfer will be funded from your borderless account balance. | Text

### Response

You need to save transfer id for tracking its status later.

Field                 | Description                                                        | Format
---------             | -------                                                            | ---------
type                  | "BALANCE"                                                          | Text
status                | "COMPLETED" or "REJECTED"                                          | Text
errorCode             | Failure reason. For example "balance.payment-option-unavailable"   | Text   

## Get transfer delivery time 

> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/delivery-estimates/{transferId} \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
{
   "estimatedDeliveryDate" : "2018-01-10T12:15:00.000+0000"
}
```

Get the live delivery estimate for a transfer by the transfer ID. 
The delivery estimate is the time at which we currently expect the transfer to arrive in the beneficiary's bank account. 
This is not a guaranteed time, but we’re working hard to make these estimates as accurate as possible.

### Request

**`GET https://api.sandbox.transferwise.tech/v1/delivery-estimates/{transferId}`** 

### Response

You need to save the transfer id to track its status later.

Field                     | Description             | Format
---------                 | -------                 | -----------
estimatedDeliveryDate     | Estimated time when funds will arrive to recipient's bank account  | Timestamp

## Track transfer status

> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/transfers/{transferId} \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
{
    "id": 468956,
    "user": <your user id>,
    "targetAccount": <recipient account id>,
    "sourceAccount": null,
    "quote": <quote id>,
    "status": "outgoing_payment_sent",
    "reference": "to my friend",
    "rate": 0.9065,
    "created": "2018-08-28 07:43:55",
    "business": <your business profile id>,
    "transferRequest": null,
    "details": {
        "reference": "to my friend"
    },
    "hasActiveIssues": false,
    "sourceCurrency": "EUR",
    "sourceValue": 661.89,
    "targetCurrency": "GBP",
    "targetValue": 600,
    "customerTransactionId": "bd244a95-dcf8-4c31-aac8-bf5e2f3e54c0"
}

```   

You can check your latest transfer status by polling this endpoint. You can use [webhooks](#profile-webhooks) to get notified about transfer status updates. Normal state flow of transfers: 

**Incoming Payment Waiting ⇒ Processing ⇒ Funds Converted ⇒ Outgoing Payment Sent**

Outgoing Payment Sent is the final state of the normal flow. If the payment fails, the problematic flow will continue. An example would be if the recipient bank account doesn’t exist or is entered wrong and the payment is returned. Problematic state flow of transfers: 

**Outgoing Payment Sent ⇒ Bounced Back ⇒ Funds Refunded**

Most bounce backs occur within 2-3 business days. However, to be on the safe side, we advise you to check the transfer status for potential bounce backs for 2 weeks. 

<br/>

**Transfer state flow**

![alt text](https://i.ibb.co/4ZrY3HB/transfer-flow.png "Transfer state flow")

<!---
@startuml
hide empty description
skinparam backgroundColor transparent
skinparam shadowing false
skinparam ArrowColor MidnightBlue
skinparam StateBackgroundColor GostWhite
skinparam StateBorderColor SlateGrey
skinparam StateFontColor MidnightBlue

state incoming_payment_waiting
state waiting_recipient_input_to_proceed
state processing
state funds_converted
state outgoing_payment_sent
state cancelled
state funds_refunded
state bounced_back
state charged_back
state unknown

incoming_payment_waiting -down-\> waiting_recipient_input_to_proceed
incoming_payment_waiting -down-\> processing
incoming_payment_waiting -right-\> cancelled

waiting_recipient_input_to_proceed -right-\> processing
waiting_recipient_input_to_proceed -right-\> cancelled

processing -down-\> funds_converted
processing -right-\> cancelled

funds_converted -down-\> outgoing_payment_sent
funds_converted -right-\> bounced_back

outgoing_payment_sent -right-\> bounced_back

bounced_back -left-\> outgoing_payment_sent
bounced_back -up-\> funds_refunded

cancelled -down-\> funds_refunded

funds_refunded -down-\> bounced_back
@enduml
-->

See below for the full list of transfer statuses and what they mean in the order of occurrence:

* **incoming_payment_waiting** –You have submitted a transfer and it’s waiting for funding.

* **waiting_recipient_input_to_proceed** – This status is only used for “send money to email” transfers. It means we’re waiting for your recipient to fill in their bank details so we can continue processing your transfer.

* **processing** – We have receive your funds and are processing the transfer. Processing is a generic term and means we’re doing behind-the-scene activities before the money gets to your recipient, like AML, compliance, and fraud checks.

* **funds_converted** – All compliance checks have been completed with your transfer and funds have been converted from source (your) currency to target (your recipient’s) currency.

* **outgoing_payment_sent** – This means TransferWise has paid out funds to your recipient. This is the final state of the transfer, assuming funds will not be returned. When a transfer has this state it doesn’t mean the money has arrived in your recipient’s bank account. 
Note: Payment systems in different countries operate in different speeds and frequency. For example, in the UK, the payment will reach your recipient bank account within few minutes after we have sent the outgoing payment. However, in Eurozone and US, it usually takes a day until funds are available.

* **cancelled** – This status is used when the transfer you created was not funded and therefore never processed. This is a final state of the transfer.

* **funds_refunded** – Transfer has been refunded. This is a final state of the transfer.

* **bounced_back** – Transfer has bounced back but has not been cancelled nor refunded yet. This is not a final transfer state, it means the transfer will either be delivered with delay or it will turn to funds_refunded state.

* **charged_back** - This status is used when we have problem to debit payer's account or payer requested money back. Chargeback can happen from any other state.

* **unknown** - This status is used when we don’t have enough information to move the transfer into a final state. We send out an email for more information. e.g. Sender account details to refund money back.


Keep in mind the transfer statuses in our API have different names than what you’ll see on our website or app. That’s because we use more  consumer friendly language in the front end of our products. 
For example "Completed" on our website means "outgoing_payment_sent" in the API. 

<br/><br/>
**Sandbox limitations**

We don't send out email notifications about payment status changes in sandbox.

We don't process payments in sandbox, which means that created payments remain in their first state. You can use [Simulation](#simulation) endpoints to change transfer statuses in sandbox.

## Check account balance

> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/borderless-accounts?profileId={profileId} \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
[
    {
        "id": 64,
        "profileId": <your profile id>,
        "recipientId": 13828530,
        "creationTime": "2018-03-14T12:31:15.678Z",
        "modificationTime": "2018-03-19T15:19:42.111Z",
        "active": true,
        "eligible": true,
        "balances": [
            {
                "balanceType": "AVAILABLE",
                "currency": "GBP",
                "amount": {
                    "value": 10999859,
                    "currency": "GBP"
                },
                "reservedAmount": {
                    "value": 0,
                    "currency": "GBP"
                },
                "bankDetails": null
            },
            {
                "balanceType": "AVAILABLE",
                "currency": "EUR",
                "amount": {
                    "value": 9945236.2,
                    "currency": "EUR"
                },
                "reservedAmount": {
                    "value": 0,
                    "currency": "EUR"
                },
                "bankDetails": null
            }
        ]
    }
]
```  

Get available balances for all activated currencies in your account.

### Request

**`GET https://api.sandbox.transferwise.tech/v1/borderless-accounts?profileId={profileId}`**

Use profile id obtained earlier to make this call.

### Response

Field                             | Description                                   | Format
---------                         | -------                                       | -----------
id                                | borderlessAccountId                         | Integer
profileId                         | Personal or business profile id               | Integer
recipientId                       | Recipient id you can use for borderless top up payment order  | Integer
creationTime                      | Date when balance account was opened                     | Timestamp
modificationTime                  | Date when balance account setup was modified            | Timestamp
active                            | Is borderless account active or inactive       | Boolean
eligible                          | Ignore                                         | Boolean
balances[n].balanceType              | AVAILABLE                                     | Text
balances[n].currency                 | Currency code      | Text
balances[n].amount.value             | Available balance in specified currency       | Decimal
balances[n].amount.currency          | Currency code       | Text
balances[n].reservedAmount.value     | Reserved amount from your balance | Decimal
balances[n].reservedAmount.currency  | Reserved amount currency code       | Text
balances[n].bankDetails              | Your borderless account bank details       | Group

## Get account statement

> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v3/profiles/{profileId}/borderless-accounts/{borderlessAccountId}/statement.json?
currency=EUR&intervalStart=2018-03-01T00:00:00.000Z&intervalEnd=2018-03-15T23:59:59.999Z&type=COMPACT \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
{
  "accountHolder": {
    "type": "PERSONAL",
    "address": {
      "addressFirstLine": "Veerenni 24",
      "city": "Tallinn",
      "postCode": "12112",
      "stateCode": "",
      "countryName": "Estonia"
    },
    "firstName": "Oliver",
    "lastName": "Wilson"
  },
  "issuer": {
    "name": "TransferWise Ltd.",
    "firstLine": "56 Shoreditch High Street",
    "city": "London",
    "postCode": "E1 6JJ",
    "stateCode": "",
    "country": "United Kingdom"
  },
  "bankDetails": null,
  "transactions": [
    {
      "type": "DEBIT",
      "date": "2018-04-30T08:47:05.832Z",
      "amount": {
        "value": -7.76,
        "currency": "EUR"
      },
      "totalFees": {
        "value": 0.04,
        "currency": "EUR"
      },
      "details": {
        "type": "CARD",
        "description": "Card transaction of 6.80 GBP issued by Tfl.gov.uk/cp TFL TRAVEL CH",
        "amount": {
          "value": 6.8,
          "currency": "GBP"
        },
        "category": "Transportation Suburban and Loca",
        "merchant": {
          "name": "Tfl.gov.uk/cp",
          "firstLine": null,
          "postCode": "SW1H 0TL  ",
          "city": "TFL TRAVEL CH",
          "state": "   ",
          "country": "GB",
          "category": "Transportation Suburban and Loca"
        }
      },
      "exchangeDetails": {
        "forAmount": {
          "value": 6.8,
          "currency": "GBP"
        },
        "rate": null
      },
      "runningBalance": {
        "value": 16.01,
        "currency": "EUR"
      },
      "referenceNumber": "CARD-249281"
    },
    {
      "type": "CREDIT",
      "date": "2018-04-17T07:47:00.227Z",
      "amount": {
        "value": 200,
        "currency": "EUR"
      },
      "totalFees": {
        "value": 0,
        "currency": "EUR"
      },
      "details": {
        "type": "DEPOSIT",
        "description": "Received money from HEIN LAURI with reference SVWZ+topup card",
        "senderName": "HEIN LAURI",
        "senderAccount": "EE76 1700 0170 0049 6704 ",
        "paymentReference": "SVWZ+topup card"
      },
      "exchangeDetails": null,
      "runningBalance": {
        "value": 207.69,
        "currency": "EUR"
      },
      "referenceNumber": "TRANSFER-34188888"
    },
    {
      "type": "CREDIT",
      "date": "2018-04-10T05:58:34.681Z",
      "amount": {
        "value": 9.94,
        "currency": "EUR"
      },
      "totalFees": {
        "value": 0,
        "currency": "EUR"
      },
      "details": {
        "type": "CONVERSION",
        "description": "Converted 8.69 GBP to 9.94 EUR",
        "sourceAmount": {
          "value": 8.69,
          "currency": "GBP"
        },
        "targetAmount": {
          "value": 9.94,
          "currency": "EUR"
        },
        "fee": {
          "value": 0.03,
          "currency": "GBP"
        },
        "rate": 1.147806
      },
      "exchangeDetails": null,
      "runningBalance": {
        "value": 9.94,
        "currency": "EUR"
      },
      "referenceNumber": "CONVERSION-1511237"
    }
  ],
  "endOfStatementBalance": {
    "value": 9.94,
    "currency": "EUR"
  },
  "query": {
    "intervalStart": "2018-03-01T00:00:00Z",
    "intervalEnd": "2018-04-30T23:59:59.999Z",
    "currency": "EUR",
    "accountId": 64
  }
}
```

Get borderless account statement for one currency and for specified time range. 
The period between intervalStart and intervalEnd cannot exceed 469 days (around 1 year 3 month).

### Request

**`GET https://api.sandbox.transferwise.tech/v3/profiles/{profileId}/borderless-accounts/{borderlessAccountId}/statement.json?`**

**`currency=EUR&intervalStart=2018-03-01T00:00:00.000Z&intervalEnd=2018-03-15T23:59:59.999Z&type=COMPACT`**

Field                             | Description                                   | Format
---------                         | -------                                       | -----------
borderlessAccountId                   | Your borderlessAccountId is included in "Check account balance" response as field "id".                        | Integer
currency                              | Currency code              | Text
intervalStart                         | Statement start time in UTC time             | Zulu time. Don't forget the 'Z' at the end. 
intervalEnd                           | Statement start time in UTC time             | Zulu time. Don't forget the 'Z' at the end.
type (optional)                       | COMPACT (default) for a single statement line per transaction. FLAT for accounting statements where transaction fees are on a separate line. | Text

Note that you can also download statements in PDF and CSV formats if you replace statement.json with statement.csv or statement.pdf respectively in the above URL.

**NB!** This endpoint is subject to [additional authentication requirements]
(#payouts-guide-strong-customer-authentication). The additional authentication is 
only required once every 90 days, viewing the statement on the website or in the mobile app counts towards that as well.

### Response

Field                             | Description                                   | Format
---------                         | -------                                       | -----------
accountHolder.type                      | Account holder type: PERSONAL or BUSINESS                        | Text
accountHolder.address.addressFirstLine  | Account holder address street          | Text
accountHolder.address.city              | Account holder address city          | Text
accountHolder.address.postCode          | Account holder address zip code | Text
accountHolder.address.stateCode         | Account holder address state | Text
accountHolder.address.countryName       | Account holder address country | Text
accountHolder.firstName                 | Account holder first name | Text
accountHolder.lastName                  | Account holder last name | Text
issuer.name                             | Account issuer name | Text
issuer.firstLine                        | Account issuer address street | Text
issuer.city                             | Account issuer address city | Text
issuer.postCode                         | Account issuer address zip code | Text
issuer.stateCode                        | Account issuer address state | Text
issuer.country                          | Account issuer address country | Text
bankDetails              | Your borderless account bank details       | Group
transactions[n].type                 | DEBIT or CREDIT              | Text
transactions[n].date                 | Time of transaction           | Zulu time
transactions[n].amount.value                 | Transaction amount           | Decimal
transactions[n].amount.currency                 | Transaction currency code             | Text
transactions[n].totalFees.value                 | Transaction fee amount           | Decimal
transactions[n].totalFees.currency                 | Transaction fee currency code             | Text
transactions[n].details.type                 | CARD, CONVERSION, DEPOSIT, TRANSFER, MONEY_ADDED, INCOMING_CROSS_BALANCE, OUTGOING_CROSS_BALANCE, DIRECT_DEBIT              | Text
transactions[n].details.description                 | Human readable explanation about the transaction           | Text
transactions[n].details.amount.value                 | Amount in original currency (card transactions abroad)              | Decimal
transactions[n].details.amount.currency                 | Original currency code              | Text
transactions[n].details.sourceAmount.value                 | Amount in source currency (conversions)              | Decimal
transactions[n].details.sourceAmount.currency                 | Source currency code              | Text
transactions[n].details.targetAmount.value                 | Amount in target currency (conversions)              | Decimal
transactions[n].details.targetAmount.currency                 | Target currency code              | Text
transactions[n].details.fee.value                 | Conversion fee amount             | Decimal
transactions[n].details.fee.currency                 | Conversion fee currency code              | Text
transactions[n].details.rate                 | Conversion exchange rate            | Decimal
transactions[n].details.senderName                 | Deposit sender name                | Text
transactions[n].details.senderAccount              | Deposit sender bank account details                  | Text
transactions[n].details.paymentReference                 | Deposit payment reference text                  | Text
transactions[n].details.category             |  Card transaction category                 | Text
transactions[n].details.merchant.name             |  Card transaction merchant name                 | Text
transactions[n].details.merchant.firstLine             |  Merchant address street          | Text
transactions[n].details.merchant.postCode             |  Merchant address zip code                 | Text
transactions[n].details.merchant.city             | Merchant address city                 | Text
transactions[n].details.merchant.state             | Merchant address state              | Text
transactions[n].details.merchant.country            | Merchant address country                 | Text
transactions[n].details.merchant.category             |  Merchant category                 | Text
transactions[n].exchangeDetails.forAmount.value             |  Currency exchange amount                | Decimal
transactions[n].exchangeDetails.forAmount.currency             |  Currency code                 | Text
transactions[n].exchangeDetails.rate             | Exchange rate                 | Decimal
transactions[n].runningBalance.value             | Running balance after the transaction   | Decimal
transactions[n].runningBalance.currency             |  Running balance currency code                | Text
transactions[n].referenceNumber            |TransferWise assigned unique transaction reference number | Text
endOfStatementBalance.value                | Closing balance for specified time period   | Decimal
endOfStatementBalance.currency             | Closing balance currency code | Text
query.intervalStart                | Query parameter repeated             | Zulu time
query.intervalEnd                | Query parameter repeated                 | Zulu time
query.currency                | Query parameter repeated          | Text
query.accountId                | Query parameter repeated         | Integer


## Create topup order

> Step 1 - Create quote for topup:

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/quotes \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "source": "EUR",
          "target": "EUR",
          "rateType": "FIXED",
          "targetAmount": 6000,
          "type": "REGULAR"
         }'
```


> Step 2 - Find out your balance recipient account id:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/borderless-accounts?profileId={profileId} \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
[
    {
        "id": 64,
        "profileId": <your profile id>,
        "recipientId": <your balance recipient account id>,
        ...
   }
]
```

> Step 3 - Create transfer for topup:

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/transfers \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "targetAccount": <recipient account id fetched in step 2>,   
          "quote": <quote id from step 1>,
          "customerTransactionId": "<the unique identifier you generated for the transfer attempt>",
          "details" : {
              "reference" : "optional text to identify your topup order"
            } 
         }'
```


There are 2 different ways you can send funds to your borderless account:

1) Simply send domestic bank transfer from your bank account to **your borderless account details** (IBAN / SortCode-AccountNo). There is no need to setup a topup order in this case.

2) Create a topup order and then send corresponding amount via domestic or international bank transfer to **TransferWise escrow bank account details**.

You can obtain escrow account details from your account manager.

This option is usually used when you are sending funds via international (swift) transfers.
 
Setting up a topup order is similar to setting up a regular transfer. Some minor changes are documented below. 



### 1. Create topup quote

**`POST https://api.sandbox.transferwise.tech/v1/quotes`**

Same way as described in [Create quote](#transferwise-payouts-guide-create-quote) but use quote type REGULAR:



### 2. Find out your balance recipient account id

**`GET https://api.sandbox.transferwise.tech/v1/borderless-accounts?profileId={profileId}`**

Call [Check account balance](#transferwise-payouts-guide-check-account-balance) endpoint and fetch **recipientId** field value from the response.

This recipientId will not change, so you just need to fetch it once and then you can re-use the same value for all topup orders.



### 3. Create topup transfer (order)

**`POST https://api.sandbox.transferwise.tech/v1/transfers`**

As last step you now need to create a transfer (topup order). This is same call as described in [Create transfer](#transferwise-payouts-guide-create-transfer).

Use the value fetched in previous step in **targetAccount** field.

All done. 



## Going live checklist

### 1. Make your integration bulletproof
  * Implement basic retry mechanism to handle potential failures or network interruptions 
  * Implement duplicate prevention mechanism to avoid duplicate payments. Verify that  unique identifier is generated for each individual payment and that its value is kept the same in case of retrying.
  * Implement basic logging to help out in debugging and problem solving, if needed.
  * Check that you can handle all possible transfer states during polling of transfer info.
  * Automatically check available balance before submitting requests to fund your transfers. This avoids rejections due to insufficient balance.
  * Verify that your borderless account statement includes all the information you need for financial accounting. 

### 2. Open LIVE account
  * Sign up for your TransferWise account and go through the onboarding flow, including the 2FA setup. Make sure your borderless account and balances are activated. 

### 3. Set up security for LIVE environment
  * Get your live API token from Settings page. 
  * Store your live API token securely in your production servers so that only authorized members of your team have access to it. 
  
### 4. Do penny testing in LIVE
  * Make a small deposit into your borderless account. 
  * Make few small value test payments via LIVE API before you start executing larger transfers.
  * All set. Switch it on.

### 5. Sign up for API status notifications.
  * You can always track our API status [here](https://status.transferwise.com/).
  * Also you can [sign up](http://eepurl.com/geU_O2) for API status notifications.
