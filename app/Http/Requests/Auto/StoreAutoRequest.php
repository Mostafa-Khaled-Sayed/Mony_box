<?php

namespace App\Http\Requests\Auto;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutoRequest extends FormRequest
{
    
   
     
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'Desc_ar' => 'required',
            'Desc_en' => 'required',
            'price' => 'required',
            'income' => 'required',
            'gift'=> 'required',
            'time_end'=>'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5120'
        ];
    }
}
