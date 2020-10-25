<?php

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;

use Sysvale\Helpers\Validate;

class ValidateTest extends TestCase
{
    /**
     * @dataProvider cpfProvider
     */
    public function testValidCpf($value, $result)
    {
        $isValid = Validate::isValidCpf($value);

        $this->assertSame($result, $isValid);
    }

    public function cpfProvider()
    {
        //generated random CPF by
        //https://www.4devs.com.br/gerador_de_cpf

        return [
            ['334.734.750-17', true],
            ['33473475017', true],
            ['334.734.750-00', false],
            ['33473475000', false],
            ['33473', false],
            ['3347347501789', false],
            ['55555555555', false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @dataProvider cnpjProvider
     */
    public function testValidCnpj($value, $result)
    {
        $isValid = Validate::isValidCnpj($value);

        $this->assertSame($result, $isValid);
    }

    public function cnpjProvider()
    {
        //generated random CNPJ by
        //https://www.4devs.com.br/gerador_de_cnpj

        return [
            ['56.396.710/0001-37', true],
            ['14528181000138', true],
            ['56.396.710/000137', true],
            ['1452818100013', false],
            ['14528181', false],
            ['145281810001383', false],
            ['56396710/0001-378', false],
            ['', false],
            [null, false],
        ];
    }

    /**
     * @dataProvider phonesProvider
     */
    public function testValidPhone($value, $result)
    {
        $isValid = Validate::isValidPhone($value);

        $this->assertSame($result, $isValid);
    }

    public function phonesProvider()
    {
        return [
            ['79988001010', true],
            ['(79)988001010', false],
            ['(79)98800-1010', false],
            ['7988001010', false],
            ['7998800101', false],
            ['749880010102', false],
            ['', false],
        ];
    }

    /**
     * @dataProvider phonesResidencialProvider
     */
    public function testValidResidencialPhone($value, $result)
    {
        $isValid = Validate::isValidPhone($value);

        $this->assertSame($result, $isValid);
    }

    public function phonesResidencialProvider()
    {
        return [
            ['7033662200', true],
            ['(70)33662200', false],
            ['(79)3366-2200', false],
            ['33662200', false],
            ['74336622001', false],
            ['', false],
        ];
    }

    /**
     * @dataProvider phonesMobileProvider
     */
    public function testValidMobilePhone($value, $result)
    {
        $isValid = Validate::isValidMobilePhone($value);

        $this->assertSame($result, $isValid);
    }

    public function phonesMobileProvider()
    {

        return [
            ['70993662200', true],
            ['70983662200', true],
            ['70973662200', true],
            ['70963662200', true],
            ['70953662200', false],
            ['70943662200', false],
            ['70933662200', false],
            ['70923662200', false],
            ['70913662200', false],
            ['70903662200', false],
            ['(70)933662200', false],
            ['(79)93366-2200', false],
            ['33662200', false],
            ['74336622001', false],
            ['', false],
        ];
    }
}
