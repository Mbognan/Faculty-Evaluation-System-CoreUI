<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\CommentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SentimentAnalysisController extends Controller
{
    public function sentimentAnalysis(CommentsDataTable $datatable):View | JsonResponse{
        $user = Auth::user();
        $comments = Comments::where('faculty_id', $user->id)->where('status',1)->pluck('post_comment')->toArray();

        return  $datatable->render('frontend.home.sentimenview',compact(['comments']));
    }

}
