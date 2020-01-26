<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 11:41 AM
 */

namespace App\Modules\Importer\Transformers;

use App\Modules\Importer\Models\Place;
use League\Fractal\TransformerAbstract;

/**
 * Class placeDetailsTransformer
 * @package App\Modules\Importer\Transformers
 */
class PlaceDetailsTransformer extends TransformerAbstract
{
    /**
     * @param Place $place
     * @return array
     */
    public function transform(Place $place)
    {
        $datum = $place->toArray();
        
        foreach ($datum['recommendation'] as $key => &$value) {
            $value['location']   = (array) json_decode($value['location']);
            $value['categories'] = json_decode($value['categories']);
            $value['contact']    = json_decode($value['contact']);
        }

        return [
            'displayString' => $datum['displayString'],
            'lat' => $datum['lat'],
            'lng' => $datum['lng'],
            'recommendation' => $datum['recommendation']
        ];
    }
}
