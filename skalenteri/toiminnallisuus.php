<?php
// Asettaa Suomen ajan ja päivämäärän
setlocale(LC_ALL, 'fi_FI');

// Hakee seuraavan ja edellisen kuukauden
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // $ym = tämä vuosi ja kuukausi
    $ym = date('Y-m');
}

// Tämän hetken timestamp ja formaatin luominen
$timestamp = strtotime($ym . '-01');  // Kuukauden ensimmäinen päivä
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Sivulla näkyvillä
    // Otsikko - kuukausi suomeksi (Formaatti: huhtikuu, 2020)
    $title = strftime("%B, %Y", $timestamp);

    // Otsikko - tänään kuukausi suomeksi (Formaatti: 17. huhtikuuta 2020)
    $date_title = date('j. ') . strftime("%Bta %Y", $timestamp);

    // Linkit edelliselle ja seuraavalle kuukaudelle (Edellinen kk miinustaa kuukaudesta -1 ja seuraava kk lisää +1)
    $prev = date('Y-m', strtotime('-1 month', $timestamp));
    $next = date('Y-m', strtotime('+1 month', $timestamp));


// Tänään (Formaatti:2020-04-17) 
$today = date('Y-m-j');

// Päivien lukumäärä kuukaudessa (Esim. huhtikuussa päivien lukumäärä: 30)
$day_count = date('t', $timestamp);

// Viikonpäivät numeroituna: 1: Mon, 2:Tue, ... 7:Sun
$str = date('N', $timestamp);

// Kalenterille listamuuttuja
$weeks = [];
$week = '';

$week .= str_repeat('<td style="border: 0;"></td>', $str - 1); // Lisää kuukauden ensimmäiselle viikolle tyhjät solut

// Looppi lähtee 1. päivästä ja jatkaa niin pitään kunnes päivien lukumäärä kuukaudessa (esim. 30) on pienempi
// Jokaisessa loopissa lisätään $day muuttujaan +1 päivä sekä $str muuttujaan +1 viikonpäivä
for ($day = 1; $day <= $day_count; $day++, $str++) {
    
    $date = $ym . '-' . $day; // Muuttuja muuttaa päivämäärän formaattiin: 2020-04-01 tai 2020-04-02

    // Viikkoon lisätään uusi td class="today", jos date-muuttuja menee yhteen sen kanssa. Jos ei ole yhteensopiva, viikkoon lisätään perus td.
    if ($today == $date) {
        $week .= '<td class="today" onclick="PickedDate(\'' . $date . '\')">';
    } else {
        $week .= '<td class="cal-cell" onclick="PickedDate(\'' . $date . '\')">';
    }

    // $week -muuttujaan lisätään </td>
    $week .= $day . '</td>';

    // Sunnuntai TAI viimeinen päivä kuukaudessa
    if ($str % 7 == 0 || $day == $day_count) {

        // Kuukauden viimeinen päivä
        if ($day == $day_count && $str % 7 != 0) {
            $week .= str_repeat('<td style="border: 0;"></td>', 7 - $str % 7); // Lisää kuukauden viimeiselle viikolle tyhjät solut
        }

        // Jos str on 7, looppi "rakentaa" taulukkoon viikon eli tr
        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';

    }
}
?>