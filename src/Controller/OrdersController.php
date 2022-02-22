<?php
declare(strict_types=1);

namespace App\Controller;

use function React\Promise\all;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $orders = $this->paginate($this->Orders, ['limit'=>5]);
        $this->set(compact('orders'));
    }

    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Users', 'OrderDetails'],
        ]);
        $order->order_details = $this->Orders->OrderDetails->find('all')->contain(['ProductDetails'])->all();
        $products = $this->Orders->OrderDetails->ProductDetails->find('all')->contain(['Products'])->all();
        $attribute_product = $this->Orders->OrderDetails->ProductDetails->AttributeProducts->find('all')->contain(['Attributes'])->all();
        if ($this->request->is(['patch', 'post', 'put'])) {
            // dd($this->request->getData());
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                return $this->redirect('/admin/order/edit/'.$id);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order', 'products','attribute_product'));
    }

   
}
