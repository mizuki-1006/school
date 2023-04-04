<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolPostRequest;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RepassRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Lesson;
use App\Models\Reserve;
use App\Models\Time;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{

    // HP表示
    public function index(){

        return view('school.index');

        //viewにviewのパスを記述
        //compactに記述したデータがviewに連携される。複数渡す場合はカンマで区切る。
    }

    // ログイン画面表示
    public function show_signin(){
        $post = Post::all();
        return view('school.signin', compact('post'));
    }

    // 新規会員登録画面表示
    public function show_signup(){
        return view('school.signup');
    }

    // 新規会員登録用バリデーション
    public function create(SchoolPostRequest $request){
        // dd($request->all());
        Post::create([
            "name" => $request->name,
            "age" => $request->age,
            "tel" => $request->tel,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect("signin")->with('flash_message', '新規会員登録が完了しました');
    }


    // ログイン＆マイページ遷移用
    public function signin(LoginPostRequest $request){

        //受講予約時＆管理者側の削除、レッスンの一覧表示用
        $lessons  = Lesson::all();

        //フォームに入力されたパスワード
        $pass = $request->password;

        //emailを元に、usersテーブルから情報取得
        $user = \App\Models\Post::where('email', $request->email)->first();
        // print_r($user);

        //登録されているパスワードの取得
            if (!empty($user->password)) {
                $currentPass = $user->password;
                $role = $user->role;
                // print_r($role);
            }

        //入力値とDB上のパスの一致確認
        if(Hash::check($pass,$currentPass)){

            // セッションに保存
            $request->session()->put('id',$user->id);
            $request->session()->put('name',$user->name);
            $request->session()->put('age',$user->age);
            $request->session()->put('tel',$user->tel);
            $request->session()->put('email',$user->email);

            // 各ユーザーの受講予約者一覧表示用
                $user_reserve = Reserve::where('user_name', $user->name)->orderBy('reserve_date', 'asc')->orderBy('reserve_time', 'asc')->get();

                // 日付取得
                $cb = new Carbon();

                // 昨日
                $yesterday = $cb::yesterday();

                // ユーザー名前表示用
                $date = ['id'=> $user->id,'name' =>$user->name];
                // print_r($date);

            if($role === 1){
                //受講予約一覧表示用
                $reserves = Reserve::select('*')->orderBy('reserve_date','asc')->orderBy('reserve_time','asc')->get();

                $today = Carbon::now()->format("Y-m-d");

                return view('school.admin_home', compact('request','date','reserves','lessons','yesterday','today'));
            }

            return view('school.mypage', compact('request','date','lessons','user_reserve','yesterday'));

        }
        return back()->withErrors([
            'login_error' => 'メールドレスかパスワードが間違っています。'
        ]);
    }

    //ログアウト
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

    //受講予約画面へ遷移
    public function show_reserve(Request $request){
        $user = $request->session()->all();
        $lessons = Lesson::all();
        $times = Time::all();
        return view('school.reserve',compact('lessons','user','times'));
    }

    //パスワード変更画面へ遷移
    public function show_reset(){
        return view('school.reset');
    }

    // パスワード変更処理
    public function pw_reset(RepassRequest $request){
        $user = \App\Models\Post::where('email', $request->email)->first();
        print_r($user);
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        //画面遷移しないエラー（404|not found）
        // return view('school.signin');
        return redirect()->route('show_signin')->with('flash_message', 'パスワードの変更が完了しました');
    }

    // アカウント物理削除処理
    public function delete(Request $request){
        $user = Post::where('id', $request->id);
        $user -> delete();

        return redirect()->route("index")->with('flash_message', 'アカウントの削除が完了しました');

    }

}
