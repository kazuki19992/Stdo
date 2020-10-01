<?php
// 現在の年月を取得
$year = date('Y');
$month = date('n');
$today_date = date('d');

// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calendar = array();
$j = 0;

// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {
    // 曜日を取得
    $week = date('w', mktime(0, 0, 0, $month, $i, $year));
    // 1日の場合
    if ($i == 1) {
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
            // 前半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
        }
    }

    // 配列に日付をセット
    $calendar[$j]['day'] = $i;
    $j++;

    // 月末日の場合
    if ($i == $last_day) {
        // 月末日から残りをループ
        for ($e = 1; $e <= 6 - $week; $e++) {
            // 後半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
        }
    }
}

// http://raining.bear-life.com/php/php%E3%81%A7%E7%B0%A1%E5%8D%98%E3%81%AA%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%80%E3%83%BC%E3%82%92%E4%BD%9C%E6%88%90%E3%81%99%E3%82%8B%E6%96%B9%E6%B3%95
?>
<table class="cal col s6 centered">
    <tr>
        <td class="week sun">日</td>
        <td class="week">月</td>
        <td class="week">火</td>
        <td class="week">水</td>
        <td class="week">木</td>
        <td class="week">金</td>
        <td class="week sat">土</td>
    </tr>
    <tr class="cal-border-none">
    <?php $cnt = 0; ?>
    <?php foreach ($calendar as $key => $value): ?>

        <?php if($today_date == $value['day'] && $cnt == 1){ ?>
            <td class="day pink lighten-3">
        <?php }elseif($today_date == $value['day'] && $cnt == 7){ ?>
            <td class="day cyan lighten-3">
        <?php }elseif($today_date == $value['day']){ ?>
            <td class="day light-green lighten-3">
        <?php }else{ ?>
            <td class="day">
        <?php } ?>
        <?php $cnt++; ?>
        <?php
        if($cnt == 1){
            $sat_or_sun = 'sun';
        }else if($cnt == 7){
            $sat_or_sun = 'sat';
        }else{
            $sat_or_sun = '';
        }
        ?>
        <p class="<?php echo $sat_or_sun; ?>"><?php echo $value['day']; ?></p>
        </td>

    <?php if ($cnt == 7): ?>
    </tr>
    <tr class="cal-border-none">
    <?php $cnt = 0; ?>
    <?php endif; ?>

    <?php endforeach; ?>
    </tr>
</table>