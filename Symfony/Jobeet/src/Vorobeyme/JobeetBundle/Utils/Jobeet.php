<?php

namespace Vorobeyme\JobeetBundle\Utils;

class Jobeet
{
	static public function slugify($text)
	{
		// replace all non letters or digits by -
		//$test = preg_replace('/W+/', '-', $text);
		$text = str_replace(' ', '-', $text);

		// trim and lowercase
		$text = strtolower(trim($text, '-'));

		return $text;
	}
}
