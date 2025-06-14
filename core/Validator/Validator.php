<?php

namespace Core\Validator;

class Validator
{
    private array $errors = [];
    private array $rules = ['required', 'min', 'max', 'email', 'match'];
    private array $data = [];
    private array $errorMessage = [
        'required' => 'Данное поле обязательно для заполнения',
        'min' => 'Поле должно содержать не менее #ruleValue# символов',
        'max' => 'Поле должно содержать не более #ruleValue# символов',
        'email' => 'Введите корректный Email',
        'match' => 'Поля должны совпадать'
    ];

    public function validate(array $data, array $rules): void
    {
        $this->data = $data;
        $this->errors = [];
        foreach ($data as $field => $value) {
            $this->check([
                'field' => $field,
                'value' => trim($value),
                'rules' => $rules[$field]
            ]);
        }
    }

    private function check(array $data): void
    {
        foreach ($data['rules'] as $rule => $ruleValue) {
            if (in_array($rule, $this->rules)) {
                if (!call_user_func_array([$this, $rule], [$data['value'], $ruleValue])) {
                    $this->errors[$data['field']][] = str_replace(
                        ['#ruleValue#'],
                        [$ruleValue],
                        $this->errorMessage[$rule]);
                }
            }
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    private function required($value, $ruleValue): bool
    {
        return !empty($value);
    }

    private function min($value, $ruleValue): bool
    {
        $length = mb_strlen($value, 'UTF-8');
        return $length >= $ruleValue;
    }

    private function max($value, $ruleValue): bool
    {
        $length = mb_strlen($value, 'UTF-8');
        return $length <= $ruleValue;
    }

    private function email($value, $ruleValue): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    private function match($value, $ruleValue): bool
    {
        return $value === $this->data[$ruleValue] ?? '';
    }
}