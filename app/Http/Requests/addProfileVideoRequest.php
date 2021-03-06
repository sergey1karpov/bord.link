<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addProfileVideoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'video' => 'max:150',
            'title' => 'max:100',
            'info' => 'max:1000',
            'audio' => 'max:1000',

            'amazon' => 'max:150',
            'applemusic' => 'max:150',
            'boom' => 'max:150',
            'deezer' => 'max:150',
            'googleplay' => 'max:150',
            'itunes' => 'max:150',
            'soundcloud' => 'max:150',
            'spotify' => 'max:150',
            'vkmusic' => 'max:150',
            'yandexmusic' => 'max:150',
            'youtubemusic' => 'max:150',
            'zvuk' => 'max:150'
        ];
    }
}
