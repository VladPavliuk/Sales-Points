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

        $this->checkIfSessionVariableExists($adminToken);
        $this->checkIfAdminTokenMatches($adminToken);
    }

    private function checkIfSessionVariableExists($adminToken)
    {
        if (!$adminToken) {
            Router::redirectTo("user/sign-in");
        }
    }

    private function checkIfAdminTokenMatches($adminToken)
    {
        $userModel = new User();
        $isTokenMatches = $userModel->checkIfAdminTokenMatches($adminToken);

        if(!$isTokenMatches) {
            Router::redirectTo("user/sign-in");
        }
    }
}