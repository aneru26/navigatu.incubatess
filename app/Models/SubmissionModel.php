<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Carbon;

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
    $return = self::select(
        'submission.*',
        'users.name as created_by_name',
        'users.last_name',
        'users.team_id'
    )
        ->join('users', 'users.id', '=', 'submission.created_by')
        ->with('team') // Load the 'team' relationship
        ->where('submission.is_delete', '=', 0);

    $searchQuery = Request::get('search');

    if (!empty($searchQuery)) {
        $searchQuery = strtolower($searchQuery); 
        $terms = explode(' ', $searchQuery); // Split the search query into terms

        $return = $return->where(function($query) use ($terms) {
            foreach ($terms as $term) {
                $term = '%' . $term . '%';
                $query->where(function ($subquery) use ($term) {
                    $subquery->whereRaw('LOWER(submission.document_type) LIKE ?', [$term])
                        ->orWhereRaw('LOWER(users.name) ILIKE ?', [$term])
                        ->orWhereRaw('LOWER(users.last_name) ILIKE ?', [$term]);
                });
            }
        });

        try {
            $date = Carbon::createFromFormat('m-d-Y', $searchQuery);
            // Attempt to parse the search query as a date and search by it
            if ($date->isValid()) {
                // Convert to standard database format "YYYY-MM-DD"
                $dateString = $date->toDateString();
                $return->orWhereDate('submission.created_at', '=', $dateString);
            }
        } catch (\Exception $e) {
            // Handle the case where the search query is not a valid date
        }
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

    static public function getTotalSubmission($is_delete)
    {
        return self::select('submission.id')
                    ->where('is_delete','=',0)
                    ->count();
    }
}


