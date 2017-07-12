<!-- File: /app/View/Posts/view.ctp -->
<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('New Post'), array('controller' => 'posts','action' => 'add')); ?>
        <?php echo $this->Html->link(__('New User'), array( 'action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array( 'action' => 'index')); ?> 
        <?php echo $this->Html->link(__('List Post'), array('controller' => 'posts','action' => 'index')); ?>
        
    </ul>
</div>

<h1><?php echo 'Name : '.h($user['User']['username']); ?></h1>

<p><small>role: <?php echo $user['User']['role']; ?></small></p>

<p><small>created: <?php echo h($user['User']['created']); ?></small></p>