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
        $return = self::select('submission.*', 'users.name as created_by_name', 'users.last_name')
            ->join('users', 'users.id', '=', 'submission.created_by')
            ->where('submission.is_delete', '=', 0);

            if (!empty(Request::get('document_type'))) {
                $document_type = strtolower(Request::get('document_type')); // Convert search term to lowercase
                $return = $return->whereRaw('LOWER(submission.document_type) LIKE ?', ['%' . $document_type . '%']);
            }
    
        // Check if a search term for the creator's name is provided in the request
        if (!empty(Request::get('created_by'))) {
            $createdByName = Request::get('created_by');
    
            // Add a condition to filter by the creator's name
            $return = $return->where(function ($query) use ($createdByName) {
                $query->where('users.name', 'like', '%' . $createdByName . '%')
                    ->orWhere('users.last_name', 'like', '%' . $createdByName . '%');
            });
        }
    
        $return = $return->orderBy('submission.id', 'desc')
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


