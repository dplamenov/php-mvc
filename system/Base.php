<?php

namespace Application;
class Base
{

	public static function View(String $view, $data = [])
	{

		foreach ($data as $key => $value) {
			$$key = $value;
		}
		include_once '../views/' . $view . ".php";
		return true;

	}
}