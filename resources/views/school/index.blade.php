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
            <div class="hp">
                <div class="opacty">
                    <section class="school" style="background: url({{ asset('img/hand-drawn-style-floral-background_79603-1541.avif') }});background-size: cover;background-position: center;">

                        <div>
                            <p class='concept'><strong>美しい文字は一生の宝物になります。<br>正しい、美しい文字への第一歩を教室で始めませんか？
                            </strong></p>
                        <div>


                        <div class="teachers">
                            <h3><strong>指導者</strong></h3>
                            <div class="teacher">
                                <div class="teacher-1">
                                    <h3><strong>矢島麗紅</strong></h3>
                                    <P>観峰流書道 漢字部 八段位	H10年取得<br>
                                        同 臨書部七段位	R元年取得<br>
                                        同 かな部 教授免許	H11年取得<br>
                                        同 硬筆部 教授免許	H13年取得<br>
                                        同 実務書道師範	H14年取得<br>
                                        同 墨画部門 脩伝教授	R元年取得
                                        </p>
                                </div>
                                <div class="teacher-2">
                                    <h3><strong>矢島麗月</strong></h3>
                                    <P>観峰流書道 漢字部 八段位	H26年取得<br>
                                        同 かな部 教授免許	H28年取得<br>
                                        同 硬筆部 教授免許	R元年取得<br>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
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
            <script src="main.js"></script>
        </body>
        @include('school.footer')
    </main>
</html>