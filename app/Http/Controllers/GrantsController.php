<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompetitionsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage;
use App\Models\GrantsModel;

class GrantsController extends Controller
{
      
    public function list()
{
    $data['getRecord'] = GrantsModel::getGrants();
    $data['header_title'] = "Grants List";
    
    // Assuming 'student.competitions.list' is the view for students
    return view(request()->is('admin/*') ? 'admin.grants.list' : (request()->is('student/*') ? 'student.grants.list' : 'teacher.grants.list'), $data);
}

      public function add()
    {
        
        $data['header_title'] = "Add Grants ";
        return view(request()->is('admin/*') ? 'admin.grants.add' : 'teacher.grants.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
          
        ]);

        $grants = new GrantsModel;
        $grants->grants_name = trim($request->grants_name);
        $grants->organization_host = trim($request->organization_host);
        $grants->deadline = trim($request->deadline);
        $grants->description = trim($request->description);
        $grants->requirments = trim($request->requirments);
        $grants->link_announcement = trim($request->link_announcement);
        $grants->save();

        $redirectPath = $request->is('admin/*') ? 'admin/grants/list' : 'teacher/grants/list';

    return redirect($redirectPath)->with('succes', "Competition Successfully Added");

        
    }


    public function edit($id)
{
    $data['getRecord'] = GrantsModel::getSingle($id);
    
    if (!empty($data['getRecord'])) {
        $data['header_title'] = "Edit Grants";
        $viewName = request()->is('admin/*') ? 'admin.grants.edit' : (request()->is('teacher/*') ? 'teacher.grants.edit' : 'student.grants.edit');
        return view($viewName, $data);
    } else {
        abort(404);
    }
}

public function update($id, Request $request)
{
    

    $grants = GrantsModel::getSingle($id);
    $grants->grants_name =  $request->grants_name;
    $grants->organization_host =  $request->organization_host;
    $grants->deadline =  $request->deadline;
    $grants->description =  $request->description;
    $grants->requirments =  $request->requirments;
    $grants->link_announcement =  $request->link_announcement;
    $grants->save();

    if ($request->is('admin/*')) {
        $redirectPath = 'admin/grants/list';
    } elseif ($request->is('teacher/*')) {
        $redirectPath = 'teacher/grants/list';
    } else {
        $redirectPath = 'student/team/add_team';
    }

    return redirect($redirectPath)->with('succes', "Competition Successfully Updated");
}

public function delete($id)
{
    $competitions = GrantsModel::getSingle($id);
    $competitions->is_delete = 1;
    $competitions->save();

    $redirectPath = '';

    if (request()->is('admin/*')) {
        $redirectPath = 'admin/grants/list';
    } elseif (request()->is('teacher/*')) {
        $redirectPath = 'teacher/grants/list';
    } else {
        $redirectPath = 'admin/grants/list'; // Fallback to admin path
    }

    return redirect($redirectPath)->with('succes', "Grants Successfully Deleted");
}

}
