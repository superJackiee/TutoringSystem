<?php
namespace TransferWise;


use GuzzleHttp\Client;

abstract class TransferWiseAbstract {

    /** @var Client|Mock */
    protected $_httpClient;

    /** @var string */
    public $_apiKey;

    /** @var string  */
    public $sandboxURI = 'https://api.sandbox.transferwise.tech/v1/';

    /** @var string  */
    public $liveURI = 'https://api.sandbox.transferwise.tech/v1/';

    /**
     * TransferWiseAbstract constructor.
     * @param null $httpClient
     */
    public function __construct($httpClient = null) {
        $this->_setHttpClient($httpClient);
        $this->_setDefaultApiToken();
    }

    /**
     * it will return the instance of http client
     * @return Client|Mock
     */
    public function getHttpClient() : ?Client {
        return $this->_httpClient;
    }

    /**
     * It will set api token
     * @param string $key
     * @return void
     */
    public function setApiToken(string $key) : void {
        $this->_apiKey = $key;
    }

    /**
     * It will set http client for handling http requests
     * @param $httpClient
     * @return void
     */
    private function _setHttpClient($httpClient) : void {
        if (!is_null($httpClient)) {
            $this->_httpClient = $httpClient;
            return;
        }

        $this->_httpClient = new Client([
            'base_uri' => $this->_getBaseURI(),
        ]);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function post(string $uri, array $data = []) {

        $data = array_merge($data, [
            'profile' => $this->_getProfileID()
        ]);

        $options = [
            'headers' => [
                'Authorization' => 'Bearer '.$this->_apiKey,
                "Content-Type" => "application/json"
            ],
            'json' => $data
        ];

        $response =  $this->_httpClient->request('POST', $uri, $options);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param int $amount
     * @return float
     */
    protected function normalizeAmount(int $amount) : float {
        return $amount / 100;
    }

    /**
     * It will get profile id given by the user
     * @return string
     */
    private function _getProfileID() : string {
        return config('transferwise.profile');
    }

    /**
     * It will return base uri
     * @param string $uri
     * @return string
     */
    private function _getBaseURI(string $uri = "") : string {
        if (app()->environment() == 'production') {
            return $this->liveURI . $uri;
        }
        return $this->sandboxURI . $uri;
    }

    /**
     * It will set default api token from env file
     * @return void
     */
    private function _setDefaultApiToken() : void {
        $token = config('transferwise.api-token');
        $this->setApiToken($token);
    }
}
