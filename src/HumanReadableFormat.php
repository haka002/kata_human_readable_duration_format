<?php declare(strict_types=1);

namespace Haka002\HumanReadableFormat;

use InvalidArgumentException;

class HumanReadableFormat
{
	/**
	 * @var FormatBuilder
	 */
	private $formatBuilder;

	public function __construct(FormatBuilder $formatBuilder)
	{
		$this->formatBuilder = $formatBuilder;
	}

	/**
	 * @param int $duration
	 *
	 * @return string
	 */
	public function formatDuration(int $duration)
	{
		if ($duration < 0)
		{
			throw new InvalidArgumentException('The duration couldn\'t be negative.');
		}

		if ($duration == 0)
		{
			return 'now';
		}

		return $this->formatBuilder->build($duration)->get();
	}
}
