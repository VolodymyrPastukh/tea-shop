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
                  <li><a class="selected" href="https://github.com/VolodymyrPastukh">About us</a></li>
              </ul>
          </div>

          <div id="main">
              <h2> Login </h2>
              <form action="types.php" method="post">
                  <input placeholder="login" name="login" type="text"><br>
                  <input placeholder="password" type="text"><br>
                  <input value="login" type="submit">
              </form>
          </div>

        </div>

        <div id="footer">
            Copyright &copy; 2021 Voldemar
        </div>
      </div>
    </body>
</html>
