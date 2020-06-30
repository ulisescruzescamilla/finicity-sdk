<?php

namespace FinicityAPILib\Exceptions;

use FinicityAPILib\APIException;
use FinicityAPILib\APIHelper;

/**
 * @todo Write general description for this model
 */
class Error1ErrorException extends APIException
{
    /**
     * @todo Write general description for this property
     * @var integer|null $code public property
     */
    public $code;

    /**
     * @todo Write general description for this property
     * @var string|null $message public property
     */
    public $message;

    /**
     * @todo Write general description for this property
     * @var string|null $assetId public property
     */
    public $assetId;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct($reason, $context)
    {
        parent::__construct($reason, $context);
    }

    /**
     * Unbox response into this exception class
     */
    public function unbox()
    {
        APIHelper::deserialize(self::getResponseBody(), $this, false, false);
    }
}
