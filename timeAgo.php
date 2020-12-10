<?php
    // timeAgo Fonksiyonu
    function timeAgo($dateTime, $full = false)
    {
      // Olsuğumuz bölgenin zaman dilimini yazıyoruz
      date_default_timezone_set('Europe/Istanbul');
      $now = new DateTime;
      $ago = new DateTime($dateTime);
      $diff = $now->diff($ago);

      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;

      // Tarihin sonuna gelen yazılar
      $end = [
        'y' => 'yıl',
        'm' => 'ay',
        'w' => 'hafta',
        'd' => 'gün',
        'h' => 'saat',
        'i' => 'dakika',
        's' => 'saniye'
      ];

      foreach ($end as $k => &$v) {
        if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        }else {
          unset($end[$k]);
        }
      }

      if (!$full) $end = array_slice($end, 0, 1);
      return $end ? implode(',', $end) . ' önce' : ' şimdi';
    }

    echo timeAgo('8-12-2020') . '<br>';
    echo '10-10-2020' . '<br>';
    echo date('d-m-Y');
 ?>
