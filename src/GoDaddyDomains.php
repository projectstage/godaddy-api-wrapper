<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/21/17
 * Time: 11:04 PM
 */

namespace GoDaddy;

use GoDaddy\Helper\GoDaddyDNSRecordParams;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Class GoDaddyDomains
 * @package GoDaddy\
 */
class GoDaddyDomains
{

    CONST ERROR_CODE_NO_PARAMETER_GIVEN = 2001;
    CONST ERROR_CODE_NO_INSTANCE_OF = 2002;
    CONST ERROR_TYPES_NOT_EQUAL = 2003;

    /**
     * @var Client|null
     */
    protected $Client = null;

    /**
     * @var GoDaddyClient|null
     */
    protected $goDaddyClient = null;

    /**
     * @var string
     */
    protected $base_url = '';

    /**
     * @var array
     */
    protected $authentication_header = [];

    /**
     * GoDaddyDomains constructor.
     * @param GoDaddyClient $goDaddyClient
     */
    public function __construct(GoDaddyClient $goDaddyClient)
    {
        $this->Client = new Client();
        $this->goDaddyClient = $goDaddyClient;
        $this->base_url = $this->goDaddyClient->getApiUrl().'/'.$this->goDaddyClient->getSlug('domains');

        $this->authentication_header = [
            'headers' => [
                'Content-Type: application/json',
                'Accept : application/json',
                'Authorization' => $this->goDaddyClient->getAuthorizationKey().' '.$this->goDaddyClient->getApiKey().':'.$this->goDaddyClient->getApiSecret()
            ]
        ];
    }

    /**
     * return array of objects - list of registered domains
     * @return mixed|string
     */
    public function getDomains()
    {
        try {
            $response = $this->Client->get($this->base_url, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Object of domain details
     * @param string $domain
     * @return mixed|string
     */
    public function getDomain(string $domain)
    {
        try {
            $response = $this->Client->get($this->base_url.'/'.$domain, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Delete a domain
     * @param string $domain
     * @return mixed|string
     */
    public function deleteDomain(string $domain)
    {
        try {
            $response = $this->Client->delete($this->base_url.'/'.$domain, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Update contact data for a given domain
     * @param string $domain
     * @return mixed|string
     * @TODO: create contact and address classes, use them as parameter for this method
     * @see https://developer.godaddy.com/doc#!/_v1_domains/updateContacts/DomainContacts
     */
    public function updateDomain(string $domain)
    {
        try {
//            $response = $this->Client->patch($this->base_url.'/'.$domain.'/contacts', $this->authentication_header);
//            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Do not delete the domain but remove privacy from it. Domain will still be active
     * @param string $domain
     * @return mixed|string
     */
    public function removePrivacyFromDomain(string $domain)
    {
        try {
            $response = $this->Client->delete($this->base_url.'/'.$domain.'/privacy', $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Purchase privacy for a given domain
     * @param string $domain
     * @return mixed|string
     * @TODO: create PrivacyPurchase class
     * @see https://developer.godaddy.com/doc#!/_v1_domains/purchasePrivacy/PrivacyPurchase
     */
    public function purchasePrivacyFromDomain(string $domain)
    {
        try {
//            $response = $this->Client->post($this->base_url.'/'.$domain.'/privacy/purchase', $this->authentication_header);
//            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Array of objects - DNS settings
     * @param string $domain
     * @return mixed
     */
    public function getDns(string $domain)
    {
        try {
            $response = $this->Client->get($this->base_url.'/'.$domain.'/records', $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Array of objects - DNS settings by type - e.g. AAAA|TXT
     * @param string $domain
     * @param string $type
     * @return mixed
     */
    public function getDnsByType(string $domain, string $type)
    {
        try {
            $response = $this->Client->get($this->base_url.'/'.$domain.'/records/'.$type, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Object of a DNS record
     * @param string $domain
     * @param string $type
     * @param string $name
     * @return mixed
     */
    public function getDnsByTypeAndName(string $domain, string $type, string $name)
    {
        try {
            $response = $this->Client->get($this->base_url.'/'.$domain.'/records/'.$type.'/'.$name, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Add one DNS record given by GoDaddyDNSRecordParams
     * @param string $domain
     * @param GoDaddyDNSRecordParams $Params
     * @return string
     */
    public function addDnsRecord(string $domain, GoDaddyDNSRecordParams $Params)
    {
        try {
            $this->authentication_header['json'] = [$Params->toArray()];
            $response = $this->Client->patch($this->base_url.'/'.$domain.'/records', $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Add one or more DNS records given by an array of GoDaddyDNSRecordParams
     * @param string $domain
     * @param array $params
     * @return mixed|string
     */
    public function addDnsRecords(string $domain, array $params)
    {
        if(empty($params) === true) {
            $message = [
                'error' => [
                    'message' => 'No parameter given',
                    'code' => self::ERROR_CODE_NO_PARAMETER_GIVEN
                ]
            ];
            return $this->goDaddyClient->returnData(json_encode($message));
        }

        try {
            $parameter = [];

            foreach($params as $Param) {
                if($Param instanceof GoDaddyDNSRecordParams) {
                    $parameter[] = $Param->toArray();
                } else {
                    $message = [
                        'error' => [
                            'message' => 'Param is not an instance of '.GoDaddyDNSRecordParams::class,
                            'code' => self::ERROR_CODE_NO_INSTANCE_OF
                        ]
                    ];
                    return $this->goDaddyClient->returnData(json_encode($message));
                }
            }
            $this->authentication_header['json'] = $parameter;
            $response = $this->Client->patch($this->base_url.'/'.$domain.'/records', $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Change content of one specified DNS record.
     * @param string $domain
     * @param string $type
     * @param string $name
     * @param GoDaddyDNSRecordParams $Params
     * @return mixed|string
     */
    public function editDnsRecordByTypeAndName(string $domain, string $type, string $name, GoDaddyDNSRecordParams $Params)
    {
        try {
            $this->authentication_header['json'] = [$Params->toArray()];
            $response = $this->Client->put($this->base_url.'/'.$domain.'/records/'.$type.'/'.$name, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Change content of one record found by given type e.g. GoDaddy\GoDaddyDNSRecordParams::DNS_KEY_TXT
     * ATTENTION: First all found records will be deleted, in a 2nd step the new records will be set.
     * Assuming you have 3 TXT records within your DNS settings and you call this function  - in the end
     * you'll have only this record within your DNS settings
     * @param string $domain
     * @param string $type
     * @param GoDaddyDNSRecordParams $Params
     * @return mixed|string
     */
    public function replaceDnsRecordByType(string $domain, string $type, GoDaddyDNSRecordParams $Params)
    {
        if($type !== $Params->getType()) {
            $message = [
                'error' => [
                    'message' => 'Type "'.$type.'" has to be equals to GoDaddyDNSRecordParams type "'.$Params->getType().'"',
                    'code' => self::ERROR_TYPES_NOT_EQUAL
                ]
            ];
            return $this->goDaddyClient->returnData(json_encode($message));
        }

        try {
            $this->authentication_header['json'] = [$Params->toArray()];
            $response = $this->Client->put($this->base_url.'/'.$domain.'/records/'.$type, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }
    }

    /**
     * Change content of one ore more records found by given type e.g. GoDaddy\GoDaddyDNSRecordParams::DNS_KEY_TXT
     * ATTENTION: First all found records will be deleted, in a 2nd step the new records will be set.
     * Assuming you have 3 TXT records within your DNS settings and you call this function  - in the end
     * you'll have only this record within your DNS settings
     * @param string $domain
     * @param string $type
     * @param array $params array of one ore more GoDaddy\GoDaddyDNSRecordParams
     * @return mixed|string
     */
    public function replaceDnsRecordsByType(string $domain, string $type, array $params)
    {
        if(empty($params) === true) {
            $message = [
                'error' => [
                    'message' => 'No parameter given',
                    'code' => self::ERROR_CODE_NO_PARAMETER_GIVEN
                ]
            ];
            return $this->goDaddyClient->returnData(json_encode($message));
        }

        // check if object is instance of GoDaddyDNSRecordParams
        // check if $type and  $Param->getType() are the same
        foreach($params as $Param) {
            if(!$Param instanceof GoDaddyDNSRecordParams) {
                $message = [
                    'error' => [
                        'message' => 'Param is not an instance of '.GoDaddyDNSRecordParams::class,
                        'code' => self::ERROR_CODE_NO_INSTANCE_OF
                    ]
                ];
                return $this->goDaddyClient->returnData(json_encode($message));
            }

            if($type !== $Param->getType()) {
                $message = [
                    'error' => [
                        'message' => 'Type "'.$type.'" has to be equals to GoDaddyDNSRecordParams type "'.$Param->getType().'"',
                        'code' => self::ERROR_TYPES_NOT_EQUAL
                    ]
                ];
                return $this->goDaddyClient->returnData(json_encode($message));
            }
        }

        try {
            $parameter = [];

            foreach($params as $Param) {
                $parameter[] = $Param->toArray();
            }

            $this->authentication_header['json'] = $parameter;
            $response = $this->Client->put($this->base_url.'/'.$domain.'/records/'.$type, $this->authentication_header);
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            return $this->goDaddyClient->returnData($response->getBody()->getContents());
        }

    }

}