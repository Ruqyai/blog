<!-- app/View/Users/add.ctp -->
<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('New Post'), array('controller' => 'posts','action' => 'add')); ?>
        <?php echo $this->Html->link(__('New User'), array( 'action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array( 'action' => 'index')); ?>
        <?php echo $this->Html->link(__('List Post'), array('controller' => 'posts','action' => 'index')); ?> 
        
    </ul>
</div>
<div >
<h3>Add User</h3>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <!--<legend><?php echo __('Add User'); ?></legend>-->
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>