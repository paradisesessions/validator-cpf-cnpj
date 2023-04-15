<?php

/** Namespace */
namespace ParadiseSessions\Tests;

/** Dependencies */
use PHPUnit\Framework\TestCase;
use ParadiseSessions\Validator\Document;

/**
 * Document Test
 * @package Test\Tools
 */
final class DocumentTest extends TestCase
{
    public function test_should_identify_as_cpf(): void
    {
        $document = new Document('11122233344');
        $this->assertEquals($document->getType(), 'CPF');
    }

    public function test_should_identify_as_cnpj(): void
    {
        $document = new Document('11222333456720');
        $this->assertEquals($document->getType(), 'CNPJ');
    }

    public function test_should_throw_error_when_a_not_valid_number_is_provided(): void
    {
        $document = new Document('1702');
        $this->assertFalse($document->isValid());
    }

    public function test_should_accept_formatted_values(): void
    {
        $document = new Document('111.222.333-44');
        $this->assertEquals($document->getType(), 'CPF');
    }

    public function test_should_check_is_valid_and_return_formatted_value(): void
    {
        /** Google Brazil CNPJ  */
        $document = new Document('06990590000123');
        $this->assertEquals($document->format(), '06.990.590/0001-23');
    }

    public function test_should_is_valid_cpf(): void
    {
        /** Fake CPF generated */
        $document = new Document('11890954160');
        $this->assertNotFalse($document->isValid());
    }

    public function test_should_return_raw_value(): void
    {
        /** Fake CPF generated */
        $document = new Document('118.909.541-60');
        $this->assertEquals($document->getDocument(), '11890954160');
    }
}
