<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Attribute;
use Cake\Utility\Text;
use Cake\Datasource\ConnectionManager;

class ProductsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }

    public function saveImg($img)
    {
        $name_img = Text::uuid().$img->getClientFilename();
        $targetPath = WWW_ROOT. 'img'. DS . 'upload'. DS. $name_img;
        $img->moveTo($targetPath);
        return $name_img;
    }

    public function add()
    {
        $attributes = $this->fetchTable('Attributes')->find()->all();
        $categories = $this->fetchTable('Categories')->find()->all();
        $product = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $product_id = Text::uuid();
            $data['products']['id'] = $product_id;
            $product = $this->Products->patchEntity($product, $data['products']);
            $this->Products->save($product);
            $product_details = $data['product_details'];
            $attribute_products = $data['attribute_products'];
            foreach($product_details as $key=>$value){
                $value['image'] = $this->saveImg($value['image']);
                $value['id'] = Text::uuid();
                $value['product_id'] = $product->id;
                $pro = $this->getTableLocator()->get('ProductDetails')->query()->insert(['price', 'quantity', 'description', 'image', 'id','product_id'])
                ->values($value)
                ->execute();
                    foreach($attribute_products[$key] as $k=>$v){
                        $this->getTableLocator()->get('AttributeProducts')->query()->insert(['attribute_id', 'product_detail_id', 'value','id'])
                        ->values([
                            'attribute_id' => $k,
                            'product_detail_id'=> $value['id'],
                            'value' => $v,
                            'id' =>Text::uuid()
                        ])
                        ->execute();
                    }
            }
            return $this->redirect('/admin/product');
        }
        $this->set(compact('product', 'categories', 'attributes'));
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductDetails'],
        ]);
        // dd($product);
        $product_detail = $product->product_details;
        // dd($product_detail);

        $product_detail_id_arr = [];
        foreach($product_detail as $key=>$value){
            $product_detail_id_arr[] = $value->id;
        }
        $attribute_products = $this->getTableLocator()->get('AttributeProducts')->find()
                            ->where(['product_detail_id IN '=>$product_detail_id_arr])->all(); //whereIn()
                            // dd($attribute_products);
        $attributes = $this->getTableLocator()->get('Attributes')->find()->all();
        $categories = $this->fetchTable('Categories')->find()->all();
        //edit
        // dd($categories);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            [$productss, $product_detailss, $attribute_productss] = $this->splitArray($data);
            // dd($product_detailss);
            
            [$productDetail, $attributeProducts] = $this->mapData($product_detailss, $attribute_productss, $id);
            // dd(1);
            $this->delete_relationship($product_detail_id_arr);
            $product = $this->Products->patchEntity($product, $productss);
            $this->Products->save($product);
            foreach($productDetail as $detail){
                $this->getTableLocator()->get('ProductDetails')->query()->insert(['price', 'quantity', 'description', 'image', 'id','product_id'])
                ->values($detail)
                ->execute();
            }

            foreach($attributeProducts as $a_p){
                $this->getTableLocator()->get('AttributeProducts')->query()->insert(['attribute_id', 'product_detail_id', 'value','id'])
                        ->values($a_p)
                        ->execute();
            }
           
            return $this->redirect('/admin/product/edit/'.$id);
        }
        $this->set(compact('product', 'categories','attribute_products', 'attributes'));
    }

    

    protected function mapData($productDetail, $attributeProducts, $productId)
    {
        $attribute_products = [];
        foreach($productDetail as $key => $value){
            if($value['id']){
                if($value['image']->getClientFilename() != null){
                    $productDetail[$key]['image'] = $this->saveImg($value['image']);
                }else{
                    $productDetail[$key]['image'] =  $this->getTableLocator()->get('ProductDetails')->find()->where(['id'=>$key])->first()->image;
                }
            }else{
                $productDetail[$key]['image'] = $this->saveImg($value['image']);
                $productDetail[$key]['id'] = $key;
            }
            $productDetail[$key]['product_id'] = $productId;

            foreach($attributeProducts[$key] as $k => $item){
                $attribute_products[] = [
                    'id'                => Text::uuid(),
                    'attribute_id'      => $k,
                    'value'             => $item,
                    'product_detail_id' => $productDetail[$key]['id']
                
                ];
            }
        }
        // dd($productDetail);
        return [$productDetail, $attribute_products];
    }
    private function splitArray($data)
    {
        $products               = [];
        $product_details        = [];
        $attribute_products     = [];
        extract($data);
        return [$products, $product_details, $attribute_products];
    }

    private function delete_relationship($product_detail_id_arr)
    {
        // dd($product_detail_id_arr);
        $conn = ConnectionManager::get('default');
        foreach($product_detail_id_arr as $value){
            $conn->execute("DELETE FROM attribute_products WHERE attribute_products.product_detail_id = '$value';");
            $conn->execute("DELETE FROM product_details WHERE product_details.id = '$value';");
        }
        // $pro = $this->getTableLocator()->get('AttributeProducts')->query()->where(['product_detail_id IN'=>$product_detail_id_arr])->delete()->execute();
        // // dd($pro);
        // $this->getTableLocator()->get('ProductDetails')->query()->where(['id IN'=>$product_detail_id_arr])->delete()->execute();
    }


}

