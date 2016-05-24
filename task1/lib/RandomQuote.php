<?php

trait RandomQuote
{
	
	public function getQuote()
	{
		$quotes = [
			'Not to know is bad, not to wish to know is worse. (Proverb)',
			'Formal education will make you a living. Self-education will make you a fortune. (Jim Rohn)',
			'Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe. (Albert Einstein)',
			'Every solution breeds new problems. (Murphy\'s law)',
			'Everything takes longer than you think. (Murphy\'s law)',
			'Success doesn\'t come to you... you go to it. (Marva Collins)',
			'Those who cannot change their minds cannot change anything. (Bernard Shaw)',
			'If anything is worth trying at all, it\'s worth trying at least 10 times. (Art Linkletter)',
			'Every English poet should master the rules of grammar before he attempts to bend or break them. (Robert Graves)',
			'If you want to be somebody, somebody really special, be yourself! (Unknown Author)'
		];
		
		$index = rand(0, count($quotes) - 1);
		return $quotes[$index];
	}
}