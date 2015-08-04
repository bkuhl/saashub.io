<?php namespace FreeTier;

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
    public function activity()
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
        return $query->select(DB::raw('*, (
                SELECT COUNT(id) FROM service_visits WHERE service_visits.service_id = services.id AND created_at > DATE_ADD(NOW(), INTERVAL -1 MONTH)
            ) as hits'))
            ->orderBy('hits', 'DESC');
    }
}