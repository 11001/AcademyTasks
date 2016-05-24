<?php

class Greeting
{
	use RandomQuote;
	
	public static function say($name)
	{
		echo "Hi, {$name}! There is a new quote for you:" . PHP_EOL;
		echo self::getQuote(), PHP_EOL;
	}
}