[back to README](README.md)

# Domains API

## Initialize Client and connect to doamins
```php
require_once __DIR__.'/vendor/autoload.php';

$GoDaddyClient = new \GoDaddy\GoDaddyClient('GODADDY_KEY', 'GODADDY_SECRET');

$Domains = $GoDaddyClient->connectDomains();
```

* [getDomains](#getdomains)
* [getDomain](#getdomain)
* [deleteDomain](#deletedomain)
* [removePrivacyFromDomain](#removeprivacyfromdomain)
* [purchasePrivacyFromDomain](#purchaseprivacyfromdomain)
* [getDns](#getdns)
* [getDnsByType](#getdnsbytype)
* [getDnsByTypeAndName](#getdnsbytypeandname)
* [addDnsRecord](#adddnsrecord)
* [addDnsRecords](#adddnsrecords)
* [editDnsRecordByTypeAndName](#editdnsrecordbytypeandname)
* [replaceDnsRecordByType](#replacednsrecordbytype)
* [replaceDnsRecordsByType](#replacednsrecordsbytype)


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
## deleteDomain
This will delete a specified domain
```php
$domain = $Domains->deleteDomain('my-domain.com');
```


## removePrivacyFromDomain
This will remove privacy status from given domain
```php
$response = $GoDaddy->connectDomains()->removePrivacyFromDomain('my-domain.com');
```
Sample return value
```json
[
  {}
]
```
## purchasePrivacyFromDomain

## getDns
This will retrieve DNS records for a specified domain
```php
$dns_records = $Domains->getDns('my-domain.com');
```
Sample return value
```json
[
  {
    "type": "A",
    "name": "@",
    "data": "233.123.56.12",
    "ttl": 600
  },
  {
    "type": "CNAME",
    "name": "email",
    "data": "email.secureserver.net",
    "ttl": 3600
  },
  {
    "type": "CNAME",
    "name": "ftp",
    "data": "@",
    "ttl": 3600
  },
  {
    "type": "CNAME",
    "name": "www",
    "data": "@",
    "ttl": 3600
  },
  {
    "type": "CNAME",
    "name": "_domainconnect",
    "data": "_domainconnect.gd.domaincontrol.com",
    "ttl": 3600
  },
  {
    "type": "MX",
    "name": "@",
    "data": "mailstore1.secureserver.net",
    "priority": 10,
    "ttl": 3600
  },
  {
    "type": "MX",
    "name": "@",
    "data": "smtp.secureserver.net",
    "priority": 0,
    "ttl": 3600
  },
  {
    "type": "SRV",
    "name": "@",
    "data": "autodiscover.int.secureserver.net",
    "service": "_autodiscover",
    "protocol": "_tcp",
    "port": 443,
    "weight": 0,
    "priority": 0,
    "ttl": 3600
  },
  {
    "type": "NS",
    "name": "@",
    "data": "ns73.domaincontrol.com",
    "ttl": 3600
  },
  {
    "type": "NS",
    "name": "@",
    "data": "ns74.domaincontrol.com",
    "ttl": 3600
  }
]
```

## getDnsByType
This will retrieve DNS records for a specified domain and type
```php
$dns_records = $Domains->getDnsByType('my-domain.com', \GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_MX);
```
Sample return value
```json
[
  {
    "type": "MX",
    "name": "@",
    "data": "mailstore1.secureserver.net",
    "priority": 10,
    "ttl": 3600
  },
  {
    "type": "MX",
    "name": "@",
    "data": "smtp.secureserver.net",
    "priority": 0,
    "ttl": 3600
  }
]
```

## getDnsByTypeAndName
This will retrieve DNS records for a specified domain, type and name
```php
$dns_records = $Domains->getDnsByTypeAndName('my-domain.com', \GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME, 'www');
```
Sample return value
```json
[
  {
    "type": "CNAME",
    "name": "www",
    "data": "@",
    "ttl": 3600
  }
]
```

## addDnsRecord
This will add a single record to DNS settings of the given domain
```php
$DNSParams = new \GoDaddy\Helper\GoDaddyDNSRecordParams(\GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME);
$DNSParams->setName('mysubdomain');
$DNSParams->setData('@');

$response = $GoDaddy->connectDomains()->addDnsRecord('my-domain.com', $DNSParams);
```
Sample return value
```json
[
  {}
]
```

## addDnsRecords
This will add more than one record to DNS settings of the given domain
```php
$DNSParams1 = new \GoDaddy\Helper\GoDaddyDNSRecordParams(\GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME);
$DNSParams1->setName('mysubdomain1');
$DNSParams1->setData('@');

$DNSParams2 = new \GoDaddy\Helper\GoDaddyDNSRecordParams(\GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME);
$DNSParams2->setName('mysubdomain2');
$DNSParams2->setData('@');

$DNSParams3 = new \GoDaddy\Helper\GoDaddyDNSRecordParams(\GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME);
$DNSParams3->setName('mysubdomain3');
$DNSParams3->setData('@');

$params = [$DNSParams1, $DNSParams2, $DNSParams3];

$response = $GoDaddy->connectDomains()->addDnsRecords('my-domain.com', $params);
```
Sample return value
```json
[
  {}
]
```
## editDnsRecordByTypeAndName
This will change a DNS record by given type(e.g. CNAME), name(e.g. mysubdomain3) and domain.
Usually you shouldn't have 2 DNS entries with the same combination of type and name.
However - if you have: Both will be deleted and the "new" one will be added
```php

$DNSParams4 = new \GoDaddy\Helper\GoDaddyDNSRecordParams(\GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME);
$DNSParams4->setName('mysubdomain4');
$DNSParams4->setData('@');

$response = $GoDaddy->connectDomains()->editDnsRecordByTypeAndName(
    'my-domain.com',
    \GoDaddy\Helper\GoDaddyDNSRecordParams::DNS_KEY_CNAME,
    'mysubdomain3',
    $DNSParams4
);
```
Sample return value
```json
[
  {}
]
```
## replaceDnsRecordByType
## replaceDnsRecordsByType

## Errors

Sample error return value
```json
{
  "code": "INVALID_BODY",
  "message": "Request body doesn't fulfill schema, see details in `fields`",
  "fields": [
    {
      "message": "is not an object",
      "path": "records[0]",
      "code": "UNEXPECTED_TYPE"
    }
  ]
}
```


