<?php

class UserController extends Controller {
    public function showLogInPage(){
        require_once(__DIR__.'/../template/login.php');
    }

    public function showHomePage() {
        $res = fRecordSet::build('User',
            array('users.email=' => 'user1@user1')
        );

        foreach ($res as $record) {
            echo $record->getEmail();
        }
    }

    private function showAdminPage() {
        // TODO
    }

    private function showDashBoard() {
        // TODO
    }

    private function login($user, $pass) {
    }
}
