<?php
declare(strict_types=1);

namespace App\Controller\Client;

use Cake\Utility\Text;
use Cake\Mailer\TransportFactory;
use Cake\Mailer\Mailer;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use App\Controller\Client\AppController;

class UsersController extends AppController
{
    
    
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user_arr = $this->request->getData();
            $user_arr['id'] = Text::uuid();
            $user_arr['is_admin'] = 0;
            // dd($user_arr);
            $user = $this->Users->patchEntity($user,$user_arr);
            if ($this->Users->save($user)) {
                return $this->redirect('/client/login');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set('user', $user);
    }

    public function login()
    {
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                if($user['active'] == 0)
                {
                    $this->Flash->error("You have not access permission !");
                    return $this->redirect('/client');
                }
                return $this->redirect('/client/login');
            }else {
                $this->Flash->error("Incorrect username or password !");
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    public function send_mail()
    {
        if ($this->request->is('post')) {
            $email_req = $this->request->getData();
            $user = $this->getTableLocator()->get('Users')->find()->where($email_req)->first();
            if($user){
                $token = Text::uuid();
                $user_arr['token_forgot_password'] = $token;
                $user = $this->Users->patchEntity($user, $user_arr);
                $this->Users->save($user);
                $mailer = new Mailer('default');
                $mailer->setFrom(['smilehome.hachinet@gmail.com' => 'Ha Trang'])
                        ->setTo($user->email)
                        ->setSubject('Forgot Pass')
                        ->deliver('http://cakephp.local:81/client/do_forgot_pass?token='.$token);
                        $this->Flash->success("A link has been sent to your email, please check your email");

            }else{
                $this->Flash->error("This account does not exist on the system !");
            }
        }
    }

    public function forgot_pass()
    {
        $token = $_GET['token'];
        $user = $this->getTableLocator()->get('Users')->find()->where(['token_forgot_password'=>$token])->first();
        if ($this->request->is('post') && $user) {
            $pass = $this->request->getData();
            $user = $this->Users->patchEntity($user, $pass);
            if ($this->Users->save($user)) {
                return $this->redirect('/client');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

    public function cart()
    {
        $id_user = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $order_detail = $this->request->getData();
            // dd($order_detail);
            $check_order = $this->getTableLocator()->get('Orders')->find()->contain(['OrderDetails'])->where(['user_id'=>$id_user])->where(['status'=> 0])->first();
            // dd(1);
            $price = $this->getTableLocator()->get('ProductDetails')->find()->where(['id'=>$order_detail['product_detail_id']])->first()->price;
            if(!$check_order){
                $total = $price * $order_detail['quantity'];
                $order_id = $this->createOrder($id_user, $total);
                // dd($order);
                $order_detail['order_id'] = $order_id;
                $order_detail['price'] = $total;
                $this->addProduct($order_detail);
            }else{
                $check = $this->getTableLocator()->get('OrderDetails')->find()->where(['product_detail_id'=>$order_detail['product_detail_id']])->first();
                if($check){
                    $quantity = $check->quantity + $order_detail['quantity'];
                    $total = $price * $quantity;

                    $orderDetailsTable = TableRegistry::getTableLocator()->get('OrderDetails');
                    $check = $orderDetailsTable->patchEntity($check,  ['quantity' => $quantity, 'price' => $total]);
                    $orderDetailsTable->save($check);
                    $total_price_variant = 0;
                    foreach($check_order->order_details as $value ){
                        if($value->product_detail_id != $order_detail['product_detail_id']){
                            $total_price_variant += $value->price;
                        }
                    }
                    $ordersTable = TableRegistry::getTableLocator()->get('Orders');
                    $check_order = $ordersTable->patchEntity($check_order,  ['total_price'=> $total + $total_price_variant]);
                    $ordersTable->save($check_order);

                }else{
                    $order_detail['price'] = $price * $order_detail['quantity'];
                    $order_detail['order_id'] = $check_order->id;
                    $order_detail['id'] = Text::uuid();
                    $this->getTableLocator()->get('OrderDetails')->query()->insert(['price','order_id','id','product_detail_id','quantity'])
                        ->values($order_detail)
                        ->execute();
                    $total_price_variant = 0;
                    foreach($check_order->order_details as $value ){
                        $total_price_variant += $value->price;
                    }
                    $ordersTable = TableRegistry::getTableLocator()->get('Orders');
                    $check_order = $ordersTable->patchEntity($check_order,  ['total_price'=> $total_price_variant]);
                    $ordersTable->save($check_order);
                }
                
            }
            return $this->redirect('/client/get_cart');
        }
    }

    protected function createOrder($id_user, $total_price)
    {
        $order_id = Text::uuid();
        $this->getTableLocator()->get('Orders')->query()->insert(['user_id', 'status', 'total_price','id'])
                        ->values(['user_id'=> $id_user, 'status'=>0, 'total_price' => $total_price,'id'=>$order_id])
                        ->execute();
        return $order_id;
    }

    protected function addProduct($order_detail)
    {
        $order_detail['id'] = Text::uuid();
        $item = $this->getTableLocator()->get('OrderDetails')->query()->insert(['order_id', 'price','id','product_detail_id','quantity'])
                        ->values($order_detail)
                        ->execute();
        return $item;
    
    }

    public function get_cart()
    {
        $id_user = $this->Auth->user('id');
        $data= $this->getTableLocator()->get('Orders')->find()->contain(['OrderDetails.ProductDetails.AttributeProducts.Attributes'])->where(['user_id'=>$id_user])->first();
        $product_id_arr = [];
        foreach($data->order_details as $order_detail){
            $product_id_arr[] = $order_detail->product_detail->product_id; 
        }
        $products = $this->getTableLocator()->get('Products')->find()->where(['id IN'=>$product_id_arr])->all();
        // dd($product);
        $this->set(compact('id_user','data','products'));
    }

    public function update_product()
    {
        $order_detail = $this->request->getData('order_detail');
        $order_id = $this->request->getData('order_id');
        // dd($order_id);
        foreach($order_detail as $key=>$value){
            $number_product = $this->getTableLocator()->get('ProductDetails')->find()->where(['id'=> $key])->first()->quantity - $value;
            // dd($number_product);
            $product_details = $this->getTableLocator()->get('ProductDetails')->find()->where(['id'=> $key])->first();
            $productDetailsTable = TableRegistry::getTableLocator()->get('ProductDetails');
            $product_details = $productDetailsTable->patchEntity($product_details,  ['quantity'=>$number_product]);
            $productDetailsTable->save($product_details);

        }

        $order = $this->getTableLocator()->get('Orders')->find()->where(['id'=> $order_id])->first();
        $ordersTable = TableRegistry::getTableLocator()->get('Orders');
        $order = $ordersTable->patchEntity($order,['status'=>1]);
        $ordersTable->save($order);
        return $this->redirect('/client');
    }
    
}