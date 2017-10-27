<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class ForbiddenTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $forbidden = new Forbidden();

        $this->assertInstanceOf(ClientError::class, $forbidden);
    }

    /**
     * @covers \Meek\Http\ClientError\Forbidden::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $forbidden = new Forbidden();

        $this->assertEquals(403, $forbidden->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\Forbidden::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $forbidden = new Forbidden();

        $this->assertEquals('Forbidden', $forbidden->getReasonPhrase());
    }
}
