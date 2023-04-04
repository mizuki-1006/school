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

    <body>
        <footer id="scroll-2">
            <div class="footer-inr">
                <div class="reserve">
                    <h3><strong>受講予約はこちら</strong></h3>
                    <div><a href="{{ route('show_signin')}}">予約画面へ</a></div>
                </div>
                <div class="contact">
                    <div class="time">
                        <div>
                            <div><strong>営業日</strong></div>
                            <span>【月〜金】<br>15:00~21:00</span>
                        </div>
                        <div>
                            <div><strong>休業日</strong></div>
                            <span>【土曜日・日曜日】</span>
                        </div>
                    </div>
                    <div class="access">
                        <div><strong>所在地</strong></div>
                        <div>xx県xx市xx町xx-xx-x</div>
                        <div>TEL. 000-0000-0000</div>
                        <div>Email. aaaa@aa.aaa</div>
                    </div>
                </div>

            </div>
        </footer>
    </body>
</html>