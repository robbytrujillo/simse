<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with(['exam', 'options'])->get();
        $exams = Exam::where('is_active', 1)->get();
        return view('dashboard.questions.index', compact('questions', 'exams'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'exam_id' => 'required|exists:exams,id',
                'questions' => 'required|array|min:1',
                'questions.*.question_text' => 'required|string|max:255',
                'questions.*.question_type' => 'required|string|max:50',
                'questions.*.options' => 'required|array|min:2',
                'questions.*.options.*.option_text' => 'required|string|max:255',
                'questions.*.options.*.is_correct' => 'required|boolean',
            ]);

            foreach ($request->questions as $questionData) {
                $question = Question::create([
                    'exam_id' => $request->exam_id,
                    'question_text' => $questionData['question_text'],
                    'question_type' => $questionData['question_type'],
                ]);

                foreach ($questionData['options'] as $option) {
                    $question->options()->create([
                        'option_text' => $option['option_text'],
                        'is_correct' => $option['is_correct'],
                    ]);
                }
            }

            return redirect()->route('questions.index')->with('success', 'Soal dan opsi berhasil ditambahkan!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('questions.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->with('type', 'toastr');
        }
    }

    public function update(Request $request, $exam_id)
    {
        try {
            $request->validate([
                'exam_id' => 'required|exists:exams,id',
                'questions.*.options' => 'required|array|min:1',
                'questions.*.question_text' => 'required|string|max:255',
                'questions.*.question_type' => 'required|string|max:50',
                'questions.*.options' => 'required|array|min:2',
                'questions.*.options.*.option_text' => 'required|string|max:255',
                'questions.*.options.*.is_correct' => 'required|boolean',
            ]);

            foreach ($request->questions as $questionData) {
                if (empty($questionData['id']) || $questionData['id'] === null) {
                    $question = Question::create([
                        'exam_id' => $request->exam_id,
                        'question_text' => $questionData['question_text'],
                        'question_type' => $questionData['question_type'],
                    ]);
                } else {
                    $question = Question::findOrFail($questionData['id']);
                    $question->update([
                        'exam_id' => $request->exam_id,
                        'question_text' => $questionData['question_text'],
                        'question_type' => $questionData['question_type'],
                    ]);
                }

                if (isset($questionData['options'])) {
                    $existingOptions = $question->options->pluck('id')->toArray();
                    $submittedOptionIds = collect($questionData['options'])->pluck('id')->filter()->toArray();

                    foreach (array_diff($existingOptions, $submittedOptionIds) as $optionId) {
                        $question->options()->find($optionId)->delete();
                    }

                    foreach ($questionData['options'] as $option) {
                        if (isset($option['id']) && $option['id']) {
                            $existingOption = $question->options()->find($option['id']);
                            if ($existingOption) {
                                $existingOption->update([
                                    'option_text' => $option['option_text'],
                                    'is_correct' => $option['is_correct'],
                                ]);
                            }
                        } else {
                            $question->options()->create([
                                'option_text' => $option['option_text'],
                                'is_correct' => $option['is_correct'],
                            ]);
                        }
                    }
                }
            }

            Log::info($request->all());
            return redirect()->route('questions.index')->with('success', 'Soal berhasil diperbarui!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('questions.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->with('type', 'toastr');
        }
    }

    public function show($exam_id)
    {
        $questions = Question::where('exam_id', $exam_id)->with(['exam', 'options'])->get();
        return view('dashboard.questions.show', compact('exam_id', 'questions'));
    }

    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $questions = Question::where('exam_id', $id)->with(['options', 'exam'])->get();
        return view('dashboard.questions.edit', compact('exam', 'questions'));
    }

    public function create($exam_id)
    {
        try {
            $exam = Exam::findOrFail($exam_id);
            return view('dashboard.questions.create', compact('exam'));
        } catch (Exception $e) {
            return redirect()->route('questions.index')->with('error', 'Ujian tidak ditemukan!')->with('type', 'toastr');
        }
    }

    public function destroy($exam_id)
    {
        try {
            $questions = Question::where('exam_id', $exam_id)->get();

            if ($questions->isEmpty()) {
                return redirect()->route('questions.index')->with('error', 'Tidak ada soal untuk ujian ini!')->with('type', 'toastr');
            }

            foreach ($questions as $question) {
                $question->delete();
            }

            return redirect()->route('questions.index')->with('success', 'Soal berhasil dihapus!')->with('type', 'toastr');
        } catch (Exception $e) {
            return redirect()->route('questions.index')->with('error', 'Terjadi kesalahan saat menghapus soal!')->with('type', 'toastr');
        }
    }
}

