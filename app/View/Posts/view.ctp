
<!--<?php pr($post); ?>-->
<!--<?php debug($post) ;//exit;?>-->
<!-- <?php //echo count($post['Comment']); ?> -->
<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('List Post'), array('action' => 'index')); ?>
        <?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> 
        
    </ul>
</div >
<h3><?php echo 'Title:'.h($post['Post']['title']); ?></h3>
<h2><?php echo 'Text:'.h($post['Post']['body']); ?></h2>
<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>



<h3>Add Comment</31>
<?php
echo $this->Form->create('Comment',['url' => ['controller' => 'comments', 'action' => 'add']]);
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));
echo $this->Form->end('Save Comment');
?>

<?php foreach ($post['Comment']as $Comment): ?>
	<div class = "comment">
  <div class="actions">
  </br>
    <?php echo $this->Html->link('Edit', array('controller' => 'comments', 'action' => 'edit')); ?>
    <?php echo $this->Html->link('Delete', array('controller' => 'comments', 'action' => 'delete',$Comment['id']), array('confirm' => 'Are you sure?')); ?>
    <!--<?php //echo $this->Html->link('More details', array('controller' => 'comments', 'action' => 'view', $post['comment_id'])); ?>-->
  </div>
  <div class= 'commentsB'>
       <!-- <?php echo $Comment['id']; ?> -->
       </br></br>
        <?php echo 'title : ' .$Comment['title'] ?>
        </br>
        <?php echo 'body :' .$Comment['body'] ?>
        </div>
    </div>
<?php endforeach ?>
            
 


