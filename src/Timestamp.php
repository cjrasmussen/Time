<?php

namespace cjrasmussen\Time;

class Timestamp
{
	/**
	 * If provided a time, get the unix timestamp for it, otherwise return current unix timestamp
	 *
	 * I use this to allow an optional timestamp to be passed to certain cron jobs to determine when to base the run on.
	 * If a time is provided, this logic gets me that timestamp, otherwise the current time is used. It's admittedly
	 * hacky.
	 *
	 * @param $time
	 * @return int
	 */
	public static function getTimestamp($time = null): int
	{
		if (is_numeric($time)) {
			// PROVIDED A TIMESTAMP, JUST USE IT
			return (int)$time;
		}

		if ($time) {
			// PROVIDED SOMETHING ELSE, GET TIMESTAMP FROM IT
			return strtotime($time);
		}

		// NOTHING PROVIDED, USE CURRENT TIME
		return time();
	}
}