# Laravel Rupiah Redenomination

[![Latest Version on Packagist](https://img.shields.io/packagist/v/yadders/rupiah-redenom.svg?style=flat-square)](https://packagist.org/packages/yadders/rupiah-redenom)
[![Total Downloads](https://img.shields.io/packagist/dt/yadders/rupiah-redenom.svg?style=flat-square)](https://packagist.org/packages/yadders/rupiah-redenom)

A simple Laravel package to help with the planned Indonesian Rupiah redenomination. This package provides a simple way to "simplify" a Rupiah value (e.g., from 1,000 to 1) and format it.

## Installation

You can install the package via composer:

```bash
composer require yadders/rupiah-redenom
```

The package will automatically register its service provider and facade.

## Usage

You can use the `Rupiah` facade to access the package's functionality.

### Simplifying Rupiah Values

The `simplifyRupiah` method divides a given value by 1000 (the default divisor for the redenomination).

```php
use Yadders\RupiahRedenom\Facades\Rupiah;

// Basic simplification
$oldRupiah = 1000000;
$newRupiah = Rupiah::simplifyRupiah($oldRupiah); // Returns 1000.0

$anotherOldRupiah = 5500;
$anotherNewRupiah = Rupiah::simplifyRupiah($anotherOldRupiah); // Returns 5.5
```

You can also provide a custom divisor:

```php
use Yadders\RupiahRedenom\Facades\Rupiah;

$value = 10000;
$simplified = Rupiah::simplifyRupiah($value, 100); // Returns 100.0
```

### Formatting as Rupiah

The `format` method formats a number into a Rupiah string.

```php
use Yadders\RupiahRedenom\Facades\Rupiah;

$value = 12345.67;
$formatted = Rupiah::format($value); // Returns "Rp 12.345,67"

$simplifiedValue = Rupiah::simplifyRupiah(500000); // 500.0
$formattedSimplified = Rupiah::format($simplifiedValue); // Returns "Rp 500,00"
```

## Testing

To run the package's tests, use the following command:

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
