<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use App\Models\TeamModel;
use App\Models\SubmissionModel;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id)
    {
        return self::find($id);  
    
    }

    static public function getTotalUser($user_type)
    {
        return self::select('users.id')
                    ->where('user_type','=',$user_type)
                    ->where('is_delete','=',0)
                    ->count();
    }

    static public function getAdmin()
    {
        $return = self::select('users.*')
                            ->where('user_type','=',3)
                            ->where('is_delete','=',0);
                            if(!empty(Request::get('name')))
                            {
                                $return = $return->where('name','like', '%'.Request::get('name').'%'); 
                            }
                            if(!empty(Request::get('email')))
                            {
                                $return = $return->where('email','like','%'.Request::get('email').'%'); 
                            }
                            if(!empty(Request::get('date')))
                            {
                                $return = $return->whereDate('created_at','=',Request::get('date')); 
                            }
        $return = $return->orderBy('id','desc')
                            ->paginate(5);
        
        return $return;
    }

    static public function getStudent()
    {
        $return = self::select('users.*','team.team_name as team_name')
                            ->join('team', 'team.id','=','users.team_id','left')
                            ->where('users.user_type','=',2)
                            ->where('users.is_delete','=',0);
                            if(!empty(Request::get('name')))
                            {
                                $return = $return->where('users.name','like', '%'.Request::get('name').'%'); 
                            }
                            if(!empty(Request::get('email')))
                            {
                                $return = $return->where('users.email','like','%'.Request::get('email').'%'); 
                            }
                            if(!empty(Request::get('team')))
                            {
                                $return = $return->where('team.team_name','like','%'.Request::get('team').'%'); 
                            }
                            if(!empty(Request::get('date')))
                            {
                                $return = $return->whereDate('users.created_at','=',Request::get('date')); 
                            }
        $return = $return->orderBy('users.id','desc')
                            ->paginate(5);
        
        return $return;
    }

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }
   

    public function getProfilePictureUrl()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        
        }
    
}

public function getProfileDirect()
{
    if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
    {
        return url('upload/profile/'.$this->profile_pic);
    }
    else
    {
        return asset('upload/profile/user.jpg');
    
    }

}

    public function team()
    {
        return $this->belongsTo(TeamModel::class, 'team_id');
    }

    public function getTeamLogo()
    {
        // Check if the user is associated with a team
        if ($this->team) {
            return asset('upload/profile/' . $this->team->team_logo);
        }
    
        return null; // No team or logo found
    
    }

    public function getStartupName()
{
    // Check if the user is associated with a team
    if ($this->team) {
        return $this->team->startup_name;
    }
    
    return null; // No team or startup name found
}

public function getTeamDocumentUrl()
{
    // Check if the user is associated with a team
    if ($this->team) {
        return asset('upload/document/' . $this->team->team_document);
    }
    
    return null; // No team or document found
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

public function submissions()
{
    return $this->hasMany(SubmissionModel::class);
}
}