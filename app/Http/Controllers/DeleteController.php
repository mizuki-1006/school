<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Reserve;
use Carbon\Carbon;

class DeleteController extends Controller
{


    //レッスン削除アクション
    public function delete_lesson(Request $request){
        // dd($request->lesson_id);

        $lesson_delete = Lesson::where('lesson_id',$request->lesson_id)->first();

        $lesson_delete->delete();
        // dump($lesson_delete);

        $today = Carbon::now()->format('Y-m-d');

        //受講予約時＆管理者側の削除、レッスンの一覧表示用
        $lessons  = Lesson::all();

        //受講予約一覧表示用
        $reserves = Reserve::select('*')->orderBy('reserve_date','asc')->orderBy('reserve_time','asc')->get();

        return view('school.admin_home',compact('today','reserves','lessons'))->with('flash_message', 'レッスンの削除が完了しました');
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
