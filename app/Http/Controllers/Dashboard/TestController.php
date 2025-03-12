<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Option;
use App\Models\StudentAnswer;
use App\Models\ExamResult;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Exports\ExamResultsExport;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    public function index()
    {
        $classId = auth()->user()->students->first()->class_id;
        $studentId = auth()->id();

        $exams = Exam::where('is_active', true)
            ->where('class_id', $classId)
            ->get();

        foreach ($exams as $exam) {
            $examResult = ExamResult::where('exam_id', $exam->id)
                ->where('student_id', $studentId)
                ->first();

            if ($examResult) {
                $exam->score = $examResult->score;
                $exam->completed = true;
            } else {
                $exam->completed = false;
            }
        }

        return view('dashboard.tests.index', compact('exams'));
    }

    public function results($id)
    {
        $teacher = auth()->user()->teacher;

        if (!$teacher) {
            return redirect()->route('dashboard')->with('error', 'Teacher not found for this user.');
        }

        $exam = Exam::where('is_active', true)
            ->where('teacher_id', $teacher->id)
            ->where('id', $id)
            ->firstOrFail();

        $examResults = ExamResult::where('exam_id', $exam->id)->get();
        $exam->results = $examResults;

        return view('dashboard.tests.results', compact('exam'));
    }

    public function indexguru()
    {
        $teacher = auth()->user()->teacher;

        if (!$teacher) {
            return redirect()->route('dashboard')->with('error', 'Teacher not found for this user.');
        }

        $exams = Exam::where('is_active', true)
            ->where('teacher_id', $teacher->id)
            ->get();

        foreach ($exams as $exam) {
            $examResults = ExamResult::where('exam_id', $exam->id)->get();
            $exam->results = $examResults;
        }

        return view('dashboard.tests.hasil', compact('exams'));
    }

    public function show($examId)
    {
        $exam = Exam::findOrFail($examId);
        $questions = Question::where('exam_id', $examId)
            ->with(['options', 'exam'])
            ->get();

        $examDuration = $exam->duration;

        return view('dashboard.tests.show', compact('exam', 'questions', 'examDuration'));
    }

    public function storeAnswers(Request $request, $examId)
    {
        $userId = Auth::id();
        $answers = $request->input('answers', []);

        foreach ($answers as $questionId => $optionId) {
            $isCorrect = 0;

            if ($optionId) {
                $selectedOption = Option::find($optionId);
                if ($selectedOption && $selectedOption->is_correct) {
                    $isCorrect = 1;
                }
            }

            StudentAnswer::updateOrCreate(
                [
                    'exam_id' => $examId,
                    'question_id' => $questionId,
                    'student_id' => $userId,
                ],
                [
                    'option_id' => $optionId,
                    'is_correct' => $isCorrect,
                ]
            );
        }

        $exam = Exam::findOrFail($examId);

        return view('dashboard.tests.submit', compact('exam'));
    }

    public function complete($examId)
    {
        $userId = Auth::id();

        $totalQuestions = Question::where('exam_id', $examId)->count();
        $correctAnswers = StudentAnswer::where('exam_id', $examId)
            ->where('student_id', $userId)
            ->where('is_correct', true)
            ->count();

        $score = $correctAnswers * 5;
        $maxScore = $totalQuestions * 5;
        $score = min($score, $maxScore);

        ExamResult::updateOrCreate(
            [
                'exam_id' => $examId,
                'student_id' => $userId,
            ],
            [
                'score' => $score,
            ]
        );

        return redirect()->route('tests.index')->with('success', 'Exam completed! Your score: ' . $score);
    }

    public function exports($id)
    {
        $teacher = auth()->user()->teacher;

        if (!$teacher) {
            return redirect()->route('dashboard')->with('error', 'Teacher not found for this user.');
        }

        $exam = Exam::where('is_active', true)
            ->where('teacher_id', $teacher->id)
            ->where('id', $id)
            ->firstOrFail();

        $examResults = ExamResult::where('exam_id', $exam->id)->get();
        $exam->results = $examResults;

        if (request()->has('export')) {
            return Excel::download(new ExamResultsExport($exam->id), 'exam_results.xlsx');
        }

        return view('dashboard.tests.results', compact('exam'));
    }
}

