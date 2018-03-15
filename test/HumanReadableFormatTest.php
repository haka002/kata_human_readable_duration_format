<?php

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

		$this->subject = new HumanReadableFormat();
	}
}
