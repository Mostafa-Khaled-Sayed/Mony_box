<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementlRequest extends FormRequest
{



    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
           
            'orderTotal' => 'required',


        ];
    }
}
