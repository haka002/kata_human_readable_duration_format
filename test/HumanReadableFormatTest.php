<?php

use Haka002\HumanReadableFormat\FormatBuilder;
use Haka002\HumanReadableFormat\HumanReadableFormat;
use PHPUnit\Framework\TestCase;

class HumanReadableFormatTest extends TestCase
{
	/**
	 * @var HumanReadableFormat
	 */
	private $subject;

	public function setUp()
	{
		parent::setUp();

		$formatBuilder = new FormatBuilder();
		$this->subject = new HumanReadableFormat($formatBuilder);
	}

	public function testNow()
	{
		$this->assertEquals('now', $this->subject->formatDuration(0));
	}

	public function test1Second()
	{
		$this->assertEquals('1 second', $this->subject->formatDuration(1));
	}

	public function test62Seconds()
	{
		$this->assertEquals('1 minute and 2 seconds', $this->subject->formatDuration(62));
	}

	public function test61Seconds()
	{
		$this->assertEquals('1 minute and 1 second', $this->subject->formatDuration(61));
	}

	public function test87kSeconds()
	{
		$this->assertEquals('1 day and 10 minutes', $this->subject->formatDuration(87000));
	}

	public function test87k1Seconds()
	{
		$this->assertEquals('1 day, 10 minutes and 1 second', $this->subject->formatDuration(87001));
	}

	public function testYearSeconds()
	{
		$this->assertEquals('1 year, 1 day, 10 minutes and 1 second', $this->subject->formatDuration(87001+365*86400));
	}
}
