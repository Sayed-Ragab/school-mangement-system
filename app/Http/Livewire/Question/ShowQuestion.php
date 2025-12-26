<?php

namespace App\Http\Livewire\Question;

use App\Models\Degree;
use Livewire\Component;
use App\Models\Question;

class ShowQuestion extends Component
{
    public $quizze_id, $student_id, $data, $counter = 0, $questioncount = 0;

    public function render()
    {
        $this->data = Question::where('quizze_id', $this->quizze_id)->get();
        $this->questioncount = $this->data->count();
        return view('livewire.question.show-question',['data']);
    }
    public function nextQuestion($question_id, $score, $answer, $right_answer){

       
     
       $studeg = Degree::where('student_id',$this->student_id)->where('quizze_id',$this->quizze_id)->first();
       if($studeg == null){
        $degree = new Degree();
        $degree->quizze_id = $this->quizze_id;
        $degree->student_id = $this->student_id;
        $degree->question_id = $question_id;
        if(strcmp(trim($answer), trim($right_answer)) === 0){
            $degree->score += $score;
        }
        else{
            $degree->score += 0;
        }
        $degree->Date = date('Y-m-d');
            $degree->save();

       }
       else{
        if ($studeg->question_id >= $this->data[$this->counter]->id) {
            $studeg->score = 0;
            $studeg->abuse = '1';
            $studeg->save();
            toastr()->error('تم إلغاء الاختبار لإكتشاف تلاعب بالنظام');
            return redirect('Exam');
        }else{
            $studeg->question_id = $question_id;
            if(strcmp(trim($answer), trim($right_answer)) === 0){
                $studeg->score += $score;
            }else{
                $studeg->score += 0;
            }
            $studeg->save();
       }
    }
       if($this->counter < $this->questioncount - 1 ){
        $this->counter++;
       }else{
        toastr()->success('تم اجراء الاختبار بنجاح');
        return redirect('Exam');
       }
    }
}
