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
                  <li><a class="selected" href="aboutUs.php">About us</a></li>
              </ul>
          </div>

          <div id="main">
            <?php
            $json = file_get_contents('http://backend/tea');
            $obj = json_decode($json);
            foreach ($obj as $data) {
              echo "<li>{$data -> teaTitle}</li>";
              echo $data -> teaPrice;
            }
            ?>
          </div>

        </div>

        <div id="footer">
            Copyright &copy; 2021 Voldemar
        </div>
      </div>
    </body>
</html>
