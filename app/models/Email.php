<?php

class Email extends Model
{
    public $customerFirstName = "";
    public $customerLastName = "";
    public $customerEmail = "";
    public $customerMobile = "";
    public $customerOrderList = "";
    public $customerTotalOrderPrice = 0;

    private $emailHeaders = "";
    private $emailSubject = "Internet shop Sales Point";
    private $emailBody = "";

    public function checkInCustomer()
    {
        $this->validData();
        $this->insertCustomerIntoDataBaseTable();
    }

    public function sendEmail()
    {
        $this->validData();

        $this->formEmailHeader();
        $this->formEmailBody();
        echo 'yea';

        mail($this->customerEmail, $this->emailSubject, $this->emailBody, $this->emailHeaders);
        mail(EMAIL_ADMIN, $this->emailSubject, $this->emailBody, $this->emailHeaders);

        session_unset();
    }

    private function validData()
    {
        $this->stringValidator($this->customerFirstName);
        $this->stringValidator($this->customerLastName);
        $this->emailValidator($this->customerEmail);
        $this->stringValidator($this->customerMobile);
        $this->encodeArrayToJSON($this->customerOrderList);
        $this->floatNumberValidator($this->customerTotalOrderPrice);
    }

    private function formEmailHeader()
    {
        $this->emailHeaders = "MIME-Version: 1.0" . "\r\n";
        $this->emailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $this->emailHeaders .= "From: Sale Point <sale.point@gmail.com>" . "\r\n";
    }

    private function formEmailBody()
    {
        //> Smarty initialization.
        $smarty = SmartyRun::connect();
        //<

        $smarty->assign('cart', $_SESSION['cart']);

        $smarty->assign('firstName', $this->customerFirstName);
        $smarty->assign('lastName', $this->customerLastName);
        $smarty->assign('email', $this->customerEmail);
        $smarty->assign('mobile', $this->customerMobile);
        $smarty->assign('totalOrderPrice ', $this->customerTotalOrderPrice);

        $this->emailBody = $smarty->fetch('layouts/email.tpl');
    }

    private function insertCustomerIntoDataBaseTable()
    {
        $sqlQuery = "INSERT INTO `customers` 
                      (
                      `customer_first_name`, 
                      `customer_second_name`, 
                      `customer_email`, 
                      `customer_mobile`, 
                      `customer_order_list`,
                      `customer_total_order_price`
                      ) 
                      VALUES 
                      (
                      '{$this->customerFirstName}',
                      '{$this->customerLastName}',
                      '{$this->customerEmail}',
                      '{$this->customerMobile}',
                      '{$this->customerOrderList}',
                      '{$this->customerTotalOrderPrice}'
                      )";

        $this->dataBase->query($sqlQuery);
    }

    private function emailValidator(&$email)
    {
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    private function stringValidator(&$stringForValidation)
    {
        $stringForValidation = trim($stringForValidation);
        $stringForValidation = (string)$stringForValidation;
        $stringForValidation = substr($stringForValidation, 0, 50);
        $stringForValidation = filter_var($stringForValidation, FILTER_SANITIZE_STRING);
    }

    private function floatNumberValidator(&$floatNumber)
    {
        $floatNumber = substr($floatNumber, 0, 50);
        $floatNumber = filter_var($floatNumber, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    private function encodeArrayToJSON(&$encodingArray)
    {
        $encodingArray = json_encode($encodingArray);
    }

}