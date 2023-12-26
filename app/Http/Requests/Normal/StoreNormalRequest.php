<?php

namespace App\Http\Requests\Normal;

use Illuminate\Foundation\Http\FormRequest;

class StoreNormalRequest extends FormRequest
{
    
   
     
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'desc' => 'required',
            'starting_price' => 'required',
            'final_price' => 'required',
            'income' => 'required',
             'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120'
    
        ];
    }
}
