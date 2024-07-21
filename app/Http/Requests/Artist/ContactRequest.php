<?php

namespace App\Http\Requests\Artist;

use Illuminate\Foundation\Http\FormRequest;
use App\Mail\NewUserIntroduction;
use Illuminate\Contracts\Mail\Mailer;


class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'created_name' => 'required|max:10',
            'email' => 'email:rfc,dns',
            'message' => 'required|max:140',
        ];
    }

    public function name()
    {
        return $this->input('created_name');
    }

    public function email()
    {
        return $this->input('email');
    }

    public function message()
    {
        return $this->input('message');
    }
}

