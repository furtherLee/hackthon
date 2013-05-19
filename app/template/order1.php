<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../../assets/css/bootstrap-responsive.css" rel="stylesheet">


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



      <table class="table">
<?php
      if (count($orderList) > 0) {
        foreach ($orderList as $o) {
            if ($o['id'] == $order->getId()) {
                echo "<tr>";
                echo "<td>", $o['address'], "</td>";
                echo "<td>", "您自己", "</td>";
                echo "</tr>";
            } else {
                if ($o['status'] == 'sent') {
                    echo "<tr class=\"success\">";
                    echo "<td>", $o['address'], "</td>";
                    echo "<td>", "已送达", "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr class=\"warning\">";
                    echo "<td>", $o['address'] , "</td>";
                    echo "<td>", "请稍后", "</td>";
                    echo "</tr>";
                }
            }
        }
      }   
?>
      </table>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>


  </body>
</html>
