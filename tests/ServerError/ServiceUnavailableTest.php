<?php declare(strict_types=1);

namespace Meek\Http\ServerError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ServerError;
use DateTime;
use DateTimeZone;
use DateInterval;

class ServiceUnavailableTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAServerError()
    {
        $serviceUnavailable = new ServiceUnavailable();

        $this->assertInstanceOf(ServerError::class, $serviceUnavailable);
    }

    /**
     * @covers \Meek\Http\ServerError\ServiceUnavailable::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $serviceUnavailable = new ServiceUnavailable();

        $this->assertEquals(503, $serviceUnavailable->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ServerError\ServiceUnavailable::__construct
     */
    public function testAddsRetryAfterIfDateTimeProvided()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $serviceUnavailable = new ServiceUnavailable($retryAfter);

        $headers = $serviceUnavailable->getHeaders();

        $this->assertArrayHasKey('retry-after', $headers);
        $this->assertContains('Wed, 25 Oct 2017 13:00:00 GMT', $headers['retry-after']);
    }

    /**
     * @covers \Meek\Http\ServerError\ServiceUnavailable::__construct
     */
    public function testRetryAfterHeaderIsFormattedToRFC7231()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $retryAfter->add(new DateInterval('PT2H')); // 2 hours

        $serviceUnavailable = new ServiceUnavailable($retryAfter);
        $actual = $serviceUnavailable->getHeaders()['retry-after'][0];

        $this->assertEquals('Wed, 25 Oct 2017 15:00:00 GMT', $actual);
    }

    /**
     * @covers \Meek\Http\ServerError\ServiceUnavailable::__construct
     */
    public function testDoesNotAddRetryAfterHeaderIfNotProvided()
    {
        $serviceUnavailable = new ServiceUnavailable();

        $this->assertEmpty($serviceUnavailable->getHeaders());
    }

    /**
     * @covers \Meek\Http\ServerError\ServiceUnavailable::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $serviceUnavailable = new ServiceUnavailable();

        $this->assertEquals('Service Unavailable', $serviceUnavailable->getReasonPhrase());
    }
}
