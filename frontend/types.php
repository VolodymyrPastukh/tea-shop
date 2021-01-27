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
                  <li><a class="selected" href="login.php">Logout</a></li>
                  <li><a class="selected" href="newtea.php">Add tea</a></li>
                  <li><a class="selected" href="aboutUs.php">About us</a></li>
              </ul>
          </div>

          <div id="main">
            <form action="tea.php" method="post">
            <?php
            $json = file_get_contents('http://backend/teaTypes');
            $obj = json_decode($json);
            foreach ($obj as $data) {
              echo "<input value='{$data -> typeTitle}' type='submit'/><br>";
            }
            ?>
          </form>
          </div>

        </div>

        <div id="footer">
            Copyright &copy; 2021 Voldemar
        </div>
      </div>
    </body>
</html>
