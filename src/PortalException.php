<?php

namespace UnnPortal;

use Exception;
use Zttp\ZttpResponse;

class PortalException extends Exception
{
    /**
     * @var array
     */
    private $errors;

    public static function fromResponse(ZttpResponse $response)
    {
        $body = $response->json();
        $e = new self($body['message']);
        if (isset($body['errors'])) {
            $e->setErrors($body['errors']);
        }
        return $e;
    }

    private function setErrors(array $errors)
    {
        $this->errors = $errors;
    }
}
