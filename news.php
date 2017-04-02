<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>News</title>
      <style>
      body {
        font-family: "TH SarabunPSK", Times, serif;
        margin:60;
        padding:90;
      }
      div.head{
          background:#97091C;
          width:100%;
          height:50px;
      }
      table {
            border-collapse: collapse;
            width: 60%;
            font-size: 40px;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;

        }

        tr:hover{background-color:#f5f5f5}

        a:link {
            text-decoration: none;
            font-size: 30px;
            font-style:italic;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        a:active {
            text-decoration: underline;
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
<center><body>
  <div class="head"><font face="Impact" size="5" color="white"><h2>BBC News Update</h2></font></div>
    <br>
    <?php
      $uri = 'https://newsapi.org/v1/articles?source=bbc-news&sortBy=top';
      $reqPrefs['http']['method'] = 'GET';
      $reqPrefs['http']['header'] = 'X-Api-Key : ef62f36ab4a1426e8bf234af21f9244f';
      $stream_context = stream_context_create($reqPrefs);
      $response = file_get_contents($uri, false, $stream_context);
      $fixtures = json_decode($response,true);
    ?>

    <table class="t">


      <?php
        error_reporting(0);
        foreach ($fixtures as $key => $value) {
          # code...
          if ($key == "articles") {
            # code...
            for ($i=0; $i < 10; $i++) {
              # code...
              $pic[$key] = $value[$i]['urlToImage'];
              $title[$key] = $value[$i]['title'];
              $url[$key] = $value[$i]['url'];
      ?>

      <tr>
        <td><br><?php  echo "<img style='width:200px;' src='".$pic[$key]."'/>&nbsp";?></td>
        <td><?php  echo $title[$key];?><br>
            <?php echo '<A HREF = "'.$url[$key].'" target="_blank">Readmore</A>'?>
        </td>
      </tr>

      <?php
            }
          }
        }
      ?>
    </table><br>
          <form name="1" action="news.php" method="POST">
            <div><input type="submit" name="btnnews" value="News"></div>
          </form>
          <form name="2" action="music.php" method="POST">
            <div><input type="submit" name="btnmusic" value="Musics"></div>
          </form><br>
  </body></center>
</html>
