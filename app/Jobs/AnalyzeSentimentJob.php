<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Comments;
use App\Models\Sentiment;
use Illuminate\Support\Facades\Storage;

class AnalyzeSentimentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $commentId;

    /**
     * Create a new job instance.
     *
     * @param int $commentId
     * @return void
     */
    public function __construct($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = Comments::findOrFail($this->commentId);
        $pythonPath = 'C:\laragon\bin\python\python-3.10\python.exe';
        $pythonScriptPath = base_path('app/Http/PythonScripts/sentiment_analyze.py');
        $text = escapeshellarg($comment->post_comment);
        $command = "$pythonPath $pythonScriptPath $text";
        $output = shell_exec($command);

        if ($output !== null) {
            $result = json_decode($output, true);
            $mood = ucfirst(strtolower($result['sentiment']['label']));

            Sentiment::create([
                'faculty_id' => $comment->faculty_id,
                'comments_id' => $comment->id,
                'sentiment' => $mood,
                'user_id' => $comment->user_id,
                'evaluation_schedules_id' => $comment->evaluation_schedules_id,
            ]);
        }
    }
}
