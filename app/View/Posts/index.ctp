<!-- File: /app/View/Posts/index.ctp  (edit links added) -->
<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?>
        <?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> 
        
    </ul>
</div>
<div >
<h3><?php echo __('List of  Posts'); ?></h3>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>
<?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td><?php echo $this->Html->link( $post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></td>
        <td> <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
             <?php echo $this->Html->link('Add',array('controller' => 'posts', 'action' => 'add')); ?>
             <?php echo $this->Form->postLink('Delete', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?'));?></td>
        <td> <?php echo $post['Post']['created']; ?></td>
    </tr>
<?php endforeach; ?>

</table>
</div>
 
