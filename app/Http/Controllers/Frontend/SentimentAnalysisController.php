<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\CommentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\EvaluationSchedule;
use App\Models\Sentiment;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SentimentAnalysisController extends Controller
{
    public function sentimentAnalysis(CommentsDataTable $datatable):View | JsonResponse{
        $user = Auth::user();
        $comments = Comments::where('faculty_id', $user->id)->where('status',0)->pluck('post_comment')->toArray();

        $sentiment = Sentiment::where('faculty_id', $user->id)->pluck('sentiment')->toArray();
        $schedule = EvaluationSchedule::where('evaluation_status',2)->firstOrNew();
        $negativeCount  = count(array_filter($sentiment, fn($sentiment) => $sentiment === 'negative'));
        $positiveCount = count(array_filter($sentiment,fn($sentiment) => $sentiment === 'positive'));
        $neutralCount = count(array_filter($sentiment, fn($sentiment) => $sentiment === 'neutral'));
        $sentiments = Sentiment::with('comments')->where('faculty_id', $user->id)->where('evaluation_schedules_id',$schedule->id)->get();
        return  $datatable->render('frontend.home.sentimenview',compact(['sentiments','negativeCount','positiveCount','neutralCount','comments']));
    }

}
