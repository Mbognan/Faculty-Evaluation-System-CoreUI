<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyProfileRequest;
use App\Models\Category;
use App\Models\EvaluationResult;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FacultyController extends Controller
{
    use FileUploadTrait;
    public function index():View{

        $userId = Auth::user()->id;
        $evaluationResults = EvaluationResult::where('user_id', $userId)->get();
        $allCategories = Category::all();
        $category = Category::pluck('title')->toArray();
        $results = EvaluationResult::where('user_id', $userId)->pluck('results_by_category')->toArray();
        $resultsByCategory = [];
        foreach ($results as $key => $result) {
            $resultsByCategory[$category[$key]] = $result;
        }
        foreach ($category as $cat) {
            if (!isset($resultsByCategory[$cat])) {
                $resultsByCategory[$cat] = 0;
            }
        }
        return view('frontend.home.dashboard',compact(['category','allCategories','resultsByCategory','userId','evaluationResults']));
    }
    public function profile():View{
        $users = User::where('user_type', 'faculty')->get();
        return view('frontend.home.facultyprofile',compact('$users'));
    }

    public function updateFaculty(FacultyProfileRequest $facultyRequest):RedirectResponse{
        $avatarPath = $this->uploadImage($facultyRequest, 'avatar',$facultyRequest->oldAvatar);
        $user = Auth::user();

        $user->avatar = !empty($avatarPath) ? $avatarPath :$facultyRequest->oldAvatar;
        $user->first_name = $facultyRequest->first_name;
        $user->last_name  = $facultyRequest->last_name;
        $user->email = $facultyRequest->email;
        $user->save();
        toastr()->success('Acount Updated Successfully!');
        return redirect()->back();
    }
}
