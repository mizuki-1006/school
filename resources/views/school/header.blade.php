<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet"  href="{{asset('/assets/css/base.css')}}">
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    </head>

    <body>
        <nav class="header-nav motion">
            <div class="header-logo">
                <a href="{{ route('index')}}">
                    <h3 class=""><strong>麗紅書道教室</strong></h3>
                </a>
            </div>
            <div class="header-menu">
                <div class="menu"><a href="#scroll-1">コース一覧</a></div>
                <div class="menu"><a href="{{ route('show_signin')}}">会員ページ</a></div>
                <div class="menu"><a href="#scroll-2">連絡先</a></div>
            </div>
        </nav>
        <script src="main.js"></script>
    </body>
</html>