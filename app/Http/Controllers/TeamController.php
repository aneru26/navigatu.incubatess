<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeamModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;


class TeamController extends Controller
{
    public function list()
    {
        
        $data['getRecord']= TeamModel::getRecord(); 
        $data['header_title'] = "Team List";
        return view(request()->is('admin/*') ? 'admin.team.list' : 'teacher.team.list', $data); 

    }

    public function add()
{
    $data['header_title'] = "Add New Team";
    $viewName = request()->is('admin/*') ? 'admin.team.add' : (request()->is('teacher/*') ? 'teacher.team.add' : 'student.team.add_team');
    return view($viewName, $data);
}

    public function insert(Request $request)
{
    request()->validate([
        'team_name' => [
            'required',
            'string',
            Rule::unique('team')->where(function ($query) {
                return $query->where('is_delete', '!=', 1); // Adjust to the actual value indicating deleted status
            }),
        ],
    ]);

    $save = new TeamModel;
    
    $save->team_name = $request->team_name;
    $save->startup_name = $request->startup_name;
    if ($request->hasFile('team_logo') && $request->file('team_logo')->isValid()) 
    {
        // ... (your existing code for handling team_logo)
    }

    $save->is_delete = 0;
    $save->created_by = Auth::user()->id;
    $save->save();

    if ($request->is('admin/*')) {
        $redirectPath = 'admin/team/list';
    } elseif ($request->is('teacher/*')) {
        $redirectPath = 'teacher/team/list';    
    } else {
        $redirectPath = 'student/team/add_team';
    }

    return redirect($redirectPath)->with('succes', "Team Successfully Added");
}


    private function storeFile($file, $uploadPath)
{
    $ext = $file->getClientOriginalExtension();
    $randomStr = Str::random(20);
    $filename = strtolower($randomStr) . '.' . $ext;
    
    $file->move(public_path($uploadPath), $filename);

    return $filename;
}
public function edit($id)
{
    $data['getRecord'] = TeamModel::getSingle($id);
    
    if (!empty($data['getRecord'])) {
        $data['header_title'] = "Edit Team";
        $viewName = request()->is('admin/*') ? 'admin.team.edit' : (request()->is('teacher/*') ? 'teacher.team.edit' : 'student.team.edit');
        return view($viewName, $data);
    } else {
        abort(404);
    }
}

   

public function show($id)
{

    $team = TeamModel::find($id);


    return view('admin.team.show')->with('team', $team);

    // $data['getRecord'] = TeamModel::getSingle($id);
    
    // if (!empty($data['getRecord'])) {
    //     $data['header_title'] = "Show Team Details";
    //     $viewName = request()->is('admin/*') ? 'admin.team.show' : (request()->is('teacher/*') ? 'teacher.team.show' : 'admin.team.show');
    //     return view($viewName, $data);
    // } else {
    //     abort(404);
    // }
}
    
    public function update($id, Request $request)
    {
        

        $save = TeamModel::getSingle($id);
        if(!empty($request->file('team_logo')))
        {
            if(!empty($save->getProfile))
            {
                unlink('upload/profile/'.$save->team_logo);
            }
            $ext = $request->file('team_logo')->getClientOriginalExtension();
            $file = $request->file('team_logo');
            $randomStr = date('Ymdhis').Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move(public_path('upload/profile/'), $filename);

            $save->team_logo = $filename;
        }
        $save->team_name =  $request->team_name;
        $save->startup_name =  $request->startup_name;
        $save->member_1 = $request->member_1;
        $save->member_2 = $request->member_2;
        $save->member_3 = $request->member_3;
        $save->save();

        if ($request->is('admin/*')) {
            $redirectPath = 'admin/team/list';
        } elseif ($request->is('teacher/*')) {
            $redirectPath = 'teacher/team/list';
        } else {
            $redirectPath = 'student/team/add_team';
        }
    
        return redirect($redirectPath)->with('succes', "Team Successfully Updated");
    }


    public function delete($id)
    {
        $save = TeamModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
    
        $redirectPath = '';
    
        if (request()->is('admin/*')) {
            $redirectPath = 'admin/team/list';
        } elseif (request()->is('teacher/*')) {
            $redirectPath = 'teacher/team/list';
        } else {
            $redirectPath = 'admin/team/list'; // Fallback to admin path
        }
    
        return redirect($redirectPath)->with('succes', "Team Successfully Deleted");
    }
  
    
}
