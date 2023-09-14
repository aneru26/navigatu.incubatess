<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionsModel extends Model
{
    use HasFactory;
    protected $table ='competition';


    static public function getSingle($id)
    {
        return self::find($id); 
    }
    
    static public function getCompetition()
    {
        $return = self::select('competition.*')
                    ->where('is_delete','=',0); 
                         
        $return = $return->orderBy('id','desc')
                            ->paginate(5);
        
        return $return;
    }


    static public function getTotalCompetition($is_delete)
    {
        return self::select('competition.id')
                    ->where('is_delete','=',0)
                    ->count();
    }
}




