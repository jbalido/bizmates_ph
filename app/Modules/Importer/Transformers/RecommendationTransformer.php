<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 11:41 AM
 */

namespace App\Modules\Importer\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class placeDetailsTransformer
 * @package App\Modules\Importer\Transformers
 */
class RecommendationTransformer extends TransformerAbstract
{
    /**
     * @param Recommendations $place
     * @return array
     */
    public function transform($recommendations)
    {
        $datum = $recommendations->toArray();

        foreach ($datum['data'] as $key => &$value) {
            $value['location']   = (array) json_decode($value['location']);
            $value['categories'] = json_decode($value['categories']);
            $value['contact']    = json_decode($value['contact']);
        }

        return $datum['data'];
    }
}
