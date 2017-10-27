<?php declare(strict_types=1);

namespace Meek\Http;

use PHPUnit\Framework\TestCase;
use Zend\Diactoros\Response\TextResponse;

class ExceptionTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAnException()
    {
        $exception = $this->mockBaseException(404, 'not found');

        $this->assertInstanceOf('Exception', $exception);
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testThrowsExceptionIfReasonPhraseIsEmpty()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('The reason phrase cannot be empty');

        $exception = $this->mockBaseException(404, '');
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testSetsCodeToStatusCode()
    {
        $statusCode = 404;
        $exception = $this->mockBaseException($statusCode, 'Not Found', []);

        $this->assertEquals($statusCode, $exception->getCode());
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testSetsMessageToReasonPhrase()
    {
        $reasonPhrase = 'Not Found';
        $exception = $this->mockBaseException(404, $reasonPhrase);

        $this->assertEquals($reasonPhrase, $exception->getMessage());
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testSetsStatusCode()
    {
        $statusCode = 404;
        $exception = $this->mockBaseException($statusCode, 'Not Found');

        $this->assertEquals($statusCode, $exception->getStatusCode());
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testSetsReasonPhrase()
    {
        $reasonPhrase = 'Not Found';
        $exception = $this->mockBaseException(404, $reasonPhrase);

        $this->assertEquals($reasonPhrase, $exception->getReasonPhrase());
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testHeadersAreInitiallyEmpty()
    {
        $exception = $this->mockBaseException(404, 'Not Found');

        $this->assertEmpty($exception->getHeaders());
    }

    /**
     * @covers  \Meek\Http\Exception::__construct
     */
    public function testSetsHeaders()
    {
        $headers = ['allow' => ['get', 'post']];
        $exception = $this->mockBaseException(404, 'Not Found', $headers);

        $this->assertEquals($headers, $exception->getHeaders());
    }

    /**
     * @covers  \Meek\Http\Exception::getStatusCode
     */
    public function testCanGetStatusCode()
    {
        $statusCode = 404;
        $exception = $this->mockBaseException($statusCode, 'Not Found');

        $this->assertEquals($statusCode, $exception->getStatusCode());
    }

    /**
     * @covers  \Meek\Http\Exception::getReasonPhrase
     */
    public function testCanGetReasonPhrase()
    {
        $reasonPhrase = 'Not Found';
        $exception = $this->mockBaseException(404, $reasonPhrase);

        $this->assertEquals($reasonPhrase, $exception->getReasonPhrase());
    }

    /**
     * @covers  \Meek\Http\Exception::getHeaders
     */
    public function testCanGetHeaders()
    {
        $headers = ['allow' => ['get', 'post']];
        $exception = $this->mockBaseException(404, 'Not Found', $headers);

        $this->assertEquals($headers, $exception->getHeaders());
    }

    /**
     * @covers \Meek\Http\Exception::prepare
     */
    public function testPreparesResponseBySettingStatusCode()
    {
        $statusCode = 404;
        $exception = $this->mockBaseException($statusCode, 'not found');
        $response = new TextResponse('setting status code', 200);

        $response = $exception->prepare($response);

        $this->assertEquals($statusCode, $response->getStatusCode());
    }

    /**
     * @covers \Meek\Http\Exception::prepare
     */
    public function testPreparesResponseBySettingReasonPhrase()
    {
        $reasonPhrase = 'Not Found';
        $exception = $this->mockBaseException(404, $reasonPhrase);
        $response = new TextResponse('setting reason phrase', 200);

        $response = $exception->prepare($response);

        $this->assertEquals($reasonPhrase, $response->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\Exception::prepare
     */
    public function testPreparesResponseByAddingHeaders()
    {
        $expectedHeaders = ['allow' => ['get', 'post'], 'host' => ['example.com']];
        $exception = $this->mockBaseException(404, 'not found', $expectedHeaders);
        $response = new TextResponse('adding headers', 200);

        $response = $exception->prepare($response);
        $actualHeaders = $response->getHeaders();

        $this->assertEquals($expectedHeaders['allow'], $actualHeaders['allow']);
        $this->assertEquals($expectedHeaders['host'], $actualHeaders['host']);
    }

    /**
     * @covers \Meek\Http\Exception::__toString
     */
    public function testCastingToStringWorks()
    {
        $exception = $this->mockBaseException(404, 'Not Found');

        $this->assertEquals('404 Not Found', $exception->__toString());
    }

    private function mockBaseException(...$args)
    {
        return $this->getMockBuilder(Exception::class)
            ->setConstructorArgs($args)
            ->setMethods(['assertStatusCodeIsInRange'])
            ->getMock();
    }
}
