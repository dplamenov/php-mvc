<?php

use Application\Base;

class Welcome
{
    public function showForm()
    {
        $database = \Application\Database::init();
        $database->insert('INSERT INTO `pages` (`page_title`, `page_body`) VALUES (?, ?)' , ['title', 'body']);
        return Base::View('welcome');
    }

    public function storeData()
    {
        return 'Post';
    }

}