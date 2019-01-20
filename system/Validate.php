<?php

namespace Application;


trait Validate
{
    final public function validate(Request $request, array $validate_rules)
    {
        $request = $request->post();
        $error = array();
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

            $result[$i] = $this->check($value, $data[$i]['rules'], $error, $request_, $i);

        }

        foreach ($result as $key => $value) {
            foreach ($result[$key] as $item) {
                $validation = 0;
                if ($this->same($result[$key])) {

                    $validation += 1;
                }
            }
        }

        if ($validation == count($data)) {
            $validation = true;
        } else {
            $validation = false;
        }
        $v = new Validation($validation, $data, $request, $error);
        return $v;
    }

    private function same($arr)
    {
        $sum = 0;
        foreach ($arr as $ar) {
            $sum += $ar;
        }

        if ($sum == count($arr)) {
            return true;
        }
    }


    private function check($value, $rules, &$error, $request, $i)
    {
        foreach ($rules as $rule) {
            if ($rule[0] == 'min') {
                if ($this->min($value, $rule[1]) == true) {
                    $result[] = $this->min($value, $rule[1]);
                } else {
                    $error[] = $this->error_min($value, $rule[1], $request, $i);
                    $result[] = 0;
                }

            } elseif ($rule[0] == 'max') {
                if ($this->max($value, $rule[1]) == true) {
                    $result[] = $this->max($value, $rule[1]);
                } else {
                    $error[] = $this->error_max($value, $rule[1], $request, $i);
                    $result[] = 0;
                }
            } elseif ($rule[0]) {
                if ($this->string($value) == true) {
                    $result[] = $this->string($value);
                } else {
                    $error[] = $this->error_string($value, $request, $i);
                    $result[] = 0;
                }
            }
        }
        return $result;
    }

    private function asGenerator(&$arr)
    {
        foreach ($arr as $key => $element) {
            yield $key;
        }
    }

    private function error_min($value, $n, $data, $counter)
    {
        foreach ($data as $_key => $_value) {
            if ($_value == $value) {
                $generator = $this->asGenerator($data);
                if ($counter == 0) {
                    return "The length of `" . $generator->current() . "` must be more of $n";
                } else {
                    $generator->next();
                    return "The length of `" . $generator->current() . "` must be more of $n";
                }

            }
        }
        return 0;

    }


    private function error_max($value, $n, $data, $counter)
    {
        foreach ($data as $_key => $_value) {
            if ($_value == $value) {
                $generator = $this->asGenerator($data);
                if ($counter == 0) {
                    return "The length of `" . $generator->current() . "` must be less of $n";
                } else {
                    $generator->next();
                    return "The length of `" . $generator->current() . "` must be less of $n";
                }

            }
        }
        return 0;

    }

    private function error_string($value, $data, $counter)
    {
        foreach ($data as $_key => $_value) {
            if ($_value == $value) {
                $generator = $this->asGenerator($data);
                if ($counter == 0) {
                    return "The `" . $generator->current() . "` must be a string";
                } else {
                    $generator->next();
                    return "The `" . $generator->current() . "` must be a string";
                }

            }


        }
        return 0;
    }

    private function min($value, $n)
    {
        return (mb_strlen($value) >= $n);
    }

    private function max($value, $n)
    {
        return (mb_strlen($value) <= $n);
    }

    private function string($value)
    {
        return (bool)preg_match('/^([a-z])+$/i', $value);
    }


}