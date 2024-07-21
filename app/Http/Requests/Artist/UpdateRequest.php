<?php

namespace App\Http\Requests\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'artist-name' => 'required|max:100',
            'sex' => 'required',
            'self-intro' => 'required|max:140'
        ];
    }

    public function artistName(): string
    {
        return $this->input('artist-name');
    }

    public function profile(): string
    {
        return $this->input('self-intro');
    }

    public function sex(): string
    {
        return $this->input('sex');
    }

    public function age(): string
    {
        return $this->input('age');
    }

    public function id(): int
    {
        return (int) $this->route('artistId');
    }
}

