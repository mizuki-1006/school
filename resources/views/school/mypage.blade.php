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
        {{-- <?php var_dump($_POST)?> --}}
        <body>
            <section>


                <div class='calendar-box'>
                    @include('school.calendar')
                </div>
                <div class="user_name">
                    <!-- DBから氏名を持ってきて表示 -->
                    <p>
                      {{$date['name']}}
                        様用マイページ
                    </p>
                </div>
                <div class="reserve-list">
                    {{-- <?php var_dump($user_reserve) ?> --}}
                    <p><strong>受講予定一覧</strong></p>
                    <!-- 受講予定の表示 -->
                    <div class="user-reserve">
                        @foreach ($user_reserve as $reserve)
                        <p>
                            @if($reserve->reserve_date >= $yesterday )
                            {{ $reserve['reserve_date'] }}
                            {{ $reserve['reserve_time']}}〜
                            {{ $reserve['lesson_name'] }}
                            <br>
                            @endif
                        </p>
                        @endforeach
                    </div>
                </div>
                <div class="mypage">
                    <div>
                        <!-- アカウント削除アクション -->
                        <form action="{{route('delete')}}" method="post" class="logout">
                            @csrf
                            <button class="login-btn" type='submit' name='id' value="{{ $date['id'] }}" onclick="return confirm('このアカウント情報を本当に削除してもよろしいですか？')">アカウント削除

                            </button>
                        </form>
                    </div>
                    <div>
                        <!-- ログアウト -->
                        <form action="{{route('logout')}}" method="post" class="logout">
                            @csrf
                            <button class="login-btn">ログアウト

                            </button>

                        </form>
                    </div>
                    <div>
                        <!-- 受講予約へ遷移 -->
                        <form action="{{route('show_reserve')}}" method="post"  class="show_reserve">
                            @csrf
                            <input type="hidden" name="name" value="{{ $date['name']}}">
                            <input class="login-btn" type="submit" value="受講予約画面へ">
                        </form>
                    </div>
                </div>
                    <!-- レッスン一覧 -->
                    <div class="lesson-list">
                        <div  class="lesson-logo">
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
            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>