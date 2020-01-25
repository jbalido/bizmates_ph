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
        return [
            'id' => $place->getAttributeValue('id'),
            'code' => $place->getAttributeValue('code'),
            'first_name' => $place->getAttributeValue('first_name'),
            'second_name' => $place->getAttributeValue('second_name'),
            'total_points' => $place->getAttributeValue('total_points'),
            'influence' => $place->getAttributeValue('influence'),
            'creativity' => $place->getAttributeValue('creativity'),
            'threat' => $place->getAttributeValue('threat'),
            'ict_index' => $place->getAttributeValue('ict_index')
        ];
    }
}
