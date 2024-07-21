<?php

namespace App\Http\Requests\Artist;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CreateRequest extends FormRequest
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
            'artist-name' => 'required|max:100',
            'sex' => 'required',
            'genre' => 'required',
            'tag_name' => 'required',
            'self-intro' => 'required|max:140',
            'icon_img_name' => 'required|max:1',
            'icon_img_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'required|array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function userId(): int
    {
        return $this->user()->user_id;
    }
    
    public function artistName(): string
    {
        return $this->input('artist-name');
    }

    public function getSex(): string
    {
        return $this->input('sex');
    }

    public function genres(): array
    {
        return $this->input('genre', []);
    }

    public function getImg(): array
    {
        return $this->file('icon_img_name', []);
    }

    public function profile(): string
    {
        return $this->input('self-intro');
    }

    public function tags(): array
    {
        return $this->input('tag_name', []);
    }

    public function delete_flag() :string 
    {
        return $this->input('logic_delete_flag') ?? '';
    }

    public function deleteName(): string
    {
        return $this->user()->user_name;
    }

    public function updateName(): string
    {
        return $this->user()->user_name;
    }

    public function createName(): string
    {
        return $this->user()->user_name; // null の代わりに空の文字列を返す
    }

    public function images(): array
    {
        return $this->file('images', []);
    }

}
