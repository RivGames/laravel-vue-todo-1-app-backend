<?php

namespace App\Http\Requests\Todo;

use App\Dto\Todo\CreateDto;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:30',
            'body' => 'required|min:5|max:255',
        ];
    }

    public function getDto(): CreateDto
    {
        return new CreateDto($this->title,$this->body);
    }
}
