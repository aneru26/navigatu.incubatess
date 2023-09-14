<?php

namespace App\Http\Controllers;

use App\Models\SubmissionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubmissionController extends Controller
{

    public function index()
{
    // Retrieve submissions submitted by the currently authenticated user
    $userId = Auth::id(); // Get the authenticated user's ID
    $getRecord = SubmissionModel::where('created_by', $userId)
                                ->where('is_delete', 0) // Filter out deleted submissions
                                ->paginate(5);

    return view('student.submission.list', compact('getRecord'));
}


    public function list()
    {
        $data['getRecord']= SubmissionModel::getSubmission();
        $data['header_title'] = "Submission List";
        
        // Assuming 'student.competitions.list' is the view for students
        return view(request()->is('admin/*') ? 'admin.submission.list' : (request()->is('student/*') ? 'student.submission.list' : 'teacher.submission.list'), $data);
    }


    public function add()
    {
        
        $data['header_title'] = "Add Submission ";
        return view(request()->is('admin/*') ? 'admin.submission.add' : (request()->is('student/*') ? 'student.submission.add' : 'teacher.submission.add'), $data);;
    }


    public function insert(Request $request)
{

    $submission = new SubmissionModel();
    
    $submission->document_type = $request->document_type;
    $submission->links = $request->links;
    if ($request->hasFile('team_documents')) {
        $teamDocuments = $request->file('team_documents');
        $documentFilenames = [];

        foreach ($teamDocuments as $document) {
            if ($document->isValid()) {
                $documentFilename = $this->storeFile($document, 'upload/document');
                $documentFilenames[] = $documentFilename;
            }
        }

        $submission->team_documents = json_encode($documentFilenames);
    }
    $submission->created_by = Auth::user()->id;
    $submission->save();

    if ($request->is('admin/*')) {
        $redirectPath = 'admin/submission/list';
    } elseif ($request->is('teacher/*')) {
        $redirectPath = 'teacher/submission/list';    
    } else {
        $redirectPath = 'student/submission/list';
    }

    return redirect($redirectPath)->with('succes', "Document Successfully Added");
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
    $data['getRecord'] = SubmissionModel::getSingle($id);
    
    if (!empty($data['getRecord'])) {
        $data['header_title'] = "Edit Team";
        $viewName = request()->is('admin/*') ? 'admin.submission.edit' : (request()->is('teacher/*') ? 'teacher.submission.edit' : 'student.submission.edit');
        return view($viewName, $data);
    } else {
        abort(404);
    }
}

public function update($id, Request $request)
{
    

    $submission = SubmissionModel::getSingle($id);
    $submission->document_type =  $request->document_type;
    $submission->links =  $request->links;
    if (!empty($request->file('team_documents'))) {
        if (!empty($submission->getProfile)) {
            foreach ($submission->team_document as $document) {
                unlink('upload/document/' . $document);
            }
        }
        $teamDocuments = $request->file('team_documents');
        $documentFilenames = [];

        foreach ($teamDocuments as $document) {
            if ($document->isValid()) {
                $documentFilename = $this->storeFile($document, 'upload/document');
                $documentFilenames[] = $documentFilename;
            }
        }

        $submission->team_document = $documentFilenames;
    }
    $submission->status =  $request->status;
    $submission->save();

    if ($request->is('admin/*')) {
        $redirectPath = 'admin/submission/list';
    } elseif ($request->is('teacher/*')) {
        $redirectPath = 'teacher/submission/list';
    } else {
        $redirectPath = 'student/submission/list';
    }

    return redirect($redirectPath)->with('succes', "Document Successfully Updated");
}

public function delete($id)
{
    $save = SubmissionModel::getSingle($id);
    $save->is_delete = 1;
    $save->save();

    $redirectPath = '';

    if (request()->is('admin/*')) {
        $redirectPath = 'admin/submission/list';
    } elseif (request()->is('teacher/*')) {
        $redirectPath = 'teacher/submission/list';
    } elseif (request()->is('student/*')) {
        $redirectPath = 'student/submission/list';
    }
     else {
        $redirectPath = 'admin/submission/list'; // Fallback to admin path
    }

    return redirect($redirectPath)->with('succes', "Document Successfully Deleted");
}




}
