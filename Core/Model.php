<?php

namespace App\Core;

/**
 * @author  Muhammed Sami
 * @package App\Core
 */
abstract class Model
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';
    const RULE_MIN = 'min';
    const RULE_MAX = 'max';
    const RULE_MATCH = 'match';

    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
       /* foreach ($this->rules() as $attribute => $rules){
            $valeu = $this->{$attribute};
            foreach ($rules as $rule){

            }
        }*/
    }

    abstract public function rules(): array;
}
