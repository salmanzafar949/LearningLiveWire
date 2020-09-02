<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class CustomValidation extends Exception
{
    protected $validator;

    protected $code = Response::HTTP_UNPROCESSABLE_ENTITY;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    // transform the error messages,
    public function render()
    {
        $errors = [];
        $keys = $this->validator->errors()->keys();
        $messages = $this->validator->errors()->all();
        $allErrors = $this->validator->errors();

        foreach ($allErrors as $msg => $m)
        {
            $errors = [
                $msg => $m[0]
            ];
        }

        return response([
            'message' => 'The given data was invalid',
            'errors' => $messages,
            'error' => $this->validator->errors()->first(),
            'allErrors' => $allErrors
        ],Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
