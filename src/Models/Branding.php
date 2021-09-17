<?php

namespace FinicityAPILib\Models;

use JsonSerializable;

/**
 *All assets are SVGs so can be slightly resized without any issues.
 */
class Branding implements JsonSerializable
{
    /**
     * File path of the institution's logo.  For white backgrounds designed at 375 x 72, has built in
     * spacing around it to normalize brand sizing.
     * @required
     * @var string $logo public property
     */
    public $logo;

    /**
     * File path of the instiitution's alternate logo.  For colored backgrounds designed at 375 x 72 has
     * built in spacing around it to normalize brand sizing
     * @required
     * @var string $alternateLogo public property
     */
    public $alternateLogo;

    /**
     * File path of the Institution's icon.  For search results designed at 40 x 40
     * @required
     * @var string $icon public property
     */
    public $icon;

    /**
     * Hex code for the Institution's primary color.
     * @required
     * @var string $primaryColor public property
     */
    public $primaryColor;

    /**
     * File path of institution name logo.  For popular banks designed at 160 x 72
     * @required
     * @var string $tile public property
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
