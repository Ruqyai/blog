<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('List Post'), array('action' => 'index')); ?>
        <?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> 
        
    </ul>
</div >
<h3><?php echo 'Title:'.h($post['Comment']['title']); ?></h3>
<h2><?php echo 'Text:'.h($post['Comment']['body']); ?></h2>
<p><small>Created: <?php echo $post['Comment']['created']; ?></small></p>