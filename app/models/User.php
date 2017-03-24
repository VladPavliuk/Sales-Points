<?php

class User extends Model
{

    public function signIn($login, $password)
    {
        $password = md5($password);

        if ($this->checkIfUserIsAdmin($login, $password)) {
            $this->setAdminTokenToDB($login, $password);

            return "admin";
        } else {
            return "user";
        }
    }

    public function checkIfAdminTokenMatches($adminToken)
    {
        $sqlQuery = "SELECT * FROM `admins` WHERE `token` = '{$adminToken}'";

        $queryResult = $this->dataBase->query($sqlQuery);

        if ($queryResult->fetch()) {

            return true;
        }

        return false;
    }

    /**
     * Return true if user is admin.
     * Return false if user is not admin.
     *
     * @param $login
     * @param $password
     * @return bool
     */
    private function checkIfUserIsAdmin($login, $password)
    {
        $sqlQuery = "SELECT * FROM `admins` WHERE (`nickname` = '{$login}' AND `password` = '{$password}')";

        $queryResult = $this->dataBase->query($sqlQuery);

        if ($queryResult->fetch()) {
            return true;
        }

        return false;
    }

    /**
     * Insert session token to admins table.
     *
     * @param $login
     * @param $password
     */
    private function setAdminTokenToDB($login, $password)
    {
        $adminToken = $this->generateToken();

        $sqlQuery = "UPDATE `admins` SET `token` = '{$adminToken}' WHERE (`nickname` = '{$login}' AND `password` = '{$password}')";

        $this->dataBase->query($sqlQuery);

        $this->setAdminTokenToSession($adminToken);
    }

    /**
     * Generate Session token.
     *
     * @return string
     */
    private function generateToken()
    {
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        return $token;
    }

    /**
     * Create session admin token variable.
     *
     * @param $adminToken
     */
    private function setAdminTokenToSession($adminToken)
    {
        $_SESSION["admin_token"] = $adminToken;
    }
}