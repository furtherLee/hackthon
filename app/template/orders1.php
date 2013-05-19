<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>外卖哥 - 订单</title>
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

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }

      .form-horizontal .control-label {
        float: left;
        width: 110px; /* changed from 160px to 120px */
        padding-top: 5px;
        text-align: right;
      }

      .form-horizontal .controls {
        *display: inline-block;
        *padding-left: 20px;
        margin-left: 140px;  /* changed from 180px to 140px */
        *margin-left: 0;
      }

      .bs-docs-order {
        position: relative;
        margin: 15px 0;
        padding: 39px 19px 14px;
        background-color: white;
        border: 1px solid #DDD;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
      }

      .bs-docs-order::after {
        content: "未完成订单";
        position: absolute;
        top: -1px;
        left: -1px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: bold;
        background-color: whiteSmoke;
        border: 1px solid #DDD;
        color: #9DA0A4;
        -webkit-border-radius: 4px 0 4px 0;
        -moz-border-radius: 4px 0 4px 0;
        border-radius: 4px 0 4px 0;
      }

      .bs-docs-finishedorder {
        position: relative;
        margin: 15px 0;
        padding: 39px 19px 14px;
        background-color: white;
        border: 1px solid #DDD;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
      }

      .bs-docs-finishedorder::after {
        content: "已完成订单";
        position: absolute;
        top: -1px;
        left: -1px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: bold;
        background-color: whiteSmoke;
        border: 1px solid #DDD;
        color: #9DA0A4;
        -webkit-border-radius: 4px 0 4px 0;
        -moz-border-radius: 4px 0 4px 0;
        border-radius: 4px 0 4px 0;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

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
              <li class="active"><a href="#">点外卖</a></li>
              <li><a href="#onroad">未完成订单</a></li>
              <li><a href="#finished">已完成订单</a></li>
              <li><a href="../about/">关于我们</a></li>
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



      <div class="hero-unit">
        <h2>欢迎来到外卖哥</h2>
<?php
        echo "<p>你已经点了", count($res), "份外卖了哦，请再接再厉！</p>";
?>

        <!-- Button to trigger modal -->
        <a href="#neworder" role="button" class="btn" data-toggle="modal">再叫一份外卖</a>
     
        <!-- Modal -->
        <div id="neworder" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <h3 id="myModalLabel">新建订单</h3>
          </div>
          <div class="modal-body">
            <form id="modal-form" class="form-horizontal" method="post">
              <div class="control-group">
                <label class="control-label" for="description">订单描述</label>
                <div class="controls">
                  <input class="input-xlarge" type="text" id="description" name="description">
                </div>
              </div>
              <div class="control-group" for="address">
                <label class="control-label">送餐地址</label>
                <div class="controls">
                  <input class="input-xlarge" type="text" id="address" name="address">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="phone">联系电话</label>
                <div class="controls">
                  <input class="input-xlarge" type="text" id="phone" name="phone">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button id="modal-submit" class="btn" data-dismiss="modal" aria-hidden="true">提交</button>
          </div>
        </div>
      </div>

      <hr>

      <div class="row-fluid">
        <div class="span12">
          <a name="onroad"></a>
<?php
    if (count($res) == 0)
      echo "<h4>你还没有任何订单。</h4>";
    else {
      foreach ($res as $order) {
        if ($order->getStatus() < 2) {
        echo <<<c
        <form class="bs-docs-order form-inline">
        <div class="span6"><h5>订单编号：{$order->getId()}</h5></div><div class="span6"><h5>下单时间：{$order->getTime()}</h5></div>
        <p>订单描述：{$order->getDescription()}</p>
        <p>送餐地址：{$order->getAddress()}</p>
        <p>联系电话：{$order->getPhone()}</p>
        <a data-toggle="modal" class="btn" href="../order/{$order->getId()}" data-target="#myModal{$order->getId()}">查看详情</a>
        <div class="modal hide fade" id="myModal{$order->getId()}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">

            <h3 id="myModalLabel">订单详情</h3>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
        </div>
        </form>
c;
      }
      }
?>
      <a name="finished"></a>
<?php
      foreach ($res as $order) {
        if ($order->getStatus() == 2) {
        echo <<<c
        <form class="bs-docs-finishedorder form-inline">
        <div class="span6"><h5>订单编号：{$order->getId()}</h5></div><div class="span6"><h5>下单时间：{$order->getTime()}</h5></div>
        <p>订单描述：{$order->getDescription()}</p>
        <p>送餐地址：{$order->getAddress()}</p>
        <p>联系电话：{$order->getPhone()}</p>
        <a data-toggle="modal" class="btn" href="../order/{$order->getId()}" data-target="#myModal{$order->getId()}">查看详情</a>
        <div class="modal hide fade" id="myModal{$order->getId()}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <h3 id="myModalLabel">订单详情</h3>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>

        </div>
        </form>
c;
      }
      }
    }
?>
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
    <script type="text/javascript">
      $('#modal-submit').on('click', function(e){
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();

        // Find form and submit it
        $('#modal-form').submit();
      });
    </script>
    <script type="text/javascript">
      $('#model-view').on('click', function(e){
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();

        // Find form and submit it
      });
    </script>
  </body>
</html>
