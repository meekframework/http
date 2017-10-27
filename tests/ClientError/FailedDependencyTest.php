<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class FailedDependencyTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $failedDependency = new FailedDependency();

        $this->assertInstanceOf(ClientError::class, $failedDependency);
    }

    /**
     * @covers \Meek\Http\ClientError\FailedDependency::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $failedDependency = new FailedDependency();

        $this->assertEquals(424, $failedDependency->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\FailedDependency::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $failedDependency = new FailedDependency();

        $this->assertEquals('Failed Dependency', $failedDependency->getReasonPhrase());
    }
}
