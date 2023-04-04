<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Http\Requests\ReserveRequest;
use Carbon\Carbon;

class ReserveController extends Controller
{


    // レッスン予約処理
    public function lesson_reserve(ReserveRequest $request){
        // dd($request->all());

        $request->all();

        // if文で1日の予約上限の設定
        $countLessonLimit = Reserve::where('reserve_date',$request->reserve_date)->count();
        // print_r($countLessonLimit);
        // dd($countLessonLimit);

        $dayOfWeek = date('w', strtotime($request->reserve_date));
        // dd($dayOfWeek);

        if($countLessonLimit == 40){
            return back()->withErrors([
                'reserve_error' => '指定した予約日は満席です。別日の予約をお願いいたします。'
            ]);
        }elseif($dayOfWeek == 0 || $dayOfWeek == 6){
            return back()->withErrors([
                'reserve_error' => '指定した日時は休業日です。別日の予約をお願いいたします。'
            ]);

        }else{
        Reserve::create([
            "user_name" => $request['name'],
            "lesson_name" => $request['lesson_name'],
            "reserve_date" => $request['reserve_date'],
            "reserve_time" => $request['reserve_time'],
        ]);
    return redirect('reserve')->with('flash_message', '予約が完了しました');
   }

    }


    public function back_mypage(){
        return view('school.mypage');
    }

}
