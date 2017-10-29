<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/29/17
 * Time: 11:21 AM
 */

namespace GoDaddy\Helper;

/**
 * Class Address
 * @package GoDaddy\Helper
 */
class Address
{

    /**
     * @var string
     */
    protected $address1 = '';

    /**
     * @var string
     */
    protected $address2 = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * State or province or territory
     * @var string
     */
    protected $state = '';

    /**
     * Postal or zip code
     * @var string
     */
    protected $postalCode = '';

    /**
     * Two-letter ISO country code to be used as a hint for target region
     * @var string
     */
    protected $country = '';

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode($this);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return json_decode($this->toJSON(), true);
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return $this
     */
    public function setAddress1(string $address1)
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     * @return $this
     */
    public function setAddress2(string $address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState(string $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return $this
     */
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
        return $this;
    }
}