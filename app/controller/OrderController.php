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

    public function showOrder($oid) {
        $user = parent::getUser();

        $fail = false;
        try {
            $order = new Order($oid);
            if ($order->getUid() != $user->getId())
                $fail = true;
            else {
                $orderList = array();
                $gid = $order->getGid();
                if (isset($gid))
                    $orderList = $this->getOrderList($gid);
            }
        } catch (fExpectedException $e) {
            $fail = true;
        }

        $app = Slim::getInstance();
        if ($fail)
            $app->redirect($app->urlFor('orders'));
        else
            require_once(__DIR__.'/../template/order.php');
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

    public function pull($token) {
        $user = parent::getUserFromToken($token);
        if (!isset($user) || $user->getType() == 0)
            $ret = array('status' => 'failed', 'reason' => 'Invalid deliverer token');
        else {
            $db = fORMDatabase::retrieve();
            $statement = $db->prepare("select o.gid from orders as o inner join groups as g on o.gid = g.id where o.status = 1 and g.uid = %i");
            $res = $db->query($statement, $user->getId());

            if ($res->countReturnedRows() == 0)
                $gid = $this->newGroup($user->getId());
            else
                $gid = $res->fetchScalar();

            $ret = array('status' => 'ok', 'result' => $this->getOrderList($gid));

        }
        Controller::ajaxReturn($ret);
    }

    private function newGroup($uid) {
        $group = new Group();
        $group->setUid($uid);
        $group->store();

        $res = fRecordSet::build('Order',
            array('orders.status=' => 0)
        );

        foreach ($res as $order) {
            $order->setStatus(1);
            $order->setGid($group->getId());
            $order->store();
        }

        return $group->getId();
    }

    private function getOrderList($gid) {
        $res = fRecordSet::build('Order',
            array('orders.gid=' => $gid)
        );

        $ret = array();
        foreach ($res as $order) {
            if ($order->getStatus() == 2)
                $status = 'sent';
            else
                $status = 'pending';
            $u = new User($order->getUid());
            $name = $u->getName();
            array_push($ret, array('id' => $order->getId(),
                'time' => $order->getTime()->format('c'),
                'description' => $order->getDescription(),
                'address' => $order->getAddress(),
                'phone' => $order->getPhone(),
                'name' => $name,
                'status' => $status,
                'gid' => $gid));
        }
        return $ret;
    }

    public function confirm($token, $oid) {
        $user = parent::getUserFromToken($token);
        if (!isset($user) || $user->getType() == 0)
            $ret = array('status' => 'failed', 'reason' => 'Invalid deliverer token');
        else {
            try {
                $order = new Order($oid);

                $res = fRecordSet::build('Group',
                    array('groups.id=' => $order->getGid())
                );

                if ($res[0]->getUid() != $user->getId())
                    $ret = array('status' => 'failed', 'reason' => 'You are not responsible for that order');
                else {
                    if ($order->getStatus() == 2)
                        $ret = array('status' => 'failed', 'reason' => 'That order has already been delivered');
                    else {
                        $order->setStatus(2);
                        $order->store();
                        $ret = array('status' => 'ok');
                    }
                }
            } catch (fExpectedException $e) {
                $ret = array('status' => 'failed', 'reason' => 'Invalid order id');
            }
        }

        Controller::ajaxReturn($ret);
    }
}
?>
