<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teamMember;
use App\Models\TeamModel;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class TeamMemberController extends Controller
{
    
    public function list()
    {
        $data['getmember']= teamMember::getmember();
        $data['header_title'] = "Team List";
        return view(request()->is('admin/*') ? 'admin.team.show' : 'teacher.team.list', $data); 

    }

    public function add()
    {
        $data['header_title'] = "Add New Member";
        $viewName = request()->is('admin/*') ? 'admin.team.add' : (request()->is('teacher/*') ? 'teacher.team.add' : 'student.teamMember.add');
        return view($viewName, $data);
    }


    public function insert(Request $request)
{
    request()->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'id_number' => 'required|min:9|string|max:255',
        'program' => 'required|string|max:255',
        'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
    ]);


    $user = Auth::user();
    $team = TeamModel::find($user->team_id);
    
    if (!$team) {
        return redirect()->back()->with('error', 'Team not found.');
    }

    $save = new teamMember;
    
    $save->fname = $request->fname;
    $save->lname = $request->lname;
    if(!empty($request->file('profile_pic')))
        {
            if(!empty($save->getProfile))
            {
                unlink('upload/profile/'.$save->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/profile/'), $filename);

            $save->profile_pic = $filename;
           
        }
        $save->id_number = $request->id_number;
        $save->program = $request->program;
        $save->year = $request->year;
        $save->birthday = $request->birthday;
        $save->is_delete = 0;
        $save->team_id = $team->id;
        $save->save();

    if ($request->is('admin/*')) {
        $redirectPath = 'admin/team/list';
    } elseif ($request->is('teacher/*')) {
        $redirectPath = 'teacher/team/list';    
    } else {
        $redirectPath = 'student/team/show';
    }

    return redirect($redirectPath)->with('succes', "Member Successfully Added");
}

public function edit($id)
{
    $teamMember = teamMember::find($id);

    if (!$teamMember) {
        return redirect()->back()->with('error', 'Member not found.');
    }

    $data = [
        'teamMember' => $teamMember,
        'header_title' => 'Edit Member', // Customize the title as needed
    ];

    $viewName = request()->is('admin/*') ? 'admin.teamMember.edit' : (request()->is('teacher/*') ? 'teacher.teamMember.edit' : 'student.teamMember.edit');
    
    return view($viewName, $data);
}
    
public function update(Request $request, $id)
{
    // Validate the input data
    request()->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'id_number' => 'required|min:9|string|max:255',
        'program' => 'required|string|max:255',
        'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
    ]);

    // Find the team member by ID
    $teamMember = teamMember::find($id);

    if (!$teamMember) {
        return redirect()->back()->with('error', 'Member not found.');
    }

    // Update the team member's information
    $teamMember->fname = $request->input('fname');
    $teamMember->lname = $request->input('lname');
    $teamMember->id_number = $request->input('id_number');
    $teamMember->program = $request->input('program');

    // Check if a new profile picture is provided
    if ($request->hasFile('profile_pic')) {
        $file = $request->file('profile_pic');
        $ext = $file->getClientOriginalExtension();
        $randomStr = date('Ymdhis') . Str::random(30);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move(public_path('upload/profile/'), $filename);

        // Delete the old profile picture if it exists
        if (!empty($teamMember->profile_pic)) {
            unlink('upload/profile/' . $teamMember->profile_pic);
        }

        $teamMember->profile_pic = $filename;
    }

    $teamMember->save();

    // Redirect to the list view with a success message
    return redirect()->route('user.showTeam')->with('succes', 'Member Successfully Updated');
}


public function delete($id)
{
    $teamMember = teamMember::find($id);

    if (!$teamMember) {
        return redirect()->back()->with('error', 'Member not found.');
    }

    $teamMember->delete();

    $redirectPath = '';

    if (request()->is('admin/*')) {
        $redirectPath = 'admin/teamMember/list';
    } elseif (request()->is('teacher/*')) {
        $redirectPath = 'teacher/teamMember/list';
    } elseif (request()->is('student/*')) {
        $redirectPath = 'student/team/show';
    } else {
        $redirectPath = 'admin/teamMember/list'; // Fallback to admin path
    }

    return redirect($redirectPath)->with('succes', 'Member Successfully Deleted');
}

}
