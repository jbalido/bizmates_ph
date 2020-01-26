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
class SinglePlaceTransformer extends TransformerAbstract
{
    /**
     * @param Place $place
     * @return array
     */
    public function transform(Place $place)
    {
        $datum = $place->toArray();
        
        return [
            'displayString' => $datum['displayString'],
            'lat' => $datum['lat'],
            'lng' => $datum['lng'],
            'name' => $datum['name']
        ];
    }
}
