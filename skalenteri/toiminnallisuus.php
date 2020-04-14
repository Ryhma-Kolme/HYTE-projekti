<?php
// Hakee seuraavan ja edellisen kuukauden
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // Tämä kuukausi
    $ym = date('Y-m');
}

// Formaatti
$timestamp = strtotime($ym . '-01');  // Kuukauden ensimmäinen päivä
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Tänään (Formaatti:2018-08-8)
$today = date('Y-m-j');

// Otsikko - kuukausi (Formaatti:August, 2018)
$title = date('F, Y', $timestamp);

// Linkit edelliselle ja seuraavalle kuukaudelle
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// Päivien lukumäärä kuukaudessa
$day_count = date('t', $timestamp);

// Viikonpäivät 1:Ma 2:Ti 3:Ke ... 7:Su
$str = date('N', $timestamp);

// Kalenterille lista
$weeks = [];
$week = '';

// Lisää tyhjät solut
$week .= str_repeat('<td class="cal-cell"></td>', $str - 1);

for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">';
    } else {
        $week .= '<td class="cal-cell">';
    }

    $week .= $day . '</td>';

    // Sunnuntai TAI viimeinen päivä kuukaudessa
    if ($str % 7 == 0 || $day == $day_count) {

        // Kuukauden viimeinen päivä
        if ($day == $day_count && $str % 7 != 0) {
            // Lisää tyhjät solut
            $week .= str_repeat('<td class="cal-cell"></td>', 7 - $str % 7);
        }

        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
    }
}
?>