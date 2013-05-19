<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>外卖哥 - 关于我们</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">外卖哥</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="../orders/">点外卖</a></li>
              <li><a href="../orders/#onroad">未完成订单</a></li>
              <li><a href="../orders/#finished">已完成订单</a></li>
              <li class="active"><a href="#">关于我们</a></li>
            </ul>
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getName(); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/hackthon/user/logout">Logout</a></li>
                </ul>
              </li>
            </ul>            

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-narrow">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h2>欢迎来到外卖哥</h2>
        <p>外卖哥是一个外卖递送辅助网站。如果您总是为不能按时到达的外卖而烦恼，那么我们就是你所需要的。我们能帮助您了解外卖的递送情况，以方便您估计外卖送达的时间。</p>
      </div>

      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span6">
          <h3>Website Repo</h3>
          <a href="#" class="thumbnail">
            <img style="width: 200px; height: 200px;" src="../assets/img/github.jpg" alt="">
          </a>
        </div>
        <div class="span6">
          <h3>Android Repo</h3>
          <a href="#" class="thumbnail">
            <img style="width: 200px; height: 200px;" src="../assets/img/github-android.jpg" alt="">
          </a>
       </div>

      </div>

      <hr>
        <h3>技术列表：</h3>
        <div class="row-fluid">
          <div class="span3">
            <h5>Android</h5>
            <a href="#" class="thumbnail">
              <img alt="100x100" style="width: 100px; height: 100px;" src="../assets/img/android.jpg">
            </a>
          </div>
          <div class="span3">
            <h5>描述：</h5>
            <p>ADT手机开发套件。</p>
          </div>

          <div class="span3 pull-right">
            <h5>描述：</h5>
            <p>Web前端UI框架。</p>
          </div>
          <div class="span3 pull-right">
            <h5>Bootstrap</h5>
            <a href="#" class="thumbnail">
              <img alt="100x100" style="width: 100px; height: 100px;" src="../assets/img/bootstrap.png">
            </a>
          </div>

        </div>
        <div class="row-fluid">
          <div class="span3">
            <h5>jQuery</h5>
            <a href="#" class="thumbnail">
              <img alt="100x100" style="width: 100px; height: 100px;" src="../assets/img/jquery.png">
            </a>
          </div>
          <div class="span3">
            <h5>描述：</h5>
            <p>跨浏览器的JavaScript函数库。</p>
          </div>

          <div class="span3 pull-right">
            <h5>描述：</h5>
            <p>PHP Web应用快速开发环境。</p>
          </div>
          <div class="span3 pull-right">
            <h5>PHP-MYSQL-APACHE</h5>
            <a href="#" class="thumbnail">
              <img alt="100x100" style="width: 100px; height: 100px;" src="../assets/img/php-mysql-apache.png">
            </a>
          </div>

        </div>

        <div class="row-fluid">
          <div class="span3">
            <h5>Flourish</h5>
            <a href="#" class="thumbnail">
              <img alt="100x100" style="width: 100px; height: 100px;" src="../assets/img/flourish.png">
            </a>
          </div>
          <div class="span3">
            <h5>描述：</h5>
            <p>拿来即用的PHP函数库。</p>
          </div>

          <div class="span3 pull-right">
            <h5>描述：</h5>
            <p>PHP微框架，提供路由等功能。</p>
          </div>
          <div class="span3 pull-right">
            <h5>Slim</h5>
            <a href="#" class="thumbnail">
              <img alt="100x100" style="width: 100px; height: 100px;" src="../assets/img/slim.png">
            </a>
          </div>

        </div>
      <hr>

    <?php
      require_once(__DIR__.'/../template/footer.php');
    ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

  </body>
</html>
