# Bank Integrations Guide (V1 LEGACY)

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

## **New documentation available**
**For any banks who are beginning their integration now please use the new version of the [TransferWise for Banks API documentation](https://transferwise.github.io/api-docs-banks/) which has been updated and improved with the latest API endpoints and use cases for banks. This documentation remains only as a reference for older integrations still using deprecated endpoints.**

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

## API access

TransferWise uses standard OAuth 2.0 protocol for authentication and authorization. 

Once our partnership begins, we’ll send you API access credentials for the sandbox environment consisting of a Client ID and a Client Secret.
The credentials are needed to complete the authorisation_code grant type of OAuth 2.0 through which the customer will allow your application to be able to act on their behalf.
We also need *redirect_url* from your technical team so that we can limit our callbacks to only that URL, this is URL that we will forward users to after successfully granting your application access to their TransferWise account. Specifying this explicitly makes the integration more secure.
<a href="https://auth0.com/docs/protocols/oauth2" target="_blank" rel="noopener noreferrer">This article about OAuth 2.0 framework</a> is a great way to refresh your knowledge about the protocol itself.

### SANDBOX and LIVE environments

* Sandbox API is located at https://api.sandbox.transferwise.tech
* LIVE API is located at https://api.transferwise.com

## Customized user interface

You will build your TransferWise user experience directly into your mobile and desktop applications.

There are different ways to build the frontend experience, especially when it comes to the sequence of steps in the payment flow. This guide is more like a list of building blocks and ideas for what you can do, rather than a strict step-by-step guide.

For example, you can put sign up/log in step as a first step, then show the currency calculator, and then collect recipient details.
Alternatively, you can build it so a user starts from the calculator, then you collect recipient details, and as a last step ask user to sign up/log in.

We have plenty of examples to show you how this has been done by our current partners and can help you to build a great experience for your customers.

## Building your backend

 You should expose an API internally for your web and mobile clients to call to provide the required TransferWise features. Your backend system will manage both communication to the TransferWise API and internal operations such as checking a user has sufficient balance to make the requested transfer and triggering the funds to be sent to TransferWise when they confirm a transfer.

 You should also store a copy of certain data relating to TransferWise to decrease latency and increase resiliency when users review previous transfers they made or recipients they sent funds to. The extent of what you store will depend on your integration.

 You should also build a polling mechanism to periodically update the status of a transfer and its delivery estimate, keeping your user up to date of where their transfer is in the process.
 
 We have a dedicated team focusing on bank partnerships who will help you along the way, sharing knowledge and experience from previous integrations to help you build a robust and highly available system.

## Your TransferWise  user experience

### User onboarding flow

The user onboarding flow consists of these building blocks.  
You need to go through this flow only once for each customer before they can set up their first transfer.

* [Get user authorization for existing accounts](#bank-integrations-guide-legacy-get-user-authorization-for-existing-accounts) or  [sign up a new user via API](#bank-integrations-guide-legacy-sign-up-new-users-via-api)
* [Get user tokens](#bank-integrations-guide-legacy-get-user-tokens)
* [Create personal user profile](#bank-integrations-guide-legacy-create-personal-user-profile)
* [Create business user profile](#bank-integrations-guide-legacy-create-business-user-profile) - this is an optional step only to be used if your bank is providing business customers access to TransferWise.

### Transfer flow

To create transfers on behalf of users you need these building blocks:

* [Refresh user's access token](#bank-integrations-guide-legacy-refresh-user-access-token)
* [Create quote](#bank-integrations-guide-legacy-create-quote)
* [Create recipient account](#bank-integrations-guide-legacy-create-recipient-account)
* [Create transfer](#bank-integrations-guide-legacy-create-transfer)
* [Fund transfer](#bank-integrations-guide-legacy-fund-transfer)

### Transfer update polling

To keep your users informed of the status and estimated time of arrival of their transfer:

* [Transfer status](#bank-integrations-guide-legacy-track-transfer-status)
* [Delivery estimate](#bank-integrations-guide-legacy-get-updated-transfer-delivery-time-estimate)

This process should not be used - webhooks are available in the new documentation: [TransferWise for Banks API documentation](https://transferwise.github.io/api-docs-banks/#application-webhooks)

## Get user authorization for existing accounts

At a high level there are three steps to gaining access to an existing TransferWise account.
<ol>
  <li>Your app redirects the user to TransferWise authorization webpage, which prompts them to login if necessary.<br/>
  </li>
  <li>The user logs in to TransferWise.</li>
  <li>The user agrees to provide access.</li>
  <li>The user is redirected back to your preconfigured callback URL; including a code you can use to generate user tokens, and the profile(s) that the user token can be used with, e.g.
  `
  https://www.yourbank.com/?code=[CODE]&profileId=[PROFILE ID]
  `
  </li>
</ol>

These steps are explained in more detail below.

###  1. Your banking app redirects user to TransferWise authorization webpage

Your website or app opens the following url in the user's browser.

Sandbox:  
`
https://sandbox.transferwise.tech/oauth/authorize/?client_id={clientId}&redirect_uri={redirectUri}
` <br/>
Live:  
`
https://transferwise.com/oauth/authorize/?client_id={clientId}&redirect_uri={redirectUri}
`

List of available parameters:

Parameter | Description
--------- | -----------
client_id (required) | The client ID you received from us.
redirect_uri (required) | The preconfigured URL in your application where users will be sent after authorization.
state | An opaque value, used for security purposes. If this parameter is set in the request, then it is returned to the application as part of the redirect_uri. <a href="https://auth0.com/docs/protocols/oauth2/oauth-state" target="_blank" rel="noopener noreferrer">More about state parameter</a>.

*On mobiles apps you should not use `WebView` components to show the authorization page to the users because they are not secure and will not allow users to log in to TransferWise with Google, which is an option used by some of our users. Your app should instead open the device's full browser app.*

*Please also note that provided `[CODE]` expires within 30 minutes and is one time use only.*

### 2. The user logs in to TransferWise

Our usual log in screens are presented to the user if they are not already logged in on the browser being used. If enabled for a user they will also be prompted to go through our two-factor authentication procedure.

### 3. The user agrees to grant access and we forward them to your *redirect_url*

Once a user gives your banking app authorization to connect to TransferWise and access their data, the user is redirected back to your *redirect_url* with a generated code query string value. For example

`https://www.yourbank.com/?code=[CODE]&profileId=[PROFILE ID]`

Your website or service can then use this code to obtain the access token to act on behalf of the user account described in the [get user tokens](#bank-integrations-guide-legacy-get-user-tokens) section.

The profileId parameter specifies which profiles this access token can be used with.

If you are building your TransferWise integration as a native mobile phone app then the redirect URL should be able to handle returning the user to the correct place in the app.

At the point you gain access to a user account you should double check it is the one you were expecting to be given access to - sometimes users can get confused and log in to a different account. Together we want to avoid TransferWise accounts being linked to bank accounts of a different person or business, therefore you should check the user's details once the link is created. Currently you should do this sanity check based on the date of birth of the user but are working on a more robust solution. If the DoB exists but doesn't match then you should not allow the link to be made and inform the user we do not think the accounts match and to get in touch with customer service.

### Error handling

When authorization request returns an error response, we display the message on our webpage. The user may also see a link back to your application, with `error` and `error_description` parameters in the url instead of `code`.

## Sign up new users via API

If the user doesn't already have a TransferWise account then you can create one for them. The [sign up with registration code](#users-sign-up-with-registration-code) feature lets you create new users directly via an API call, without the need to redirect new users to the TransferWise authorization page. This way new users can complete everything without ever leaving your banking app, making a very streamlined flow.

We can provide this option to banks where we can create a trusted reliance model on your KYC processes. Please discuss this option with the team supporting your integration.

Existing TransferWise users will always need to be redirected to authorization page flow, you can detect this at the point you attempt to create the user based ont he API response.

*Note that these new users have to accept TransferWise Terms and Conditions as part of their sign up process nevertheless. See endpoint [Terms and conditions](#terms-and-conditions-get-terms-and-conditions).*

## Get user tokens

When using the first option to ([get user authorization for existing accounts ](#bank-integrations-guide-legacy-get-user-authorization-for-existing-accounts)) then this step is to generate user-level tokens so you can call API endpoints on behalf of the user who authorized your banking app. You do this using the access code that was returned to you as a query string parameter in the *redirect_uri* you provided us.

> Example Request:

```shell
curl \
-u '[your-api-client-id]:[your-api-client-secret]' \
-d 'grant_type=authorization_code' \
-d 'client_id=[your-api-client-id]' \
-d 'code=[code-from-redirect-uri]' \
-d 'redirect_uri=https://www.yourbank.com' \
'https://api.sandbox.transferwise.tech/oauth/token' 
```

You will be returned an access token and a refresh token.

> Example Response:

```json
  {
    "access_token":"ba8k9935-62f2-475a-60d8-6g45377b4062",
    "token_type":"bearer",
    "refresh_token":"a235uu9c-9azu-4o28-a1kn-e15500o151cx",
    "expires_in": 43199,
    "scope":"transfers"
  }
```
For calling API endpoints you need to provide the user's `access_token` in the request's HTTP header in the format `Authorization: Bearer <access_token>`.
Access tokens are short lived for security reasons, they are only valid for 12 hours by default. When they expire you need to use the `refresh_token` to generate a new access_token.

This means you have to securely store the user's `refresh_token` in order to generate a new `access_token` each time they use your TransferWise integration, or you poll for updated data,

### Request

**`POST https://api.sandbox.transferwise.tech/oauth/token`**

Use Basic Authentication with your api-client-id/api-client-secret as username/pwd.

Field                 | Description                                   | Format
---------             | -------                                       | -----------
grant_type            | "authorization_code"                          | Text
client_id             | your api_client_id                            | Text
code                  | Code  provided to you upon redirect back from authorization flow. See step [Get user authorization](#bank-integrations-guide-legacy-get-user-authorization).  | Text
redirect_uri          | Redirect page associated with your api client credentials   | Text

### Response

Field                 | Description                                   | Format
---------             | -------                                       | -----------
access_token          | Access token to be used when calling API endpoints on behalf of user. Valid for 12 hours. | Text
token_type            | "bearer"                                      | Text
refresh_token         | Refresh token which you need to use in order to request new access_token. The lifetime of refresh tokens is 10 years. | Text
expires_in            | Expiry time in seconds                        | Integer
scope                 | "transfers"                                   | Text

## Refresh user access token

> Example Request:

```shell
      curl \
      'https://api.sandbox.transferwise.tech/oauth/token' \
      -u '[your-api-client-id]:[your-api-client-secret]' \
      -d 'grant_type=refresh_token' \
      -d 'refresh_token=[user's refresh token]'
```

> Example Response:

```json
  {
    "access_token":"be69d566-971e-4e15-9648-85a486195863",
    "token_type":"bearer",
    "refresh_token":"1d0ec7b9-b569-426d-a18d-8dead5b6a3cc",
    "expires_in":43199,
    "scope":"transfers"
  }
```

Access tokens are valid for 12 hours, so upon expiry you need to use refresh_token to generate new access_token. 

In order to maintain an uninterrupted connection, you can request a new access token whenever it’s close to expiring.
There is no need to wait for the actual expiration to happen first. 

### Request

**`POST https://api.sandbox.transferwise.tech/oauth/token`**

Use Basic Authentication with your api-client-id/api-client-secret as username/pwd.

Field                 | Description                                   | Format
---------             | -------                                       | -----------
grant_type            | "refresh_token"                               | Text
refresh_token         | User's refresh_token obtained in [Get user tokens](#bank-integrations-guide-legacy-get-user-tokens) step. | Text

### Response

Field                 | Description                                   | Format
---------             | -------                                       | -----------
access_token          | Access token to be used when calling API endpoints on behalf of user. Valid for 12 hours. | Text
token_type            | "bearer"                                      | Text
refresh_token         | Refresh token which you need to use in order to request new access_token once the existing one expires | Text
expires_in            | Expiry time in seconds                        | Integer
scope                 | "transfers"                                   | Text

## Token Expiry

It is possible that a user's refresh token will become invalid. This could happen for a number of reasons, for example:

* The user revokes access for your application to their account.
* The user enables enhanced security on their TransferWise account.
* TransferWise revoke tokens due to a security breach of your client secret.

Due to this possibility your application should handle a failing refresh token scenario - to do this depends on how you originally gained access to the user.

### 1. An existing user granted your application access to the account
If you were granted access by an existing user then you should send the user through the same flow as you initially did to generate tokens described in [get user authorization for existing accounts](#bank-integrations-guide-legacy-get-user-authorization-for-existing-accounts).

### 2. Your application created the user
In the case you created the user using the [sign up new users via API](#bank-integrations-guide-legacy-sign-up-new-users-via-api) flow then the mechanism for regenerating tokens is dependent on whether the user you created has "reclaimed" their TransferWise account and used our website or apps directly.

If the user has not reclaimed their account then the original `registrationCode` you generated should still be able to generate new tokens for the user. Because of this you should store this code alongside the created user ID in your database at the point of user generation.

If the previously stored token fails with an error code 400 and error:

```json
{
  "error": "invalid_grant",
  "error_description": "Invalid user credentials."
}
```
In this case you can assume the user has reclaimed the account and push them through the [get user authorization for existing accounts](#bank-integrations-guide-legacy-get-user-authorization-for-existing-accounts) flow.

## Create personal user profile
When you first get access to a user's TransferWise user account you cannot predict if they already have submitted their profile data or not.

The [User Profiles.List](#user-profiles-list) endpoint will give you data for both personal and business profiles, if they exist. This makes it easy to
figure out if a user has already set up this data with TransferWise or not. If the user already has a personal profile set up, then you can skip this creation step.

If you are using the [sign up new users via API](#bank-integrations-guide-legacy-sign-up-new-users-via-api) feature then you absolutely need to create personal profile for the user, however it is possible you will also need to do it when getting access to an existing user account.

There are three steps to creating a new personal user profile:

1) [Create personal user profile – general data](#user-profiles-create-personal). This includes customer name, date of birth, and phone number. 

2) [Open update window](#user-profiles-open-update-window). Open the update window for the profile updates.

3) [Create personal user profile – address data](#addresses-create). Add address information to the personal user profile.

4) [Close update window](#user-profiles-close-update-window). Close the update window for the profile updates.

## Create business user profile
A personal profile has to be created first. You can’t create a business user profile without a personal profile.

Creating a business profile is similar to how you created a personal profile. There are four steps:

1) [Create business user profile – general data](#user-profiles-create-business). This includes business name, type and other information. 

2) [Open update window](#user-profiles-open-update-window). Open the update window for the profile updates.

3) [Create business user profile – address data](#addresses-create). Add address information to the business user profile.

4) [Create business user profile - director data](#user-profiles-add-business-directors). Add business director information to the business user profile.

5) [Create business user profile - UBO data](#user-profiles-add-business-ultimate-beneficial-owners). Add ultimate business owner information to the business user profile.

6) [Close update window](#user-profiles-close-update-window). Close the update window for the profile updates.


## Create quote
Please look at [Create quote](#quotes-create) under Full API Reference.

You need to set quote type as "REGULAR".

## Create or select recipient account
Please look at [Create recipient account](#recipient-accounts-create) under Full API Reference for information on the calls to create recipients.

It is also recommended that you use the `GET accounts` endpoint to load the user's previously used recipients and allow them to select from them in your user interface. This allows them to only have to create a recipient once and then re-use it in future, plus it allows existing TransferWise users to use their familiar users from our platform.

When returning this list please filter out any recipient of type `SwiftCode`, unfortunately API limitations mean these cannot be used in bank integrations.

You should store a cached copy of the recipients that are _used_ or _created_ by users of your app such that you can load that data again quickly to show in your app, for example a transfer tracking screen might show recipient data.

Please note, when creating a new transfer always reload the full list of recipients over our API as cannot be certain the recipients you store a copy of have not been deleted in the meantime.

## Create transfer
Please look at [Create transfer](#transfers-create) under Full API Reference.
 
## Fund transfer 
Once you have successfully created a transfer via the TransferWise API 
you should debit the exact source amount from your customer's bank account 
and send the funds to TransferWise’s local bank account via domestic payment. You should send the amount provided in the quote object you created in the first step of the process. The details of this bank account will be shared with you by the TransferWise team helping your integration.

In order for us to link this incoming domestic payment with a corresponding transfer order, we need you to use specific text in the "payment reference" field.
Calling endpoint [Get pay-in methods](#quotes-get-pay-in-methods) with quoteId returns you the correct reference text, e.g. `quote-1456477 P5472304`. We currently drive this behaviour using the second part of this string, starting with _P_, you should use a regular expression to extract this string to send as the reference, e.g. `.*(P\d+)`, taking the second group.
 
## Track transfer status
Please look at [Track transfer status](#payouts-guide-track-transfer-status) under TransferWise Payouts Guide.
 
## Get updated transfer delivery time estimate
Please look at [Get transfer delivery time](#payouts-guide-get-transfer-delivery-time) under TransferWise Payouts Guide.

## Updating personal profile
When user data changes the personal profile information must be updated.

1) [Open update window](#user-profiles-open-update-window). Open the update window for profile updates.

2) [Update personal profile - general data](#user-profiles-update). Update the personal profile data.
 
3) [Close update window](#user-profiles-close-update-window). Close the update window for profile updates.
 
## Updating business profile
When business data changes the business profile information must be updated.

1) [Open update window](#user-profiles-open-update-window). Open the update window for profile updates.

2) [Update business profile - general data](#user-profiles-update). Update the business profile data.

3) [Update business profile - directors data](#user-profiles-update-business-directors). Update directors information in the business user profile.

3) [Update business profile - UBO data](#user-profiles-update-business-ultimate-beneficial-owners). Update ultimate business owners information in the business user profile.
 
4) [Close update window](#user-profiles-close-update-window). Close the update window for profile updates.

## Edge case handling
This section discusses some edge cases that you should test and handle before going live with your integration.

### Email address considerations
Due to how getting access to user accounts works the TransferWise platform relies on user email addresses matching between the bank and ourselves. At the point the bank attempts to create a user we check and see if an account already exists for that email address, if so we return a 409 response and the client application forwards the user to login to TransferWise to do the OAuth grant flow.

This works well when the email addresses match in the first place and aren't updated on either side after the link is established. Of course, this is not always going to be the case so we must consider what happens in either eventuality.

### Non-matching email addresses

If a user already has a TransferWise account and you create a user for the same person under a different email address they could end up with a duplicate user account under the second email address. Currently we monitor this behaviour for abuse but we are working on a more robust user creation solution to prevent this occurring.

### Email Change

It is possible to change a user’s email address both at TransferWise and potentially also on the bank platform. These flows can cause complications with the integration.

### Email changed at TransferWise

If a user changes their email address all tokens to the user account are revoked. In this case the bank will receive a 400 when attempting to generate an access_token and as such should follow the same process as described in the [token expiry](#bank-integrations-guide-legacy-token-expiry) section above and start the sign up flow from the beginning.

In this case, if the user has changed their email address at TransferWise, it is possible the user will end up with a new TransferWise account using their old email address still held by the bank, or they might link their bank account to a different already existing TransferWise account under the old email address.

### Email changed at the bank
In this case the tokens will remain valid for the TransferWise account, however, depending on how the user originally linked the account, different things can happen when/if that token expires.

If the bank created the account originally they will be unable to generate tokens using the registration_code they have as the endpoint requires the email address which will now no longer match. To mitigate this it is recommended that the bank store the email that was originally used for sign up alongside the registration code and use this rather than the most up to date email address they store for the user.

If the token expires for a user not created by the bank and the user has a new email address at the bank then they can be pushed through the sign up flow with this new email address and either have a new account created or link an existing against the new email, as described in [token expiry](#bank-integrations-guide-legacy-token-expiry).

The result of many of these flows is that the user may end up with more than one TransferWise account, which is undesirable. Currently we monitor this behaviour for abuse but we are working on a more robust user creation scenario to prevent this occurring.

### Email change mitigation 
The result of these eventualities are that over time a user of the bank could be linked to more than one TransferWise account and so therefore you will need to be defensive when requesting older user data as the request may fail because we forbid one user to access other user's data. We recommend to keep a local copy of your user's transfer data and update it asynchronously such that older transfers remain accessible to the user in the case where it can no longer be accessed. You should also make sure to handle these failing calls gracefully and continue to process transfers that can be accessed over the API.

In the event a user is not happy at losing access to their older data or having two accounts is confusing then we can manually update the email addresses to match for the two accounts they want.

## Going live checklist
### 1. Make your integration bulletproof
  * Implement basic retry mechanism to handle potential failures or network interruptions 
  * Implement duplicate prevention mechanism to avoid duplicate payments. Verify that a unique identifier is generated for each individual payment and its value is kept same in case of retrying.
  * Implement basic logging to help out in debugging and problem solving, if needed.
  * Check that you can handle all possible transfer states during polling of transfer info.
  * Handle the potential issues described in [edge case handling](#bank-integrations-guide-legacy-edge-case-handling).
  * Required data fields for user profile addresses, recipients, and transfers vary for different currencies. Please explore [Recipient Accounts.Requirements](#recipient-accounts-requirements), [Transfers.Requirements](#transfer-requirements) and [Addresses.Requirements](#addresses-requirements).

### 2. Set up security for LIVE environment
  * Make sure you have received and successfully decrypted Live API credentials, storing them securely.
  * Ensure access tokens and refresh tokens are also stored securely and only exposed to authorized persons.
  * Make sure your server has TLS version 1.2 or higher.
  * Implement a mechanism to obtain new access token upon expiration.
  
### 3. Do some testing in LIVE
  * Launch LIVE integration to a limited set of your customers and test all currency routes you will offer end-to-end. 
  * We recommend launching a limited set of currencies initially to limit the scope of potential issues, please seek guidance from the TransferWise team.
  * Test successful flow and bounce back flow (where funds cannot be delivered). 
  * All set. Switch it on.

### 4. Sign up for API status notifications.
  * You can always track our API status [here](https://status.transferwise.com/).
  * Also you can [sign up](http://eepurl.com/geU_O2) for API status notifications.
