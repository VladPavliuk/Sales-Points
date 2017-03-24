<?php

class UserController extends Controller
{
    public function showUserAccountPageAction()
    {
        if (isset($_SESSION["user_token"]))
        {
            $this->smarty->display('user/userAccountPage.tpl');
        } else {
            $this->showSignInPageAction();
        }
    }

    public function showSignInPageAction()
    {
        $this->smarty->display('user/userSignInPage.tpl');
    }

    public function signInAction()
    {
        $userModelObject = new User();

        $login = isset($_REQUEST["login"]) ? $_REQUEST["login"] : 'null';
        $login = trim($login);

        $password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : 'null';
        $password = trim($password);

        $userModelObject->signIn($login, $password);
    }

    public function showSignUpPageAction()
    {

    }

}