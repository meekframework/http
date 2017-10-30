<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;
use DateTimeZone;
use DateTime;
use DateInterval;

class TooManyRequestsTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertInstanceOf(ClientError::class, $tooManyRequests);
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertEquals(429, $tooManyRequests->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertEquals('Too Many Requests', $tooManyRequests->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testDoesNotAddRetryAfterHeaderIfNotProvided()
    {
        $tooManyRequests = new TooManyRequests();

        $this->assertEmpty($tooManyRequests->getHeaders());
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testAddsRetryAfterIfDateTimeProvided()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $tooManyRequests = new TooManyRequests($retryAfter);

        $headers = $tooManyRequests->getHeaders();

        $this->assertArrayHasKey('retry-after', $headers);
        $this->assertContains('Wed, 25 Oct 2017 13:00:00 GMT', $headers['retry-after']);
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testRetryAfterHeaderIsFormattedToRFC7231()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $retryAfter->add(new DateInterval('PT2H')); // 2 hours

        $tooManyRequests = new TooManyRequests($retryAfter);
        $actual = $tooManyRequests->getHeaders()['retry-after'][0];

        $this->assertEquals('Wed, 25 Oct 2017 15:00:00 GMT', $actual);
    }

    /**
     * @covers \Meek\Http\ClientError\TooManyRequests::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $tooManyRequests = new TooManyRequests($retryAfter, ['connection' => ['close']]);
        $headers = $tooManyRequests->getHeaders();

        $this->assertArrayHasKey('retry-after', $headers);
        $this->assertArrayHasKey('connection', $headers);
    }
}
