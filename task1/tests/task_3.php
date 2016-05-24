<?php 

function generator($n)
{
	for ($i = 1; $i <= $n; $i++)
	{
		yield ($i*($i + 1))/2 . ' ';
	} 
}

foreach (generator(15) as $value) {
	echo $value;
}
