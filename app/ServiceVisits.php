<?php namespace FreeTier;

use Illuminate\Database\Eloquent\Model;

class ServiceVisits extends Model
{
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}