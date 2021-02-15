#Laravel TransferWise Package

This package will allow you to integrate Transferwise API service into your laravel project.

## Usage

#### Add Bank Account
```php
$bankDetails = [
    bankName: 'State bank of India',
    BanCode: '00000', // aka swift code
    accountNumber: '1234567789',
    holderName: 'John Doe',
    additionalDetails = [] // some countries bank may ask something different. So, That will be here. 
]
```
`$user->transferwise()->setBankAccount($bankDetails)`

---

#### Set Accepted Currency
`$user->transferwise()->setCurrency('INR')`

---

### Send money to a user

`$user->transferwise()->send($amount, $currency, $bankDetails = null)' // Amount in cents`

`$user->transferwise()->send('1200', 'USD')'`

---
### Get Quote
`$user->transferwise()->getQoute($amount, $sourceCurrency, $receiverCurrency)`

---

### Create Recipient Account
```php
$user->transferwise()->receipient()->create([
    'currency'  => 'INR',
    'type'      => 'iban', 
    'accountHolderName' => 'John Doe',
    'legalType' => 'PRIVATE', // PRIVATE OR BUSINESS
    'details' => [ //Currency specific fields
        'sortCode' => TEST, //Recipient bank sort code (GBP example)
        'accountNumber' => '123456789'	
    ]
])
```
---

### Get Delivery estimated time for a fund tranfer
```php
$transfer->getETA();
OR
$user->transferwise()->transfer(<transfer-id>)->getETA()
```

---

### Track Transfer
`$transfer->getStatus()`
OR
`$user->transferwise()->transfer(<transfer-id)->getStatus()`

This package is licensed under MIT.



