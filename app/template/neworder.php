<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/hackthon/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/hackthon/assets/css/bootstrap-responsive.css" rel="stylesheet">

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



    <form class="form-horizontal" method="post">
          <div class="control-group">
            <label class="control-label" for="description">订单描述</label>
            <div class="controls">
              <input class="input-xxlarge" type="text" id="description" name="description">
            </div>
          </div>
          <div class="control-group" for="address">
            <label class="control-label">送餐地址</label>
            <div class="controls">
              <input class="input-xxlarge" type="text" id="address" name="address">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="phone">联系电话</label>
            <div class="controls">
              <input class="input-xxlarge" type="text" id="phone" name="phone">
            </div>
          </div>
          <button type="submit" class="btn">提交</button>
    </form>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/hackthon/assets/js/jquery.js"></script>
    <script src="/hackthon/assets/js/bootstrap.js"></script>

  </body>
</html>
