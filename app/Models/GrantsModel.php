<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantsModel extends Model
{
    use HasFactory;
    protected $table ='grants';
    
    
    static public function getSingle($id)
    {
        return self::find($id); 
    }
    
    static public function getGrants()
    {
        $return = self::select('grants.*')
                    ->where('is_delete','=',0); 
                         
        $return = $return->orderBy('id','desc')
                            ->paginate(5);
        
        return $return;
    }


    static public function getTotalGrants($is_delete)
    {
        return self::select('grants.id')
                    ->where('is_delete','=',0)
                    ->count();
    }
}
