<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
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

        if(empty($request->category)){
            return redirect()->back()->with(['warning' => 'Category does not  exists']);
        }else{
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



        }

        return redirect()->back()->with(['success' => 'Successfully created!']);

    }

    public function edit( string $id):JsonResponse{
         $questions = Question::findOrFail($id)->load('category');

         if($questions){
            return response()->json([
                'status' => '200',
                'questions' => $questions,
                'category_title' => $questions->category->title
            ]);
         }else{
            return response()->json([
                'status' => '404',
                'message' => 'Question Not Found'
            ]);
         }

    }

    public function update(Request $request, string $id){
        $request->validate([
            'question' => ['required','string']
        ]);

        $questions = Question::findOrFail($id)->load('category');

        if($questions){
            $questions->question = $request->question;
            $questions->update();
            toastr()->success('Update Successfuly!');
           return response()->json([
               'status' => '200',
               'questions' => $questions,
               'category_title' => $questions->category->title
           ]);
        }else{
           return response()->json([
               'status' => '404',
               'message' => 'Question Not Found'
           ]);
        }

    }

    public function destroy( $id){
        $question = Question::findOrFail($id);
        $question->delete();
        return response(['status' => 'success', 'message' =>'Item deleted successfully!']);
    }

    public function viewPdf(){
        $questions = Question::orderBy('position', 'asc')->get();
        $categories = Category::all();
        $pdf = Pdf::loadView('admin.question.generate', ['questions' => $questions, 'categories' => $categories])
        ->setPaper([0, 0,  8.5 * 72, 14.25 * 72], 'portrait');
        return $pdf->stream();
    }

    public function generatePdf(){
        $questions = Question::orderBy('position', 'asc')->get();


        $categories = Category::all();

        $pdf = Pdf::loadView('admin.question.generate', ['questions' => $questions, 'categories' => $categories]);

        return $pdf->download('EvaluationForm.pdf');
    }




}
