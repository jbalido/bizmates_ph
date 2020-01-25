<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 9:55 AM
 */

namespace App\Modules\Importer\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 * @package App\Modules\Importer\Models
 *
 * @method where(string $column, $value)
 * @method static updateOrCreate(array $key, array $data)
 */
class Recommendation extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'place_id',
        'name',
        'contact',
        'location',
        'categories'
    ];

    /**
     * @var array $casts
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function place()
    {
        return $this->belongsTo('App\Modules\Importer\Models\Place');
    }
}
