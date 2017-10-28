<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/23/17
 * Time: 8:30 PM
 */

namespace GoDaddy\Helper;

/**
 * Helper class for crating DNS records
 * Class GoDaddyDNSRecordParams
 * @package GoDaddy
 */
class GoDaddyDNSRecordParams
{
    CONST DNS_KEY_NS = 'NS';
    CONST DNS_KEY_A = 'A';
    CONST DNS_KEY_CNAME = 'CNAME';
    CONST DNS_KEY_TXT = 'TXT';
    CONST DNS_KEY_SRV = 'SRV';
    CONST DNS_KEY_MX = 'MX';
    CONST DNS_KEY_AAAA = 'AAAA';
    CONST DNS_KEY_CAA = 'CAA';

    /**
     * @var string
     */
    public $type = '';

    /**
     * @var string
     */
    public $name = ' ';

    /**
     * @var string
     */
    public $data = ' ';

    /**
     * @var int
     */
    public $priority = 5;

    /**
     * @var int
     */
    public $ttl = 3600;

    /**
     * @var string
     */
    public $service = ' ';

    /**
     * @var string
     */
    public $protocol = ' ';

    /**
     * @var int
     */
    public $port = 0;
 
    /**
     * @var string
     */
    public $weight = ' ';

    /**
     * GoDaddyDNSRecordParams constructor.
     * @param string $dns_key
     */
    public function __construct(string $dns_key)
    {
        $this->type = $dns_key;
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode($this->prepareParamsContent());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->toJSON(), true);
    }

    /**
     * @return \stdClass
     */
    private function prepareParamsContent()
    {
        $params = new \stdClass();
        switch($this->getType()) {
            case self::DNS_KEY_TXT:
                $params->type = $this->getType();
                $params->name = $this->getName();
                $params->data = $this->getData();
                $params->ttl = $this->getTtl();
                break;
            case self::DNS_KEY_A:

                break;
            case self::DNS_KEY_AAAA:

                break;
            case self::DNS_KEY_CAA:

                break;
            case self::DNS_KEY_CNAME:

                break;
            case self::DNS_KEY_MX:

                break;
            case self::DNS_KEY_NS:

                break;
            case self::DNS_KEY_SRV:

                break;
        }
        return $params;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     * @return $this
     */
    public function setData(string $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->ttl;
    }

    /**
     * @param int $ttl
     * @return $this
     */
    public function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
        return $this;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return $this
     */
    public function setService(string $service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     * @return $this
     */
    public function setProtocol(string $protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return $this
     */
    public function setPort(int $port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     * @return $this
     */
    public function setWeight(string $weight)
    {
        $this->weight = $weight;
        return $this;
    }


}