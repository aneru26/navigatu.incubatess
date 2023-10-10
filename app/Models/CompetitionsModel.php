<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionsModel extends Model
{
    use HasFactory;
    protected $table ='competitions';


    static public function getSingle($id)
    {
        return self::find($id); 
    }
    
    static public function getCompetition($perPage = 5)
    {
        $return = self::select('competitions.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate($perPage);
    
        return $return;
    }


    static public function getTotalCompetition($is_delete)
    {
        return self::select('competitions.id')
                    ->where('is_delete','=',0)
                    ->count();
    }
}




