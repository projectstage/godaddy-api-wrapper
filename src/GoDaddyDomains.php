<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/21/17
 * Time: 11:04 PM
 */

namespace GoDaddy;

use GuzzleHttp\Client;

/**
 * Class GoDaddyDomains
 * @package GoDaddy\
 */
class GoDaddyDomains
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
                'Authorization' => $this->goDaddyClient->getAuthorizationKey().' '.$this->goDaddyClient->getApiKey().':'.$this->goDaddyClient->getApiSecret()
            ]
        ];
    }

    /**
     * return array of objects - list of registered domains
     * @return mixed
     */
    public function getDomains()
    {
        $response = $this->Client->get($this->base_url, $this->authentication_header);
        $data = json_decode($response->getBody()->getContents());

        return $data;
    }

    /**
     * Object of domain details
     * @param $domain
     * @return mixed
     */
    public function getDomain($domain)
    {
        $response = $this->Client->get($this->base_url.'/'.$domain, $this->authentication_header);
        $data = json_decode($response->getBody()->getContents());

        return $data;
    }

    /**
     * Array of objects - DNS settings
     * @param $domain
     * @return mixed
     */
    public function getDomainDns($domain)
    {
        $response = $this->Client->get($this->base_url.'/'.$domain.'/records', $this->authentication_header);
        $data = json_decode($response->getBody()->getContents());

        return $data;
    }

    /**
     * Array of objects - DNS settings by type - e.g. AAAA|TXT
     * @param $domain
     * @param $type
     * @return mixed
     */
    public function getDomainDnsByType($domain, $type)
    {
        $response = $this->Client->get($this->base_url.'/'.$domain.'/records/'.$type, $this->authentication_header);
        $data = json_decode($response->getBody()->getContents());

        return $data;
    }

    /**
     * Object of a DNS record
     * @param $domain
     * @param $type
     * @param $name
     * @return mixed
     */
    public function getDomainDnsByTypeAndName($domain, $type, $name)
    {
        $response = $this->Client->get($this->base_url.'/'.$domain.'/records/'.$type.'/'.$name, $this->authentication_header);
        $data = json_decode($response->getBody()->getContents());

        return $data;
    }
}