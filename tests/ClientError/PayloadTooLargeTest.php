<?php declare(strict_types=1);

namespace Meek\Http\ClientError;

use PHPUnit\Framework\TestCase;
use Meek\Http\ClientError;
use DateTimeZone;
use DateTime;
use DateInterval;

class PayloadTooLargeTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function testIsAClientError()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertInstanceOf(ClientError::class, $payloadTooLarge);
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testHasCorrectStatusCode()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertEquals(413, $payloadTooLarge->getStatusCode());
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testHasCorrectReasonPhrase()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertEquals('Payload Too Large', $payloadTooLarge->getReasonPhrase());
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testDoesNotAddRetryAfterHeaderIfNotProvided()
    {
        $payloadTooLarge = new PayloadTooLarge();

        $this->assertEmpty($payloadTooLarge->getHeaders());
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testAddsRetryAfterIfDateTimeProvided()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $payloadTooLarge = new PayloadTooLarge($retryAfter);

        $headers = $payloadTooLarge->getHeaders();

        $this->assertArrayHasKey('retry-after', $headers);
        $this->assertContains('Wed, 25 Oct 2017 13:00:00 GMT', $headers['retry-after']);
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testRetryAfterHeaderIsFormattedToRFC7231()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $retryAfter->add(new DateInterval('PT2H')); // 2 hours

        $payloadTooLarge = new PayloadTooLarge($retryAfter);
        $actual = $payloadTooLarge->getHeaders()['retry-after'][0];

        $this->assertEquals('Wed, 25 Oct 2017 15:00:00 GMT', $actual);
    }

    /**
     * @covers \Meek\Http\ClientError\PayloadTooLarge::__construct
     */
    public function testHeadersAreMergedCorrectly()
    {
        $timeZone = new DateTimeZone('UTC');
        $retryAfter = new DateTime('Wed, 25 Oct 2017 13:00:00', $timeZone);
        $payloadTooLarge = new PayloadTooLarge($retryAfter, ['connection' => ['close']]);
        $headers = $payloadTooLarge->getHeaders();

        $this->assertArrayHasKey('retry-after', $headers);
        $this->assertArrayHasKey('connection', $headers);
    }
}
