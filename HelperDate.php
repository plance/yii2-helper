<?php
namespace plance\helper;

class HelperDate
{
	const dateD 	= 'd.m.Y';
	const dateDT 	= 'd.m.Y H:i';
	const dateDTS 	= 'd.m.Y H:i:s';

	const YEAR   = 31556926;
	const MONTH  = 2629744;
	const WEEK   = 604800;
	const DAY    = 86400;
	const HOUR   = 3600;
	const MINUTE = 60;

	/**
	 * Converts date of type dd.mm.yyyy into timestamp format
	 * @param int $date
	 * @param int $H Hours, if necessary
	 * @param int $i Minutes, if needed
	 * @param int $s Seconds, if needed
	 * @param char $separate Delimiter, default "." dot
	 * @return int
	 */
	public static function convertDateToTimestamp($date = NULL, $H = NULL, $i = NULL, $s = NULL, $separate = '.')
	{
		$date_ar = array_map("intval",explode($separate,$date));
		$H = is_null($H) ? date("H") : $H;
		$i = is_null($i) ? date("i") : $i;
		$s = is_null($s) ? date("s") : $s;

		return mktime($H,$i,$s,$date_ar[1],$date_ar[0],$date_ar[2]);
	}
}