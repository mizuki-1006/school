<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet"  href="base.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    </head>
    <main>
        @include('school.header')
        <body>
            <section>
                <div class='calendar-box'>
                    @include('school.calendar')
                </div>
                <div class='select-lesson-box'>
                    <!-- レッスン選択画面 -->
                    <div class='select-lesson'>
                        {{-- <?php var_dump($user) ?> --}}
                        <div class='signin-box'>
                            <table>
                                <h1>受講予約</h1>
                                <form action="{{route('lesson_reserve')}}" method="post">
                                    @csrf
                                    <tr>
                                        <input type="hidden" name="name" value="{{$user['name']}}">
                                    </tr>
                                    <tr>
                                        <dd>
                                            <label for="lesson_name">
                                                レッスン選択
                                            </label>
                                            <select id="lesson_name" name='lesson_name'>
                                                @foreach($lessons as $lesson)
                                                <option value="{{$lesson->lesson_name}}">{{$lesson->lesson_name}}</option>
                                                @endforeach
                                            </select>
                                        </dd>
                                    </tr>
                                    <tr>
                                        @if ($errors->any())
                                            <div>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <dd>
                                            <label>予約日：</label>
                                            <input type="date" name="reserve_date">
                                        </dd>
                                    </tr>
                                    <tr>
                                        <dd>
                                            <label for="reserve_time">予約時間：</label>
                                            <select id="reserve_time" name='reserve_time'>
                                                @foreach($times as $time)
                                                <option value="{{$time->time}}">{{$time->time}}</option>
                                                @endforeach
                                            </select>
                                        </dd>
                                    </tr>
                                    <tr>
                                        <dd><input class="login-btn" type="submit" onclick="return confirm('この内容で予約を送信してもよろしいですか？')" value="送信"></dd>
                                    </tr>
                                </form>
                            </table>
                            <div>
                                <!-- 戻るボタン用 -->
                                <form  class="reserve-back" >
                                    @csrf
                                    <input class="login-btn" type="button" onclick="history.back()" value="戻　る">
            
                                </form>
            
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- レッスン一覧 -->
                    <section>
                        <div class="lesson-list">
                            <div id="scroll-1" class="lesson-logo">
                                <h1>
                                    <strong>レッスン紹介</strong>
                                </h1>
                            </div>
                            <div class="lessons">
                                <div class="lesson">
                                    <div class="lesson-photo">
                                        <img src="{{ asset('img/IMG_6871.jpg')}}">
                                    </div>
                                    <div class="lesson-text">小学生毛筆硬筆授業</div>
                                    <p>月〜金（16:00~20:00）<br>1時間　¥1,000<br>-内容-<br>30分毛筆・30分硬筆<br>筆の持ち方、姿勢、基本線など基礎から始め、<br>毎月違う課題作品を仕上げられるように進めます。</p>
                                </div>
                                <div class="lesson">
                                    <div class="lesson-photo">
                                        <img src="{{ asset('img/IMG_6861.jpg')}}">
                                    </div>
                                    <div class="lesson-text">中学〜高校生</div>
                                    <p>月〜金（16:00~20:00）<br>1時間　¥1,300<br>-内容-<br>30分毛筆・30分硬筆<br>筆の持ち方、姿勢、基本線など基礎から始め、<br>毎月違う課題作品を仕上げられるように進めます。</p>
                                </div>
                                <div class="lesson">
                                    <div class="lesson-photo">
                                        <img src="{{ asset('img/IMG_6872.jpg')}}">
                                    </div>
                                    <div class="lesson-text">大人</div>
                                    <p>月〜金（16:00~20:00）<br>1時間　¥1,500<br>-内容-<br>30分毛筆・30分硬筆<br>筆の持ち方、姿勢、基本線など基礎から始め、<br>毎月違う課題作品を仕上げられるように進めます。</p>
                                </div>
                                <div class="lesson">
                                    <div class="lesson-photo">
                                        <img src="{{ asset('img/IMG_6866.jpg')}}">
                                    </div>
                                    <div class="lesson-text">ペン字教室</div>
                                    <p>月〜金（16:00~20:00）<br>1時間　¥1,000<br>-内容-<br>ペンの持ち方、姿勢などの基礎から始め、<br>当教室の指導者が準備した教材で進めます。<br>（ご自身で上達させたい書き物などがございましたら持ち込み可能です。）</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>


            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>