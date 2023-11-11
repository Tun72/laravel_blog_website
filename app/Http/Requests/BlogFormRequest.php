<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

use Illuminate\Support\Str;

class BlogFormRequest extends FormRequest

{
    private $isUpdate = false;
    public function __construct()
    {

        $this->isUpdate =  Str::contains(url()->current(), "create");
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["required", "max:20"],
            "slug" => ["required", "max:20"],
            "intro" => ["required", "max:100"],
            "reading_time" => ["required"],
            "body" => ["required", "max:5000"],
            "photo" => [$this->isUpdate ? "required" : "", "image"],
            "category_id" => ["required", Rule::exists("categories", "id")]
        ];
    }
}
