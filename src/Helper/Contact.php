<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/29/17
 * Time: 11:19 AM
 */

namespace GoDaddy\Helper;

/**
 * Class Contact
 * @package GoDaddy\Helper
 */
class Contact
{

    /**
     * @var string
     */
    protected $nameFirst = '';

    /**
     * @var string
     */
    protected $nameMiddle = '';

    /**
     * @var string
     */
    protected $nameLast = '';

    /**
     * @var string
     */
    protected $organization = '';

    /**
     * @var string
     */
    protected $jobTitle = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $phone = '';

    /**
     * @var string
     */
    protected $fax = '';

    /**
     * @var Address
     */
    protected $addressMailing;

    /**
     * Contact constructor.
     * @param Address $addressMailing
     */
    public function __construct(Address $addressMailing)
    {
        $this->addressMailing = $addressMailing;
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
    public function getNameFirst(): string
    {
        return $this->nameFirst;
    }

    /**
     * @param string $nameFirst
     * @return $this
     */
    public function setNameFirst(string $nameFirst)
    {
        $this->nameFirst = $nameFirst;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameMiddle(): string
    {
        return $this->nameMiddle;
    }

    /**
     * @param string $nameMiddle
     * @return $this
     */
    public function setNameMiddle(string $nameMiddle)
    {
        $this->nameMiddle = $nameMiddle;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameLast(): string
    {
        return $this->nameLast;
    }

    /**
     * @param string $nameLast
     * @return $this
     */
    public function setNameLast(string $nameLast)
    {
        $this->nameLast = $nameLast;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     * @return $this
     */
    public function setOrganization(string $organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     * @return $this
     */
    public function setJobTitle(string $jobTitle)
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddressMailing(): Address
    {
        return $this->addressMailing;
    }
}