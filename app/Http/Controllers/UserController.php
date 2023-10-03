<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TeamModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account',$data);
        }
        else if(Auth::user()->user_type == 2)
        {
            $data['getClass'] = TeamModel::getClass();
            return view('student.my_account',$data);
        }
        else if(Auth::user()->user_type == 3)
        {
            $data['getClass'] = TeamModel::getClass();
            return view('teacher.my_account',$data);
        }
    }

    public function My_Team()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.myaccount',$data);
        }
        else if(Auth::user()->user_type == 2)
        {
            
            return view('student.my_team',$data);
        }
        else if(Auth::user()->user_type == 3)
        {
            
            return view('teacher.myaccount',$data);
        }
    }
    public function UpdateMyAccountAdmin(Request $request)

    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->last_name = trim($request->last_name);
        $admin->program = trim($request->program);
        $admin->designation = trim($request->designation);
        
        if ($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()) 
        {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/profile');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $admin->profile_pic = $filename;
        }
        $admin->email = trim($request->email);
        $admin->save();

        return redirect()->back()->with('succes',"Account successfully Updated");
    }

    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        
        request()->validate([
            'email' => 'required|unique:users,email,'.$id
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->id_number = trim($request->id_number);
        $student->program = trim($request->program);
        $student->team_id = trim($request->team_id);
        $student->budget = trim($request->budget);
        $student->gender = trim($request->gender);
        $student->mentor = trim($request->mentor);

        if ($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()) 
        {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/profile');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $student->profile_pic = $filename;
        }
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->save();

        return redirect()->back()->with('succes',"Account successfully Updated");
    
    }

    
    public function change_password()
    {
        $data['header_title'] ="Change Password";
        return view('profile.change_password',$data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('succes',"Password successfully Updated");
        }
        else
        {
            return redirect()->back()->with('error',"Old Password is not Correct");
        }
    }

    public function showTeam()
    {
        $user = Auth::user();
        $data['header_title'] = "My Account";
    
        if ($user->user_type == 1) {
            // Admin user, you can handle admin-specific logic here
            return view('admin.my_account', $data);
        } else if ($user->user_type == 2) {
            // Student user
            $team = TeamModel::find($user->team_id);
    
            // Pass the team information to the view
            $data['team'] = $team;
    
            return view('student/team/show', $data);
        }
    }

    
    public function editTeam()
    {
        $user = Auth::user();
        $data['header_title'] = "My Account";
    
        if ($user->user_type == 1) {
            // Admin user, you can handle admin-specific logic here
            return view('admin.my_account', $data);
        } else if ($user->user_type == 2) {
            // Student user
            $team = TeamModel::find($user->team_id);
    
            // Pass the team information to the view
            $data['team'] = $team;
    
            return view('student/team/edit', $data);
        }
    }
    
    public function update(Request $request)
{
    $user = Auth::user();
    $team = TeamModel::find($user->team_id);

    request()->validate([
        'team_name' => 'required|string|unique:team,team_name,' . $user->team_id
        // Add more validation rules for other fields if needed
    ]);

    if (!empty($request->file('team_logo'))) {
        if (!empty($team->team_logo)) {
            $existingLogoPath = public_path('upload/profile/' . $team->team_logo);
            if (file_exists($existingLogoPath)) {
                unlink($existingLogoPath);
            }
        }

        $ext = $request->file('team_logo')->getClientOriginalExtension();
        $file = $request->file('team_logo');
        $randomStr = date('Ymdhis') . Str::random(30);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move(public_path('upload/profile/'), $filename);

        $team->team_logo = $filename;
    }

    $team->team_name = trim($request->input('team_name'));
    $team->startup_name = trim($request->input('startup_name'));
    $team->member_1 = trim($request->input('member_1'));
    $team->member_2 = trim($request->input('member_2'));
    $team->member_3 = trim($request->input('member_3'));
    

    $team->save();

    $redirectPath = $request->is('admin/*') ? 'admin/team/list' : 'student/team/edit';

    return redirect($redirectPath)->with('success', "Team Successfully Updated");
}

private function storeFile($file, $uploadPath)
{
    $ext = $file->getClientOriginalExtension();
    $randomStr = Str::random(20);
    $filename = strtolower($randomStr) . '.' . $ext;

    $file->move(public_path($uploadPath), $filename);

    return $filename;
}


}
