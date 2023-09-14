<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsportModel extends Model
{
    use HasFactory;

    protected $table = 'esport_teams';
    protected $primaryKey = 'id_team';
    protected $fillable = ['name_team', 'country_team', 'totalPoint_team'];
}
