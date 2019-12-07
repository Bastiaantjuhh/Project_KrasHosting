<?php
interface Login {
    public function doLogin($username, $password);
    public function resetIncorrectPassCount($username);
    public function incorrectLogin($username);
    public function correctLogin($username);
    public function suspendedAccount($username);
    public function suspendedCheck($username);
    public function showLogin();
}
?>