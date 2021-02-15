<?php
namespace TransferWise;


trait TransferWiseTrait {
    /**
     * @param null $httpMock
     * @return TransferWise
     */
    public function transferWise($httpMock = null) {
        return new TransferWise($httpMock);
    }
}
