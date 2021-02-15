# Recipient Accounts

## Create

> Example Request (Create GBP recipient):

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/accounts \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "currency": "GBP", 
          "type": "sort_code", 
          "profile": <your profile id>,
          "ownedByCustomer": true, 
          "accountHolderName": "Ann Johnson",
           "details": { 
              "legalType": "PRIVATE",
              "sortCode": "231470", 
              "accountNumber": "28821822" 
           } 
         }'

```

> Example Response (Create GBP recipient):

```json
{
    "id": 13967081,
    "business": null,
    "profile": <your profile id>,
    "accountHolderName": "Ann Johnson",
    "currency": "GBP",
    "country": "GB",
    "type": "sort_code",
    "details": {
        "address": {
            "country": null,
            "countryCode": null,
            "firstLine": null,
            "postCode": null,
            "city": null,
            "state": null
        },
        "email": null,
        "legalType": "PRIVATE",
        "accountNumber": "28821822",
        "sortCode": "231470",
        "abartn": null,
        "accountType": null,
        "bankgiroNumber": null,
        "ifscCode": null,
        "bsbCode": null,
        "institutionNumber": null,
        "transitNumber": null,
        "phoneNumber": null,
        "bankCode": null,
        "russiaRegion": null,
        "routingNumber": null,
        "branchCode": null,
        "cpf": null,
        "cardNumber": null,
        "idType": null,
        "idNumber": null,
        "idCountryIso3": null,
        "idValidFrom": null,
        "idValidTo": null,
        "clabe": null,
        "swiftCode": null,
        "dateOfBirth": null,
        "clearingNumber": null,
        "bankName": null,
        "branchName": null,
        "businessNumber": null,
        "province": null,
        "city": null,
        "rut": null,
        "token": null,
        "cnpj": null,
        "payinReference": null,
        "pspReference": null,
        "orderId": null,
        "idDocumentType": null,
        "idDocumentNumber": null,
        "targetProfile": null,
        "taxId": null,
        "iban": null,
        "bic": null,
        "IBAN": null,
        "BIC": null,
        "interacAccount": null
    },
    "user": <your user ID>,
    "active": true,
    "ownedByCustomer": true
}
```

Recipient is a person or institution  who is the ultimate beneficiary of your payment. 

Recipient data includes three data blocks.

**1) General Data**
<ul>
<li>Recipient full name</li>
<li>Legal type (private/business)</li>
<li>Currency</li>
<li>Owned by customer</li>
</ul>

Owned by customer is a boolen to flag whether this recipient is the same entity (person or business) as the one sending the funds. i.e. A user sending money to thier own account in another country/currency. This can be used to separate these recipients in your UI.

**2) Bank account data**

There are many different variations of bank account details needed depending on recipient target currency. For example:
<ul>
<li>GBP — sort code and account number </li>
<li>BGN CHF, DKK, EUR, GEL, GBP, NOK, PKR, PLN, RON, SEK — IBAN</li>
<li>USD — routing number, account number, account type</li>
<li>INR — IFSC code, account number</li>
<li>...</li>
</ul>

**3) Address data**
 Recipient address data is required only if target currency is USD, PHP, THB or TRY, or if the source currency is USD or AUD. 
<ul>
<li>Country</li>
<li>State (US, Canada, Brazil)</li>
<li>City</li>
<li>Address line</li>
<li>Zip code</li>
</ul>

When creating recipient, the following general rules should be applied to "accountHolderName" field:

* Full names for personal recipients.  They must include more than one name, and both first and last name must have more than one character.
* Business names must be in full, but can be just a single name. The full name cannot be just a single character but can be made up of a set of single characters. e.g. "A" is not permitted but "A 1" or "A1" is permitted.
* Digits are not allowed, except in business names.
* Special characters _()'*,. are allowed for personal and business names

These requirements may vary depending of recipient type.
A GBP example is provided here. You can find other currency examples below.<br/>
As you can see many of the fields are `null`, in order to know which fields are required for which currency we expose the [Recipients.Requirements](#recipient-accounts-requirements) endpoint.

### Request

**`POST https://api.sandbox.transferwise.tech/v1/accounts`**

Field                 | Description                                           | Format        | Optional
---------             | -------                                               | -----------   | ----------- 
currency              | 3 character currency code                             | Text          | false
type                  | Recipient type                                        | Text          | false
profile               | Personal or business profile id                       | Integer       | false
accountHolderName     | Recipient full name                                   | Text          | false
ownedByCustomer       | Whether this account is owned by the sending user     | Boolean       | true
details               | Currency specific fields                              | Object        | false
details.legalType     | Recipient legal type: PRIVATE or BUSINESS             | Text          | false
details.sortCode      | Recipient bank sort code (GBP example)                | Text          | false
details.accountNumber | Recipient bank account no (GBP example)               | Text          | false


### Response

Recipient account id is needed for creating transfers in step 3.
The profile ID you provided when creating your recipient will appear in the response.  However, some 
older recipients may not have a profile ID specified.

Field                 | Description                                           | Format        | Nullable
---------             | -------                                               | -----------   | ----------- 
id                    | accountId                                             | Integer       | false
profile               | Personal or business profile id                       | Integer       | true
user                  | User that created or owns this recipient              | Integer       | false
acccountHolderName    | Recipient full name                                   | Text          | false
currency              | 3 character country code                              | Text          | false
country               | 2 character currency code                             | Text          | false
type                  | Recipient type                                        | Text          | false
ownedByCustomer       | Whether this account is owned by the sending user     | Boolean       | false
details               | Currency specific fields                              | Object        | false
details.legalType     | Recipient legal type                                  | Text          | true
details.sortCode      | Recipient bank sort code (GBP example)                | Text          | Currency Dependent
details.accountNumber | Recipient bank account no (GBP example)               | Text          | Currency Dependent


## Create Email Recipient

> Example Request (Create email recipient):

```shell
curl -X POST https://api.sandbox.transferwise.tech/v1/accounts \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>, 
          "accountHolderName": "Ann Johnson",
          "currency": "EUR", 
          "type": "email", 
           "details": { 
              "email": "ann.johnson@gmail.com"
           } 
         }'
```

> Example Response (Lookup email recipient):

```json
{
    "id": 13967196,
    "business": null,
    "profile": <your profile id>,
    "accountHolderName": "Ann Johnson",
    "currency": "EUR",
    "country": null,
    "type": "email",
    "details": {
        "address": {
            "country": null,
            "countryCode": null,
            "firstLine": null,
            "postCode": null,
            "city": null,
            "state": null
        },
        "email": "ann.johnson@gmail.com",
        "legalType": "PRIVATE",
        "accountNumber": null,
        "sortCode": null,
        "abartn": null,
        "accountType": null,
        "bankgiroNumber": null,
        "ifscCode": null,
        "bsbCode": null,
        "institutionNumber": null,
        "transitNumber": null,
        "phoneNumber": null,
        "bankCode": null,
        "russiaRegion": null,
        "routingNumber": null,
        "branchCode": null,
        "cpf": null,
        "cardNumber": null,
        "idType": null,
        "idNumber": null,
        "idCountryIso3": null,
        "idValidFrom": null,
        "idValidTo": null,
        "clabe": null,
        "swiftCode": null,
        "dateOfBirth": null,
        "clearingNumber": null,
        "bankName": null,
        "branchName": null,
        "businessNumber": null,
        "province": null,
        "city": null,
        "rut": null,
        "token": null,
        "cnpj": null,
        "payinReference": null,
        "pspReference": null,
        "orderId": null,
        "idDocumentType": null,
        "idDocumentNumber": null,
        "targetProfile": null,
        "taxId": null,
        "iban": null,
        "bic": null,
        "IBAN": null,
        "BIC": null,
        "interacAccount": null
    },
    "user": <your user id>,
    "active": true,
    "ownedByCustomer": false
}

```
If you don't know recipient bank account details you can set up **email recipient** so that TransferWise will collect bank details directly from the recipient. 

TransferWise will email your recipient with a link to collect their bank account details. 
Once your recipient provides bank account details securely to TransferWise we are able to complete your transfer.


<aside class="warning">
<b>Please read through the support article referenced below to understand how this works and what are known constraints.</b>
</aside>
[https://transferwise.com/help/article/1740912/creating-a-transfer/transfers-to-an-email-address-transferwise-users]
(https://transferwise.com/help/article/1740912/creating-a-transfer/transfers-to-an-email-address-transferwise-users)


## Get By Id
> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/accounts/{accountId} \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
{
    "id": 13967081,
    "profile": <your profile id>, 
    "accountHolderName": "Ann Johnson",
    "type": "sort_code", 
    "country": "GB", 
    "currency": "GBP",
    "details": {
        "address": {
            "country": null,
            "countryCode": null,
            "firstLine": null,
            "postCode": null,
            "city": null,
            "state": null
        },
        "email": null,
        "legalType": "PRIVATE",
        "accountNumber": "28821822",
        "sortCode": "231470",
        "abartn": null,
        "accountType": null,
        "bankgiroNumber": null,
        "ifscCode": null,
        "bsbCode": null,
        "institutionNumber": null,
        "transitNumber": null,
        "phoneNumber": null,
        "bankCode": null,
        "russiaRegion": null,
        "routingNumber": null,
        "branchCode": null,
        "cpf": null,
        "cardNumber": null,
        "idType": null,
        "idNumber": null,
        "idCountryIso3": null,
        "idValidFrom": null,
        "idValidTo": null,
        "clabe": null,
        "swiftCode": null,
        "dateOfBirth": null,
        "clearingNumber": null,
        "bankName": null,
        "branchName": null,
        "businessNumber": null,
        "province": null,
        "city": null,
        "rut": null,
        "token": null,
        "cnpj": null,
        "payinReference": null,
        "pspReference": null,
        "orderId": null,
        "idDocumentType": null,
        "idDocumentNumber": null,
        "targetProfile": null,
        "taxId": null,
        "iban": null,
        "bic": null,
        "IBAN": null,
        "BIC": null,
        "interacAccount": null
    },
    "user": <your user ID>,
    "active": true,
    "ownedByCustomer": false
}
```

Get recipient account info by id.
### Request
**`GET https://api.sandbox.transferwise.tech/v1/accounts/{accountId}`**




## List
> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/accounts?profile=<profileId>&currency=GBP \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
[
  {
      "id": 13967081,
      "profile": <your profile id>, 
      "accountHolderName": "Ann Johnson",
      "type": "sort_code", 
      "country": "GB", 
      "currency": "GBP",
      "details": {
          "address": {
              "country": null,
              "countryCode": null,
              "firstLine": null,
              "postCode": null,
              "city": null,
              "state": null
          },
          "email": null,
          "legalType": "PRIVATE",
          "accountNumber": "28821822",
          "sortCode": "231470",
          "abartn": null,
          "accountType": null,
          "bankgiroNumber": null,
          "ifscCode": null,
          "bsbCode": null,
          "institutionNumber": null,
          "transitNumber": null,
          "phoneNumber": null,
          "bankCode": null,
          "russiaRegion": null,
          "routingNumber": null,
          "branchCode": null,
          "cpf": null,
          "cardNumber": null,
          "idType": null,
          "idNumber": null,
          "idCountryIso3": null,
          "idValidFrom": null,
          "idValidTo": null,
          "clabe": null,
          "swiftCode": null,
          "dateOfBirth": null,
          "clearingNumber": null,
          "bankName": null,
          "branchName": null,
          "businessNumber": null,
          "province": null,
          "city": null,
          "rut": null,
          "token": null,
          "cnpj": null,
          "payinReference": null,
          "pspReference": null,
          "orderId": null,
          "idDocumentType": null,
          "idDocumentNumber": null,
          "targetProfile": null,
          "taxId": null,
          "iban": null,
          "bic": null,
          "IBAN": null,
          "BIC": null,
          "interacAccount": null
      },
      "user": <your user ID>,
      "active": true,
      "ownedByCustomer": false
  },
  {
      "id": 31273090,
      "profile": <your profile id>, 
      "accountHolderName": "George Johnson",
      "type": "sort_code", 
      "country": "GB", 
      "currency": "GBP",
      "details": {
          "address": {
              "country": null,
              "countryCode": null,
              "firstLine": null,
              "postCode": null,
              "city": null,
              "state": null
          },
          "email": null,
          "legalType": "PRIVATE",
          "accountNumber": "29912211",
          "sortCode": "231470",
          "abartn": null,
          "accountType": null,
          "bankgiroNumber": null,
          "ifscCode": null,
          "bsbCode": null,
          "institutionNumber": null,
          "transitNumber": null,
          "phoneNumber": null,
          "bankCode": null,
          "russiaRegion": null,
          "routingNumber": null,
          "branchCode": null,
          "cpf": null,
          "cardNumber": null,
          "idType": null,
          "idNumber": null,
          "idCountryIso3": null,
          "idValidFrom": null,
          "idValidTo": null,
          "clabe": null,
          "swiftCode": null,
          "dateOfBirth": null,
          "clearingNumber": null,
          "bankName": null,
          "branchName": null,
          "businessNumber": null,
          "province": null,
          "city": null,
          "rut": null,
          "token": null,
          "cnpj": null,
          "payinReference": null,
          "pspReference": null,
          "orderId": null,
          "idDocumentType": null,
          "idDocumentNumber": null,
          "targetProfile": null,
          "taxId": null,
          "iban": null,
          "bic": null,
          "IBAN": null,
          "BIC": null,
          "interacAccount": null
      },
      "user": <your user ID>,
      "active": true,
      "ownedByCustomer": true
  }
]
```
Fetch a list of your recipient accounts. Use the `currency` and `profile` parameters to filter by currency and/or user profile Id.
This list does not currently support pagination, therefore if you have many recipient accounts defined in your business profile then please filter by currency to ensure a reasonable response time.


### Request
**`GET https://api.sandbox.transferwise.tech/v1/accounts?profile=<profileId>&currency=<currencyCode>`**

Both query parameters are optional.

Field                             | Description                                   | Format
---------                         | -------                                       | -----------
profileId                         | Personal or business profile id               | Integer
currency                          | Currency code                                 | Text

## Delete

> Example Request:

```shell
curl -X DELETE https://api.sandbox.transferwise.tech/v1/accounts/{accountId} \
     -H "Authorization: Bearer <your api token>"
```


Deletes a recipient by changing its status to inactive. Only active recipients can be deleted and a recipient cannot be reactivated, however you can create a new recipient with the same details instead.

Response is empty if delete succeeds.

Requesting to delete recipient that is already inactive will return an http status 403 (forbidden).

### Request
**`DELETE https://api.sandbox.transferwise.tech/v1/accounts/{accountId}`**

## Requirements version 1.1
> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/quotes/{quoteId}/account-requirements \
     -H "Authorization: Bearer <your api token>" 
     -H "Accept-Minor-Version: 1"
```

> Example Response:

```json
[
    {
        "type": "south_korean_paygate",
        "title": "PayGate",
        "usageInfo": null,
        "fields": [
            {
                "name": "E-mail",
                "group": [
                    {
                        "key": "email",
                        "name": "E-mail",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "example@example.ex",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": "^[^\\s]+@[^\\s]+\\.[^\\s]{2,}$",
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Recipient type",
                "group": [
                    {
                        "key": "legalType",
                        "name": "Recipient type",
                        "type": "select",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": [
                            {
                                "key": "PRIVATE",
                                "name": "Person"
                            }
                        ]
                    }
                ]
            },
            {
                "name": "Full Name",
                "group": [
                    {
                        "key": "accountHolderName",
                        "name": "Full Name",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": 2,
                        "maxLength": 70,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Recipient's Date of Birth",
                "group": [
                    {
                        "key": "dateOfBirth",
                        "name": "Recipient's Date of Birth",
                        "type": "date",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": "^\\d{4}\\-\\d{2}\\-\\d{2}$",
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Recipient Bank Name",
                "group": [
                    {
                        "key": "bankCode",
                        "name": "Recipient Bank Name",
                        "type": "select",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "Choose recipient bank",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": [
                            {
                                "key": "",
                                "name": "Choose recipient bank"
                            },
                            ...
                        ]
                    }
                ]
            },
            {
                "name": "Account number (KRW accounts only)",
                "group": [
                    {
                        "key": "accountNumber",
                        "name": "Account number (KRW accounts only)",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "1254693521232",
                        "minLength": 10,
                        "maxLength": 16,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            }
        ]
    },
```
### Request
**` GET https://api.sandbox.transferwise.tech/v1/quotes/{quoteId}/account-requirements`**<br/>
**` POST https://api.sandbox.transferwise.tech/v1/quotes/{quoteId}/account-requirements`**<br/>
**` GET https://api.sandbox.transferwise.tech/v1/account-requirements?source=EUR&target=USD&sourceAmount=1000`**<br/>

This incremental version of `GET` and `POST` account requirements enables you to fetch requirements which include both recipient name and email fields in the dynamic form. These values are required to support currencies such as KRW, JPY and RUB, and also simplify the use of dynamic forms by removing the need for manual name validation. Set the request header `Accept-Minor-Version` to `1` to use this version.
You can use these data to build a dynamic user interface on top of these endpoints. The third sample shows how to get account requirements for a specific currency route without referring to a particular quote but with the amount, source and target currencies passed as URL parameters.

## Requirements
> Example Request:

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/quotes/{quoteId}/account-requirements \
     -H "Authorization: Bearer <your api token>" 
```

> Example Response:

```json
[
    {
        "type": "aba",
        "title": "Local bank account",
        "fields": [
            {
                "name": "Recipient type",
                "group": [
                    {
                        "key": "legalType",
                        "name": "Recipient type",
                        "type": "select",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": [
                            {
                                "key": "PRIVATE",
                                "name": "Person"
                            },
                            {
                                "key": "BUSINESS",
                                "name": "Business"
                            }
                        ]
                    }
                ]
            },
            {
                "name": "ACH routing number",
                "group": [
                    {
                        "key": "abartn",
                        "name": "ACH routing number",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "026009593",
                        "minLength": 9,
                        "maxLength": 9,
                        "validationRegexp": "^\\d{9}$",
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Account number",
                "group": [
                    {
                        "key": "accountNumber",
                        "name": "Account number",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "12345678",
                        "minLength": 4,
                        "maxLength": 17,
                        "validationRegexp": "^\\d{4,17}$",
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Account type",
                "group": [
                    {
                        "key": "accountType",
                        "name": "Account type",
                        "type": "radio",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "CHECKING",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": [
                            {
                                "key": "CHECKING",
                                "name": "Checking"
                            },
                            {
                                "key": "SAVINGS",
                                "name": "Savings"
                            }
                        ]
                    }
                ]
            },
            {
                "name": "Country",
                "group": [
                    {
                        "key": "address.country",
                        "name": "Country",
                        "type": "select",
                        "refreshRequirementsOnChange": true,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": [
                            {
                                "key": "AF",
                                "name": "Afghanistan"
                            },
                            {
                                "key": "AL",
                                "name": "Albania"
                            },
                            {
                            ...
                            }

                        ]
                    }
                ]
            },
            {
                "name": "City",
                "group": [
                    {
                        "key": "address.city",
                        "name": "City",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Address",
                "group": [
                    {
                        "key": "address.firstLine",
                        "name": "Address",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            },
            {
                "name": "Post Code",
                "group": [
                    {
                        "key": "address.postCode",
                        "name": "Post Code",
                        "type": "text",
                        "refreshRequirementsOnChange": false,
                        "required": true,
                        "displayFormat": null,
                        "example": "",
                        "minLength": null,
                        "maxLength": null,
                        "validationRegexp": null,
                        "validationAsync": null,
                        "valuesAllowed": null
                    }
                ]
            }
        ]
    },

```
### Request
**` GET https://api.sandbox.transferwise.tech/v1/quotes/{quoteId}/account-requirements`**<br/>
**` POST https://api.sandbox.transferwise.tech/v1/quotes/{quoteId}/account-requirements`**<br/>
**` GET https://api.sandbox.transferwise.tech/v1/account-requirements?source=EUR&target=USD&sourceAmount=1000`**<br/>

The `GET` and `POST` account-requirements endpoints help you to figure out which fields are required to create a valid recipient for different currencies.
You can use these data to build a dynamic user interface on top of these endpoints. The third sample shows how to get account requirements for a specific currency route without referring to a particular quote but with the amount, source and target currencies passed as URL parameters.
This is a step-by-step guide on how these endpoints work.

##Using account requirements

1.First create a quote to specify currencies and transfer amounts. See [Create.Quote](#quotes-create).

2.Call `GET /v1/quotes/{quoteId}/account-requirements` to get the list of fields you need to fill with values in the "details" section for creating a valid recipient account. 

In order to create an "aba" recipient type you need these top level fields:<br/>
<ul>
 <li>legalType (PRIVATE / BUSINESS)</li>
 <li>abartn (ABA routing number)</li>
 <li>accountType  (CHECKING / SAVINGS)</li>
 <li>address.country</li>
 <li>address.city</li>
 <li>address.postalCode</li>
 <li>address.firstLine</li>
</ul>

Some fields require multiple levels of fields in the details request, for example Country followed by State. This should be handled by the client based on the `refreshRequirementsOnChange` field. In the example above 'address.country' has this field set to true, indicating that there are additional fields required depending on the selected value. To manage this you should create a request with all of the initially requested data and call the `POST account-requirements` endpoint. You will be returned a response similar the previosuly returned data from `GET account-requirements` but with additional fields.

3.For example, construct a recipient object with all top level fields and call POST /v1/quotes/{quoteId}/account-requirements with these value to expose sub fields.  <br/>
For example posting US as country will also add "state" to list of fields.<br/>

<div class="center-column"></div>
```
{
    "type": "aba",
    "details": {
      "legalType": "PRIVATE",
      "abartn": "111000025",
      "accountNumber": "12345678",
      "accountType": "CHECKING",
      "address": {
        "country": "US"
      }
    }
}
```

However, posting GB as country will not add any new fields as GB addresses do not have this extra requirement.

<div class="center-column"></div>
```
{
    "type": "aba",
    "details": {
      "legalType": "PRIVATE",
      "abartn": "111000025",
      "accountNumber": "12345678",
      "accountType": "CHECKING",
      "address": {
        "country": "GB"
      }
    }
}
```

It is possible that any new fields returned may _also_ have `refreshRequirementsOnChange` field set to true. Therefore you must keep iterating on the partially created details object until `POST account-requirements` returns you no new fields that it previously didn't include in the response, you can do this by checking the size of the array returned.

4.Once you have built your full reciepient details object you can use it to create a reciepient.

For example this is a valid request to create a recipient with address in US Arizona:
<br/> `POST /v1/accounts`:<br/>

<div class="center-column"></div>
```
{
    "profile": your-profile-id,
    "accountHolderName": "John Smith",
    "currency": "USD",
    "type": "aba",
    "details": {
    	"legalType": "PRIVATE",
    	"abartn": "111000025",
    	"accountNumber": "12345678",
    	"accountType": "CHECKING",
    	"address": {
    		"country": "US",
    		"state": "AZ"
       	"city": "New York",
    		"postCode": "10025",
    		"firstLine": "45 Sunflower Ave"
    	}
    }
}
```

We do not require the recipient's address for most receiving currencies and as such do not return these form elements by default. In some cases it may be desirable for you to collect this from users and store it as part of the recipient object in the TransferWise platform. If you wish to do this you can include the parameter `&addressRequired=true` in your call to `GET /v1/quotes/{quoteId}/account-requirements`, if this is present we will return address fields as part of the form.

### Building a user interface

Account requirements help us understand how to create a valid account given a certain context. As a tool to help explore this API, please visit [Dynamic Forms UI](https://sandbox.transferwise.tech/dynamic-forms-ui/).
This app allows specifying different requests and calls our sandbox environment for account requirements. It then displays the response in JSON along with an example 
of the rendered form from the said response.

When requesting the form data from the `account-requirements` endpoint, the first level of the response defines different types of recipient you can create, the first thing to do is present the user a choice of which recipient type they wish to create, e.g. to GBP this could be local details or IBAN format. Each recipient type then has multiple `fields` describing the form elements required to be shown to collect information from the user. Each field will have a `type` value, these tell you the field type that your front end needs to render to be able to collect the data. A number of field types are permitted, these are:

type            | UI element
---------       | ------- 
text            | A free text box 
select          | A selection box/dialog
radio           | A radio button choice between options
date            | A text box with a date picker

Example data is also included in each field which should be shown to the user, along with a regex or min and max length constraints that should be applied as field level validations. You can optionally implement the dynamic validation using the `validationAsync` field, however these checks wil also be done when a completed recipient is submitted to `POST /v1/accounts`.

Some good recipient currencies to test are:

* CAD - has several fields in a field group.
* USD - the country field has `refreshRequirementsOnChange`.
* JPY - the bank field has `refreshRequirementsOnChange`.
* PEN - has a field using a date component type.

### Response

Field                                       | Description                                                     | Format
---------                                   | -------                                                         | -----------
type                                        | "address"                                                       | Text
fields[n].name                              | Field description                                               | Text
fields[n].group[n].key                      | Key is name of the field you should include in the JSON         | Text
fields[n].group[n].type                     | Display type of field (e.g. text, select, etc)                  | Text
fields[n].group[n].refreshRequirementsOnChange |  Tells you whether you should call POST account-requirements once the field value is set to discover required lower level fields.  | Boolean
fields[n].group[n].required                 | Indicates if the field is mandatory or not                      | Boolean
fields[n].group[n].displayFormat            | Display format pattern.                                         | Text
fields[n].group[n].example                  | Example value.                                                  | Text
fields[n].group[n].minLength                | Min valid length of field value.                                | Integer
fields[n].group[n].maxLength                | Max valid length of field value.                                | Integer
fields[n].group[n].validationRegexp         | Regexp validation pattern.                                      | Text
fields[n].group[n].validationAsync          | Validator URL and parameter name you should use when submitting the value for validation | Text
fields[n].group[n].valuesAllowed[n].key     | List of allowed values. Value key                               | Text
fields[n].group[n].valuesAllowed[n].name    | List of allowed values. Value name.                             | Text

## Validate Recipient Fields

> Example Request (Validate sort code (GBP):

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/validators/sort-code?sortCode=231470
```

> Example Response (Validate sort code (GBP):

```json
{
    "validation": "success"
}

or  

{
    "errors": [
        {
            "code": "VALIDATION_NOT_SUCCESSFUL",
            "message": "sortCode has not passed validation.",
            "path": "sortCode",
            "arguments": [
                "2314701"
            ]
        }
    ]
}

```

There are several validation URLs that make creating correct recipient accounts easier. 
These URLs are also included in fields provided by [Recipient Accounts.Requirements](#recipient-accounts-requirements) endpoint.

**GBP**

Validate UK bank sort code

[https://api.transferwise.com/v1/validators/sort-code?sortCode=231470](https://api.transferwise.com/v1/validators/sort-code?sortCode=231470)

Validate UK bank account number

[https://api.transferwise.com/v1/validators/sort-code-account-number?accountNumber=10000246](https://api.transferwise.com/v1/validators/sort-code-account-number?accountNumber=10000246)

**BGN CHF, DKK, EUR, GEL, GBP, NOK, PKR, PLN, RON, SEK** 

Validate IBAN

[https://api.transferwise.com/v1/validators/iban?iban=EE867700771000187087](https://api.transferwise.com/v1/validators/iban?iban=EE867700771000187087)

Validate BIC and IBAN

[https://api.transferwise.com/v1/validators/bic?bic=LHVBEE22&iban=EE867700771000187087](https://api.transferwise.com/v1/validators/bic?bic=LHVBEE22&iban=EE867700771000187087)

**USD** 

Validate ABA routing number

[https://api.transferwise.com/v1/validators/abartn?abartn=011103093](https://api.transferwise.com/v1/validators/abartn?abartn=011103093)

Validate ABA bank account number

[https://api.transferwise.com/v1/validators/aba-account-number?accountNumber=111000025](https://api.transferwise.com/v1/validators/aba-account-number?accountNumber=111000025)

**INR**

Validate IFSC code

[https://api.transferwise.com/v1/validators/ifsc-code?ifscCode=YESB0236041](https://api.transferwise.com/v1/validators/ifsc-code?ifscCode=YESB0236041)

Validate Indian bank account number 

[https://api.transferwise.com/v1/validators/indian-account-number?accountNumber=678911234567891](https://api.transferwise.com/v1/validators/indian-account-number?accountNumber=678911234567891)


**AUD**

Validate BSB code

[https://api.transferwise.com/v1/validators/bsb-code?bsbCode=112879](https://api.transferwise.com/v1/validators/bsb-code?bsbCode=112879)

Validate Australian bank account number

[https://api.transferwise.com/v1/validators/australian-account-number?accountNumber=123456789](https://api.transferwise.com/v1/validators/australian-account-number?accountNumber=123456789)

**CAD**

Validate Canadian institution number

[https://api.transferwise.com/v1/validators/canadian-institution-number?institutionNumber=006](https://api.transferwise.com/v1/validators/canadian-institution-number?institutionNumber=006)

Validate Canadian bank transit number

[https://api.transferwise.com/v1/validators/canadian-transit-number?institutionNumber=006&transitNumber=04841](https://api.transferwise.com/v1/validators/canadian-transit-number?institutionNumber=006&transitNumber=04841)

Validate Canadian bank account number

[https://api.transferwise.com/v1/validators/canadian-account-number?institutionNumber=006&transitNumber=04841&accountNumber=3456712](https://api.transferwise.com/v1/validators/canadian-account-number?institutionNumber=006&transitNumber=04841&accountNumber=3456712)

**SEK** Validate Bank Giro number

[https://api.transferwise.com/v1/validators/bankgiro-number?bankgiroNumber=12345674](https://api.transferwise.com/v1/validators/bankgiro-number?bankgiroNumber=12345674)

**HUF**

Validate Hungarian bank account number

[https://api.transferwise.com/v1/validators/hungarian-account-number?accountNumber=12000000-12345678-00000000](https://api.transferwise.com/v1/validators/hungarian-account-number?accountNumber=12000000-12345678-00000000)

**PLN**

Validate Polish bank account number

[https://api.transferwise.com/v1/validators/polish-account-number?accountNumber=12345678901234567890123456](https://api.transferwise.com/v1/validators/polish-account-number?accountNumber=12345678901234567890123456)

**UAH**

Validate Ukrainian bank account number

[https://api.transferwise.com/v1/validators/privatbank-account-number?accountNumber=1234](https://api.transferwise.com/v1/validators/privatbank-account-number?accountNumber=1234)

Validate Ukrainian phone number

[https://api.transferwise.com/v1/validators/privatbank-phone-number?phoneNumber=123456789](https://api.transferwise.com/v1/validators/privatbank-phone-number?phoneNumber=123456789)


**NZD**

Validate New Zealand bank account number

[https://api.transferwise.com/v1/validators/new-zealand-account-number?accountNumber=03-1587-0050000-00](https://api.transferwise.com/v1/validators/new-zealand-account-number?accountNumber=03-1587-0050000-00)


**AED**

Validate United Arab Emirates BIC code

[https://api.transferwise.com/v1/validators/emirates-bic?bic=BOMLAEAD&iban=AE070331234567890123456](https://api.transferwise.com/v1/validators/emirates-bic?bic=BOMLAEAD&iban=AE070331234567890123456)

**CNY**

Validate Chinese Union Pay card number

[https://api.transferwise.com/v1/validators/chinese-card-number?cardNumber=6240008631401148](https://api.transferwise.com/v1/validators/chinese-card-number?cardNumber=6240008631401148)

**THB**

Validate Thailand bank account number

[https://api.transferwise.com/v1/validators/thailand-account-number?bankCode=002&accountNumber=9517384260](https://api.transferwise.com/v1/validators/thailand-account-number?bankCode=002&accountNumber=9517384260)

## Banks and Branches

> Example Request (Get list of banks for Hong Kong):

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/banks/country=HK
```

> Example Response (Get list of banks for Hong Kong):

```json
{
    "values": [
        {
            "code": "003",
            "title": "STANDARD CHARTERED BANK (HONG KONG) LIMITED"
        },
        {
            "code": "552",
            "title": "AAREAL BANK AG, WIESBADEN, GERMANY"
        },
        {
            "code": "307",
            "title": "ABN AMRO BANK N.V."
        },
        {
            "code": "222",
            "title": "AGRICULTURAL BANK OF CHINA LIMITED"
        },
        {
            "code": "525",
            "title": "ZIBO CITY COMMERCIAL BANK, SHANDONG"
        }
    ]
}
```

> Example Request (Get list of bank branches for a Hong Kong bank with code 003):

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/bank-branches?country=HK&bankCode=003
```

> Example Response (Get list of bank branches for a Hong Kong bank with code 003):

```json
{
    "country": "HK",
    "values": [
        {
            "code": "251",
            "title": "Quarry Bay Branch [251]",
            "parentCode": "003"
        },
        {
            "code": "983",
            "title": "Canton Road Branch [983]",
            "parentCode": "003"
        },
        {
            "code": "984",
            "title": "Tuen Mun Branch [984]",
            "parentCode": "003"
        },
        {
            "code": "985",
            "title": "Kwun Tong Branch [985]",
            "parentCode": "003"
        }
    ]
}
```

**Get list of banks by country code** 

List of banks is available for these countries:
BD, BR, CZ, CL, EG, GH, HK, ID, IL, IN, JP, KE, LK, MA, NG, NP, PE, PH, RU, SG, TH, VN, ZA

**` GET https://api.sandbox.transferwise.tech/v1/banks?country=HK`**<br/>


**Get list of branches by country and bank code**

List of bank branches is available for these countries: BD, GH, HK, IL, IN, JP, LK, SG, VN

**` GET https://api.sandbox.transferwise.tech/v1/bank-branches?country=HK&bankCode=<bankCode>`**<br/>

## Countries and States

> Example Request (Get list of allowed countries):

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/countries
```

> Example Response (Get list of allowed countries):

```json
{
    "values": [
        {
            "code": "AL",
            "name": "Albania"
        },
        {
            "code": "DZ",
            "name": "Algeria"
        },
        ...
        {
            "code": "ZW",
            "name": "Zimbabwe"
        },
        {
            "code": "AX",
            "name": "Åland Islands"
        }
    ]
}
```

> Example Request (Get list of states for a country code US):

```shell
curl -X GET https://api.sandbox.transferwise.tech/v1/countries/US/states
```

> Example Response (Get list of states for a country code US):

```json
{
    "values": [
        {
            "code": "AL",
            "name": "Alabama"
        },
        {
            "code": "AK",
            "name": "Alaska"
        },
        ...
        {
            "code": "PR",
            "name": "Puerto Rico"
        },
        {
            "code": "VI",
            "name": "Virgin Islands"
        }
    ]
}
```

**Get list of countries** 

List of allowed countries to be used in recipient or user-profile addresses.

**` GET https://api.sandbox.transferwise.tech/v1/countries`**<br/>


**Get list of states by country code**

List of states is available for these countries: US, CA, BR, AU.

**` GET https://api.sandbox.transferwise.tech/v1/countries/{countryCode}/states`**<br/>

## Create AED Recipient

> Example Request (AED):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "AED",
          "type": "emirates",
          "legalType": "PRIVATE",
          "details": {
      	   "IBAN": "AE070331234567890123456"
         }
      }'
```

Send payments to United Arab Emirates. 

Private and business recipients are supported. 

Recipient type = *'emirates'*

Required details: IBAN

## Create ARS Recipient

> Example Request (ARS):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "ARS",
          "type": "argentina",
          "details": {
           "legalType": "PRIVATE",
           "taxId": "20-34149938-1",
           "accountNumber": "0110482420048200036238"
         }
      }'
```

Send payments to Argentina. 

Private and business recipients are supported. 

Recipient type = *'argentina'*

Required details: 

taxId - Recipient’s CUIT / CUIL (Single Tax Identification/ Single Labor Identification), 11 characters 
                                                                                                  
accountNumber - Recipient’s account CBU,	22 characters (Alias not supported)

## Create AUD Recipient

> Example Request (AUD australian):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "AUD",
          "type": "australian",
          "details": {
           "legalType": "PRIVATE",
           "bsbCode": "023604",
           "accountNumber": "123456789"
          }
        }'
```

> Example Request for business recipient ("businessNumber" field added)

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "AUD",
          "type": "australian",
          "details": {
           "legalType": "BUSINESS",
           "bsbCode": "023604",
           "businessNumber": "12 345 678 910"
           "accountNumber": "123456789"
          }
        }'
```

Send payments to Australia. 

Recipient type = *'australian'*

Private and business recipients are supported. 

Required details: 

bsbCode - 6 digits

businessNumber - 9..14 digits (for business recipients only)

accountNumber - 4..9 digits

<br/>

## Create BDT Recipient

> Example Request (BDT):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "BDT",
          "type": "bangladesh",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "015",
           "branchCode": "015270362",
           "accountNumber": "5060011118"
           }
        }'
```

<aside class="warning">
<b>Only private customers sending payments to private recipients. Businesses customers are not supported yet.</b>
</aside>

Send payments to Bangladesh. 

Recipient type = *'iban'*

Required details: bankCode, branchCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create BGN Recipient

> Example Request (BGN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "BGN",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "BG89370400440532013000"
           }
        }'
```

Send payments to Bulgaria. 

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create BRL Recipient

> Example Request (BRL):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "BRL",
          "type": "brazil",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "218",
           "branchCode": "1234",
           "accountNumber": "12345678-9",
           "accountType": "CHECKING",
           "cpf": "123.456.789-12",
           "phoneNumber": "+55 21 5555 5555"
           }
        }'
```

<aside class="warning">
<b>Only private customers sending payments to private recipients. Businesses customers are not supported yet.</b>
</aside>

Send payments to Brazil. 

Recipient type = *'brazil'*

Required details: bankCode, branchCode, accountNumber, accountType (CHECKING or SAVINGS), cpf (tax reg no), recipient phone number

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create CAD Recipient

> Example Request (CAD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CAD",
          "type": "canadian",
          "details": {
           "legalType": "PRIVATE",
           "institutionNumber": "006",
           "transitNumber": "04841",
           "accountNumber": "3456712",
           "accountType": "Checking",
     }
  }'
```

Send payments to Canada. 

Private and business recipients are supported. 

Recipient type = *'canadian'*

Required details: institutionNumber, transitNumber, accountNumber, accountType (Checking or Saving)

## Create CAD Interac Recipient

> Example Request (CAD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CAD",
          "type": "interac",
          "details": {
           "interacAccount": "<recipient email>",
     }
  }'
```

<aside class="warning">
<b>Sending payments from BRL, AUD, NZD, & SGD is not supported.</b>
</aside>

Send payments to Canada via Interac. 

Private and business recipients are supported. 10,000 CAD max per payment.

Recipient type = *'interac'*

Required details: interacAccount

## Create CHF Recipient

> Example Request (CHF):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CHF",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "CH89370400440532013000",
           "town": "Zürich",
           "postCode": 8037
           }
        }'
```

Send payments to Switzerland. 

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

<br/>

<aside class="warning">
<b>From 15th of Jun, 2020, requirements will change to the following:</b>
</aside>

Required details: IBAN, town, postcode

Where town and postcode are the recipient's home town and postcode.

If the recpient's country does not use a postcode, then please fill it with 0 (zero).

## Create CLP Recipient

> Example Request (CLP):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CLP",
          "type": "chile",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "504",
           "accountNumber": "12345678901234567890",
           "rut": "760864285",
           "accountType": "CHECKING",
           "phoneNumber": "+56 33 555 5555"
           }
        }'
```

Send payments to Chile. 

Private and business recipients are supported. 

Recipient type = *'chile'*

Required details: bankCode, accountNumber, rut (Rol Único Tributario), accountType (CHECKING, SAVINGS, CUENTA_VISTA), recipient phone number

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create CNY Recipient

> Example Request (CNY):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CNY",
          "type": "chinese_card",
          "details": {
           "legalType": "PRIVATE",
           "cardNumber": "6240008631401148"
           }
        }'
```


> Example Request (CNY Alipay id):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{
             "profile": <your profile id>,
             "accountHolderName": <recipient name>,
             "currency": "CNY",
             "type": "chinese_alipay",
             "details": {
              "legalType": "PRIVATE",
              "accountNumber": "email@example.com"
             }
         }'
```

<aside class="warning">
<b>Only sending payments to private recipients. It is not allowed to send funds to business recipients.</b>
</aside>

Send payments to China Unionpay cardholder. 

Recipient type = *'chinese_card'*

Required details: cardNumber

<br/>

OR

<br/>

Recipient type = *'chinese_alipay'*

Required details: accountNumber - Chinese mobile number or email

## Create CZK Recipient

> Example Request (CZK Local):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CZK",
          "type": "czech",
          "details": {
           "legalType": "PRIVATE",
           "prefix": "000000",
           "accountNumber": "5060011118",
           "bankCode": "5500"
           }
        }'
```

> Example Request (CZK IBAN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "CZK",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "CZ89370400440532013000"
           }
        }'
```

Send payments to Czech Republic. 

Private and business recipients are supported. 

<br/>

Recipient type = *'czech'*

Required details: prefix, accountNumber, bankCode

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

<br/>

OR 

<br/>

Recipient type = *'iban'*

Required details: IBAN

## Create DKK Recipient

> Example Request (DKK):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "DKK",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "DK89370400440532013000"
           }
        }'
```

Send payments to Denmark. 

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create EGP Recipient

> Example Request (EGP):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "EGP",
          "type": "egypt_local",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "ECBAEGCA",
           "accountNumber": "123456789"
           }
        }'
```

Send payments to Egypt. 

Private and business recipients are supported. 

Recipient type = *'egypt_local'*

Required details: bankCode, accountNumber (Swift code)

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create EUR Recipient

> Example Request (EUR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "EUR",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "DE89370400440532013000"
           }
        }'
```

Send payments to Eurozone countries: Austria, Belgium, Cyprus, Estonia, Finland, France, Germany, Greece, Ireland, Italy, Latvia, Lithuania, Luxembourg, Malta, Netherlands, Portugal, Slovakia, Slovenia, Spain.

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create GBP Recipient

> Example Request (GBP Sort Code):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "GBP",
          "type": "sort_code",
          "details": {
           "legalType": "PRIVATE",
           "sortCode": "40-30-20",
           "accountNumber": "12345678"
           }
        }'
```

> Example Request (GBP IBAN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "GBP",
          "type": "iban",
          "details": {
            "legalType": "PRIVATE",
            "IBAN": "GB89370400440532013000"
           }
        }'
```

Send payments to United Kingdom. 

Private and business recipients are supported. 

<br/>

Recipient type = *'sort_code'*

Required details: sortCode, accountNumber

<br/>

OR 

<br/>


Recipient type = *'iban'*

Required details: IBAN

## Create GEL Recipient

> Example Request (GEL):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "GEL",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "GE89370400440532013000"
           }
        }'
```

Send payments to Georgia.

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create GHS Recipient

> Example Request (GHS):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "GHS",
          "type": "ghana_local",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "030100",
           "accountNumber": "0011XXXXXXXXXX"
           }
        }'
```

Send payments to Ghana.

Private and business recipients are supported. 

Recipient type = *'ghana_local'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create HKD Recipient

> Example Request (HKD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "accountHolderName": "<recipient name>",
          "currency": "HKD",
          "type": "hongkong",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "307",
           "accountNumber": "005-231289-112"
           }
        }'
```

Send payments to Hong Kong.

Private and business recipients are supported. 

Recipient type = *'hongkong'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create HRK Recipient

> Example Request:

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "HRK",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "HR89370400440532013000"
           }
        }'
```

Send payments to Croatia.

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create HUF Recipient

> Example Request (HUF Local):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "HUF",
          "type": "hungarian",
          "details": {
           "legalType": "PRIVATE",
           "accountNumber": "12000000-12345678-00000000"
           }
        }'
```

> Example Request (HUF IBAN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "HUF",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "HU89370400440532013000"
           }
        }'
```

Send payments to Hungary. 

Private and business recipients are supported. 

<br/>

Recipient type = *'hungarian'*

Required details: accountNumber

<br/>

OR 

<br/>


Recipient type = *'iban'*

Required details: IBAN

## Create IDR Recipient

> Example Request (IDR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "IDR",
          "type": "indonesian",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "610306",
           "accountNumber": "6789112345678"
           }
        }'
```

Send payments to Indonesia.

Private and business recipients are supported. 

Recipient type = *'indonesian'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create ILS Recipient

> Example Request (ILS IBAN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
        "profile": <your profile id>,
        "accountHolderName": "<recipient name>",
        "currency": "ILS",
        "type": "israeli_local",
        "details": {
         "legalType": "PRIVATE",
         "IBAN": "IL620108000000099999999"
         }
      }'
```

Send payments to Israel. 

Private and business recipients are supported. 

<br/>

Recipient type = *'israeli_local'*

Required details: IBAN

## Create INR Recipient

> Example Request (INR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "INR",
          "type": "indian",
          "details": {
           "legalType": "PRIVATE",
           "ifscCode": "YESB0236041",
           "accountNumber": "678911234567891",
           }
        }'
```

<aside class="warning">
<b>Private recipient: 1 mln GBP per payment (~ 88 mln INR)<br/>
Business recipient: 1,5 mln INR per day (~ 17 800 GBP)</b>
</aside>

Send payments to India.

Private and business recipients are supported. 

Recipient type = *'indian'*

Required details: ifscCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create JPY Recipient

> Example Request (JPY):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "JPY",
          "type": "japanese",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "6470",
           "branchCode": "100",
           "accountType": "CURRENT",
           "accountNumber": "1234567"
           }
        }'
```

Send payments to Japan.

Private and business recipients are supported. 

Recipient type = *'japanese'*

Required details: bankCode, branchCode accountNumber, accountType (CURRENT, SAVINGS, CHECKING), 

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create KES Recipient

> Example Request (KES Bank Account):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "KES",
          "type": "kenya_local",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "35",
           "accountNumber": "0023183991919"
           }
        }'
```

> Example Request (KES Mobile MPESA):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "KES",
          "type": "kenya_mobile",
          "details": {
           "legalType": "PRIVATE",
           "accountNumber": "2547XXXXXXXX"
           }
        }'
```

Send payments to Kenya. 

Private and business recipients are supported. However please note that only individuals can hold MPESA accounts.

<br/>

Recipient type = *'kenya_local'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

<br/>

OR 

<br/>


Recipient type = *'kenya_mobile'*

Required details: accountNumber - mobile number

## Create KRW Recipient

> Example Request (KRW PayGate):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipients name>",
          "currency": "KRW",
          "type": "south_korean_paygate",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "BUSAN_032",
           "accountNumber": "1254693521232",
           "dateOfBirth" : "yyyy-mm-dd",
           "email": "<recipients email>"
           }
        }'
```

> Example Request (KRW PayGate to Business):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient business name>",
          "currency": "KRW",
          "type": "south_korean_paygate_business",
          "details": {
           "legalType": "BUSINESS",
           "bankCode" : "BUSAN_032",
           "accountNumber": "1254693521232"
           }
        }'
```

Send payments to South Korea. 

Private and business recipients are supported. 

<br/>

Recipient type = *'south_korean_paygate'*

Required details: bankCode, accountNumber, dateOfBirth, email

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

<br/>

OR 

<br/>


Recipient type = *'south_korean_paygate_business'*

Required details: bankCode, accountNumber

## Create LKR Recipient

> Example Request (LKR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "LKR",
          "type": "srilanka",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "7214",
           "branchCode": "100",
           "accountNumber": "5060011118"
           }
        }'
```

<aside class="warning">
<b>Personal to personal: 4,999,999 LKR (~33,000 USD) per transfer <br/>
Business to personal, personal to business & business to business: 3,000,000 LKR (~20,000 USD) per transfer</b>
</aside>

Send payments to Sri Lanka. 

Private and business recipients are supported. 

Recipient type = *'srilanka'*

Required details: bankCode, branchCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create MAD Recipient

> Example Request (MAD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "MAD",
          "type": "morocco",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "BCMAMAMC",
           "accountNumber": "123456789012345678901234"
           }
        }'
```

Send payments to Morocco. 

Private and business recipients are supported. 260,000 MAD per transaction

Recipient type = *'morocco'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create MXN Recipient

> Example Request (MXN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "MXN",
          "type": "mexican",
          "details": {
           "legalType": "PRIVATE",
           "clabe": "032180000118359719"
           }
        }'
```

Send payments to Mexico. 

Private and business recipients are supported. 

Recipient type = *'mexican'*

Required details: clabe

## Create MYR Recipient

> Example Request (MYR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "MYR",
          "type": "malaysian",
          "details": {
           "legalType": "PRIVATE",
           "swiftCode": "ABNAMYKL",
           "accountNumber": "159012938613"
           }
        }'
```

Send payments to Malaysia. 

Private and business recipients are supported. Maximum amount is 10,000,000 MYR	per payment.

Recipient type = *'malaysian'*

Required details: swiftCode, accountNumber

## Create NGN Recipient

> Example Request (NGN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "NGN",
          "type": "nigeria",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "044",
           "accountNumber": "0584412903"
           }
        }'
```

Send payments to Nigeria. 

Private and business recipients are supported. Maximum amount is 2,000,000 NGN per payment.

Recipient type = *'nigeria'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create NOK Recipient

> Example Request (NOK):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "NOK",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "DE89370400440532013000"
           }
        }'
```

Send payments to Norway. 

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create NPR Recipient

> Example Request (NPR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "NPR",
          "type": "nepal",
          "legalType": "PRIVATE",
          "details": {
           "bankCode": "977056",
           "accountNumber": "1234567890"
           }
        }'
```

<aside class="warning">
<b>Only sending payments to private recipients. Businesses recipients are not supported yet.</b>
</aside>

Send payments to Nepal. 

Private recipients are supported.
1mln NPR per transaction / per month for individual account. 

Recipient type = *'nepal'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create NZD Recipient

> Example Request (NZD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "NZD",
          "type": "newzealand",
          "details": {
           "legalType": "PRIVATE",
           "accountNumber": "03-1587-0050000-00"
           }
        }'
```

Send payments to New Zealand. 

Recipient type = *'newzealand'*

Required details: accountNumber

## Create PEN Recipient

> Example Request (PEN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "PEN",
          "type": "peru",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "BCON",
           "accountNumber": "12345678901234567890",
           "accountType": "CHECKING",
           "idDocumentType": "DNI",
           "idDocumentNumber": "09740475",
           "phoneNumber": "+51 987654321"
           }
        }'
```

Send payments to Peru. 

Private and business recipients are supported. 1,900 USD per transfer / 9,900 USD per 30 days.

Recipient type = *'peru'*

Required details: bankCode, accountNumber, accountType (CHECKING, SAVINGS), ID document type (DNI, RUC, C_EXT, PASSP), ID document number, recipient phone number

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create PHP Recipient

> Example Request (PHP):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "PHP",
          "type": "philippines",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "AMA",
           "accountNumber": "0044XXXXXXXX",
           "address" : {
              "country": "GB",
              "city": "London",
              "postCode": "10025",
              "firstLine": "50 Branson Ave"
             }
          }
        }'
```

Send payments to Philippines. 

Private and business recipients are supported. 480,000 PHP per payment.

Recipient type = *'philippines'*

Required details: bankCode, accountNumber, recipient address

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create PKR Recipient

> Example Request (PKR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "PKR",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "PK89370400440532013000"
           }
        }'
```

<aside class="warning">
<b>Only private customers sending payments to private recipients. Business customers and business recipients are not supported yet.</b>
</aside>

Send payments to Pakistan. Max 1 million PKR per payment.

Recipient type = *'iban'*

Required details: IBAN

## Create PLN Recipient

> Example Request (PLN IBAN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "PLN",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "PL89370400440532013000"
           }
        }'
```

> Example Request (PLN Local):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "PLN",
          "type": "polish",
          "details": {
           "legalType": "PRIVATE",
           "accountNumber": "109010140000071219812874"
           }
        }'
```

Send payments to Poland. 

Private and business recipients are supported. 

<br/>

Recipient type = *'iban'*

Required details: IBAN

<br/>

OR 

<br/>


Recipient type = *'polish'*

Required details: accountNumber

## Create RON Recipient

> Example Request (RON):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "RON",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "RO89370400440532013000"
           }
        }'
```

Send payments to Romania. 

Private and business recipients are supported. 

Recipient type = *'iban'*

Required details: IBAN

## Create RUB Recipient

> Example Request (RUB):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "RUB",
          "type": "russiarapida",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "041234567",
           "accountNumber": "40820810999999999999",
           "russiaRegion": "ALTAIKRAI",
           "address" : {
              "country": "GB",
              "city": "London",
              "postCode": "10025",
              "firstLine": "50 Branson Ave"
             }
           }
        }'
```

<aside class="warning">
<b>Only payments to private recipients. Businesses recipients are not supported yet.</b>
</aside>

Send payments to Russia. 

Recipient type = *'russiarapida'*

Required details: bankCode, accountNumber, region, recipient address.

You have to provide first, last and patronymic names in Cyrillic, in order for your transfer to be accepted by the recipient bank.
(unless the recipient is registered at the bank with no patronymic)

You can get list of bank, region and country codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

## Create SEK Recipient

> Example Request (SEK IBAN):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "SEK",
          "type": "iban",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "SE89370400440532013000"
           }
        }'
```

> Example Request (SEK Local):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "SEK",
          "type": "sweden_local",
          "details": {
           "legalType": "PRIVATE",
           "clearingNumber": "1234",
           "accountNumber": "1234567"
           }
        }'
```

> Example Request (SEK BankGiro):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "SEK",
          "type": "bankgiro",
          "details": {
           "legalType": "PRIVATE",
           "bankgiroNumber": "1234-5678"
           }
        }'
```

Send payments to Sweden. 

Private and business recipients are supported. 

<br/>

Recipient type = *'iban'*

Required details: IBAN

<br/>

OR 

<br/>


Recipient type = *'sweden_local'*

Required details: clearingNumber, accountNumber

<br/>

OR 

<br/>


Recipient type = *'bankgiro'*

Required details: bankgiroNumber

## Create SGD Recipient

> Example Request (SGD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "SGD",
          "type": "singapore",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "7418",
           "accountNumber": "1238827822"
           }
        }'
```

Send payments to Singapore. 

Private and business recipients are supported. 

Recipient type = *'singapore'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create THB Recipient

> Example Request (THB):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "THB",
          "type": "thailand",
          "details": {
           "legalType": "PRIVATE",
           "bankCode": "002",
           "accountNumber": "9517384260"
           "address" : {
              "country": "GB",
              "city": "London",
              "postCode": "10025",
              "firstLine": "50 Branson Ave"
             }
           }
        }'
```

Send payments to Thailand. Max 2 mln THB per payment.

Private and business recipients are supported. 

Recipient type = *'thailand'*

Required details: bankCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create TRY Recipient

> Example Request (TRY):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "TRY",
          "type": "turkish_earthport",
          "details": {
           "legalType": "PRIVATE",
           "IBAN": "TR330006100519786457841326"
           }
        }'
```

Send payments to Turkey. 

Private and business recipients are supported. 1 000 000 TRY per payment.	

Recipient type = *'turkish_earthport'*

Required details: IBAN

## Create UAH Recipient

> Example Request (UAH):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "UAH",
          "type": "privatbank",
          "details": {
           "legalType": "PRIVATE",
           "phoneNumber": "777210012",
           "accountNumber": "2662"
           }
        }'
```

<aside class="warning">
<b>Only sending payments to private recipients. Businesses recipients are not supported yet.</b>
</aside>

Send payments to Ukraine. Maximum 1,2m UAH per payment.

Recipient type = *'privatbank'*

Required details: 

* phoneNumber   = Use phone number registered in Privat Bank
* accountNumber = Last 4 digits of UAH PrivatBank card

## Create USD Recipient

> Example Request (USD):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "USD",
          "type": "aba",
          "details": {
           "legalType": "PRIVATE",
           "abartn": "111000025",
           "accountNumber": "12345678",
           "accountType": "CHECKING",
           "address" : {
              "country": "GB",
              "city": "London",
              "postCode": "10025",
              "firstLine": "50 Branson Ave"
             }
           }
        }'
```

Send payments to USA. 

Private and business recipients are supported. Max 1 Million USD per payment.

Recipient type = *'aba'*

Required details: 

* abartn        = ACH Routing number
* accountNumber = Recipient bank account number
* accountType   = CHECKING or SAVINGS
* address       = Recipient address

## Create VND Recipient

> Example Request (VND):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "VND",
          "type": "vietname_earthport",
          "details": {
           "legalType": "PRIVATE",
           "swiftCode": "ABBKVNVX",
           "branchCode": "001",
           "accountNumber": "1234567890"
           }
        }'
```

Send payments to Vietnam. 

Private and business recipients are supported. 

Recipient type = *'vietname_earthport'*

Required details: swiftCode, branchCode, accountNumber

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.

You can also get list of bank and branch codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

## Create ZAR Recipient

> Example Request (ZAR):

```shell
curl -X POST "https://api.sandbox.transferwise.tech/v1/accounts" \
     -H "Authorization: Bearer <your api token>" \
     -H "Content-Type: application/json" \
     -d '{ 
          "profile": <your profile id>,
          "accountHolderName": "<recipient name>",
          "currency": "ZAR",
          "type": "southafrica",
          "details": {
           "legalType": "PRIVATE",
           "swiftCode": "ALBRZAJJ",
           "accountNumber": "0000000052312891"
           }
        }'
```

Send payments to South African Republic. 

Private and business recipients are supported. 

Recipient type = *'southafrica'*

Required details: swiftCode, accountNumber

You can get list of bank codes by using /v1/quotes/{quoteId}/account-requirements endpoint.

Lists of banks and branches can be obtained from [Banks and Branches](#recipient-accounts-banks-and-branches) endpoints.
