<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'director' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'image' => 'nullable|string',
            'poster' => 'nullable|string',
            'info' => 'required|string',
            'type' => 'required|in:film,series',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',

        ];
    }
    

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'summary.required' => 'The summary field is required.',
            'director.required' => 'The director field is required.',
            'rating.required' => 'The rating field is required.',
            'rating.numeric' => 'The rating must be a number.',
            'rating.min' => 'The rating must be at least :min.',
            'rating.max' => 'The rating may not be greater than :max.',
            'type.required' => 'The type field is required.',
            'type.in' => 'The type must be either film or series.',
            'genres.required' => 'Please select at least one genre.',
            'genres.array' => 'The genres must be an array.',
            'genres.*.exists' => 'One or more selected genres are invalid.',
        ];
    }





}

