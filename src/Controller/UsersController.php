<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Text;
use Cake\Utility\Security;
use App\Model\Table\UsersTable;
use App\Model\Entity\User;
use App\Controller\AppController;
/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();

//        $this->Auth->allow(['logout']);
    }

    public function index()
    {
        $users = $this->paginate($this->Users,['limit'=>5]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user_arr = $this->request->getData();
            $user_arr['id'] = Text::uuid();
            $user = $this->Users->patchEntity($user,$user_arr);
            if ($this->Users->save($user)) {
                return $this->redirect('/admin/users');
            }
        }
        $this->set('user', $user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->findById($id)->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                return $this->redirect('/admin/users');
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $user = $this->Users->get($id);
        $this->Users->delete($user);
        return $this->redirect('/admin/users');
    }

    public function lock($id = null)
    {
        $this->request->allowMethod(['get']);
        $user = $this->Users->get($id);
        $active = 0;
        if($user->active == 0){
            $active = 1;
        }
        $user = $this->Users->patchEntity($user, ['active'=>$active]);
        $this->Users->save($user);
        return $this->redirect('/admin/users');
    }

    public function login()
    {
        if($this->request->is('post')){
//            $user = $this->Auth->identify();
//            if($user){
//                $this->Auth->setUser($user);
//                if($user['is_admin'] == 0 || $user['active'] == 1)
//                {
//                    return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
//                }
                return $this->redirect(['controller'=>'Users','action'=>'index']);
//            }else {
//                $this->Flash->error("Incorrect username or password !");
//            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

}
