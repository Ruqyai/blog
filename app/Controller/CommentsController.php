<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController {

    public $helpers = ['Html','Form'];
    public $components = ['Flash'];
	public function index() {
        $this->set('comments', $this->Post->find('all'));
    }
    public function view($id) {
        if (!$id) {throw new NotFoundException(__('Invalid post'));}
        $comment = $this->Comment->findById($id);
        if (!$post) { throw new NotFoundException(__('Invalid post'));}
        $this->set('comment', $comment);
    }
    public function add() {
    if ($this->request->is('post')) {
        $userId= $this->request->data['Comment']['user_id'];
       // $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
         $userId=$this->Auth->user('id');
      //  $this->request->data['Comment']['post_id'] = $this->Auth->user('id');
        $postId= $this->request->data['Comment']['post_id'];
        if ($this->Comment->save($this->request->data)) {
            $this->Flash->success(__('Your post has been saved.'));
            return $this->redirect(array('controller' => 'posts','action' => 'view',$postId));
        }
    }
}
     public function edit() {
    if ($this->request->is('post')) {
        $userId= $this->request->data['Comment']['user_id'];
        $userId=$this->Auth->user('id');
        $postId= $this->request->data['Comment']['post_id'];
        if ($this->Comment->save($this->request->data)) {
            $this->Flash->success(__('Your post has been saved.'));
            return $this->redirect(array('controller' => 'posts','action' => 'view',$postId));
        }
    }
}
    public function delete($ide) {
   // if ($this->request->is('get')) {
        if ($this->request->is('post')) {
        throw new MethodNotAllowedException();
    }
    $postId=$this->Comment->findById($ide)['Comment']['post_id'];

    if ($this->Comment->delete($ide)) {
        $this->Flash->success(__('The Comment with id: %s has been deleted.', h($ide)));
    } else {
        $this->Flash->error(__('The post with id: %s could not be deleted.', h($id)));
    }

    return $this->redirect(array('controller' => 'posts','action' => 'view',$postId));
}
   

/*=========================================
API for the same function apove
===========================================*/


/*==========================================
http://localhost/blog/comments/getComment

m- GET
para- null
============================================*/
public function getComment() {
    $this->autoRender = false;
    $allpost= $this->Comment->find('all');
    echo json_encode($allpost);
    }

/*==========================================
http://localhost/blog/comments/getUserCommentByID?id=
m- GET
para- id
============================================*/

    public function getUserCommentByID() {
    $this->autoRender = false;
    $id=  $_GET['id'];
    $allpost= $this->Comment->findAllById($id);
    If($allpost&&$id){
        echo json_encode($allpost);
    }
    else{echo json_encode('Invalid Entry');}
    }  
    
/*==========================================
http://localhost/blog/comments/addComment
m- POST 
para- user_id,post_id,title,body
============================================*/
public function addComment() {
$this->autoRender = false;
if(!isset($_POST['user_id'])&&!isset($_POST['post_id']) &&!isset($_POST['title'])&&!isset($_POST['body'])){
    $message = 'Oops, pelase enter all values';
}else{
$this->request->data['Comment']['user_id']=$_POST['user_id'];
$this->request->data['Comment']['post_id']=$_POST['post_id'];
$this->request->data['Comment']['title']=$_POST['title'];
$this->request->data['Comment']['body']=$_POST['body'];

if($this->Comment->save($this->request->data)){$message = 'Your comment has been saved';}
 
 }      
echo json_encode($message);        
}
/*==========================================
http://localhost/blog/comments/editComment
m- POST 
para- id,user_id,post_id,title,body
============================================*/
public function editComment() {
$this->autoRender = false;
if(!isset($_POST['id'])&&!isset($_POST['user_id'])&&!isset($_POST['post_id']) &&!isset($_POST['title'])&&!isset($_POST['body']))
{
    $message = 'Oops, pelase enter all values';
}else{

$this->request->data['Comment']['id']=$_POST['id'];
$this->request->data['Comment']['user_id']=$_POST['user_id'];
$this->request->data['Comment']['post_id']=$_POST['post_id'];
$this->request->data['Comment']['title']=$_POST['title'];
$this->request->data['Comment']['body']=$_POST['body'];

// $dataID=$_POST['id'];
// $dataTitle=$_POST['title'];
// $dataBody=$_POST['body'];
// $this->Comment->id=$dataID;
// $this->Comment->set('title', $dataTitle);
// $this->Comment->set('body', $dataBody);

if ($this->Comment->save($this->request->data))
{
 $message = 'Your post has been saved.';
 }
}        
echo json_encode($message);        
}

/*==========================================
http://localhost/blog/comments/deleteCommentByID?id
m- GET 
para- id
============================================*/
public function deleteCommentByID() {
 $this->autoRender = false;
$id=  $_GET['id']; 
if ($this->Comment->delete($id)) {
$message = 'your post has been Deleted ';
} else {
$message = 'Oops, there is an error';
}
echo json_encode($message); 
}

}