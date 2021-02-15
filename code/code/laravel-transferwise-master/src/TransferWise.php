<?php

namespace TransferWise;

class TransferWise extends TransferWiseAbstract {

    /**
     * It will make an api request
     * @param int $amount
     * @param string $sourceCurrency
     * @param string $receiverCurrency
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getQuote(int $amount, string $sourceCurrency, string $receiverCurrency) {
        return $this->post('quotes', [
            'source' => $sourceCurrency,
            'target' => $receiverCurrency,
            'rateType' => 'FIXED',
            'targetAmount' => $this->normalizeAmount($amount),
            'type' => 'BALANCE_PAYOUT'
        ]);
    }


}
