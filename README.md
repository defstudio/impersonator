
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Easily impersonate another user for debugging purpose

[![Latest Version on Packagist](https://img.shields.io/packagist/v/defstudio/impersonator.svg?style=flat-square)](https://packagist.org/packages/defstudio/impersonator)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/defstudio/impersonator/run-tests.yml?branch=main&label=tests)](https://github.com/defstudio/impersonator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/defstudio/impersonator/php-cs-fixer.yml?branch=main&label=code%20style)](https://github.com/defstudio/impersonator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Static Analysis Action Status](https://img.shields.io/github/actions/workflow/status/defstudio/impersonator/phpstan.yml?branch=main&label=static%20analysis)](https://github.com/defstudio/impersonator/actions?query=workflow%3A"PHPStan"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/defstudio/impersonator.svg?style=flat-square)](https://packagist.org/packages/defstudio/impersonator)


## Installation

You can install the package via composer:

```bash
composer require defstudio/impersonator
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="impersonator-config"
```

## Tailwind css

Impersonator use tailwind css to render its view, consider adding `'./vendor/defstudio/impersonator/**/*.blade.php'` to your `tailwind.config.js` file

```javascript

module.exports = {
    content: [
        //..
        './vendor/defstudio/impersonator/**/*.blade.php',
    ],
    //..
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Fabio Ivona](https://github.com/def-studio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
