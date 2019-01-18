<?php

namespace Application;


trait Validate
{
    final public function validate(Request $request, array $validate_rules)
    {
        $request = $request->post();
        $request_ = array();
        $data = array();
        foreach ($validate_rules as $name => $rule) {
            if (isset($request->$name)) {
                $request_[$name] = $request->$name;
            } else {
                unset($validate_rules[$name]);
            }
        }
        foreach ($request_ as $key => $value) {
            $data[$key]['value'] = $value;
            $data[$key]['rules'] = $validate_rules[$key];
        }
        foreach ($data as $k => $datum) {
            $rules = explode('|', $datum['rules']);
            $data[$k]['rules'] = $rules;
        }

        foreach ($data as $k => $v) {
            $rules = $data[$k]['rules'];
            $data[$k]['rules'] = array_map(function ($element) {
                $element = explode(':', $element);
                return $element;
            }, $rules);
        }

        $data = array_values($data);

        for ($i = 0; $i <= count($data) - 1; $i++) {
            $value = $data[$i]['value'];
        
        }

        echo '<pre>' . print_r($data, true) . '</pre>';


    }

    private function min($value, $n)
    {

    }

    private function max($value, $n)
    {

    }


}