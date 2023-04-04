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
                <div>
                    @if (session('flash_message'))
                        <div class="flash_message">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    {{-- 本日の受講予約者一覧挿入 --}}
                    <div class="reserve-list">
                        <h3>本日の予約者一覧</h3>
                        @foreach($reserves as $reserve)
                        @if($reserve->reserve_date == $today )
                        <p>・ {{$reserve->reserve_date}} {{$reserve->reserve_time}} {{$reserve->user_name}} {{$reserve->lesson_name}}</p>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div>
                    {{-- 受講予約者一覧挿入 --}}
                    <div class="reserve-list">
                        <h3>受講予約者一覧</h3>
                        @foreach($reserves as $reserve)
                        @if($reserve->reserve_date > $today )
                        <p>・ {{$reserve->reserve_date}} {{$reserve->reserve_time}} {{$reserve->user_name}} {{$reserve->lesson_name}}</p>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div>
                    <div class="delete-box">
                        <h2>レッスン削除</h2>
                        <form action='{{route('delete_lesson')}}' method='post'>
                            @csrf
                            <dl>
                                <dt>
                                    <label for="lesson_id">削除するレッスンを選んでください</label>
                                </dt>
                                <dd>
                                    <select id='lesson_id' name='lesson_id'>
                                        <option>選択してください</option>
                                        @foreach($lessons as $lesson)
                                            <option value="{{$lesson->lesson_id}}">{{$lesson->lesson_name}}</option>
                                        @endforeach
                                    </select>
                                </dd>
                            </dl>
                            <dl>
                                <dd>
                                    <input class="login-btn" type="submit" onclick="return confirm('このレッスンを本当に削除してもよろしいですか？')" value='レッスンを削除する'>
                                </dd>
                            </dl>
                        </form>
                    </div>
                    <div class="admin-home">
                        <!-- ログアウト -->
                        <a class="admin-home-btn" href="{{ route('logout') }}">ログアウト</a>
                        <a class="admin-home-btn" href="{{ route('show_admin') }}">レッスンを作成する</a>

                    </div>
                </div>
                <div>
                    @php
                        // dd($lesson->lesson_id);
                        // dd($lessons);
                        // dd($lesson);
                        // dd($lesson->lesson_name);
                    @endphp
                </div>
            </section>
            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>