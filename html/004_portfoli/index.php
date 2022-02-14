<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <title>Portfoli</title>
</head>
<body id="body" class="container-fluid p-0">
    <main>
      <nav id="1" class="d-flex flex-column flex-shrink-0 p-3 bg-light fixed-top fixed-top fixed-left" style="width: 20%; height: 100%; transition: 0.5s;">
          <div class="container-fluid">
            <a id="2" href="index.html" class="link-dark" style="text-decoration: none;"><h1>Portfoli</h1></a>
          </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li>
            <a href="index.php" onclick="page('index');" id="3" class="nav-link link-dark active"><svg class="bi me-2" width="16" height="16"></svg>Menu</a>
          </li>
          <li>
            <a href="./001_calculadora/calc.php" onclick="page('feines');" id="4" class="nav-link link-dark"><svg class="bi me-2" width="16" height="16"></svg>Feines</a>
          </li>
          <!-- <li>
            <a href="index.html" id="5" class="nav-link link-dark"><svg class="bi me-2" width="16" height="16"></svg>Products</a>
          </li>
          <li>
            <a href="index.html" id="6" class="nav-link link-dark"><svg class="bi me-2" width="16" height="16"></svg>Customers</a>
          </li> -->

        </ul>
        <hr>
          <i id="bt" class="fas fa-sun offset-11 fa-2x" onclick="color()"></i>
      </nav>
      <a id="7" class="fixed-bottom link-dark" onclick="moveNav();" style="font-size:30px; margin-left: 21%; margin-right: 77%; text-decoration: none; width: 2%;">☰</a> 
    </main>
    <!-- <script src="https://cdn.websitepolicies.io/lib/cookieconsent/1.0.3/cookieconsent.min.js" defer></script><script>window.addEventListener("load",function(){window.wpcc.init({"border":"thin","corners":"small","colors":{"popup":{"background":"#222222","text":"#ffffff","border":"#f9f9f9"},"button":{"background":"#f9f9f9","text":"#000000"}},"position":"bottom","content":{"href":"cookies.html","message":"This Cookies Policy explains what Cookies are and how We use them. You should read this policy so You can understand what type of cookies We use, or the information We collect using Cookies and how that information is used. This Cookies Policy has been created with the help of the Cookies Policy Generator.\nCookies do not typically contain any information that personally identifies a user, but personal information that we store about You may be linked to the information stored in and obtained from Cookies. For further information on how We use, store and keep your personal data secure, see our Privacy Policy.\nWe do not store sensitive personal information, such as mailing addresses, account passwords, etc. in the Cookies We use.","link":"cookies.php"}})});</script> -->
    <script type="text/javascript" src="script.js"></script>
</body>
</html>