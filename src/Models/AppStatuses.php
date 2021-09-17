<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *The response for the Get App Registration Status endpoint which returns an array of App Status
 * objects to be able to determine their registration status. This is version 2 of this response.
 */
class AppStatuses implements JsonSerializable
{
    /**
     * Total number of applications in query
     * @required
     * @var integer $totalRecords public property
     */
    public $totalRecords;

    /**
     * Total number of pages in application query for size of results per page
     * @required
     * @var integer $totalPages public property
     */
    public $totalPages;

    /**
     * The page number returned as per the application query
     * @required
     * @var integer $pageNumber public property
     */
    public $pageNumber;

    /**
     * The number of records per page as per the application query
     * @required
     * @var integer $numberOfRecordsPerPage public property
     */
    public $numberOfRecordsPerPage;

    /**
     * List of applications with their status information
     * @required
     * @var \FinicityAPILib\Models\AppStatus[] $applications public property
     */
    public $applications;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $totalRecords           Initialization value for $this->totalRecords
     * @param integer $totalPages             Initialization value for $this->totalPages
     * @param integer $pageNumber             Initialization value for $this->pageNumber
     * @param integer $numberOfRecordsPerPage Initialization value for $this->numberOfRecordsPerPage
     * @param array   $applications           Initialization value for $this->applications
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->totalRecords           = func_get_arg(0);
            $this->totalPages             = func_get_arg(1);
            $this->pageNumber             = func_get_arg(2);
            $this->numberOfRecordsPerPage = func_get_arg(3);
            $this->applications           = func_get_arg(4);
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
        $json['totalRecords']           = $this->totalRecords;
        $json['totalPages']             = $this->totalPages;
        $json['pageNumber']             = $this->pageNumber;
        $json['numberOfRecordsPerPage'] = $this->numberOfRecordsPerPage;
        $json['applications']           = $this->applications;

        return array_merge($json, $this->additionalProperties);
    }
}
