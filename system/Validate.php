<?php

namespace Application;


trait Validate
{
    public function validate(Request $request, array $validate_rules)
    {
        $request = $request->post();
        $request_ = array();
        foreach ($validate_rules as $name => $rule) {
            if (isset($request->$name)) {
                $request_[$name] = $request->$name;
            } else {
                unset($validate_rules[$name]);
            }
        }
        
    }
}