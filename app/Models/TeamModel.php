<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use App\Models\User;

class TeamModel extends Model
{
    use HasFactory;
    protected $table ='team';
    
    
    static public function getSingle($id)
    {
        return self::find($id); 
    }

    static public function getTotalTeam($is_delete)
    {
        return self::select('team.id')
                    ->where('is_delete','=',0)
                    ->count();
    }
    
    static public function getRecord()
    {
        $return = TeamModel::select('team.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'team.created_by')
            ->where('team.is_delete', '=', 0);
    
        if (!empty(Request::get('team_name'))) {
            $teamName = strtolower(Request::get('team_name')); // Convert search term to lowercase
            $return = $return->whereRaw('LOWER(team.team_name) LIKE ?', ['%' . $teamName . '%']);
        }
    
        $return = $return->orderBy('team.id', 'desc')
            ->paginate(5);
    
        return $return;
    }
    

    public function getProfileDirect()
{
    if(!empty($this->team_logo) && file_exists('upload/profile/'.$this->team_logo))
    {
        return url('upload/profile/'.$this->team_logo   );
    }
    else
    {
        return asset('upload/profile/user.jpg');
    
    }

}

public function getProfileDirect1()
{
    $documentUrls = [];
    $teamDocuments = json_decode($this->team_document, true);

    if (!empty($teamDocuments)) {
        foreach ($teamDocuments as $documentFilename) {
            $documentPath = 'upload/document/' . $documentFilename;

            if (file_exists($documentPath)) {
                $documentUrls[] = url($documentPath);
            }
        }
    }

    return $documentUrls;
}


public function countSubmittedDocuments()
{
    $documentCount = 0;
    $teamDocuments = json_decode($this->team_document, true);

    if (!empty($teamDocuments)) {
        foreach ($teamDocuments as $documentFilename) {
            $documentPath = 'upload/document/' . $documentFilename;

            if (file_exists($documentPath)) {
                $documentCount++;
            }
        }
    }

    return $documentCount;
}



static public function getClass()
{
    $return = TeamModel::select('team.*')
                ->join('users', 'users.id', 'team.created_by')
                ->where('team.is_delete','=', 0)
                ->orderBy('team.team_name','asc')
                ->get();

    return $return;
}

public function users()
    {
        return $this->hasMany(User::class);
    }

   



    public function getProfilePictureUrl()
    {
        if(!empty($this->team_logo) && file_exists('upload/profile/'.$this->team_logo))
        {
            return url('upload/profile/'.$this->team_logo);
        }
        else
        {
            return "";
        
        }
    
}
}
