[back to README](README.md)

# Domains API

## Initialize Client and connect to doamins
```php

require_once __DIR__.'/vendor/autoload.php';

$GoDaddyClient = new \GoDaddy\GoDaddyClient('GODADDY_KEY', 'GODADDY_SECRET');

// assuming you want to handle things around your domains
// like e.g. DNS settings, purchasing Domains etc.
// see at https://developer.godaddy.com/doc#!/_v1_domains
$Domains = $GoDaddyClient->connectDomains();
```

* [getDomains](#getDomains)
* [getDomain](#getDomain)


## getDomains
This will retrieve all your domains including additional information
```php
$domain_list = $Domains->getDomains();
```
Sample return value
```json
[{
    "domainId":12345,
    "domain":"my-domain.com",
    "status":"ACTIVE",
    "expires":"2019-08-24T05:18:52Z",
    "expirationProtected":false,
    "holdRegistrar":false,
    "locked":true,
    "privacy":true,
    "renewAuto":true,
    "renewable":true,
    "renewDeadline":"2019-10-08T03:18:51Z",
    "transferProtected":false,
    "createdAt":"2015-08-24T05:18:52Z"
},{
    "domainId":1234567,
    "domain":"my-domain1.com",
    "status":"ACTIVE",
    "expires":"2019-08-24T05:18:52Z",
    "expirationProtected":false,
    "holdRegistrar":false,
    "locked":true,
    "privacy":true,
    "renewAuto":true,
    "renewable":true,
    "renewDeadline":"2019-10-08T03:18:51Z",
    "transferProtected":false,
    "createdAt":"2015-08-24T05:18:52Z"
}]
```

## getDomain
This will retrieve information about a specified domain
```php
$domain = $Domains->getDomain('my-domain.com');
```
Sample return value
```json

{
  "domainId":12345,
  "domain":"my-domain.com",
  "status":"ACTIVE",
  "expires":"2019-08-24T08:22:05Z",
  "expirationProtected":false,
  "holdRegistrar":false,
  "locked":true,
  "privacy":false,
  "renewAuto":true,
  "renewable":true,
  "renewDeadline":"2019-07-25T08:22:05Z",
  "transferProtected":false,
  "createdAt":"2015-08-24T08:22:05Z",
  "authCode":"AUTH-CODE",
  "nameServers":[
    "ns73.domaincontrol.com",
    "ns74.domaincontrol.com"
  ],
  "contactRegistrant":{
    "nameFirst":"John",
    "nameLast":"Doe",
    "organization":"Company name",
    "email":"john.doe@my-domain.com",
    "phone":"01.5551234567",
    "fax":"",
    "addressMailing":{
      "address1":"Street name 123",
      "address2":"",
      "city":"Your City",
      "state":"Your State",
      "postalCode":"Your postal code",
      "country":"US"
    }
  },
  "contactBilling":{
    "nameFirst":"John",
    "nameLast":"Doe",
    "organization":"Company name",
    "email":"john.doe@my-domain.com",
    "phone":"01.5551234567",
    "fax":"",
    "addressMailing":{
      "address1":"Street name 123",
      "address2":"",
      "city":"Your City",
      "state":"Your State",
      "postalCode":"Your postal code",
      "country":"US"
    }
  },
  "contactAdmin":{
    "nameFirst":"John",
    "nameLast":"Doe",
    "organization":"Company name",
    "email":"john.doe@my-domain.com",
    "phone":"01.5551234567",
    "fax":"",
    "addressMailing":{
      "address1":"Street name 123",
      "address2":"",
      "city":"Your City",
      "state":"Your State",
      "postalCode":"Your postal code",
      "country":"US"
    }
  },
  "contactTech":{
    "nameFirst":"John",
    "nameLast":"Doe",
    "organization":"Company name",
    "email":"john.doe@my-domain.com",
    "phone":"01.5551234567",
    "fax":"",
    "addressMailing":{
      "address1":"Street name 123",
      "address2":"",
      "city":"Your City",
      "state":"Your State",
      "postalCode":"Your postal code",
      "country":"US"
    }
  }
}
```