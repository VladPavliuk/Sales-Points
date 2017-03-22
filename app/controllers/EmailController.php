<?php

class EmailController extends Controller
{
    private $customerFirstName = "";
    private $customerSecondName = "";
    private $customerEmail = "";
    private $customerMobile = "";
    private $customerOrderList = "";
    private $customerTotalOrderPrice = 0;
    private $customerTotalAmount = 0;

    public function confirmOrderAction()
    {
        $cartObject = new Cart();

        if ($cartObject->getTotalPrice() > 0) {
            $this->customerFirstName = $_POST["customerFirstName"];
            $this->customerSecondName = $_POST["customerSecondName"];
            $this->customerEmail = $_POST["customerEmail"];
            $this->customerMobile = $_POST["customerMobile"];
            $this->customerOrderList = $this->getOrderList();

            $this->customerTotalOrderPrice = $cartObject->getTotalPrice();
            $this->customerTotalAmount = $cartObject->getTotalAmount();
            $this->checkInCustomer();
            $this->sendEmail();

        } else {
            header('Location: http://www.vladdev.com/');
        }
    }

    private function getOrderList()
    {
        $cartModelObject = new Cart();
        return $cartModelObject->getCartForRendering();
    }

    private function sendEmail()
    {
        $emailModelObject = new Email();

        $emailModelObject->customerFirstName = $this->customerFirstName;
        $emailModelObject->customerLastName = $this->customerSecondName;
        $emailModelObject->customerEmail = $this->customerEmail;
        $emailModelObject->customerMobile = $this->customerMobile;
        $emailModelObject->customerOrderList = $this->customerOrderList;
        $emailModelObject->customerTotalOrderPrice = $this->customerTotalOrderPrice;
        $emailModelObject->customerTotalAmount = $this->customerTotalAmount;

        $emailModelObject->sendEmail($this->smarty);
    }

    private function checkInCustomer()
    {
        $emailModelObject = new Email();

        $emailModelObject->customerFirstName = $this->customerFirstName;
        $emailModelObject->customerLastName = $this->customerSecondName;
        $emailModelObject->customerEmail = $this->customerEmail;
        $emailModelObject->customerMobile = $this->customerMobile;
        $emailModelObject->customerOrderList = $this->customerOrderList;
        $emailModelObject->customerTotalOrderPrice = $this->customerTotalOrderPrice;

        $emailModelObject->checkInCustomer();
    }
}