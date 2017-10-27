<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;

class InsufficientStorageTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $insufficientStorage = new InsufficientStorage();

        $this->assertInstanceOf(ServerError::class, $insufficientStorage);
    }

    /**
     * @covers \Meek\Http\ServerError\InsufficientStorage::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $insufficientStorage = new InsufficientStorage();

        $this->assertEquals(507, $insufficientStorage->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\InsufficientStorage::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $insufficientStorage = new InsufficientStorage();

        $this->assertEquals('Insufficient Storage', $insufficientStorage->getReasonPhrase());
    }
}
