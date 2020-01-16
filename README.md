# [EXPERIMENTAL] PHPinnacle Mure

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)

PHPinnacle Mure provide C# like extension classes with help of [Z-Engine](https://github.com/lisachenko/z-engine) library.

## Install

Via Composer

```bash
$ composer require phpinnacle/mure
```

## Basic Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

class MyDate
{
    public static function addDays(\DateTime $date, int $num)
    {
        $date->modify(sprintf('+%d days', $num));

        return $date;
    }
}

\PHPinnacle\Mure\ExtensionManager::init(MyDate::class);

echo (new \DateTime())->addDays(2)->format('d.m.Y');

```

More examples can be found in [`examples`](examples) directory.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email dev@phpinnacle.com instead of using the issue tracker.

## Credits

- [PHPinnacle][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/phpinnacle/mure.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/phpinnacle/mure.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/phpinnacle/mure
[link-downloads]: https://packagist.org/packages/phpinnacle/mure
[link-author]: https://github.com/phpinnacle
[link-contributors]: https://github.com/phpinnacle/mure/graphs/contributors
