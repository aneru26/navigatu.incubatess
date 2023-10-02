<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompetitionsModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class CompetitionsController extends Controller
{

    
    public function index()
{
    // Get all competition records
    $competitions = CompetitionsModel::getCompetition();

    // Filter competitions to get only the upcoming deadlines
    $upcomingCompetitions = $competitions->filter(function ($competition) {
        return Carbon::now()->lessThan($competition->deadline);
    });

    $data['getRecord'] = $upcomingCompetitions;
    $data['header_title'] = "Upcoming Competitions";

    // Assuming 'student.competitions.list' is the view for students
    return view(request()->is('admin/*') ? 'admin.competitions.list' : (request()->is('student/*') ? 'student.competitions.list' : 'teacher.competitions.list'), $data);
}



public function list()
{
    // Get all competition records
    $competitions = CompetitionsModel::getCompetition();

    // Get the current date
    $currentDate = Carbon::now();

    // Separate upcoming and missed deadlines
    $upcomingCompetitions = [];
    $missedDeadlines = [];

    foreach ($competitions as $competition) {
        if ($currentDate->lessThan($competition->deadline)) {
            $upcomingCompetitions[] = $competition;
        } else {
            $missedDeadlines[] = $competition;
        }
    }

    // Pass both upcoming and missed deadlines to the view
    $data['getRecord'] = $competitions;
    $data['upcomingDeadlines'] = $upcomingCompetitions;
    $data['missedDeadlines'] = $missedDeadlines;
    $data['header_title'] = "Competitions List";

    // Assuming 'student.competitions.list' is the view for students
    return view(request()->is('admin/*') ? 'admin.competitions.list' : (request()->is('student/*') ? 'student.competitions.list' : 'teacher.competitions.list'), $data);
}

      public function add()
    {
        
        $data['header_title'] = "Add Student ";
        return view(request()->is('admin/*') ? 'admin.competitions.add' : 'teacher.competitions.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
          
        ]);

        $competitions = new CompetitionsModel;
        $competitions->competition_name = trim($request->competition_name);
        $competitions->organization_host = trim($request->organization_host);
        $competitions->deadline = trim($request->deadline);
        $competitions->date_competition = trim($request->date_competition);
        $competitions->description = trim($request->description);
        $competitions->requirments = trim($request->requirments);
        $competitions->link_announcement = trim($request->link_announcement);
        $competitions->save();

        $redirectPath = $request->is('admin/*') ? 'admin/competitions/list' : 'teacher/competitions/list';

    return redirect($redirectPath)->with('succes', "Competition Successfully Added");

        
    }


    public function edit($id)
{
    $data['getRecord'] = CompetitionsModel::getSingle($id);
    
    if (!empty($data['getRecord'])) {
        $data['header_title'] = "Edit Team";
        $viewName = request()->is('admin/*') ? 'admin.competitions.edit' : (request()->is('teacher/*') ? 'teacher.competitions.edit' : 'student.competitions.edit');
        return view($viewName, $data);
    } else {
        abort(404);
    }
}

public function update($id, Request $request)
{
    

    $competitions = CompetitionsModel::getSingle($id);
    $competitions->competition_name =  $request->competition_name;
    $competitions->organization_host =  $request->organization_host;
    $competitions->deadline =  $request->deadline;
    $competitions->date_competition =  $request->date_competition;
    $competitions->description =  $request->description;
    $competitions->requirments =  $request->requirments;
    $competitions->link_announcement =  $request->link_announcement;
    $competitions->save();

    if ($request->is('admin/*')) {
        $redirectPath = 'admin/competitions/list';
    } elseif ($request->is('teacher/*')) {
        $redirectPath = 'teacher/competitions/list';
    } else {
        $redirectPath = 'student/team/add_team';
    }

    return redirect($redirectPath)->with('succes', "Competition Successfully Updated");
}

public function delete($id)
{
    $competitions = CompetitionsModel::getSingle($id);
    $competitions->is_delete = 1;
    $competitions->save();

    $redirectPath = '';

    if (request()->is('admin/*')) {
        $redirectPath = 'admin/competitions/list';
    } elseif (request()->is('teacher/*')) {
        $redirectPath = 'teacher/competitions/list';
    } else {
        $redirectPath = 'admin/competitions/list'; // Fallback to admin path
    }

    return redirect($redirectPath)->with('succes', "Competiton Successfully Deleted");
}


}
