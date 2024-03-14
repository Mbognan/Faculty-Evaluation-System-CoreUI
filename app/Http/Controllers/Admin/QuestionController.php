<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index():View{
        $questions = Question::orderBy('position', 'asc')->get();

        $categories = Category::all();

        return view('admin.question.index',compact(['categories','questions']));
    }

    public function post_order_change(Request $request)
    {
        $data = $request->input('order');
        $category_id = $request->input('category_id');

        foreach ($data as $index => $id) {

            Question::where('id', $id)
                ->where('category_id', $category_id)
                ->update(['position' => $index]);
        }

        return response()->json([
            'message' => 'Post order changed successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function store(Request $request):RedirectResponse{
        $request->validate([
            'category' => ['required','max:255'],
            'question' => ['required','max:255']
        ]);
        $maxPosition = Question::where('category_id', $request->category)->max('position');

        $question = new Question();

        $question->category_id = $request->category;
        $question->question = $request->question;
        $question->position = $maxPosition + 1;
        $question->save();

        toastr()->success('Created Successfully!');
        return redirect()->back();
    }


}
