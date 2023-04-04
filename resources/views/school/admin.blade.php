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

            <div class='calendar-box'>
                @include('school.calendar')
            </div>
            <div class="signin-box">
                <div class="delete-box">
                    <h2 class="lesson-add"><strong>レッスン追加</strong></h2>
                    @if (session('flash_message'))
                        <div class="flash_message">
                            {{ session('flash_message') }}
                        </div>
                    @endif
                    <form action="{{route('add_lesson')}}" method="post">
                        @csrf
                        <dl>
                            <dt>
                                <label for="lesson_name">レッスン名</label>
                            </dt>
                            <dd>
                                <input type="text" name="lesson_name" id="lesson_name">
                            </dd>
                            <dt>

                                <label for="content">レッスン内容</label>
                            </dt>
                            <dd>
                                <textarea name="content" id="content" rows="13" cols="40"></textarea>
                            </dd>
                            <dt>

                                <label for="price">料金</label>
                            </dt>
                            <dd>
                                <input type="text" name="price" id="price">
                            </dd>

                            <dd>
                                <input  class="login-btn" type="submit" onclick="return confirm('この内容でレッスンを追加してよろしいですか？')"  value="レッスンを追加する">
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>
            <div class="admin">
                <div>
                    <form>
                        @csrf
                        <input  class="login-btn" type="button" onclick="history.back()" value="戻　る">


                    </form>
                </div>
                <div>
                    <!-- ログアウト -->
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="login-btn">ログアウト

                        </button>

                    </form>
                </div>
            </div>
            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>