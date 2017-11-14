<?php
/**
 * Created by PhpStorm.
 * User: carsten
 */

use GoDaddy\GoDaddyClient;

class GoDaddyClientTest extends \PHPUnit\Framework\TestCase
{

    /**
     *
     */
    public function testGoDaddyClientInit()
    {
        $Client = new GoDaddyClient('key', 'secret');

        $this->assertObjectHasAttribute('api_url', $Client);
        $this->assertObjectHasAttribute('version', $Client);
        $this->assertObjectHasAttribute('api_key', $Client);
        $this->assertObjectHasAttribute('api_secret', $Client);
        $this->assertObjectHasAttribute('authorization_key', $Client);
        $this->assertObjectHasAttribute('response_type', $Client);
        $this->assertObjectHasAttribute('slugs', $Client);
        $this->assertObjectHasAttribute('Domains', $Client);
    }

    /**
     *
     */
    public function testKeyEqualsTrue()
    {
        $Client = new GoDaddyClient('key', 'secret');

        $this->assertEquals('key', $Client->getApiKey());
    }

    /**
     *
     */
    public function testKeyEqualsFalse()
    {
        $Client = new GoDaddyClient('key', 'secret');

        $this->assertNotEquals('key', 'abcde');
    }


    /**
     *
     */
    public function testSecretEqualsTrue()
    {
        $Client = new GoDaddyClient('key', 'secret');

        $this->assertEquals('secret', $Client->getApiSecret());
    }

    /**
     *
     */
    public function testSecretEqualsFalse()
    {
        $Client = new GoDaddyClient('key', 'secret');

        $this->assertNotEquals('secret', 'abcde');
    }

}
