<?php

use Application\Base;
use controller\Controller;

class Welcome extends Controller
{

    public function showForm(\Application\Request $request)
    {
        $request->session()->put('num', $request->session()->get('num') + 1);
        $num = $request->session()->get('num');
        return Base::View('welcome', ['num' => $num]);
    }

    public function storeData(\Application\Request $request)
    {
        $validation = $this->validate($request, [
            'name' => 'min:2|max:8|string',
            'password' => 'min:5'
        ]);
        if ($validation->getStatus() == true) {
            return 'ok';
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }
    }

}