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
                <div class="signin-box">
                    <h1>パスワード再発行画面</h1>
                    <form action="{{route('pw_reset')}}" method="post">
                        @csrf
                        {{-- @method("PUT") --}}
                        <h2>下記の項目を全てご記入の上<br>パスワードを変更するボタンを押してください</h2>
                        <dl>
                            <dt>
                                <label for='email'>メールアドレス</label>
                                @error('email')
                                <li>{{$message}}</li>
                                @enderror
                            </dt>
                            <dd>
                                <input type="text" name="email" id="email" placeholder="メールアドレス">
                            </dd>
                            <dt>
                                <label for='password'>パスワード</label>
                                @error('password')
                                <li>{{$message}}</li>
                                @enderror

                            </dt>
                            <dd>
                                <input type="password" name="password" id="password"placeholder="パスワード">
                            </dd>
                            <dd>
                                {{-- <input type="submit" value="パスワードを変更する" onclick="return confirm('この内容で変更してもよろしいですか？'"> --}}
                                <button class="login-btn" type='submit' onclick="return confirm('この内容で変更してもよろしいですか？')">パスワードを変更する
        
                                </button>
        
                            </dd>
                        </dl>
                    </form>

                </div>
            </section>
            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>