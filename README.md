# godaddy-api-wrapper

## Install

Via Composer

```bash
$ composer require projectstage/godaddy-api-wrapper
```

## Get started

```php

require_once __DIR__.'/vendor/autoload.php';

$GoDaddyClient = new \GoDaddy\GoDaddyClient('GODADDY_KEY', 'GODADDY_SECRET');

// assuming you want to handle things around your domains like e.g. DNS settings, purchasing Domains etc.
// see at https://developer.godaddy.com/doc#!/_v1_domains
$Domains = $GoDaddy->connectDomains();

// get a list of all your GoDaddy domains
$domain_list = $Domains->getDomains();
```

### please find more details about the different API functionalities below
[Domains](DOMAINS.md)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[author]: carsten.lorenz@projectstage.org
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
