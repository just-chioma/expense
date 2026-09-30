<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>
  <style>
  html, body {
    height: 100%;
    margin: 0px;
  }
  body{
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }
  .header {
    background-color: black;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .logo {
    color: white;
    font-size: 24px;
    font-weight: bold;
  }
  main{
   flex: 1;
  }

  .footer{
   color: white;
   text-align: center;
   padding: 15px;
   width: 100%;
   background-color: black;
 }
 .link {
  color: white;
  text-decoration: none;
  margin-left: 20px;
  font-size: 16px;
 }
  </style>
</head>
<body>
  <div class="header">
    <div class="logo">
    Expense Tracker
    </div>

    <div class="nav-links">
      <a href="" class="link">Home</a>
      <a href="" class="link">Services</a>
      <a href="" class="link">About</a>
      <a href="" class="link">Contact</a>
    </div>
  </div>

  <main>
   @yield('content')
  </main>

    <div class="footer">

        <p>
            &copy; 2026 
        </p>

    </div>

</body>
</html>
 