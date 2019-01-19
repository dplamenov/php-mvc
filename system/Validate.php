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
        $validation = array();
        for ($i = 0; $i <= count($data) - 1; $i++) {
            $value = $data[$i]['value'];
            $result[$i] = $this->check($value, $data[$i]['rules']);

        }

        foreach ($result as $key => $value) {
            foreach ($result[$key] as $item) {
                $validation = 0;

                if ($this->isUnique($result[$key], 1)) {
                    $validation = 1;
                }
            }
        }

        if ($validation == 1) {
            $validation = true;
        } else {
            $validation = false;
        }
        return $validation;
    }

    private function isUnique($arr, $v)
    {
        $firstValue = current($arr);
        foreach ($arr as $val) {
            if ($firstValue != $val and $firstValue != $v) {
                return 0;
            }
        }
        return 1;

    }


    private function check($value, $rules)
    {
        foreach ($rules as $rule) {
            if ($rule[0] == 'min') {
                $result[] = $this->min($value, $rule[1]);
            } elseif ($rule[0] == 'max') {
                $result[] = $this->max($value, $rule[1]);
            }
        }
        return $result;
    }

    private function min($value, $n)
    {
        return (mb_strlen($value) > $n);
    }

    private function max($value, $n)
    {
        return (mb_strlen($value) < $n);
    }


}