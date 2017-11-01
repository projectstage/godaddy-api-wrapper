<?php
/**
 * Created by PhpStorm.
 * User: carsten
 * Date: 11/1/17
 * Time: 9:53 PM
 */

use GoDaddy\GoDaddyClient;

class GoDaddyClientTest extends PHPUnit_Framework_TestCase
{

    public function testGoDaddyClientInit()
    {
        $Client = new GoDaddyClient('key', 'secret');

        $this->assertObjectHasAttribute('api_url', $Client);
    }
}
