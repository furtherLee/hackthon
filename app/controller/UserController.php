<?php
class UserController extends Controller {
    public function showLogInPage(){
        require_once(__DIR__.'/../template/login.php');
    }

    public function showHomePage() {
        echo 'logged in as ' . parent::getUser()->getName();
    }

    private function checkCredentials($type, $user, $pass) {
        if (!isset($user) || !isset($pass))
            return false;

        $res = fRecordSet::build('User',
            array('users.email=' => $user, 'users.pass=' => md5($pass))
        );
        
        if (count($res) == 0)
            return false;

        if ($res[0]->getType() == $type)
            return $res[0]->getId();
        else {
            return false;
        }
    }

    function login($type, $user, $pass) {
        $id = $this->checkCredentials($type, $user, $pass);
        if ($type == 0) {
            $app = Slim::getInstance();
            if (false == $id) {
                $app->redirect($app->urlFor('user_login'));
            } else {
                fAuthorization::setUserAuthLevel('user');
                fAuthorization::setUserToken($id);
                $app->redirect($app->urlFor('base'));
            }
        } else {
            if (false == $id)
                $ret = array('status' => 'failed', 'reason' => 'Sign-in failed');
            else
                $ret = array('status' => 'ok', 'result' => array('id' => $id));
            Controller::ajaxReturn($ret);
        }
    }
}
?>
