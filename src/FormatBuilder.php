<?php declare(strict_types=1);

namespace Haka002\HumanReadableFormat;

class FormatBuilder
{
	const SEC_BY_DAY  = 86400;
	const SEC_BY_YEAR = 365 * self::SEC_BY_DAY;
	const SEC_BY_HOUR = 3600;
	const SEC_BY_MIN  = 60;
	const SEC_BY_SEC  = 1;

	/** @var  array */
	private $timeParts;

	/** @var  int */
	private $duration;

	/** @var  string */
	private $durationText;

	public function build(int $duration)
	{
		$this->duration = $duration;

		$this->addYears();
		$this->addDays();
		$this->addHours();
		$this->addMins();
		$this->addSeconds();

		$last         = array_pop($this->timeParts);
		$durationText = '';
		if (!empty($this->timeParts))
		{
			$durationText = implode(', ', $this->timeParts);
		}

		$this->durationText =
			$durationText
			. (!empty($durationText) ? ' and ' : '')
			. $last;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get()
	{
		return $this->durationText;
	}

	private function addYears()
	{
		$this->addFormatByTime('year', self::SEC_BY_YEAR);
	}

	private function addDays()
	{
		$this->addFormatByTime('day', self::SEC_BY_DAY);
	}

	private function addHours()
	{
		$this->addFormatByTime('hour', self::SEC_BY_HOUR);
	}

	private function addMins()
	{
		$this->addFormatByTime('minute', self::SEC_BY_MIN);
	}

	private function addSeconds()
	{
		$this->addFormatByTime('second', self::SEC_BY_SEC);
	}

	/**
	 * @param int $count
	 *
	 * @return string
	 */
	private function getPlural(int $count)
	{
		return $count > 1 ? 's' : '';
	}

	/**
	 * @param string $timeName
	 * @param        $timeInSec
	 */
	private function addFormatByTime(string $timeName, $timeInSec): void
	{
		$count = (int)($this->duration / $timeInSec);

		if ($count > 0)
		{
			$this->timeParts []= $count . ' ' . $timeName . $this->getPlural($count);

			$this->duration = $this->duration % $timeInSec;
		}
	}
}
