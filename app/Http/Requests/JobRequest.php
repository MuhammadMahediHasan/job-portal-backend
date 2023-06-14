<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guard('company')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'id' => 'sometimes',
            'job_categories_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary_range' => 'required',
            'vacancy' => 'required',
            'job_nature' => 'required',
            'dead_line' => 'required',
        ];
    }

    public function fields(): array
    {
        return [
            'job_categories_id' => $this->get('job_categories_id'),
            'id' => $this->get('id'),
            'title' => $this->get('title'),
            'slug' => Str::slug($this->get('title')),
            'companies_id' => Auth::guard('company')->id(),
            'description' => $this->get('description'),
            'location' => $this->get('location'),
            'salary_range' => $this->get('salary_range'),
            'vacancy' => $this->get('vacancy'),
            'job_nature' => $this->get('job_nature'),
            'dead_line' => $this->get('dead_line'),
        ];
    }
}
