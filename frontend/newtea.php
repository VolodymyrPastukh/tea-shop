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
                  <li><a class="selected" href="tea.php">All Tea</a></li>
                  <li><a class="selected" href="aboutUs.php">About us</a></li>
              </ul>
          </div>

          <div id="main">
            <form action="addtea.php" method="post">
              Add new tea to shop
              Title<input name="teaTitle" type="text"><br>
              Price<input name="teaPrice" type="text"><br>
              Counts<input name="existingCount" type="text"><br>
              Type<input name="teaTypes_id" type="text"><br>
              <input type="submit">
            </form>
          </div>

        </div>

        <div id="footer">
            Copyright &copy; 2021 Voldemar
        </div>
      </div>
    </body>
</html>
