<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GetInstitutionsInstitutionBranding implements JsonSerializable
{
    /**
     * The logo of the institution that’s used for white backgrounds
     * @var string|null $logo public property
     */
    public $logo;

    /**
     * The alternate logo of the institution that’s used for branded or colored backgrounds.
     * @var string|null $alternateLogo public property
     */
    public $alternateLogo;

    /**
     * The branding icon of the institution
     * @var string|null $icon public property
     */
    public $icon;

    /**
     * The branding’s primary color for the institution
     * @var string|null $primaryColor public property
     */
    public $primaryColor;

    /**
     * The branding tile that displays on the Connect Search for a bank page.
     * @var string|null $tile public property
     */
    public $tile;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $logo          Initialization value for $this->logo
     * @param string $alternateLogo Initialization value for $this->alternateLogo
     * @param string $icon          Initialization value for $this->icon
     * @param string $primaryColor  Initialization value for $this->primaryColor
     * @param string $tile          Initialization value for $this->tile
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->logo          = func_get_arg(0);
            $this->alternateLogo = func_get_arg(1);
            $this->icon          = func_get_arg(2);
            $this->primaryColor  = func_get_arg(3);
            $this->tile          = func_get_arg(4);
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
        $json['logo']          = $this->logo;
        $json['alternateLogo'] = $this->alternateLogo;
        $json['icon']          = $this->icon;
        $json['primaryColor']  = $this->primaryColor;
        $json['tile']          = $this->tile;

        return array_merge($json, $this->additionalProperties);
    }
}
