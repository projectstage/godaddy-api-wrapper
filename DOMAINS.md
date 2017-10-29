[back to README](README.md)

# Domains API

## Initialize Client and connect to doamins
```php

require_once __DIR__.'/vendor/autoload.php';

$GoDaddyClient = new \GoDaddy\GoDaddyClient('GODADDY_KEY', 'GODADDY_SECRET');

// assuming you want to handle things around your domains
// like e.g. DNS settings, purchasing Domains etc.
// see at https://developer.godaddy.com/doc#!/_v1_domains
$Domains = $GoDaddy->connectDomains();
```

* [getDomains](#getDomains)
* [getDomain](#getDomain)


## getDomains
This will retrieve all your domains including additional information
```php
// get a list of all your GoDaddy domains
$domain_list = $Domains->getDomains();
```

## getDomain
This will retrieve information about a specified domain
```php
// get a list of all your GoDaddy domains
$domain = $Domains->getDomain('my-domain.com');
```