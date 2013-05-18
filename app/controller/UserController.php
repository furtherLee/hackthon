<?php

class UserController extends Controller {

    public function showLogInPage(){
        // TODO
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
}

