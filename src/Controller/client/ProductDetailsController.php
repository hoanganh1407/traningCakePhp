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
class ProductDetailsController extends AppController
{
    public function productDetails($id = null)
    {
        $id = $_GET['id'];
        $productDetail = $this->ProductDetails->get($id, [
            'contain' => ['AttributeProducts'],
        ]);
        $this->set(compact('productDetail'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}