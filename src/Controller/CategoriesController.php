<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Utility\Text;

class CategoriesController extends AppController
{
    public function index()
    {
        $categories = $this->paginate($this->Categories,['limit'=>10]);
        $this->set(compact('categories'));
    }

    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('category'));
    }

    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        $categories_parent = $this->getTableLocator()->get('categories')->find()->all();
        if ($this->request->is('post')) {
            $category_arr = $this->request->getData();
            $category_arr['id'] = Text::uuid();
            
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                return $this->redirect('/admin/category');
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category', 'categories_parent'));
    }

    public function edit($id = null)
    {
        $category = $this->Categories->findById($id)->firstOrFail();
        $categories_parent = $this->getTableLocator()->get('categories')->find()->all();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                return $this->redirect('/admin/category');
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category','categories_parent'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            return $this->redirect('/admin/category');
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect('/admin/category');
    }
}
