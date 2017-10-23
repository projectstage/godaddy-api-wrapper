<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 10/21/17
 * Time: 9:59 PM
 */

namespace GoDaddy;

/**
 * Class GoDaddyClient
 * @package GoDaddy
 */
class GoDaddyClient
{
    /**
     * Connection url to GoDaddy API
     * @var string
     */
    protected $api_url = 'https://api.godaddy.com';

    /**
     * API version
     * @var string
     */
    protected $version = 'v1';

    /**
     * API key
     * @var string
     */
    protected $api_key = '';

    /**
     * AOI secret
     * @var string
     */
    protected $api_secret = '';

    /**
     * part of authorization HTTP header
     * @var string
     */
    protected $authorization_key = 'sso-key';

    /**
     * return resonse type - array|json
     * @var string
     */
    protected $response_type = 'json';

    /**
     * api slugs
     * @var array
     */
    protected $slugs = [
        'abuse_tickets' => '/abuse/tickets',
        'aftermarket_listings' => '/aftermarket/listings',
        'agreements' => '/agreements',
        'certificates' => '/certificates',
        'addresses' => '/cloud/addresses',
        'cloud_applications' => '/cloud/applications',
        'cloud_dataCenters' => '/cloud/dataCenters',
        'cloud_emailPreferences' => '/cloud/emailPreferences',
        'cloud_images' => '/cloud/images',
        'cloud_limits' => '/cloud/limits',
        'cloud_servers' => '/cloud/servers',
        'cloud_specs' => '/cloud/specs',
        'cloud_sshKeys' => '/cloud/sshKeys',
        'cloud_usage' => '/cloud/usage',
        'domains' => '/domains',
        'orders' => '/orders',
        'shoppers' => '/shoppers',
        'subscriptions' => '/subscriptions'
    ];

    protected $Domains = null;

    /**
     * GoDaddyClient constructor.
     * @param $key
     * @param $secret
     * @param string $response_type
     */
    public function __construct($key, $secret, $response_type = 'json')
    {
        $this->api_key = $key;
        $this->api_secret = $secret;
        $this->response_type = $response_type;
    }

    public function connectDomains()
    {
        return new GoDaddyDomains($this);
    }

        /**
     * @param $slug_index
     * @return bool|null
     */
    public function getSlug($slug_index)
    {
        if(isset($this->slugs[$slug_index]) === true) {
            return $this->getVersion().$this->slugs[$slug_index];
        }
        return null;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->api_url;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->api_key;
    }

    /**
     * @return string
     */
    public function getApiSecret(): string
    {
        return $this->api_secret;
    }

    /**
     * @return string
     */
    public function getAuthorizationKey(): string
    {
        return $this->authorization_key;
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->response_type;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
    }

}