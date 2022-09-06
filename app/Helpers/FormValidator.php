<?php

namespace App\Helpers;

use App\Models\Employees;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class FormValidator
{
    public array $data;
    public array $error_messages;
    public Validator $validate;

    public function __construct(array $payload)
    {
        $this->data = $payload;
    }
    /**
     * @param array $payload
     * @return bool
     */
    //VALIDATION EMPLOYEE POST
    public function validasiGambar()
    {
        $rules = [
            'gambar' => 'mimes:jpeg,jpg,png,gif'
        ];
        $validate = FacadesValidator::make($this->data, $rules);
        $this->validate = $validate;
        return $validate->fails();
    }
}
