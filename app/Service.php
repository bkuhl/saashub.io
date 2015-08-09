<?php namespace SaaSHub;

use DB;
use Carbon\Carbon;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements StaplerableInterface
{
    use EloquentTrait;

    protected $guarded = ['id'];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('logo', [
            'styles' => [
                'thumbnail' => '100x100#'
            ],
            'url' => '/services/:id/logo/:style/:filename'
        ]);

        parent::__construct($attributes);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function metas()
    {
        return $this->hasMany(ServiceMeta::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany(ServiceVisits::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(ServiceVisits::class);
    }

    /**
     * Record a visit to this server
     *
     * @param $ipAddress
     *
     * @return static
     */
    public function recordVisit($ipAddress)
    {
        $previousVisit = ServiceVisits::where('service_id', $this->id)
            ->where('ip', $ipAddress)
            ->orderBy('created_at', 'DESC')
            ->first();

        // 15 minute threshold before click is counted again
        if (is_null($previousVisit) || $previousVisit->created_at->diffInMinutes() > 14) {
            ServiceVisits::create([
                'service_id'    => $this->id,
                'ip'            => $ipAddress
            ]);
        }
    }

    public function getRedirectUrl()
    {
        return url('/service/'.$this->id.'/go');
    }

    public function scopePopular(Builder $query)
    {
        return $query->orderBy('positive_ratings', 'DESC');
    }

    /**
     * Determine if the given IP has rated this service
     *
     * @param $ipAddress
     *
     * @return bool
     */
    public function hasRated($ipAddress)
    {
        return ServiceRatings::where('service_id', $this->id)
            ->where('ip', $ipAddress)
            ->count() > 0;
    }

    public function ratePositive($ipAddress)
    {
        $this->increment('positive_ratings');

        if ($this->hasRated($ipAddress)) {
            $this->decrement('negative_ratings');
            ServiceRatings::where('ip', $ipAddress)
                ->where('service_id', $this->id)
                ->update([
                    'rating' => ServiceRatings::POSITIVE
                ]);
            return;
        }

        ServiceRatings::create([
            'service_id'    => $this->id,
            'ip'            => $ipAddress,
            'rating'        => ServiceRatings::POSITIVE
        ]);
    }

    public function rateNegative($ipAddress)
    {
        $this->increment('negative_ratings');

        if ($this->hasRated($ipAddress)) {
            $this->decrement('positive_ratings');
            ServiceRatings::where('ip', $ipAddress)
                ->where('service_id', $this->id)
                ->update([
                    'rating' => ServiceRatings::NEGATIVE
                ]);
            return;
        }

        ServiceRatings::create([
            'service_id'    => $this->id,
            'ip'            => $ipAddress,
            'rating'        => ServiceRatings::NEGATIVE
        ]);
    }
}