<?php

namespace App\Http\Requests\Normal;

use Illuminate\Foundation\Http\FormRequest;

class EditNormalRequest extends FormRequest
{
    
   
     
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'desc' => 'required',
            'starting_price' => 'required',
            'final_price' => 'required',
            'income' => 'required',
           
           
        ];
    }
}
