<?php

class Email extends Model
{
    public $customerFirstName = "";
    public $customerLastName = "";
    public $customerEmail = "";
    public $customerMobile = "";
    public $customerOrderList = "";
    public $customerTotalOrderPrice = 0;
    public $customerTotalAmount = 0;

    private $emailHeaders = "";
    private $emailSubject = "Internet shop Sales Point";
    private $emailBody = "";

    public function checkInCustomer()
    {
        $this->validData();
        $this->insertCustomerIntoDataBaseTable();
    }

    public function sendEmail($smartyObject)
    {
        $this->validData();

        $this->formEmailHeader();
        $this->formEmailBody($smartyObject);

        mail($this->customerEmail, $this->emailSubject, $this->emailBody, $this->emailHeaders);
        mail(EMAIL_ADMIN, $this->emailSubject, $this->emailBody, $this->emailHeaders);

        session_unset();
        header('Location: http://www.vladdev.com/');
    }

    private function validData()
    {
        $this->stringValidator($this->customerFirstName);
        $this->stringValidator($this->customerLastName);
        $this->emailValidator($this->customerEmail);
        $this->stringValidator($this->customerMobile);
        $this->encodeArrayToJSON($this->customerOrderList);
    }

    private function formEmailHeader()
    {
        $this->emailHeaders = "MIME-Version: 1.0" . "\r\n";
        $this->emailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $this->emailHeaders .= "From: Sale Point <sale.point@gmail.com>" . "\r\n";
    }

    private function formEmailBody($smartyObject)
    {
        $cartModelObject = new Cart();
        $smartyObject->assign('cart', $cartModelObject->getCartForRendering());

        $smartyObject->assign('firstName', $this->customerFirstName);
        $smartyObject->assign('lastName', $this->customerLastName);
        $smartyObject->assign('email', $this->customerEmail);
        $smartyObject->assign('mobile', $this->customerMobile);
        $smartyObject->assign('totalOrderPrice', $this->customerTotalOrderPrice);
        $smartyObject->assign('totalAmount', $this->customerTotalAmount);

        $this->emailBody = $smartyObject->fetch('layouts/email.tpl');
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

    private function encodeArrayToJSON(&$encodingArray)
    {
        $encodingArray = json_encode($encodingArray);
    }

}