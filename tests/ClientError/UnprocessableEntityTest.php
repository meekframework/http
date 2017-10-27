<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;

class UnprocessableEntityTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $unprocessableEntity = new UnprocessableEntity();

        $this->assertInstanceOf(ClientError::class, $unprocessableEntity);
    }

    /**
     * @covers \Meek\Http\ClientError\UnprocessableEntity::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $unprocessableEntity = new UnprocessableEntity();

        $this->assertEquals(422, $unprocessableEntity->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\UnprocessableEntity::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $unprocessableEntity = new UnprocessableEntity();

        $this->assertEquals('Unprocessable Entity', $unprocessableEntity->getReasonPhrase());
    }
}
