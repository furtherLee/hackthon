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

    public function pull($uid) {
        $user = new User($uid);
        if ($user->getType() == 0)
            $ret = array('status' => 'failed', 'reason' => 'Invalid deliverer token');
        else {
            $db = fORMDatabase::retrieve();
            $statement = $db->prepare("select o.gid from orders as o inner join groups as g on o.gid = g.id where o.status = 1 and g.uid = %i");
            $res = $db->query($statement, $user->getId());

            if ($res->countReturnedRows() == 0)
                $gid = $this->newGroup($uid);
            else
                $gid = $res->fetchScalar();

            $ret = $this->getOrderList($gid);
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
                $status = 'Finished';
            else
                $status = 'Pending';
            array_push($ret, array('id' => $order->getId(),
                'time' => $order->getTime()->format('c'),
                'description' => $order->getDescription(),
                'address' => $order->getAddress(),
                'phone' => $order->getPhone(),
                'name' => parent::getUser($order->getUid())->getName(),
                'status' => $status));
        }
        return $ret;
    }
}
?>