<?php
declare(strict_types=1);

namespace App\Controller\Client;

use Cake\Utility\Text;
use Cake\Utility\Security;
use App\Controller\Client\AppController;
/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
   

    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductDetails'],
        ];
        $categories = $this->Products->Categories->find()->all();
        $products = $this->paginate($this->Products, ['limit'=>1]);
        $number_product = $this->Products->find()->all()->count();
        $this->set(compact('products','categories','number_product'));
        $this->viewBuilder()->setOption('serialize', true); //trả ra data json 
    }

    public function getProductByCategory($id = null)
    {
        $products = $this->getTableLocator()->get('Products')->find()->contain(['ProductDetails'])
        ->where(['category_id'=>$id])->all(); 
        $category_parent = $this->getTableLocator()->get('Categories')->find()->where(['id'=>$id])->first();
        $category_child = $this->getTableLocator()->get('Categories')->find()->where(['parent_id'=>$id])->all();
        $this->set(compact('products','category_child','category_parent'));
    }
    
    public function getDetailProduct($id = null)
    {
        $product = $this->getTableLocator()->get('Products')->find()->contain(['ProductDetails.AttributeProducts.Attributes'])
        ->where(['id'=>$id])->first(); 
        $attributes = $this->getTableLocator()->get('Attributes')->find()->all();
        $this->set(compact('product', 'attributes'));
    }
}