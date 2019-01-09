<?php

namespace Application;
class Base
{

	public static function View(String $view, $data = [])
	{

		foreach ($data as $key => $value) {
			$$key = $value;
		}
		$file = file_get_contents('../views/' . $view . ".php");
		return $file;


	}
}