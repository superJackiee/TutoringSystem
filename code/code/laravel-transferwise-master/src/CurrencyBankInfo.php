<?php

namespace TransferWise;


class CurrencyBankInfo
{
    /** @var array  */
    public static $countryToCurrency = [
        'afghanistan' => 'AFN',
        'albania' => 'ALL',
        'algeria' => 'DZD',
        'andorra' => 'EUR',
        'angola' => 'AOA',
        'antigua and barbuda' => 'XCD',
        'argentina' => 'ARS',
        'armenia' => 'AMD',
        'australia' => 'AUD',
        'austria' => 'EUR',
        'azerbaijan' => 'AZN',
        'bahamas' => 'BSD',
        'bahrain' => 'BHD',
        'bangladesh' => 'BDT',
        'barbados' => 'BBD',
        'belarus' => 'BYN',
        'belgium' => 'EUR',
        'belize' => 'BZD',
        'benin' => 'XOF',
        'bhutan' => 'BTN',
        'bolivia' => 'BOB',
        'bosnia and herzegovina' => 'BAM',
        'botswana' => 'BWP',
        'brazil' => 'BRL',
        'brunei' => 'BND',
        'bulgaria' => 'BGN',
        'burkina faso' => 'XOF',
        'burundi' => 'BIF',
        'cambodia' => 'KHR',
        'cameroon' => 'XAF',
        'canada' => 'CAD',
        'cape verde' => 'CVE',
        'central african republic' => 'XAF',
        'chad' => 'XAF',
        'chile' => 'CLP',
        'china' => 'CNY',
        'colombia' => 'COP',
        'comoros' => 'KMF',
        'costa rica' => 'CRC',
        'croatia' => 'HRK',
        'cuba' => 'CUP',
        'cyprus' => 'EUR',
        'czech republic' => 'CZK',
        'democratic republic of congo' => 'CDF',
        'denmark' => 'DKK',
        'djibouti' => 'DJF',
        'dominica' => 'XCD',
        'dominican republic' => 'DOP',
        'east timor' => 'USD',
        'ecuador' => 'USD',
        'egypt' => 'EGP',
        'el salvador' => 'USD',
        'equatorial guinea' => 'XAF',
        'eritrea' => 'ERN',
        'estonia' => 'EUR',
        'ethiopia' => 'ETB',
        'fiji' => 'FJD',
        'finland' => 'EUR',
        'france' => 'EUR',
        'gabon' => 'XAF',
        'gambia' => 'GMD',
        'georgia' => 'GEL',
        'germany' => 'EUR',
        'ghana' => 'GHS',
        'greece' => 'EUR',
        'grenada' => 'XCD',
        'guatemala' => 'GTQ',
        'guinea' => 'GNF',
        'guinea-bissau' => 'XOF',
        'guyana' => 'GYD',
        'haiti' => 'HTG',
        'honduras' => 'HNL',
        'hungary' => 'HUF',
        'iceland' => 'ISK',
        'india' => 'INR',
        'indonesia' => 'IDR',
        'iran' => 'IRR',
        'iraq' => 'IQD',
        'ireland' => 'EUR',
        'israel' => 'ILS',
        'italy' => 'EUR',
        'ivory coast' => 'XOF',
        'jamaica' => 'JMD',
        'japan' => 'JPY',
        'jordan' => 'JOD',
        'kazakhstan' => 'KZT',
        'kenya' => 'KES',
        'kiribati' => 'AUD',
        'north korea' => 'KPW',
        'south korea' => 'KRW',
        'kosovo' => 'EUR',
        'kuwait' => 'KWD',
        'kyrgyzstan' => 'KGS',
        'laos' => 'LAK',
        'latvia' => 'EUR',
        'lebanon' => 'LBP',
        'lesotho' => 'LSL',
        'liberia' => 'LRD',
        'libya' => 'LYD',
        'liechtenstein' => 'CHF',
        'lithuania' => 'EUR',
        'luxembourg' => 'EUR',
        'macedonia' => 'MKD',
        'madagascar' => 'MGA',
        'malawi' => 'MWK',
        'malaysia' => 'MYR',
        'maldives' => 'MVR',
        'mali' => 'XOF',
        'malta' => 'EUR',
        'marshall islands' => 'USD',
        'mauritania' => 'MRO',
        'mauritius' => 'MUR',
        'mexico' => 'MXN',
        'micronesia' => 'USD',
        'moldova' => 'MDL',
        'monaco' => 'EUR',
        'mongolia' => 'MNT',
        'montenegro' => 'EUR',
        'morocco' => 'MAD',
        'mozambique' => 'MZN',
        'myanmar' => 'MMK',
        'namibia' => 'NAD',
        'nauru' => 'AUD',
        'nepal' => 'NPR',
        'netherlands' => 'EUR',
        'new zealand' => 'NZD',
        'nicaragua' => 'NIO',
        'niger' => 'XOF',
        'nigeria' => 'NGN',
        'norway' => 'NOK',
        'oman' => 'OMR',
        'pakistan' => 'PKR',
        'palau' => 'USD',
        'palestine' => 'ILS',
        'panama' => 'PAB',
        'papua new guinea' => 'PGK',
        'paraguay' => 'PYG',
        'peru' => 'PEN',
        'philippines' => 'PHP',
        'poland' => 'PLN',
        'portugal' => 'EUR',
        'qatar' => 'QAR',
        'republic of the congo' => 'XAF',
        'romania' => 'RON',
        'russia' => 'RUB',
        'rwanda' => 'RWF',
        'saint kitts and nevis' => 'XCD',
        'saint lucia' => 'XCD',
        'saint vincent and the grenadines' => 'XCD',
        'samoa' => 'WST',
        'san marino' => 'EUR',
        'são tomé and príncipe' => 'STD',
        'saudi arabia' => 'SAR',
        'senegal' => 'XOF',
        'serbia' => 'RSD',
        'seychelles' => 'SCR',
        'sierra leone' => 'SLL',
        'singapore' => 'SGD',
        'slovakia' => 'EUR',
        'slovenia' => 'EUR',
        'solomon islands' => 'SBD',
        'somalia' => 'SOS',
        'south africa' => 'ZAR',
        'south sudan' => 'SSP',
        'spain' => 'EUR',
        'sri lanka' => 'LKR',
        'sudan' => 'SDG',
        'suriname' => 'SRD',
        'swaziland' => 'SZL',
        'sweden' => 'SEK',
        'switzerland' => 'CHF',
        'syria' => 'SYP',
        'taiwan' => 'TWD',
        'tajikistan' => 'TJS',
        'tanzania' => 'TZS',
        'thailand' => 'THB',
        'togo' => 'XOF',
        'tonga' => 'TOP',
        'trinidad and tobago' => 'TTD',
        'tunisia' => 'TND',
        'turkey' => 'TRY',
        'turkmenistan' => 'TMT',
        'tuvalu' => 'AUD',
        'uganda' => 'UGX',
        'ukraine' => 'UAH',
        'united arab emirates' => 'AED',
        'united kingdom' => 'GBP',
        'united states' => 'USD',
        'uruguay' => 'UYU',
        'uzbekistan' => 'UZS',
        'vanuatu' => 'VUV',
        'vatican city' => 'EUR',
        'venezuela' => 'VEF',
        'vietnam' => 'VND',
        'yemen' => 'YER',
        'zambia' => 'ZMW',
        'zimbabwe' => 'USD',
    ];

    /** @var array */
    private static $requiredInfo = [
        'AED' => [
            'country' => 'United Arab Emirates',
            'type' => 'emirates',
            'details' => [
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
            'currency' => 'AED',
        ],
        'ARS' => [
            'country' => 'Argentina',
            "currency" => "ARS",
            "type" => "argentina",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "taxId" => [
                    'text' => 'TAX ID',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'AUD' => [
            'country' => 'Australia',
            "type" => "australian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bsbCode" => [
                    'text' => 'BSB Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'BDT' => [
            'country' => 'bangladesh',
            "type" => "bangladesh",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "branchCode" => [
                    'text' => 'Branch Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'BGN' => [
            'country' => 'Bulgaria',
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'BRL' => [
            'country' => 'brazil',
            "type" => "brazil",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "branchCode" => [
                    'type' => 'text',
                    'text' => 'Branch Code',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['Checking', 'Savings'],
                ],
                "cpf",
                "phoneNumber",
            ],
        ],
        'CAD' => [
            'country' => 'canada',
            "type" => "canadian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "institutionNumber" => [
                    'type' => 'text',
                    'text' => 'Institution Number',
                ],
                "transitNumber" => [
                    'type' => 'text',
                    'text' => 'Transit Number',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['Checking', 'Savings'],
                ],
            ],
        ],
        'CHF' => [
            'country' => 'Switzerland',
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'CLP' => [
            'country' => 'Chile',
            "type" => "chile",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "rut" => [
                    'text' => 'RUT / RUN',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['Checking', 'Savings'],
                ],
                "phoneNumber" => [
                    'text' => 'Phone Number',
                    'type' => 'text',
                ],
            ],
        ],
        'CNY' => [
            'country' => 'china',
            "type" => "chinese_card",
            "PRIVATE_ONLY" => true,
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "cardNumber" => [
                    'text' => 'Card Number',
                    'type' => 'text',
                ],
            ],
        ],
        'CZK' => [
            'country' => 'czech',
            "type" => "czech",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'DKK' => [
            'country' => ['Denmark', 'Greenland', 'Faroe Islands', 'Kingdom of Denmark'],
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'EGP' => [
            'country' => ['egypt', 'Palestine', 'Khedivate of Egypt', 'Palestinian territories'],
            "type" => "egypt_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'EUR' => [
            'country' => ['Germany', 'Italy', 'France', 'Spain', 'Portugal', 'Greece', 'Netherlands', 'Austria', 'Belgium', 'Ireland', 'Lithuania', 'cyprus', 'finland', 'Slovakia', 'Slovenia', 'Estonia', 'Malta'],
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'GBP' => [
            "type" => "sort_code",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "sortCode" => [
                    'text' => 'Sort Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'GEL' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'GHS' => [
            "type" => "ghana_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'HKD' => [
            "type" => "hongkong",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'HRK' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'HUF' => [
            "type" => "hungarian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'IDR' => [
            "type" => "indonesian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'ILS' => [
            "type" => "israeli_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        "INR" => [
            "type" => "indian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "ifscCode" => [
                    'type' => 'text',
                    'text' => 'IFSC Code',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'JPY' => [
            "type" => "japanese",
            "details" => [
                "branchCode" => [
                    'type' => 'text',
                    'text' => 'Branch Code',
                ],
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['General', 'Savings', 'Checking'],
                ],
            ],
        ],
        'KES' => [
            "type" => "kenya_local",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'LKR' => [
            "type" => "srilanka",
            "details" => [
                "branchCode" => [
                    'type' => 'text',
                    'text' => 'Branch Code',
                ],
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'MAD' => [
            "type" => "morocco",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'MXN' => [
            "type" => "mexican",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "clabe" => [
                    'type' => 'text',
                    'text' => 'clabe',
                ],
            ],
        ],
        'MYR' => [
            "type" => "malaysian",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "swiftCode" => [
                    'type' => 'text',
                    'text' => 'SWIFT Code',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'NGN' => [
            "type" => "nigeria",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'NOK' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'NPR' => [
            "legalType" => "PRIVATE",
            "details" => [
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'NZD' => [
            "type" => "newzealand",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'PEN' => [
            "type" => "peru",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "accountType" => [
                    'type' => 'select',
                    'text' => 'Account Type',
                    'options' => ['CHECKING', 'SAVINGS'],
                ],
                "idDocumentType" => [
                    'type' => 'text',
                    'text' => 'Document Type',
                    'placeholder' => 'DNI',
                ],
                "idDocumentNumber" => [
                    'type' => 'text',
                    'text' => 'Document ID Number',
                    'placeholder' => '09740475',
                ],
                "phoneNumber" => [
                    'type' => 'text',
                    'text' => 'Phone Number',
                    'placeholder' => '9123456789',
                ],
            ],
        ],
        'PHP' => [
            "type" => "philippines",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code / Post Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
        'PKR' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'PLN' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'RON' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'RUB' => [
            "type" => "russiarapida",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "russiaRegion",
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code / Post Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
        'SEK' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'SGD' => [
            "type" => "singapore",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                    'placeholder' => '104000029',
                ],
                "accountNumber" => [
                    'type' => 'text',
                    'text' => 'Account Number',
                    'placeholder' => '1234567890',
                ],
            ],
        ],
        'THB' => [
            "type" => "thailand",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "bankCode" => [
                    'text' => 'Bank Code',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code / Post Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
        'TRY' => [
            "type" => "iban",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "IBAN" => [
                    'type' => 'text',
                    'text' => 'IBAN',
                ],
            ],
        ],
        'UAH' => [
            "type" => "privatbank",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "phoneNumber" => [
                    'text' => 'Phone Number',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'type' => 'text',
                ],
            ],
        ],
        'USD' => [
            "type" => "aba",
            "details" => [
                "legalType" => [
                    'text' => 'Account Type',
                    'type' => 'select',
                    'options' => ['PRIVATE', 'BUSINESS'],
                ],
                "abartn" => [
                    'text' => 'Routing Number',
                    'placeholder' => '104000029',
                    'type' => 'text',
                ],
                "accountNumber" => [
                    'text' => 'Account Number',
                    'placeholder' => '1234567890',
                    'type' => 'text',
                ],
                "accountType" => [
                    "type" => 'select',
                    "options" => ['CHECKING', 'Savings'],
                ],
                "address" => [
                    "type" => 'fields',
                    "fields" => [
                        'country' => [
                            'text' => 'Country',
                            'type' => 'text',
                        ],
                        'city' => [
                            'text' => 'City',
                            'type' => 'text',
                        ],
                        'postCode' => [
                            'text' => 'Zip Code',
                            'placeholder' => '123456',
                            'type' => 'text',
                        ],
                        'firstLine' => [
                            'text' => 'Street Address',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
    ];

    /**
     * It will return required information for the given currency
     * @param $currency
     * @return array
     * @throws \Exception
     */
    public static function get(string $currency): array {
        if (!self::isSupported($currency)) {
            throw new \Exception('Provided currency (' . $currency . ') is not supported');
        }
        return self::getCurrencyData($currency) ?? self::getCountryData($currency);
    }

    public static function getCountryData(string $country) {
        $currency = self::getCountryCurrency($country);
        return self::getCurrencyData($currency);
    }

    public static function getCountryCurrency(string $country) {
        return self::$countryToCurrency[strtolower($country)] ?? null;
    }

    public static function getCurrencyData(string $currency) {
        return self::$requiredInfo[strtoupper($currency)] ?? null;
    }

    /**
     * It will check if given currency is supported by transferwise
     * @param string $currency
     * @return bool
     */
    public static function isSupported(string $currency): bool {
        $currencySupport =  isset(self::$requiredInfo[strtoupper($currency)]);

        if (!$currencySupport) {
            $currency = self::getCountryCurrency($currency); // may be instead of currency user passed country
            return isset(self::$requiredInfo[strtoupper($currency)]);
        }
        return $currencySupport;
    }
}
