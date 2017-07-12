<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('List Post'), array('action' => 'index')); ?>
        <?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> 
        
    </ul>
</div>
<h3>Edit Post</h3>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>