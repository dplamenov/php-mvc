<?php

namespace Application;
class Base
{


    public static function View(String $view, $data = [])
    {
        $template = file_get_contents('../views/' . $view . ".php");
        foreach ($data as $key => $value) {
            $$key = $value;

            if (is_string($value)) {
                $template = str_replace($key, self::e($value), $template);
            }
            $template = str_replace('{{$', '', $template);
            $template = str_replace('}}', '', $template);
            $parsed = self::get_string_between($template, '@php', '@endphp');
            $template = str_replace('@php', eval($parsed), $template);
            $template = str_replace('@endphp', '', $template);



        }

        return $template;

    }

    private static function e($msg)
    {
        return $msg;
    }

    private static function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    public static function redirect($to)
    {
        header("Location: " . $_SERVER['REQUEST_URI'] . ltrim($to, '/'));
    }
}