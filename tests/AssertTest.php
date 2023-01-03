<?php

declare(strict_types=1);

namespace Yii\Support\Tests;

use PHPUnit\Framework\TestCase;
use Yii\Support\Assert;

final class AssertTest extends TestCase
{
    public function testEqualsWithoutLE(): void
    {
        Assert::equalsWithoutLE('foo' . "\r\n" . 'bar', 'foo' . "\r\n" . 'bar');
    }

    public function testInaccessibleProperty(): void
    {
        $object = new class () {
            private string $foo = 'bar';
        };

        $this->assertSame('bar', Assert::inaccessibleProperty($object, 'foo'));
    }

    public function testInvokeMethod(): void
    {
        $object = new class () {
            protected function foo(): string
            {
                return 'foo';
            }
        };

        $this->assertSame('foo', Assert::invokeMethod($object, 'foo'));
    }
}
