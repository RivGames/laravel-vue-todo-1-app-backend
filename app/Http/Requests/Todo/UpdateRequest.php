<?php

namespace App\Http\Requests\Todo;

use App\Dto\Todo\UpdateDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use function MongoDB\BSON\toJSON;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:30',
            'body' => 'required|min:5|max:255',
        ];
    }

    public function getDto(): UpdateDto
    {
        return new UpdateDto($this->title, $this->body);
    }
}
