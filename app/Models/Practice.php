<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Practice extends Model
{
    use HasFactory;
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
    public function publication_state()
    {
        return $this->belongsTo(PublicationState::class);
    }
    static function getPublished()
    {
        return Practice::with('publication_state')->whereHas(
            'publication_state',
            function (Builder $query) {
                $query->where('slug', 'PUB');
            }

        )->get();
    }
    static function getRecentUpdated($nbDays)
    {
        return Practice::where('updated_at', '>=', Carbon::now()->subDays($nbDays))->get();
    }
    static function getRecentPublisedUpdated($nbDays)
    {
        return Practice::where('updated_at', '>=', Carbon::now()->subDays($nbDays))->with('publication_state')->whereHas(
            'publication_state',
            function (Builder $query) {
                $query->where('slug', 'PUB');
            }
        )->get();
    }
}
