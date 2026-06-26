<?php

namespace App\Http\Requests;

class TodoRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->isMethod('post')) {
            return true;
        }

        $todo = $this->route('todo');

        if (!$todo) {
            return false;
        }

        $todoUserId = $todo instanceof \App\Models\Todo ? $todo->user_id : \App\Models\Todo::where('id', $todo)->value('user_id');

        return $todoUserId === $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => $this->isMethod('post') ? 'required|string|max:255' : 'sometimes|required|string|max:255',
            'done' => 'sometimes|boolean',
        ];
    }
}
