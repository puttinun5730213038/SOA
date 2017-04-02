<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Musics</title>

      <style>
            body{
              font-family: "TH SarabunPSK";
              margin:60;
              padding:90;
            }
            div.head{
                background:#494947;
                width:100%;
                height:50px;
            }
            table {
                border-collapse: collapse;
                width: 80%;
                border: 1px solid #ddd;
                font-size: 30px;
            }

            th, td {
                text-align: left;
                padding: 8px;
                border: 1px solid #ddd;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #B2B4AD;
                color: white;
            }
            img {
               border-radius: 10px;
            }
            input{
              background-color: #6C6364;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
  </head>
  <body>
    <center><div class="head"><font face="Niagara Solid" size="5" color="white"><h1>DEEZER</h1></font><div></center><br>
    <h1><B>รวมเพลง Bodyslam</B></h1>

    <?php
      $uri = 'http://api.deezer.com/search?q=bodyslam';
      $reqPrefs['http']['method'] = 'GET';
      $stream_context = stream_context_create($reqPrefs);
      $response = file_get_contents($uri, false, $stream_context);
      $fixtures = json_decode($response,true);
    ?>
  <center>  <table>
      <tr>
        <th>No.</th>
        <th>Picture</th>
        <th>Title</th>
        <th>Name</th>
        <th>Example</th>
      </tr>

      <?php
        error_reporting(0);
        foreach ($fixtures as $key => $value) {
          if ($key == "data") {
            for ($i=0; $i < 20; $i++) {
              $title[$key] = $value[$i]['title'];
              $name[$key] = $value[$i]['artist']['name'];
              $preview[$key] = $value[$i]['preview'];
              $pic[$key] = $value[$i]['artist']['picture'];

              //echo $title[$key];
      ?>

      <tr>
        <td><?php echo $i+1 ?></td>
        <td><?php echo "<img style='width:200px;' src='".$pic[$key]."'/>&nbsp"; ?></td>
        <td><?php echo $title[$key]; ?></td>
        <td><?php echo $name[$key]; ?></td>
        <td><?php echo "<audio controls>";
                  echo "<source src='".$preview[$key]."' type='audio/mp3'>";
                  echo "</audio>";
            ?>
       </td>
      </tr>

      <?php
            }
          }
        }
      ?>
    </table><center>
      <form name="1" action="news.php" method="POST">
        <div><input type="submit" name="btnnews" value="News"></div>
      </form>
      <form name="2" action="music.php" method="POST">
        <div><input type="submit" name="btnmusic" value="Musics"></div>
      </form><br>

  </body>
</html>
