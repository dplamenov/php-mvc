<?php

namespace Application;
class Base
{


    public static function View(String $view, $data = [])
    {
        $template = file_get_contents('../views/' . $view . ".php");
        foreach ($data as $key => $value) {
            $$key = $value;
            $template = str_replace($key, $$key, $template);
            $template = str_replace('{{$', '', $template);
            $template = str_replace('}}', '', $template);
        }

        return $template;

    }

    public static function redirect($to)
    {
        header("Location: " . $_SERVER['REQUEST_URI'] . ltrim($to, '/'));
    }
}