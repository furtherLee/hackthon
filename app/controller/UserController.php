<?php

class UserController extends Controller {
    public function showLogInPage(){
        require_once(__DIR__.'/../template/login.php');
    }

    public function showHomePage() {
        echo 'logged in as ' . parent::getUser()->getName();
    }

    private function showAdminPage() {
        // TODO
    }

    private function showDashBoard() {
        // TODO
    }

    function login($type, $user, $pass) {
        if (!isset($user) || !isset($pass))
            return false;

        $res = fRecordSet::build('User',
            array('users.email=' => $user, 'users.pass=' => md5($pass))
        );

        if (count($res) == 0)
            return false;

        if ($res[0]->getType() == $type)
            return $res[0]->getId();
        else
            return false;
    }
}
