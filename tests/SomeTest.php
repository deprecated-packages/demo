<?php declare(strict_types=1);

namespace App\Tests;

use App\SomeDemoService;
use PHPUnit\Framework\TestCase;

final class SomeTest extends TestCase
{
    /**
     * @expectedException SomeException
     * @expectedExceptionCode 404
     */
    public function test()
    {
        $someService = new SomeDemoService();
        $someService->someMethod();
    }
}
