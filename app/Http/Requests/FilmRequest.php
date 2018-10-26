<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules( Request $request )
    {
        return [
            'name'          => 'required|max:255',
            'description'   => 'required',
            'release_date'  => 'required',
            'rating'        => 'required|integer',
            'ticket_price'  => 'required||regex:/^\d*(\.\d{1,2})?$/',
            'country_id'    => 'required|integer',
            'genre'         => 'required|array',
            'photo'         => 'required|image|mimes:' . config( "app.allowed_image_ext" ),
        ];
    }
}
