<?php
class OrderController extends Controller {
    public function showOrders() {
        $user = parent::getUser();

        $res = fRecordSet::build('Order',
            array('orders.uid=' => $user->getId()),
            array('orders.time' => 'desc')
        );
        require_once(__DIR__.'/../template/orders.php');
    }

    public function addOrder($desc, $addr, $phone) {
        if (isset($addr) && !empty($addr) && isset($phone) && !empty($phone)) {
            $user = parent::getUser();

            $order = new Order();
            $order->setUid($user->getId());
            $order->setDescription($desc);
            $order->setAddress($addr);
            $order->setPhone($phone);
            $order->setStatus(0);
            $order->store();
        }

        $app = Slim::getInstance();
        $app->redirect($app->urlFor('orders'));
    }
}
?>
