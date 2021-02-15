<?php

namespace TransferWise;


use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User;

class Recipient extends TransferWiseAbstract {
    /** @var string */
    public $_type;

    /** @var string */
    public $_currency;

    /** @var string */
    public $_legalType;

    /** @var array */
    public $_bankAccount;

    /** @var string */
    public $_fullName;

    /** @var Authenticatable */
    public $_user;

    /**
     * Recipient constructor.
     * @param User $user
     * @param null $httpClient
     */
    public function __construct(User $user, $httpClient = null) {
        parent::__construct($httpClient);
        $this->setUser($user);
    }

    /**
     * It will set type of the user
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type) : Recipient {
        $this->_type = $type;
        return $this;
    }

    /**
     * It will set currency of the recipient
     *
     * @param string $currency
     * @return $this
     */
    public function setCurrency(string $currency) : Recipient {
        $this->_currency = $currency;
        return $this;
    }

    /**
     * It will set the legal type for the recipient
     * @param string $type
     * @return Recipient
     */
    public function setLegalType(string $type) : Recipient {
        $this->_legalType = $type;
        return $this;
    }

    /**
     * It will set bank account details
     * @param array $bankDetails
     * @return Recipient
     */
    public function setBankAccount(array $bankDetails) : Recipient {
        $this->_bankAccount = $bankDetails;
        return $this;
    }

    /**
     * It will set full name of the user
     * @param string $fullName
     * @return Recipient
     */
    public function setFullName(string $fullName) : Recipient {
        $this->_fullName = $fullName;
        return $this;
    }

    /**
     * It will set the user
     * @param User $user
     * @return Recipient
     */
    public function setUser(User $user) : Recipient {
        $this->_user = $user;
        return $this;
    }

    /**
     * it will save user into transferwise service as a recipient
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save() {
        $this->_validate();
        return $this->post('accounts', $this->_prepareData());
    }

    /**
     * It will prepare array of information which will be sent to transferwise
     * @return array
     */
    private function _prepareData() {
        $details = array_merge([
            'legalType' => $this->_legalType,
        ], $this->_bankAccount);

        $data = [
            'accountHolderName' => $this->_fullName,
            'currency' => $this->_currency,
            'type' => $this->_type,
            'details' => $details
        ];

        return $data;
    }

    /**
     * It will validate if required information is provided by the user
     * @throws \Exception
     */
    private function _validate() {
        if (!$this->_legalType || !$this->_currency || !$this->_bankAccount || !$this->_user || !$this->_type) {
            throw new \Exception('Please provide required information for saving a recipient');
        }
    }
}
