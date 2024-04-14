<?php

use PHPUnit\Framework\TestCase;
use FitnessApp\Cli\CliRoute;

final class CliRouteTest extends TestCase
{
    public function testShouldCallRouteFunctionWithParamsIfRouteMatches()
    {
        $mockArgv = ["index.php", "-route", "param"];

        $functionCalled = false;
        $withCorrectParams = false;
        new CliRoute("-route", $mockArgv, function ($parameter) use(&$functionCalled, &$withCorrectParams) {
            $functionCalled = true;
            $withCorrectParams = $parameter === "param";
        });

        $this->assertTrue($functionCalled);
        $this->assertTrue($withCorrectParams);
    }

    public function testShouldNotCallRouteFunctionWithParamsIfRouteDoesNotMatch()
    {
        $mockArgv = ["index.php", "badRoute", "param"];

        $functionCalled = false;
        new CliRoute("-route", $mockArgv, function ($parameter) use(&$functionCalled, &$withCorrectParams) {
            $functionCalled = true;
        });

        $this->assertFalse($functionCalled);
    }

    public function testShouldThrowExceptionIfNoRouteProvided()
    {
        $mockArgv = ["index.php"];
        $functionCalled = false;

        $this->expectExceptionMessage("No route was provided");
        new CliRoute("-route", $mockArgv, function ($parameter) use(&$functionCalled, &$withCorrectParams) {
            $functionCalled = true;
        });

        $this->assertFalse($functionCalled);
    }
}