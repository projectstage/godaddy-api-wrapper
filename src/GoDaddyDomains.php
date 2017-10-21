<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/21/17
 * Time: 11:04 PM
 */

namespace GoDaddy;

/**
 * Class GoDaddyDomains
 * @package GoDaddy\
 */
class GoDaddyDomains
{

    public function __construct(GoDaddyClient $goDaddyClient)
    {
    }

    public function getDomains()
    {
        return $this;
    }
}