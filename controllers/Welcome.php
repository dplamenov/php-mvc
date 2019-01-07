<?php

class Welcome
{
	public function welcome()
	{
		 return Application\Database::select();
    }
}