<?php

namespace Core\Core;

use Core\Validator\Validator;

abstract class Model
{
    protected string $table;
    protected array $allowedFields = [];
    protected array $filteredFields = [];
    protected array $rules = [];
    protected Validator $validator;

    public function loadData(array $data): void
    {
        foreach ($this->allowedFields as $k => $field) {
            if (array_key_exists($field, $data)) {
                $this->filteredFields[$field] = $data[$field];
            } else {
                $this->filteredFields[$field] = '';
            }
        }
    }

    public function validate(array $data = null, array $rules = null): bool
    {
        $data = $data ?? $this->filteredFields;
        $rules = $rules ?? $this->rules;

        $this->validator = new Validator();
        $this->validator->validate($data, $rules);
        return $this->validator->hasErrors();
    }

    public function getErrors(): array
    {
        return $this->validator->getErrors();
    }

    public function getFilteredFields(): array
    {
        return $this->filteredFields;
    }
}