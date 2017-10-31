<?php declare(strict_types=1);

namespace Meek\Http;

use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    /**
     * @covers \Meek\Http\Status::__construct
     */
    public function testThrowsExceptionIfStatusCodeIsTooLow()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('The status code must be in the range 1xx-5xx');

        $status = new Status(99);
    }

    /**
     * @covers \Meek\Http\Status::__construct
     */
    public function testThrowsExceptionIfStatusCodeIsTooHigh()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('The status code must be in the range 1xx-5xx');

        $status = new Status(600);
    }

    /**
     * @covers \Meek\Http\Status::__construct
     */
    public function testThrowsExceptionIfReasonPhraseContainsInvalidCharacters()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('The reason phrase contains invalid characters');

        $status = new Status(404, "Not\nFound");
    }

    /**
     * @dataProvider defaultReasonPhrases
     * @covers \Meek\Http\Status::getDefaultReasonPhrase
     */
    public function testAttemptsToSetADefaultReasonPhraseIfOneWasNotProvided($statusCode, $reasonPhrase)
    {
        $status = new Status($statusCode);

        $this->assertEquals($reasonPhrase, $status->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\Status::getDefaultReasonPhrase
     */
    public function testReasonPhraseIsEmptyIfOneWasNotProvidedAndADefaultOneCouldNotBeFound()
    {
        $status = new Status(418);

        $this->assertEquals('', $status->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\Status::__construct
     */
    public function testSetsStatusCode()
    {
        $statusCode = 404;
        $status = new Status($statusCode);

        $this->assertEquals($statusCode, $status->getStatusCode());
    }

    /**
     * @covers \Meek\Http\Status::__construct
     */
    public function testSetsReasonPhrase()
    {
        $reasonPhrase = 'Not Found';
        $status = new Status(404, $reasonPhrase);

        $this->assertEquals($reasonPhrase, $status->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\Status::getStatusCode
     */
    public function testCanRetrieveStatusCode()
    {
        $statusCode = 404;
        $status = new Status($statusCode);

        $this->assertEquals($statusCode, $status->getStatusCode());
    }

    /**
     * @covers \Meek\Http\Status::getReasonPhrase
     */
    public function testCanRetrieveReasonPhrase()
    {
        $reasonPhrase = 'Not Found';
        $status = new Status(404, $reasonPhrase);

        $this->assertEquals($reasonPhrase, $status->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\Status::getStatusLine
     */
    public function testCanRetrieveFormattedStatusLine()
    {
        $expected = '418 I\'m A Teapot';
        $status = new Status(418, 'I\'m A Teapot');

        $this->assertEquals($expected, $status->getStatusLine());
    }

    /**
     * @covers \Meek\Http\Status::__toString
     */
    public function testCastingToStringFormatsToStatusLine()
    {
        $expected = '404 Not Found';
        $status = new Status(404);

        $this->assertEquals($expected, (string) $status);
    }

    /**
     * @covers \Meek\Http\Status::isInformational
     */
    public function testIsInformationalIfInformationalStatusCodeProvided()
    {
        $status = new Status(100);

        $this->assertTrue($status->isInformational());
    }

    /**
     * @covers \Meek\Http\Status::isInformational
     */
    public function testIsNotInformationalIfInformationalStatusCodeNotProvided()
    {
        $status = new Status(200);

        $this->assertFalse($status->isInformational());
    }

    /**
     * @covers \Meek\Http\Status::isSuccessful
     */
    public function testIsSuccessfulIfSuccessfulStatusCodeProvided()
    {
        $status = new Status(200);

        $this->assertTrue($status->isSuccessful());
    }

    /**
     * @covers \Meek\Http\Status::isSuccessful
     */
    public function testIsNotSuccessfulIfSuccessfulStatusCodeNotProvided()
    {
        $status = new Status(300);

        $this->assertFalse($status->isSuccessful());
    }

    /**
     * @covers \Meek\Http\Status::isRedirection
     */
    public function testIsRedirectionIfRedirectionStatusCodeProvided()
    {
        $status = new Status(300);

        $this->assertTrue($status->isRedirection());
    }

    /**
     * @covers \Meek\Http\Status::isRedirection
     */
    public function testIsNotRedirectionIfRedirectionStatusCodeNotProvided()
    {
        $status = new Status(400);

        $this->assertFalse($status->isRedirection());
    }

    /**
     * @covers \Meek\Http\Status::isClientError
     */
    public function testIsClientErrorIfClientErrorStatusCodeProvided()
    {
        $status = new Status(400);

        $this->assertTrue($status->isClientError());
    }

    /**
     * @covers \Meek\Http\Status::isClientError
     */
    public function testIsNotClientErrorIfClientErrorStatusCodeNotProvided()
    {
        $status = new Status(500);

        $this->assertFalse($status->isClientError());
    }

    /**
     * @covers \Meek\Http\Status::isServerError
     */
    public function testIsServerErrorIfServerErrorStatusCodeProvided()
    {
        $status = new Status(500);

        $this->assertTrue($status->isServerError());
    }

    /**
     * @covers \Meek\Http\Status::isServerError
     */
    public function testIsNotServerErrorIfServerErrorStatusCodeNotProvided()
    {
        $status = new Status(100);

        $this->assertFalse($status->isServerError());
    }

    public function defaultReasonPhrases()
    {
        return [
            'test 100 default reason phrase' => [100, 'Continue'],
            'test 101 default reason phrase' => [101, 'Switching Protocols'],
            'test 200 default reason phrase' => [200, 'OK'],
            'test 201 default reason phrase' => [201, 'Created'],
            'test 202 default reason phrase' => [202, 'Accepted'],
            'test 203 default reason phrase' => [203, 'Non-Authoritative Information'],
            'test 204 default reason phrase' => [204, 'No Content'],
            'test 205 default reason phrase' => [205, 'Reset Content'],
            'test 206 default reason phrase' => [206, 'Partial Content'],
            'test 300 default reason phrase' => [300, 'Multiple Choices'],
            'test 301 default reason phrase' => [301, 'Moved Permanently'],
            'test 302 default reason phrase' => [302, 'Found'],
            'test 303 default reason phrase' => [303, 'See Other'],
            'test 304 default reason phrase' => [304, 'Not Modified'],
            'test 305 default reason phrase' => [305, 'Use Proxy'],
            'test 306 default reason phrase' => [307, 'Temporary Redirect'],
            'test 400 default reason phrase' => [400, 'Bad Request'],
            'test 401 default reason phrase' => [401, 'Unauthorized'],
            'test 402 default reason phrase' => [402, 'Payment Required'],
            'test 403 default reason phrase' => [403, 'Forbidden'],
            'test 404 default reason phrase' => [404, 'Not Found'],
            'test 405 default reason phrase' => [405, 'Method Not Allowed'],
            'test 406 default reason phrase' => [406, 'Not Acceptable'],
            'test 407 default reason phrase' => [407, 'Proxy Authentication Required'],
            'test 408 default reason phrase' => [408, 'Request Timeout'],
            'test 409 default reason phrase' => [409, 'Conflict'],
            'test 410 default reason phrase' => [410, 'Gone'],
            'test 411 default reason phrase' => [411, 'Length Required'],
            'test 412 default reason phrase' => [412, 'Precondition Failed'],
            'test 413 default reason phrase' => [413, 'Request Entity Too Large'],
            'test 414 default reason phrase' => [414, 'Request-URI Too Long'],
            'test 415 default reason phrase' => [415, 'Unsupported Media Type'],
            'test 416 default reason phrase' => [416, 'Requested Range Not Satisfiable'],
            'test 417 default reason phrase' => [417, 'Expectation Failed'],
            'test 500 default reason phrase' => [500, 'Internal Server Error'],
            'test 501 default reason phrase' => [501, 'Not Implemented'],
            'test 502 default reason phrase' => [502, 'Bad Gateway'],
            'test 503 default reason phrase' => [503, 'Service Unavailable'],
            'test 504 default reason phrase' => [504, 'Gateway Timeout'],
            'test 505 default reason phrase' => [505, 'HTTP Version Not Supported']
        ];
    }
}
