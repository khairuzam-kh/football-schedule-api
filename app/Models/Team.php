<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FootballMatch;
use App\Models\Standing;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'coach',
        'stadium',
        'founded_year',
    ];

    public function homeMatches()
    {
        return $this->hasMany(FootballMatch::class, 'home_team_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(FootballMatch::class, 'away_team_id');
    }

    public function standing()
    {
        return $this->hasOne(Standing::class);
    }
}