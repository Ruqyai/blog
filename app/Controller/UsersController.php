<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl(array('controller' => 'posts','action' => 'index')));
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }
}

public function logout() {
    return $this->redirect($this->Auth->logout());
}
/*=========================================
API for the same function apove
===========================================*/

/*==========================================
http://localhost/blog/users/getUsers
m- GET
para- null
============================================*/
public function getUsers() {
    $this->autoRender = false;
    $allpost= $this->User->find('all');
    echo json_encode($allpost);
    }
/*==========================================
http://localhost/blog/users/getUserByID?id=
m- GET
para- id
============================================*/
    public function getUserByID() {
    $this->autoRender = false;
    $id=  $_GET['id'];
    $allpost= $this->User->findAllById($id);
    echo json_encode($allpost);
    }  
    
/*==========================================
http://localhost/blog/users/addUser
m- POST 
para- username,password,role
============================================*/

public function addUser() {
$this->autoRender = false;
$dataName=$_POST['username'];
$dataPass=$_POST['password'];
$dataRole=$_POST['role'];
if(!isset($dataName)&&!isset($dataPass) &&!isset($dataRole)){
    $message = 'Oops, please enter all values';
}else{
$this->request->data['Comment']['username']=$dataName;
$this->request->data['Comment']['password']=$dataPass;
$this->request->data['Comment']['role']=$dataRole;
if($this->User->save($this->request->data))
    {$message = 'The user has been saved.';}
 }      
echo json_encode($message);        
}

/*==========================================
http://localhost/blog/users/editUser
m- POST 
para- username,password,role
============================================*/
public function editUser() {
$this->autoRender = false;
$dataId=$_POST['id'];
$dataName=$_POST['username'];
$dataPass=$_POST['password'];
$dataRole=$_POST['role'];
if(!isset($dataId)&&!isset($dataName)&&!isset($dataPass) &&!isset($dataRole)){
    $message = 'Oops, please enter all values';
}else{
$this->request->data['Comment']['id']=$dataId;
$this->request->data['Comment']['username']=$dataName;
$this->request->data['Comment']['password']=$dataPass;
$this->request->data['Comment']['role']=$dataRole;
if($this->User->save($this->request->data))
    {$message = 'The user has been saved.';}
 }      
echo json_encode($message);        
}

/*==========================================
http://localhost/blog/users/deleteUserByID?id=
m- GET 
para- id
============================================*/
public function deleteUserByID() {
 $this->autoRender = false;
$id=  $_GET['id']; 
if ($this->User->delete($id)) {
$message = 'your post has been Deleted ';
} else {
$message = 'Oops, there is an error';
}
echo json_encode($message); 
}
}
