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
                    <h1>ログイン画面</h1>
                    <form action="{{ route('signin') }}" method="post">
                        @csrf
                        <h2>下記の項目を全てご記入の上<br>ログインボタンを押してください。</h2>
                        @error( 'login_error')
                        <li>{{$message}}</li>
                        @enderror
                        <dl>
                            <dt>
                                <label for="email">メールアドレス</label>
                                @error('email')
                                <li>{{$message}}</li>
                                @enderror

                            </dt>
                            <dd>
                                <input type="text"  name="email" id="email" placeholder="aaaaaa@outloook.jp" value="{{ old('email')}}">
                            </dd>
                            <dt>
                                <label for="password">パスワード</label>
                                @error('password')
                                <li>{{$message}}</li>
                                @enderror

                            </dt>
                            <dd>
                                <input type="text" name="password" id="password" placeholder="パスワード">
                            </dd>
                            <dd>
                                <input class="login-btn" type="submit" value="ログイン">
                            </dd>
                        </dl>
                    </form>
                </div>
                <div class="other">
                    <div class="signup">
                        <div>
                            <a href="{{ route('show_signup')}}">新規会員登録はこちら</a>
                        </div>
                    </div>
                    <div class="signup">
                        <div>
                            <a href="{{ route('show_reset')}}">パスワードを忘れた方はこちら</a>
                        </div>
                    </div>
                </div>
            </section>
            {{-- <?php foreach ($post as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['name'] ?></td>
                        <td><?= $p['age'] ?></td>
                        <td><?= $p['tel'] ?></td>
                        <td><?= $p['email'] ?></td>
                        <td><?= $p['password'] ?></td><br>
                    </tr>
            <?php endforeach;?> --}}




            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>