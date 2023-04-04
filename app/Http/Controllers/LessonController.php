<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Reserve;

class LessonController extends Controller
{
    //
    //管理者が予約作成画面へページ遷移する用

    public function show_admin(Request $request){
        $lessons = Lesson::all();
        $reserves = Reserve::all();
        return view('school.admin', compact('lessons','reserves'));
    }

    //レッスン追加アクション　OK
    public function add_lesson(Request $request){
        // dd($request->all());
        Lesson::create([
            "lesson_name" => $request->lesson_name,
            "price" => $request->price,
            "content" => $request->content,
        ]);
        return redirect()->route('show_admin');
    }


}
