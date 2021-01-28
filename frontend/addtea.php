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
                  <li><a class="selected" href="https://github.com/VolodymyrPastukh">About us</a></li>
              </ul>
          </div>

          <div id="main">
          <?php


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
               echo "<h2>Tea: [" . $_POST["teaTitle"] . "] added status |" . $response . "|</h2>";
               echo "<h3>Price: - " . $_POST["teaPrice"] . "</h3>";
               echo "<h3>Amount - " . $_POST["existingCount"] . "</h3>";
               echo "<h3>Type_id - " . $_POST["teaTypes_id"] . "</h3>";
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
