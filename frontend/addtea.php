<html>
    <head>
        <title>Vovan-Tea</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
      <div id="container">
        <div id="Header">
            <h1>Chinese Tea Shop</h1>
        </div>

        <div id="content">
          <div id="nav">
              <h3>Navigation</h3>
              <ul>
                  <li><a class="selected" href="index.php">Logout</a></li>
                  <li><a class="selected" href="tea.php">All Tea</a></li>
                  <li><a class="selected" href="aboutUs.php">About us</a></li>
              </ul>
          </div>

          <div id="main">
          <?php
          echo $_POST["teaTitle"];
          echo $_POST["teaPrice"];
          echo $_POST["existingCount"];
          echo $_POST["teaTypes_id"];

          $url = 'http://backend/newtea';
          $data = array('teaTitle' => $_POST["teaTitle"],
                        'teaPrice' => $_POST["teaPrice"],
                        'existingCount' => $_POST["existingCount"],
                         'teaTypes_id' => $_POST["teaTypes_id"]);

               $curl = curl_init($url);
               curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($curl, CURLOPT_POST, true);
               curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
               curl_setopt($curl, CURLOPT_HTTPHEADER, [
                  'Content-Type: application/json'
               ]);
               $response = curl_exec($curl);
               echo $response;
               curl_close($curl);

            ?>
          </div>

        </div>

        <div id="footer">
            Copyright &copy; 2021 Voldemar
        </div>
      </div>
    </body>
</html>
