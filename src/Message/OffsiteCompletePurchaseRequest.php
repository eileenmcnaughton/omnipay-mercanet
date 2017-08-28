<?php
namespace Omnipay\Mercanet\Message;

/**
 * Authorize Request
 */
class OffsiteCompletePurchaseRequest extends OffsiteAbstractRequest
{
    public function sendData($data)
    {
        return $this->response = new OffsiteCompletePurchaseResponse($this, $data);
    }

    public function getData()
    {
        if (strtolower($this->httpRequest->request->get('x_MD5_Hash')) !== $this->getHash()) {
            throw new InvalidRequestException('Incorrect hash');
        }

        return $this->httpRequest->request->all();
    }
}
