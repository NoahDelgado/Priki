<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    public function getPublished()
    {
        //->where('updated_at', '>=', Carbon::now()->subDays($nbDays))->get();
        return PublicationState::where('slug', 'PUB')->first()->practice();
    }
    static function getRecentUpdated($nbDays)
    {
        //->where('updated_at', '>=', Carbon::now()->subDays($nbDays))->get();

        return Practice::where('updated_at', '>=', Carbon::now()->subDays($nbDays))->get();
    }
}
