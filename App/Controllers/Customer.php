<?php
namespace App\Controllers;

use App\Model\customerModel;
use Core\BaseController;

class Customer extends BaseController{
    public function Index(){
        $customerModel = new customerModel();
        
        $data['customers'] = $customerModel->getCustomers();

        echo $this->view->load('customer/index', compact('data'));
    }
    public function Add(){
        echo $this->view->load('customerAdd/index');
    }
    public function Save(){
        $data = $this->request->post();
        $customerModel = new customerModel();
        $access = $customerModel->customerAdd($data);
        if($access){
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('musteri')]);
        }else{
            return false;
        }
    }
    public function Edit($id){
        $data['update'] = $this->db->query("SELECT * FROM customer WHERE id='$id'");
        $data['id'] = $id;
        echo $this->view->load('customerEdit/index',compact('data'));
    }
    public function UpdateCustomer(){
        $data = $this->request->post();
        $updateCustomer = new customerModel();
        $access = $updateCustomer->updateCustomer($data);
        if($access){
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Değiştirildi';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('musteri')]);
        }else{
            $status = 'danger';
            $title = 'Başarısız';
            $msg = 'Değiştirilmedi';   
            
        }
        
    }
    public function Remove(){
        $data = $this->request->post();
        // $customerModel = new customerModel();
        // $access = $customerModel->removeCustomer($data);
        $customer = $this->db->query("DELETE FROM customer WHERE customer.id ='{$data['customer_id']}' ");
        if($customer){
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('musteri')]);
            return true;
        }else{
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('musteri')]);
            return false;
        }
    }
}