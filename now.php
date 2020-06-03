<!DOCTYPE html>
<html>
<head>
	<title>Wek Wek</title>
</head>
<body>
	<?php
  include "conf/info.php";
  $title="Welcome to";
  include_once "header.php";
?>
    <h1>~ Now Playing Movies ~</h1>
    <hr>
    <!--perintah untuk menampilkan data API-->

      <?php
      include_once "api/now.php";
        $arr = $now_playing->results;
       // var_dump($arr);

      //  Fungsi Array Chunk pada PHP adalah untuk membagi array ke dalam beberapa bagian atau potongan array itu sendiri. sehingga memudahkan kita untuk mengelompokan suatu data yang akan kita tampilkan. Sebelum saya memberi contoh ada baiknya teman-teman tahu cara penulisan atau sintaksis dari array_chunk itu sendiri
     // Sintaksis: array_chunk(array,size,preserve_key)
        $chunks = array_chunk($arr, 3);

        echo '<table>';
       /*
        Perulangan foreach merupakan perulangan khusus untuk pembacaan nilai array, setiap array memiliki pasangan key dan value. Key adalah ‘posisi’ dari array, dan value adalah ‘isi’ dari array.
        foreach ($nama_array as $value)
          {
            statement (...$value...)
          }

        $nama_array adalah nama dari array yang telah didefenisikan sebelumnya.
        $value adalah nama ‘variabel perantara’ yang berisi data array pada perulangan tersebut. Anda bebas memberikan nama untuk variabel perantara ini, walaupun pada umumnya banyak programmer menggunakan $value, atau $val saja.

       */
        foreach ($chunks as $chunk) {
            echo '<tr>';

            foreach ($chunk as $p) {

                echo '<td><a href="movie.php?id=' . $p->id . '"><img src="http://image.tmdb.org/t/p/w500'. $p->poster_path . '"><h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h5><em>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . "</em></h5></a>'</td>";
            }
            echo '</tr>';
        }
        echo '</table>';
      ?>


<?php
  include_once "footer.php";
?>
</body>
</html>
