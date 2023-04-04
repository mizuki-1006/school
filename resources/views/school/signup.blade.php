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
                    <h1>新規会員登録画面</h1>
                    <form action="{{ route('create')}}" method="post">
                        @csrf
                        <h2>下記の項目を全てご記入の上<br>会員登録ボタンを押してください</h2>
                        <dl>
                            <dt>
                                {{-- <span>必須</span> --}}
                                <label for="name">氏名</label>
                                @error('name')
                                <li>{{$message}}</li>
                                @enderror
                            </dt>
                            <dd>
                                <input type="text" name="name" id="name" placeholder="矢島美月" value="{{ old('name')}}">
                            </dd>
                            <dt>
                                {{-- <span>必須</span> --}}
                                <label for="age">年齢</label>
                                @error('age')
                                <li>{{$message}}</li>
                                @enderror

                            </dt>
                            <dd>
                                <select name="age" id="age">
                                    <option value="">-年齢を選択してください-</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                </select>
                            </dd>
                            <dt>
                                {{-- <span>必須</span> --}}
                                <label for="tel">電話番号</label>
                                @error('tel')
                                <li>{{$message}}</li>
                                @enderror
                            </dt>
                            <dd>
                                <input type="text" name="tel" id="tel" placeholder="000-0000-0000" value="{{ old('tel')}}">
                            </dd>
                            <dt>
                                {{-- <span>必須</span> --}}
                                <label for="email">メールアドレス</label>
                                @error('email')
                                <li>{{$message}}</li>
                                @enderror

                            </dt>
                            <dd>
                                <input type="text" name="email" id="email" placeholder="aaaaaa@outloook.jp" value="{{ old('email')}}">
                            </dd>
                            <dt>
                                {{-- <span>必須</span> --}}
                                <label for="password">パスワード</label>
                                @error('password')
                                <li>{{$message}}</li>
                                @enderror

                            </dt>
                            <dd>
                                <input type="text" name="password" id="password" placeholder="パスワード">
                            </dd>
                            <dd>
                                <input class="login-btn" type="submit" onclick="return confirm('この内容で会員登録をしてよろしいですか？')" value="会員登録">
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
{{-- 参照　https://implist.dev/entries/149d22b000f2dd4ce42510b9efb524a1 --}}