<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function list()
    {
        $obj = new Customer();
        $customers = $obj->all();

        $template = 'customers';
        $data = [
            'title' => 'Customers',
            'items' => $customers
        ];

        $output = $this->render($template, $data);

        return $output;
    }

    public function single($id)
    {
        $obj = new Customer();
        $customer = $obj->getCustomers($id); 

        $template = 'single-customers';
        $data = [
            'title' => 'Customer',
            'customers' => $customer
        ];

        $output = $this->render($template, $data);

        return $output;
    }

    public function update($id)
    {
        $obj = new Customer();
        $customer = $obj->getCustomers($id);
        $customer->fill($_POST);
        $result = $customer->update();

        $template = 'single-customers';
        $data = [
            'title' => 'Customer',
            'customer' => $customer
        ];

        $output = $this->render($template, $data);

        return $output;
    }
}
