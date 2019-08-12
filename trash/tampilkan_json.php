<!--  Menggunakan cURL  -->
<?php

function http_request($url)
{
    //persiapkan curl
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $url);

    // set user agent
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13')");

    // return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($ch);

    // tutup curl
    curl_close($ch);

    // menampilkan hasil curl
    return $output;
}

//$data = http_request("https://api.github.com/users/petanikode");
//$data = http_request("https://api.github.com/users/teguhsiswanto87");
$data = http_request("https://www.thesportsdb.com/api/v1/json/1/all_leagues.php");

//    ubah strng JSON menjadi array
$data = json_decode($data, true);

//echo "<pre>";
//print_r($data);
//echo "</pre>";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <?php
    $no = 0;
    foreach ($data as $dat) {
        ?>
        <tr>
            <td><?php echo "$dat[$no][strLeague]"; ?></td>
        </tr>
    <?php $no++;} ?>
</table>
</body>
</html>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--<table>-->
<!--    <tr>-->
<!--        <td colspan="2"><img width="100" src="--><?php //echo "$data[avatar_url]"; ?><!--"></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Nama</td>-->
<!--        <td>: --><?php //echo "$data[name]"; ?><!--</td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>URL</td>-->
<!--        <td>: <a href="--><?php //echo "$data[url]"; ?><!--">--><?php //echo "$data[url]"; ?><!--</a></td>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>Nama</td>-->
<!--        <td>: --><?php //echo "$data[location]"; ?><!--</td>-->
<!--    </tr>-->
<!--</table>-->
<!--</body>-->
<!--</html>-->


<?php
//$sumber = 'http://ppid.jakarta.go.id/json?url=http://data.jakarta.go.id/dataset/06f19910-82c3-428f-9e13-14d848486f69/resource/a7cc5803-9993-427b-a3df-9745a233b38d/download/Lomba-bercerita-anak-TerbaikEdited.csv';
//$konten = file_get_contents($sumber);
//$data = json_decode($konten, true);
//
////echo $data[1]["nama_lokasi"];
//echo "<h1 align='center'>Jumlah lomba anak bercerita terbaik jakarta ada " . count($data) . " Siswa dan Siswi</h1>";
//echo "<br/>";
//
//?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Menampilkan data json</title>-->
<!--    <style>-->
<!--        table {-->
<!--            width: 100%;-->
<!--        }-->
<!---->
<!--        table tr td {-->
<!--            padding: 1rem;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<table border="1">-->
<!--    <tr>-->
<!--        <th>No</th>-->
<!--        <th>Tahun</th>-->
<!--        <th>Jenis Lomba</th>-->
<!--        <th>Juara</th>-->
<!--        <th>Nama</th>-->
<!--        <th>Sekolah</th>-->
<!--        <th>ID</th>-->
<!--    </tr>-->
<!---->
<!--    --><?php
//    for ($a = 0; $a < count($data); $a++) {
//        print "<tr>";
//        // penomeran otomatis
//        print "<td>" . $a . "</td>";
//        // menayangkan
//        print "<td>" . $data[$a]['tahun'] . "</td>";
//        print "<td>" . $data[$a]['jenis'] . "</td>";
//        print "<td>" . $data[$a]['juara'] . "</td>";
//        print "<td>" . $data[$a]['nama'] . "</td>";
//        print "<td>" . $data[$a]['sekolah'] . "</td>";
//        print "<td>" . $data[$a]['id'] . "</td>";
//        print "</tr>";
//    }
//
//    phpinfo();
//
//    ?>
<!--</table>-->
<!--</body>-->
<!--</html>-->

