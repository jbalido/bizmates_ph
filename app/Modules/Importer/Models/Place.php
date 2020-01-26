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
class Place extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'query',
        'lat',
        'lng',
        'displayString',
        'slug',
        'longId'
    ];

    /**
     * @var array $casts
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function recommendation()
    {
        return $this->hasMany('App\Modules\Importer\Models\Recommendation');
    }
}
