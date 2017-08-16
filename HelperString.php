<?php
namespace plance\helper;

use Yii;

use plance\helper\HelperDate;

class HelperString
{
	/**
	 * Generates a random string
	 * @param string length
	 * @param string [string,int,symbol] INDICATE where the word will consist of
	 * @return string
	 */
	public static function randomText()
	{
		//Get arguments
		$args_ar = func_get_args();
		$new_arr = [];

		//Determine the length of the text
		$length = $args_ar[0];
		unset($args_ar[0]);

		if(!sizeof($args_ar))
		{
			$args_ar = ["string","int","symbol"];
		}

		$arr['string'] = [
			 'a','b','c','d','e','f',
			 'g','h','i','j','k','l',
			 'm','n','o','p','r','s',
			 't','u','v','x','y','z',
			 'A','B','C','D','E','F',
			 'G','H','I','J','K','L',
			 'M','N','O','P','R','S',
			 'T','U','V','X','Y','Z'];

		$arr['int'] = [
			 '1','2','3','4','5',
			 '6','7','8','9','0'];

		$arr['symbol'] = [
			 '.','$','[',']','!','@',
			 ',','*','+','-','{','}'];

		//Create an array from all arrays
		foreach($args_ar as $type)
		{
			if(isset($arr[$type]))
			{
				$new_arr = array_merge($new_arr,$arr[$type]);
			}
		}

		$str = "";
		for($i = 0; $i < $length; $i++)
		{
			//Compute the random index of the array
			$index = rand(0, count($new_arr) - 1);
			$str .= $new_arr[$index];
		}
		return $str;
	}
	
	/**
	 * Translates characters from Russian to English
	 * @param string $text
	 */
	public static function transRuToEn($text)
	{
		 return strtr($text,[
			/* Russian alphabet */
			"а" => "a",	"б" => "b",	"в" => "v",	"г" => "g",	"д" => "d",	"е" => "e",	"ё" => "yo",	
			"ж" => "zh","з" => "z",	"и" => "i",	"й" => "y",	"к" => "k",	"л" => "l",	"м" => "m",
			"н" => "n",	"о" => "o",	"п" => "p",	"р" => "r",	"с" => "s",	"т" => "t",	"у" => "u",
			"ф" => "f",	"х" => "h",	"ц" => "ts","ч" => "ch","ш" => "sh","щ" => "shc","ъ" => "",
			"ы" => "y",	"ь" => "",	"э" => "e",	"ю" => "yu","я" => "ya",
			"А" => "A",	"Б" => "B",	"В" => "V",	"Г" => "G",	"Д" => "D",	"Е" => "E",	"Ё" => "Yo",	
			"Ж" => "Zh","З" => "Z",	"И" => "I",	"Й" => "Y",	"К" => "K",	"Л" => "L",	"М" => "M",
			"Н" => "N",	"О" => "O",	"П" => "P",	"Р" => "R",	"С" => "S",	"Т" => "T",	"У" => "U",
			"Ф" => "F",	"Х" => "H",	"Ц" => "Ts","Ч" => "Ch","Ш" => "Sh","Щ" => "Shc","Э" => "E",
			"Ю" => "Yu","Я" => "Ya",
			/* Ukrainian alphabet */
			"ґ" => "g", "і" => "i", "ї" => "y", "є" => "e", 
			"Ґ" => "G", "I" => "I", "Ї" => "Y", "Є" => "E",
		]);
	}
	
	/**
	 * Creates a link from the text
	 * @param string $key ID
	 * @param string $title
	 * @param string $separator
	 * @return string
	 */
	public static function titleLink($key, $title, $separator = '-')
	{
		return $key.$separator.self::title(self::transRuToEn($title), $separator);
	}
	
	/**
	 * Convert a phrase to a URL-safe title. [from Kohana Framework]
	 * @param   string   phrase to convert
	 * @param   string   word separator (any single character)
	 * @return  string
	 */
	public static function title($title, $separator = '-')
	{
		// Remove all characters that are not the separator, letters, numbers, or whitespace
		$title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', strtolower($title));

		// Replace all separator characters and whitespace by a single separator
		$title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

		// Trim separators from the beginning and end
		return trim($title, $separator);
	}
	
	/**
	 * Returns an array of cache periods
	 * @return array
	 */
	public static function getCacheTime()
	{
		return [
			'-1' => Yii::t('app', 'Do not cache'),
			Yii::t('app', 'Minutes') => [
				(HelperDate::MINUTE * 5) => 5,
				(HelperDate::MINUTE * 10) => 10,
				(HelperDate::MINUTE * 15) => 15,
				(HelperDate::MINUTE * 20) => 20,
				(HelperDate::MINUTE * 25) => 25,
				(HelperDate::MINUTE * 30) => 30,
				(HelperDate::MINUTE * 35) => 35,
				(HelperDate::MINUTE * 40) => 40,
				(HelperDate::MINUTE * 45) => 45,
				(HelperDate::MINUTE * 50) => 50,
				(HelperDate::MINUTE * 55) => 55,
			],
			Yii::t('app', 'Hours') => [
				HelperDate::HOUR		=> 1,
				(HelperDate::HOUR * 2)	=> 2,
				(HelperDate::HOUR * 3)	=> 3,
				(HelperDate::HOUR * 4)	=> 4,
				(HelperDate::HOUR * 5)	=> 5,
				(HelperDate::HOUR * 6)	=> 6,
				(HelperDate::HOUR * 7)	=> 7,
				(HelperDate::HOUR * 8)	=> 8,
				(HelperDate::HOUR * 9)	=> 9,
				(HelperDate::HOUR * 10)	=> 10,
				(HelperDate::HOUR * 11)	=> 11,
				(HelperDate::HOUR * 12)	=> 12,
				(HelperDate::HOUR * 13)	=> 13,
				(HelperDate::HOUR * 14)	=> 14,
				(HelperDate::HOUR * 15)	=> 15,
				(HelperDate::HOUR * 16)	=> 16,
				(HelperDate::HOUR * 17)	=> 17,
				(HelperDate::HOUR * 18)	=> 18,
				(HelperDate::HOUR * 19)	=> 19,
				(HelperDate::HOUR * 20)	=> 20,
				(HelperDate::HOUR * 21)	=> 21,
				(HelperDate::HOUR * 22)	=> 22,
				(HelperDate::HOUR * 23)	=> 23,
			],
			Yii::t('app', 'Days') => [
				HelperDate::DAY 		=> 1,
				(HelperDate::DAY * 2) 	=> 2,
				(HelperDate::DAY * 3) 	=> 3,
				(HelperDate::DAY * 4) 	=> 4,
				(HelperDate::DAY * 5) 	=> 5,
				(HelperDate::DAY * 6) 	=> 6,
			],
			Yii::t('app', 'Weeks') => [
				HelperDate::WEEK 		=> 1,
				(HelperDate::WEEK * 2) 	=> 2,
				(HelperDate::WEEK * 3) 	=> 3,
				(HelperDate::WEEK * 4) 	=> 4,
			],
			Yii::t('app', 'Months') => [
				HelperDate::MONTH 		=> 1,
				(HelperDate::MONTH * 2) => 2,
				(HelperDate::MONTH * 3) => 3,
				(HelperDate::MONTH * 4) => 4,
				(HelperDate::MONTH * 5) => 5,
				(HelperDate::MONTH * 6) => 6,
			]
		];
	}
}