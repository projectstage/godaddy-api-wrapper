<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/29/17
 * Time: 11:14 AM
 */

namespace GoDaddy\Helper;

/**
 * Class DomainContacts
 * @package GoDaddy\Helper
 */
class DomainContacts
{

    /**
     * @var Contact
     */
    protected $contactRegistrant;

    /**
     * @var Contact
     */
    protected $contactAdmin;

    /**
     * @var Contact
     */
    protected $contactTech;

    /**
     * @var Contact
     */
    protected $contactBilling;

    /**
     * DomainContacts constructor.
     * @param Contact $contactRegistrant
     * @param Contact|null $contactAdmin
     * @param Contact|null $contactTech
     * @param Contact|null $contactBilling
     */
    public function __construct(Contact $contactRegistrant, Contact $contactAdmin = null, Contact $contactTech = null, Contact $contactBilling = null)
    {
        $this->contactRegistrant = $contactRegistrant;
        $this->contactAdmin = $contactAdmin;
        $this->contactTech = $contactTech;
        $this->contactBilling = $contactBilling;
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
     * @return Contact
     */
    public function getContactRegistrant(): Contact
    {
        return $this->contactRegistrant;
    }

    /**
     * @return Contact
     */
    public function getContactAdmin(): Contact
    {
        return $this->contactAdmin;
    }

    /**
     * @return Contact
     */
    public function getContactTech(): Contact
    {
        return $this->contactTech;
    }

    /**
     * @return Contact
     */
    public function getContactBilling(): Contact
    {
        return $this->contactBilling;
    }

}