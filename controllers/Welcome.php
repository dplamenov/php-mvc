<?php

use Application\Base;
use controller\Controller;

class Welcome extends Controller
{
    public function index(\Application\Request $request, $id = null)
    {
        var_dump($request);
        echo $id;
    }

    public function showForm(\Application\Request $request)
    {
        $user = new \Models\User();
        $a = $user->find(1);

        $request->session()->put('num', $request->session()->get('num') + 1);
        $num = $request->session()->get('num');
        return Base::View('welcome', ['num' => $num]);

    }

    public function storeData(\Application\Request $request)
    {

        $validation = $this->validate($request, [
            'name' => 'min:2|max:8|string',
            'password' => 'min:5|string'
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