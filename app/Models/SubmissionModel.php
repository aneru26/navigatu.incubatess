<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class SubmissionModel extends Model
{
    use HasFactory;
    protected $table ='submission';


    static public function getSingle($id)
    {
        return self::find($id); 
    }
    
    static public function getSubmission()
    {
        $return = self::select('submission.*')
                    ->where('is_delete','=',0); 
                         
        $return = $return->orderBy('id','desc')
                            ->paginate(5);
        
        return $return;
    }



    public function getProfileDirect1()
{
    $documentUrls = [];
    $teamDocuments = json_decode($this->team_documents, true);

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

public function team()
    {
        return $this->belongsTo(TeamModel::class, 'team_id');
    }

    static public function getRecord()
    {

        $return = SubmissionModel::select('submission.*','users.name as created_by_name')
                ->join('users','users.id','submission.created_by');
               
                $return = $return->where('team.is_delete', '=', 0)
               
                ->orderBy('submission.id','desc')
                ->paginate(3);

        return $return;
    }

}


