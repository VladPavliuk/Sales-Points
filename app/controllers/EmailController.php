<?php

class EmailController extends Controller
{
    private $customerFirstName = "";
    private $customerSecondName = "";
    private $customerEmail = "";
    private $customerMobile = "";
    private $customerOrderList = "";
    private $customerTotalOrderPrice = 0;

    public function confirmOrderAction()
    {
        if ($this->getTotalPrice() > 0) {
            $this->customerFirstName = $_POST["customerFirstName"];
            $this->customerSecondName = $_POST["customerSecondName"];
            $this->customerEmail = $_POST["customerEmail"];
            $this->customerMobile = $_POST["customerMobile"];
            $this->customerOrderList = $this->getOrderList();
            $this->customerTotalOrderPrice = $this->getTotalPrice();
            $this->checkInCustomer();
            $this->sendEmail();

        } else {
            header('Location: http://www.vladdev.com/');
        }
    }

    private function getOrderList()
    {
        if (isset($_SESSION["cart"])) {
            $orderList = $_SESSION["cart"];

            return $orderList;
        } else {
            Debug::showErrorPage("Ваш кошик порожній");
        }
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

        $emailModelObject->sendEmail();
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