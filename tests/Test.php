<?php

namespace Sparkline\Tests;

use Sparkline\Spark;

require_once __DIR__ . '/../src/Spark.php';

class Test extends \PHPUnit_Framework_TestCase
{
    public function testit_graphs_argv_data()
    {
        $this->assertSame('▁▂█▅▂', Spark::getString(array(1, 5, 22, 13, 5)));
    }

    public function test_it_charts_pipe_data()
    {
        $this->assertSame('▁▂▃▄▂█', Spark::getString(array(0, 30, 55, 80, 33, 150)));
    }

    public function test_it_handles_decimals()
    {
        $this->assertSame('▁█', Spark::getString(array(5.5, 20)));
    }

    public function test_it_charts_100_lt_300()
    {
        $this->assertSame('▁▁▁▁▃▁▁▁▂█', Spark::getString(array(1, 2, 3, 4, 100, 5, 10, 20, 50, 300)));
    }

    public function test_it_charts_50_lt_100()
    {
        $this->assertSame('▁▄█', Spark::getString(array(1, 50, 100)));
    }

    public function test_it_charts_4_lt_8()
    {
        $this->assertSame('▁▃█', Spark::getString(array(2, 4, 8)));
    }

    public function test_it_charts_no_tier_0()
    {
        $this->assertSame('▁▂▄▆█', Spark::getString(array(1, 2, 3, 4, 5)));
    }

    public function test_it_equalizes_at_midtier_on_same_data()
    {
        $this->assertSame('▅▅▅▅', Spark::getString(array(1, 1, 1, 1)));
    }

    public function test_it_charts_negatives()
    {
        $this->assertSame('▁▄▅▅▆▅█', \Sparkline\Spark::getString(array(-150, 0, 30, 55.5, 80, 33, 150)));
    }

}