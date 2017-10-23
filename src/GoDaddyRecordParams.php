<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/23/17
 * Time: 8:30 PM
 */

namespace GoDaddy;

/**
 * Helper class for crating DNS records
 * Class GoDaddyRecordParams
 * @package GoDaddy
 */
class GoDaddyRecordParams
{
    /**
     * @var string
     */
    public $type = '';

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $data = '';

    /**
     * @var string
     */
    public $priority = '';

    /**
     * @var string
     */
    public $ttl = '';

    /**
     * @var string
     */
    public $service = '';

    /**
     * @var string
     */
    public $protocol = '';

    /**
     * @var string
     */
    public $port = '';
 
    /**
     * @var string
     */
    public $weight = '';
}