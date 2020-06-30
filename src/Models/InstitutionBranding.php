<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class InstitutionBranding implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $logo public property
     */
    public $logo;

    /**
     * @todo Write general description for this property
     * @var string|null $alternateLogo public property
     */
    public $alternateLogo;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $icon public property
     */
    public $icon;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $alternateIcon public property
     */
    public $alternateIcon;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $primaryColor public property
     */
    public $primaryColor;

    /**
     * @todo Write general description for this property
     * @var string|null $secondaryColor public property
     */
    public $secondaryColor;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $gradientColorTop public property
     */
    public $gradientColorTop;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $gradientColorBottom public property
     */
    public $gradientColorBottom;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $tile public property
     */
    public $tile;

    /**
     * @todo Write general description for this property
     * @var string|null $tileSmall public property
     */
    public $tileSmall;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $buttonTextColor public property
     */
    public $buttonTextColor;

    /**
     * All additional properties for this model
     * @var array $additionalProperties public property
     */
    public $additionalProperties = array();

    /**
     * Constructor to set initial or default values of member properties
     * @param string $logo                Initialization value for $this->logo
     * @param string $alternateLogo       Initialization value for $this->alternateLogo
     * @param string $icon                Initialization value for $this->icon
     * @param string $alternateIcon       Initialization value for $this->alternateIcon
     * @param string $primaryColor        Initialization value for $this->primaryColor
     * @param string $secondaryColor      Initialization value for $this->secondaryColor
     * @param string $gradientColorTop    Initialization value for $this->gradientColorTop
     * @param string $gradientColorBottom Initialization value for $this->gradientColorBottom
     * @param string $tile                Initialization value for $this->tile
     * @param string $tileSmall           Initialization value for $this->tileSmall
     * @param string $buttonTextColor     Initialization value for $this->buttonTextColor
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->logo                = func_get_arg(0);
            $this->alternateLogo       = func_get_arg(1);
            $this->icon                = func_get_arg(2);
            $this->alternateIcon       = func_get_arg(3);
            $this->primaryColor        = func_get_arg(4);
            $this->secondaryColor      = func_get_arg(5);
            $this->gradientColorTop    = func_get_arg(6);
            $this->gradientColorBottom = func_get_arg(7);
            $this->tile                = func_get_arg(8);
            $this->tileSmall           = func_get_arg(9);
            $this->buttonTextColor     = func_get_arg(10);
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
        $json['logo']                = $this->logo;
        $json['alternateLogo']       = $this->alternateLogo;
        $json['icon']                = $this->icon;
        $json['alternateIcon']       = $this->alternateIcon;
        $json['primaryColor']        = $this->primaryColor;
        $json['secondaryColor']      = $this->secondaryColor;
        $json['gradientColorTop']    = $this->gradientColorTop;
        $json['gradientColorBottom'] = $this->gradientColorBottom;
        $json['tile']                = $this->tile;
        $json['tileSmall']           = $this->tileSmall;
        $json['buttonTextColor']     = $this->buttonTextColor;

        return array_merge($json, $this->additionalProperties);
    }
}
