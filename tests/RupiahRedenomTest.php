<?php

namespace Yadders\RupiahRedenom\Tests;

use Orchestra\Testbench\TestCase;
use Yadders\RupiahRedenom\RupiahRedenom;

class RupiahRedenomTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Yadders\RupiahRedenom\RupiahRedenomServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Rupiah' => 'Yadders\RupiahRedenom\Facades\Rupiah',
        ];
    }

    public function testSimplifyRupiah()
    {
        $redenom = new RupiahRedenom();
        $this->assertEquals(1, $redenom->simplifyRupiah(1000));
        $this->assertEquals(1.5, $redenom->simplifyRupiah(1500));
        $this->assertEquals(0.5, $redenom->simplifyRupiah(500));
    }

    public function testFormatRupiah()
    {
        $redenom = new RupiahRedenom();
        $this->assertEquals('Rp 1.000,00', $redenom->format(1000));
        $this->assertEquals('Rp 1.500,50', $redenom->format(1500.5));
        $this->assertEquals('Rp 0,50', $redenom->format(0.5));
    }

    public function testRoundRupiah()
    {
        $redenom = new RupiahRedenom();
        $this->assertEquals(1.24, $redenom->roundRupiah(1.2345, 2, 'up'));
        $this->assertEquals(1.23, $redenom->roundRupiah(1.2345, 2, 'down'));
        $this->assertEquals(1.235, $redenom->roundRupiah(1.2345, 3, 'up'));
        $this->assertEquals(1.234, $redenom->roundRupiah(1.2345, 3, 'down'));
    }

    public function testSetConversionRate()
    {
        $redenom = new RupiahRedenom();
        $this->assertEquals(1, $redenom->setConversionRate(1000, 'new'));
        $this->assertEquals(1000, $redenom->setConversionRate(1, 'old'));
    }
}