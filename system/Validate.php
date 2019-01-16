<?php

namespace Application;


trait Validate
{
    public function validate(Request $request, array $validate_rules)
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
            if (substr_count($datum['rules'], '|') > 0) {
                $rules = explode('|', $datum['rules']);
                $data[$k]['rules'] = $rules;
            }
        }
        echo '<pre>' . print_r($data, true) . '</pre>';

    }
}