<?php
namespace cjrasmussen\Time;

class Convert
{
	/**
	 * Converts a given number of seconds to h:mm:ss
	 *
	 * Negative seconds returned as 0:00:00
	 *
	 * @param int $seconds
	 * @param bool $skip_hours
	 * @return string
	 */
	public static function secondsToTime($seconds, $skip_hours = false): ?string
	{
		if (($seconds === null) OR (!is_numeric($seconds))) {
			return null;
		}

		if ($seconds < 0) {
			return '00:00:00';
		}

		$hours = floor($seconds / 3600);
		$seconds -= ($hours * 3600);
		$minutes = floor($seconds / 60);
		$seconds -= ($minutes * 60);

		if ($skip_hours) {
			$minutes += $hours * 60;
			$time = str_pad($minutes, 2, '0',STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT);
		} else {
			$time = str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0',
					STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT);
		}

		return $time;
	}

	/**
	 * Converts h:mm:ss to a number of seconds
	 *
	 * @param string $time
	 * @return int
	 */
	public static function timeToSeconds($time): int
	{
		$parts = explode(':', $time);

		$i = 0;
		$seconds = 0;

		for ($n = (count($parts) - 1); $n >= 0; $n--) {
			$seconds += (int)$parts[$n] * (60 ** $i);
			$i++;
		}

		return (int)$seconds;
	}
}
