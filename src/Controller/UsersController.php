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
       
        $this->Auth->allow(['logout']);
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
        
        // $this->render('add');
        $user = $this->Users->newEmptyEntity();
        // dd($user);
        if ($this->request->is('post')) {
            // dd($this->request->getData());
            $user_arr = $this->request->getData();
            // dd($user_arr);
            $user_arr['id'] = Text::uuid();
            // $user_arr['password'] = Security::hash($user_arr['password']);
            // dd($user_arr);
            // dd($user);
            $user = $this->Users->patchEntity($user,$user_arr);
            // dd($user);
            // dd($this->Users->save($user));
            if ($this->Users->save($user)) {
                // dd(1);
                // $this->Flash->success(__('The user has been saved.'));
                return $this->redirect('/admin/users');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        // $this->set(compact('user'));
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
        // dd($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // dd($this->request->getData());
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                return $this->redirect('/admin/users');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

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
        if($this->Users->save($user)){
            return $this->redirect('/admin/users');
        }else{
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect('/admin/users');
    }

    public function login()
    {
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            // dd($user);
            if($user){
                $this->Auth->setUser($user);
                if($user['is_admin'] == 0 ||$user['active'] == 1)
                {
                    $this->Flash->error("You have not access permission !");
                    return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }
                return $this->redirect(['controller'=>'Users','action'=>'index']);
            }else {
                $this->Flash->error("Incorrect username or password !");
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

    
}
