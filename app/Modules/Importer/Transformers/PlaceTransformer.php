<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 10:23 AM
 */

namespace App\Modules\Importer\Transformers;

use App\Modules\Importer\Models\Place;
use League\Fractal\TransformerAbstract;

/**
 * Class PlaceTransformer
 * @package App\Modules\Importer\Transformers
 */
class PlaceTransformer extends TransformerAbstract
{
    /**
     * @param Place $place
     * @return array
     */
    public function transform(Place $place)
    {
        return [
            'id' => $place->getAttributeValue('id'),
            'name' => $place->getAttributeValue('name')
        ];
    }
}
