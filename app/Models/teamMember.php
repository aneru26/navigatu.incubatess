<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teamMember extends Model
{
    use HasFactory;
    protected $table = 'team_members';

    protected $primaryKey = 'id';

    protected $fillable = ['fname', 'lname', 'profile_pic', 'id_number', 'program', 'is_delete', 'team_id'];



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
        return $this->belongsTo(TeamModel::class);
    }
}
