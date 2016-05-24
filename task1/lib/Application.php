<?php

class Application
{
	use RandomQuote;

	public function run()
	{
		echo $this->getQuote();
	}
}