<h1 align="center">
    <img alt="Paradise Sessions" title="Paradise Sessions" src=".github/logo.png" width="300" />
</h1>

<p align="center">
    <a href="#installation">Installation</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#technologies">Technologies</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#using">Using</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="#tests">Tests</a>
</p>

<p align="center">
   <img src="https://img.shields.io/badge/php-%5E8.1-green?style=for-the-badge" alt="Version" />
   <img src="https://img.shields.io/badge/version-1.0-red?style=for-the-badge" alt="PHP Version" />
   <img src="https://img.shields.io/badge/license-MIT-blue?style=for-the-badge" alt="License" />
</p>

## Project

###### A very simple class for validate CPF|CNPJ.

Uma simples classe para validar CPF|CNPJ.

## Installation

###### By [Composer](https://getcomposer.org/)

Via [Composer](https://getcomposer.org/)

```shell
composer require paradisesessions/validator-cpf-cnpj
```

## Technologies

-   [PHP 8.1](https://www.php.net/downloads.php#v8.1.18)
-   [PHPUnit](https://phpunit.de/)

## Using

###### Example of use for CPF validation and formatting.

Exemplo de uso para validação e formatação de CPF.

```php
$document = new \ParadiseSessions\Validator\Cpf('123.123.123.00');

// Verify is valid
$document->isValid();

// Check is valid and format numbers
$document->format();

// Verify is valid and return raw data
$document->getDocument();
```

###### Example of use for CNPJ validation and formatting.

Exemplo de uso para validação e formatação de CNPJ.

```php
$document = new \ParadiseSessions\Validator\Cnpj('123.123.123.00');

// Verify is valid
$document->isValid();

// Check is valid and format numbers
$document->format();

// Verify is valid and return raw data
$document->getDocument();
```

###### Example of use for CPF or CNPJ, recognizing type by class

Exemplo de uso para validação e formatação de CPF ou CNPJ, reconhecendo o tipo pela classe.

```php
$document = new \ParadiseSessions\Validator\Document('...');

// Verify is valid
$document->isValid();

// Check is valid and format numbers
$document->format();

// Verify is valid and return raw data
$document->getDocument();
```

## Tests

###### Test class with [PHPUnit](https://phpunit.de/).

Testes na classe realizados com [PHPUnit](https://phpunit.de/).

```shell
composer test
```
