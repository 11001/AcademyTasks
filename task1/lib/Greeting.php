<?php

class Greeting
{
	use RandomQuote;
	
	public function say($name)
	{
		echo "Hi, {$name}! There is a new quote for you:" . PHP_EOL;
		echo $this->getQuote(), PHP_EOL;
	}
}