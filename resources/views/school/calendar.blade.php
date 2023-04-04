
                    <!-- カレンダー表示 -->
                    {{-- 参照元　https://bluecode.io/basic/basic8/basic8-1/ --}}
                    <?php
                        use Carbon\Carbon;
                        // $dt = Carbon::createFromDate();
                        $m = isset($_GET['m'])? htmlspecialchars($_GET['m'], ENT_QUOTES, 'utf-8') : '';
                        $y = isset($_GET['y'])? htmlspecialchars($_GET['y'], ENT_QUOTES, 'utf-8') : '';
                        if($m!=''||$y!=''){
                            $dt = Carbon::createFromDate($y,$m,01);
                        }else{
                            $dt = Carbon::createFromDate();
                        }
                        renderCalendar($dt);

                        function renderCalendar($dt)
                        {
                           //DB接続
                            try{
                                $dbh = new PDO("mysql:host=localhost;dbname=school","root","root");
                            }catch(PDOException $e){
                                var_dump($e->getMessage());
                                exit;
                            }
                            $dt->startOfMonth(); //今月の最初の日
                            // $dt->timezone = 'Asia/Tokyo'; //日本時刻で表示
                            // echo $dt;

                            // //１ヶ月前
                            // $sub = Carbon::createFromDate($dt->year,$dt->month,$dt->day);
                            // $subMonth = $sub->subMonth();
                            // $subY = $subMonth->year;
                            // $subM = $subMonth->month;

                            // //1ヶ月後
                            // $add = Carbon::createFromDate($dt->year,$dt->month,$dt->day);
                            // $addMonth = $add->addMonth();
                            // $addY = $addMonth->year;
                            // $addM = $addMonth->month;

                            //今月
                            $today = Carbon::createFromDate();
                            $todayY = $today->year;
                            $todayM = $today->month;

                            // ページ遷移の仕方を調べる
                            // ルート値持たせて遷移
                            //リンク
                            $title = '<h4 class="calendar-title">'.$dt->format('F Y').'</h4>';//月と年を表示
                            // $title .= '<div class="month"><caption><a class="left" href="./calendar.php?y='.$todayY.'&&m='.$todayM.'">今月　</a>';
                            // $title .= '<a class="left" href="./calendar.php?y='.$subY.'&&m='.$subM.'"><<前月 </a>';//前月のリンク
                            // $title .= '<a class="right" href="./calendar.php?y='.$addY.'&&m='.$addM.'"> 来月>></a></caption></div>';//来月リンク


                              //曜日の配列作成
                              $headings = ['月','火','水','木','金','土','日'];

                              $calendar = '<table class="calendar-table" border=1>';
                              $calendar .= '<thead >';
                              foreach($headings as $heading){
                                  $calendar .= '<th class="header-calendar">'.$heading.'</th>';
                              }
                              $calendar .= '</thead>';

                               $calendar .= '<tbody><tr>';


                               //今月は何日まであるか
                               $daysInMonth = $dt->daysInMonth;

                               for ($i = 1; $i <= $daysInMonth; $i++) {

                                    $reserve_date = $dt->year."-".$dt->month."-".$dt->day; //日付を取得
                                    $stmt = $dbh->prepare("SELECT reserve_date,count(reserve_time) FROM reserve where reserve_date = :reserve_date GROUP BY reserve_date");
                                    $stmt->bindParam(":reserve_date",$reserve_date);
                                    $stmt->execute();
                                    $count = $stmt->rowCount(); //特定の日に予約があるかを取得

                                    //予約件数の取得
                                    $reserve_count = $dbh->prepare("SELECT * FROM reserve where reserve_date = :reserve_date");
                                    $reserve_count->bindParam(":reserve_date",$reserve_date);
                                    $reserve_count->execute();
                                    $reserve_counts =$reserve_count->rowCount();//予約件数の表示
                                    // echo $reserve_counts;
                                    $reserve_count = 40-$reserve_counts;

                                    if($i==1){
                                        if ($dt->format('N')!= 1) {
                                            $calendar .= '<td colspan="'.($dt->format('N')-1).'"></td>'; //1日が月曜じゃない場合はcospanでその分あける
                                        }
                                    }
                                    if($dt->format('N') == 1){
                                        $calendar .= '</tr><tr>'; //月曜日だったら改行
                                    }

                                       $comp = new Carbon($dt->year."-".$dt->month."-".$dt->day); //ループで表示している日
                                       $comp_now = Carbon::today(); //今日

                                       if($comp->lt($comp_now)){
                                        $calendar .= '<td class="day" style="background-color:#ddd;">'.$dt->day;
                                        }else{
                                       //ループの日と今日を比較
                                       if ($comp->eq($comp_now)) {
                                           //同じなので緑色の背景にする
                                           $calendar .= '<td class="day" style="background-color:#FF9933;">'.$dt->day;
                                       }else{
                                    switch ($dt->format('N')) {
                                        case 6:
                                            $calendar .= '<td class="day" style="background-color:#b0e0e6">'.$dt->day.'<br>休業日';
                                            break;
                                        case 7:
                                            $calendar .= '<td class="day" style="background-color:#f08080">'.$dt->day.'<br>休業日';
                                            break;
                                        default:
                                            $calendar .= '<td class="day" >'.$dt->day;
                                            break;

                                    }
                                }
                            }
                                // if($counts != 0 || $comp->lt($comp_now)){
                                //     $reservations= $stmt->fetchAll(PDO::FETCH_ASSOC);
                                //     foreach($reservations as $reservation)
                                //     {
                                //         $calendar .= '<br>'.'予約あり'.'<br>'.'残席数'.$count.'</a>';
                                //     }
                                //     $calendar .= '</td>';
                                // }else{
                                //     $calendar .= '</td>';

                                // }
                                if($count != 0){
                                    $reservations= $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($reservations as $reservation)
                                    {
                                        $calendar .= '<br>'.'予約あり'.'<br>'.'残席数'.$reserve_count.'</a>';
                                    }
                                    $calendar .= '</td>';
                                }else{
                                    $calendar .= '</td>';

                                }

                                   $dt->addDay();
                            }
                               $calendar .= '</tr></tbody>';

                              $calendar .= '</table>';
                              echo $title.$calendar;
                        }
                    ?>
