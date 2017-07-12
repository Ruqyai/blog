<!-- File: /app/View/Posts/comment.ctp -->
	<h1 >Add your comment</h1>
	<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('comment', array('rows' => '3'));
	echo $this->Form->end('Save comment');
	?>


