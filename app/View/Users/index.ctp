
<div class="actions">
    <ul>
        <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
        <?php echo $this->Html->link(__('New Post'), array('controller' => 'posts','action' => 'add')); ?>
        <?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> 
        <?php echo $this->Html->link(__('List Users'), array( 'action' => 'index')); ?> 
        <?php echo $this->Html->link(__('List Post'), array('controller' => 'posts','action' => 'index')); ?>
        
    </ul>
</div>

<h1>All users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>username</th>
        <th>role</th>
         <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'],
array('controller' => 'Users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['role']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    'View',
                    array('action' => 'view', $user['User']['id'])
                );?>
                <?php
               
                echo $this->Html->link(
                    'Add',
                    array('controller' => 'users','action' => 'add')
                ); ?>
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
 