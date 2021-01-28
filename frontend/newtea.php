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
                  <li><a class="selected" href="https://github.com/VolodymyrPastukh">About us</a></li>
              </ul>
          </div>

          <div id="main">
            <form action="addtea.php" method="post">
              <h2>Add new tea to shop</h2>
              <input placeholder="Title" name="teaTitle" type="text"><br>
              <input placeholder="Price" name="teaPrice" type="text"><br>
              <input placeholder="Count" name="existingCount" type="text"><br>
              <select name="teaTypes_id">
              <option value="1">Oolong</option>
              <option value="2" >Puer</option>
              <option value="3">Green</option>
              <option value="4">White</option>
              <option value="5">Red</option>
            </select><br>
              <input value="Add NewTea" type="submit">
            </form>
          </div>

        </div>

        <div id="footer">
            Copyright &copy; 2021 Voldemar
        </div>
      </div>
    </body>
</html>
