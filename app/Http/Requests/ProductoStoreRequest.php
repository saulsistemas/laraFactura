<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoStoreRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'nombre'=>'required',
            'precio'=>'required|numeric',
            'image'=>'image'
        ];
    }
}
