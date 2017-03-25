<?php

class adminMiddleware
{
    /**
     * Check if token exists and matches with token in data base table.
     *
     */
    public function __construct()
    {
        $adminToken = isset($_SESSION["admin_token"]) ? $_SESSION["admin_token"] : null;

        $this->checkIfTokenVariableExists($adminToken);
        $this->checkIfAdminTokenMatches($adminToken);
    }

    /**
     * Check if session token variable exists.
     *
     * @param $adminToken
     */
    private function checkIfTokenVariableExists($adminToken)
    {
        if (!$adminToken) {
            Router::redirectTo("user/sign-in");
        }
    }

    /**
     * Check if session token variable matches with token in data base table.
     *
     * @param $adminToken
     */
    private function checkIfAdminTokenMatches($adminToken)
    {
        $userModel = new User();
        $isTokenMatches = $userModel->checkIfAdminTokenMatches($adminToken);

        if(!$isTokenMatches) {
            Router::redirectTo("user/sign-in");
        }
    }
}