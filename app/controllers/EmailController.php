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
        if ($this->cartModel->getTotalAmount() > 0) {
            $this->customerFirstName = $_POST["customerFirstName"];
            $this->customerSecondName = $_POST["customerSecondName"];
            $this->customerEmail = $_POST["customerEmail"];
            $this->customerMobile = $_POST["customerMobile"];
            $this->customerOrderList = $this->getOrderList();

            $this->customerTotalOrderPrice = $this->cartModel->getTotalPrice();
            $this->customerTotalAmount = $this->cartModel->getTotalAmount();
            $this->checkInCustomer();
            $this->sendEmail();

        } else {
            Router::redirectTo("order-form");
        }
    }

    private function getOrderList()
    {
        return $this->cartModel->getCartForRendering();
    }

    private function sendEmail()
    {
        $this->emailModel->customerFirstName = $this->customerFirstName;
        $this->emailModel->customerLastName = $this->customerSecondName;
        $this->emailModel->customerEmail = $this->customerEmail;
        $this->emailModel->customerMobile = $this->customerMobile;
        $this->emailModel->customerOrderList = $this->customerOrderList;
        $this->emailModel->customerTotalOrderPrice = $this->customerTotalOrderPrice;
        $this->emailModel->customerTotalAmount = $this->customerTotalAmount;

        $this->emailModel->sendEmail($this->smarty);
    }

    private function checkInCustomer()
    {
        $this->emailModel->customerFirstName = $this->customerFirstName;
        $this->emailModel->customerLastName = $this->customerSecondName;
        $this->emailModel->customerEmail = $this->customerEmail;
        $this->emailModel->customerMobile = $this->customerMobile;
        $this->emailModel->customerOrderList = $this->customerOrderList;
        $this->emailModel->customerTotalOrderPrice = $this->customerTotalOrderPrice;

        $this->emailModel->checkInCustomer();
    }
}