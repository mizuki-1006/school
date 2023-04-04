<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Reserve;

class DeleteController extends Controller
{


    //レッスン削除アクション
    public function delete_lesson(Request $request){
        // dd($request->lesson_id);

        $lesson_delete = Lesson::where('lesson_id',$request->lesson_id)->first();

        $lesson_delete->delete();

        dump($lesson_delete);

        return redirect()->route('show_admin_home')->with('flash_message', 'レッスンの削除が完了しました');
        // return redirect()->route('school.admin_home');

    }

    //admin_home表示用
    public function show_admin_home(Request $request){
        //DBからデータを持ってくる
        $lessons  = Lesson::all();
        // dd($lessons->all());
        $reserves = Reserve::all();
        return view('school.admin_home',compact('reserves','lessons'));
    }
}
