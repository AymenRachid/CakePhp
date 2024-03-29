<?php
namespace App\Controller;

use App\Controller;
//use Cake\Controller\Controller;
use Cake\Event\Event;
use Element\Flash;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    /*public function initialize()
    {
        parent::initialize();

        $this->Auth->allow();
        //$this->Auth->allow('add');
        //AppController::initialize();
        //$this->loadComponent('Auth');
    }*/


    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['signup', 'forgotPassword']);
    }


    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
	

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
	  public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //set default role
            $this->request->Data['role_id'] = 3;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
		$this->set ('_serialize',['user']);
    }
	
     public function login()
    {
        if($this->Auth->user('id')){
            $this->Flash->warning(__('You are logged!'));
            return $this->redirect(['controller'=>'Users', 'action'=>'index']);
        }

        //log in
		if($this->request->is('post')){

			$user = $this->Auth->identify();
			
			if($user){
				$this->Auth->setUser($user);
				//redirect
				$this->Flash->success(__('Login Successful!'));
				return $this->redirect(['controller'=>'Users', 'action'=>'index']);
			}
			$this->Flash->error(__('Sorry the login was not successful'));

		}
		
	}

	public function logout()
    {
        $this->Flash->success("You are now logged out");


        return $this->redirect($this->Auth->logout());

    }

    public function forgotPassword(){
	      //empty
    }
	
    
    public function signup()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //set default role
            $this->request->getData['roleid'] = 2;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
		$this->set ('_serialize',['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
