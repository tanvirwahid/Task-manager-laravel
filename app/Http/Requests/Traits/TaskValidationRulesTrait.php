<?php

namespace App\Http\Requests\Traits;

trait TaskValidationRulesTrait
{
    public function getValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'status_id' => 'required|exists:statuses,id',
        ];
    }
}
