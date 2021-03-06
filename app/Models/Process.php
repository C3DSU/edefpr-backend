<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Process extends Model implements HasMedia
{
    use HasMediaTrait, SoftDeletes;

    const MAX_WITNESSES = 3;
    const BRAZIL_MINIMUM_WAGE = 998.00;
    const STANDARD_FISCAL_UNIT_OF_PARANA = 98.33;
    const FAMILY_MINIMUM_WAGE_AMOUNT = 12;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'assisted_id',
        'counter_part_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the user one that has the process.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the assisted one that has the process.
     */
    public function assisted()
    {
        return $this->belongsTo(Assisted::class);
    }

    /**
     * Get the counter part one that has the process.
     */
    public function counterPart()
    {
        return $this->belongsTo(CounterPart::class);
    }

    /**
     * The witnesses that belong to the process.
     */
    public function witnesses()
    {
        return $this->belongsToMany(Witness::class);
    }
}
