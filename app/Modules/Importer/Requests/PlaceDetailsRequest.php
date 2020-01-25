<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 10:16 AM
 */

namespace App\Modules\Importer\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PlaceDetailsRequest
 * @package App\Modules\Importer\Requests
 */
class PlaceDetailsRequest extends FormRequest
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
            'id' => 'required|numeric|exists:places,id'
        ];
    }

    /**
     * Custom validation error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'Place Id is required.',
            'id.numeric' => 'Place Id must be numeric.',
            'id.exists' => 'Place not found.',
        ];
    }
}
