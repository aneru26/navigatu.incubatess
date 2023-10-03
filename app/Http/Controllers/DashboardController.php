<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TeamModel;
use App\Models\CompetitionsModel;
use App\Models\SubmissionModel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {
            $data['TotalSubmission'] = SubmissionModel::getTotalSubmission(4);
            $data['TotalAdmin'] = User::getTotalUser(3);
            $data['TotalStudent'] = User::getTotalUser(2);
            $data['TotalTeam'] = TeamModel::getTotalTeam(1);
            return view('admin.dashboard', $data);
        } elseif (Auth::user()->user_type == 2) {
            return view('student.dashboard');
        } elseif (Auth::user()->user_type == 3) {
            $data['TotalSubmission'] = SubmissionModel::getTotalSubmission(4);
            $data['TotalAdmin'] = User::getTotalUser(3);
            $data['TotalStudent'] = User::getTotalUser(2);
            $data['TotalTeam'] = TeamModel::getTotalTeam(1);
            return view('teacher.dashboard', $data);
        }
    }


}

