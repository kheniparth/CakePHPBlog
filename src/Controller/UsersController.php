<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

	
	
    public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['add', 'logout']);
	}

	public function posts()
    {

		$user=$this->request->session()->read('Auth.User');
		if($user['role'] == 'admin'){
        $users = $this->Users->find('all')->contain(['Articles']);
		}else{
        $users = $this->Users->find('all', array('conditions' => array('id' => $user['id'])))->contain(['Articles']);
		}
        $this->set(compact('users'));
    }
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

	public function logout()
	{
		$this->request->session()->destroy('Auth');
		return $this->redirect($this->Auth->logout());
	}

     public function dashboard()
     {
        $this->set('users', $this->Users->find('all'));
    }

	 public function all()
     {
        $this->set('users', $this->Users->find('all'));
    }

	
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
	
	public function delete($id)
    {
//        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
//		print_r($user);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The User with id: {0} has been deleted.', h($id)));
            return $this->redirect($this->referer());
        }
    }

}
 

?>