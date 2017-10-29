# PHP - GoDaddy API wrapper
Simple to use Guzzle based API wrapper to manage your GoDaddy domains

## Requirements
* If not done you need to create your [GoDaddy](https://www.godaddy.com) account
* Please read first more general details about how to use the GoDaddy API [here](https://developer.godaddy.com/getstarted)
* Once you have an account at GoDaddy you need to create your API key/secret pairs [here](https://developer.godaddy.com/keys/)
* PHP version running on your system >= 7.1

## Install

Via Composer

```bash
$ composer require projectstage/godaddy-api-wrapper
```

## Get started

```php

require_once __DIR__.'/vendor/autoload.php';

$GoDaddyClient = new \GoDaddy\GoDaddyClient('GODADDY_KEY', 'GODADDY_SECRET');

// assuming you want to handle things around your domains
// like e.g. DNS settings, purchasing Domains etc.
// see at https://developer.godaddy.com/doc#!/_v1_domains
$Domains = $GoDaddyClient->connectDomains();

// get a list of all your GoDaddy domains
$domain_list = $Domains->getDomains();
```

### please find more details about the different API functionalities below
[Domains](DOMAINS.md)

## Test Report
You'll find the PHPUnit test reports [here](https://projectstage.github.io/godaddy-api-wrapper/doc/report/index.html) 

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[author]: carsten.lorenz@projectstage.org
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
