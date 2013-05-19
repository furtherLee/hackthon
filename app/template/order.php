<html>
    <head>
        <title>Order detail</title>
    </head>
    <body>
<?php
    if ($order->getStatus() == 2)
        $status = 'Delivered';
    else if ($order->getStatus() == 1)
        $status = 'Delivering';
    else
        $status = 'Pending';

    echo <<<c
        <p>Id: {$order->getId()}</p>
        <p>Status: {$status}</p>
        <p>Address: {$order->getAddress()}</p>
c;
    if (count($orderList) > 0) {
        echo '<ul>';
        foreach ($orderList as $o) {
            echo '<li>' . $o['address'];
            if ($o['id'] == $order->getId())
                echo ' (me)';
            else {
                if ($o['status'] == 2)
                    echo ' (delivered)';
                else
                    echo ' (delivering)';
            }
            echo '</li>';
        }
        echo '</ul>';
    }
?>
    </body>
</html>
