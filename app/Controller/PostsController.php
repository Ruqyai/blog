<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id) {
       
        $this->loadModel('Comment');
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);

    }

public function add() {
    if ($this->request->is('post')) {
        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
        if ($this->Post->save($this->request->data)) {
            $this->Flash->success(__('Your post has been saved.'));
            return $this->redirect(array('action' => 'index'));
        }
    }
}
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }

    if ($this->request->is(array('post', 'put'))) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $this->Flash->success(__('Your post has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Unable to update your post.'));
    }

    if (!$this->request->data) {
        $this->request->data = $post;
    }
}
public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Post->delete($id)) {
        $this->Flash->success(
            __('The post with id: %s has been deleted.', h($id))
        );
    } else {
        $this->Flash->error(
            __('The post with id: %s could not be deleted.', h($id))
        );
    }

    return $this->redirect(array('action' => 'index'));
}
public function isAuthorized($user) {
    if ($this->action === 'add') {
        return true;
    }
    if (in_array($this->action, array('edit', 'delete'))) {
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Post->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }
    return parent::isAuthorized($user);
}

public function comment() {
    if ($this->request->is('post'))
    {
        $this->Post->create();
        if ($this->Post->save($this->request->data))
        {
            $this->Flash->success(__('Your comment has been saved.'));
        }
        $this->Flash->error(__('Unable to add your comment.'));
    }
}
/*=========================================
API for the same function apove
===========================================*/

/*==========================================
http://localhost/blog/posts/getPosts

m- GET
para- null
============================================*/
public function getPosts() {
    $this->autoRender = false;
    $allpost= $this->Post->find('all');
    echo json_encode($allpost);
    }
/*==========================================
http://localhost/blog/posts/getUserPostByID?id=
m- GET
para- id
============================================*/
    public function getUserPostByID() {
    $this->autoRender = false;
    $id=  $_GET['id'];
    $allpost= $this->Post->findAllById($id);
    echo json_encode($allpost);
    }  
    
/*==========================================
URL : just for try
m- null
para- null
============================================*/
public function addPostNull() {
$this->autoRender = false;
$this->Post->create();
if ($this->Post->save($this->request->data)) {
$message = 'Your post has been saved.';
} else {
$message = 'Error';
}       
echo json_encode($message);
}
/*==========================================
http://localhost/blog/posts/addPost
m- POST
para- title,body
============================================*/
public function addPost() {
$this->autoRender = false;
$dataTitle=$_POST['title'];
$dataBody=$_POST['body'];
$this->Post->read(null, 1);
$this->Post->set('title', $dataTitle);
$this->Post->set('body', $dataBody);
if ($this->Post->save())
{
 $message = 'Your post has been saved.';
 } else {
 $message = 'Oops, there is an error ';
 }        
echo json_encode($message);        
}
/*==========================================
http://localhost/blog/posts/editPost
m- POST
para- id,title,body
============================================*/
public function editPost() {
$this->autoRender = false;
$dataID=$_POST['id'];
$dataTitle=$_POST['title'];
$dataBody=$_POST['body'];
$this->Post->id=$dataID;
$this->Post->set('title', $dataTitle);
$this->Post->set('body', $dataBody);
if ($this->Post->save())
{
 $message = 'Your post has been saved.';
 } else {
 $message = 'Oops, there is an error ';
 }        
echo json_encode($message);        
}

/*==========================================
http://localhost/blog/posts/deletePostByID?id=
m- GET
para- id
============================================*/
public function deletePostByID() {
 $this->autoRender = false;
$id=  $_GET['id']; 
if ($this->Post->delete($id)) {
$message = 'your post has been Deleted ';
} else {
$message = 'Oops, there is an error';
}
echo json_encode($message); 
}
/*==========================================
just for try ; I will add column in the database to try to hide or soft delete

http://localhost/blog/posts/softDeletePostByID?id=

m- GET
para- id
============================================*/
public function softDeletePostByID() {
 $this->autoRender = false;
$id=  $_GET['id']; 
if ($this->Post->delete($id)) {
$message = 'your post has been Deleted ';
} else {
$message = 'Oops, there is an error';
}
echo json_encode($message); 
}

}