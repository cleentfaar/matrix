# matrix

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Matrix is a highly extensible library for creating and manipulating matrices in PHP. 
Matrices can either be rendered or exported to different formats using the relevant interfaces.
Existing renderers and exporters can be found under [the related packages](#related-packages).

## Install

Via Composer

``` bash
$ composer require cleentfaar/matrix
```

## Usage

Please see the [USAGE](USAGE.md) documentation to get started with this library.

## Renderers and converters for [Matrix](https://github.com/cleentfaar/matrix)

| Package | Description |
|-----------------------|
| [cleentfaar/matrix-renderer-ascii](https://packagist.org/packages/cleentfaar/matrix-converter-ascii) | Converts your matrix into an ASCII string. |
| [cleentfaar/matrix-converter-csv](https://packagist.org/packages/cleentfaar/matrix-converter-csv) | Converts your matrix into a CSV file. |

NOTE: If you would like your renderer or exporter to be added to this list you can submit a PR for it.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email info@casleentfaar.com instead of using the issue tracker.

## Credits

- [Cas Leentfaar][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/cleentfaar/matrix.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/cleentfaar/matrix/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/cleentfaar/matrix.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/cleentfaar/matrix.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/cleentfaar/matrix.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/cleentfaar/matrix
[link-travis]: https://travis-ci.org/cleentfaar/matrix
[link-scrutinizer]: https://scrutinizer-ci.com/g/cleentfaar/matrix/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/cleentfaar/matrix
[link-downloads]: https://packagist.org/packages/cleentfaar/matrix
[link-author]: https://github.com/cleentfaar
[link-contributors]: ../../contributors
