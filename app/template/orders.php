<html>
    <head>
        <title>Orders</title>
    </head>
    <body>
        <div>
            <h2>My orders</h2>
<?php
    $app = Slim::getInstance();
    if (count($res) == 0)
        echo "You don't have any orders yet.";
    else {
        echo '<ul>';
            foreach ($res as $order) {
                if ($order->getStatus() == 2)
                    $status = 'Delivered';
                else if ($order->getStatus() == 1)
                    $status = 'Delivering';
                else
                    $status = 'Pending';
                $link = $app->urlFor('order', array('oid' => $order->getId()));
                echo <<<c
                <p>ID: <a href="{$link}">{$order->getId()}</a>, {$order->getTime()}</p>
                <p>Status: {$status}</p>
                <p>{$order->getDescription()}</p>
                <p>{$order->getAddress()}</p>
                <p>{$order->getPhone()}</p>
c;
            }
        echo '</ul>';
    }
?>
        </div>
        <div>
            <h2>Create new order</h2>
            <form method="post">
                <p><label for="description">Description: </label><input id="description" type="text" name="description" /></p>
                <p><label for="address">Address: </label><input id="address" type="text" name="address" /></p>
                <p><label for="phone">Phone: </label><input id="phone" type="text" name="phone" /></p>
                <input type="submit" value="Submit" />
            </form>
        </div>
    </body>
</html>
