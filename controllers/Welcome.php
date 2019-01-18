<?php

use Application\Base;
use controller\Controller;

class Welcome extends Controller
{

    public function showForm(\Application\Request $request)
    {
        $request->session()->put('num', $request->session()->get('num') + 1);
        echo $request->session()->get('num');
        return Base::View('welcome');
    }

    public function storeData(\Application\Request $request)
    {
        $this->validate($request, [
            'name' => 'min:5|max:8',
        ]);
    }

}