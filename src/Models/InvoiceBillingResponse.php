<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InvoiceBillingResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\Content[] $content public property
     */
    public $content;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $pageable public property
     */
    public $pageable;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $totalPages public property
     */
    public $totalPages;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $totalElements public property
     */
    public $totalElements;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $last public property
     */
    public $last;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $size public property
     */
    public $size;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $number public property
     */
    public $number;

    /**
     * @todo Write general description for this property
     * @required
     * @var \FinicityAPILib\Models\Sort $sort public property
     */
    public $sort;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $numberOfElements public property
     */
    public $numberOfElements;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $first public property
     */
    public $first;

    /**
     * @todo Write general description for this property
     * @required
     * @maps empty
     * @var bool $mempty public property
     */
    public $mempty;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param array   $content          Initialization value for $this->content
     * @param string  $pageable         Initialization value for $this->pageable
     * @param integer $totalPages       Initialization value for $this->totalPages
     * @param integer $totalElements    Initialization value for $this->totalElements
     * @param bool    $last             Initialization value for $this->last
     * @param integer $size             Initialization value for $this->size
     * @param integer $number           Initialization value for $this->number
     * @param Sort    $sort             Initialization value for $this->sort
     * @param integer $numberOfElements Initialization value for $this->numberOfElements
     * @param bool    $first            Initialization value for $this->first
     * @param bool    $mempty           Initialization value for $this->mempty
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->content          = func_get_arg(0);
            $this->pageable         = func_get_arg(1);
            $this->totalPages       = func_get_arg(2);
            $this->totalElements    = func_get_arg(3);
            $this->last             = func_get_arg(4);
            $this->size             = func_get_arg(5);
            $this->number           = func_get_arg(6);
            $this->sort             = func_get_arg(7);
            $this->numberOfElements = func_get_arg(8);
            $this->first            = func_get_arg(9);
            $this->mempty           = func_get_arg(10);
        }
    }

    
    /**
     * Add an additional property to this model.
     * @param string $name  Name of property
     * @param mixed  $value Value of property
     */
    public function addAdditionalProperty($name, $value)
    {
        $this->additionalProperties[$name] = $value;
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['content']          = $this->content;
        $json['pageable']         = $this->pageable;
        $json['totalPages']       = $this->totalPages;
        $json['totalElements']    = $this->totalElements;
        $json['last']             = $this->last;
        $json['size']             = $this->size;
        $json['number']           = $this->number;
        $json['sort']             = $this->sort;
        $json['numberOfElements'] = $this->numberOfElements;
        $json['first']            = $this->first;
        $json['empty']            = $this->mempty;

        return array_merge($json, $this->additionalProperties);
    }
}
