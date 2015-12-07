
	<div class="container-fluid">        
		<div class="row">
			<div class="menu">
				<? if($this->request->session()->read('Auth.User.id') > 0){ ?>
						<div class="customLink col-sm-1">
							<?= $this->Html->link('Add Tag', ['controller' => 'Tags', 'action' => 'add']) ?>

						</div>
						<div class="dashboard col-sm-1">
							<?= $this->Html->link('Dashboard', ['controller' => 'users', 'action' => 'dashboard']) ?>

						</div>
						<div class="articles col-sm-1">
							<?= $this->Html->link('Posts', ['controller' => 'users','action' => 'posts']) ?>
						</div>
						<?php 
							if($this->request->session()->read('Auth.User.role') == 'admin'){ 
						?>
								<div class="users col-sm-1">
									<?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'all']) ?>
								</div>
								<div class="comments col-sm-1">
									<?= $this->Html->link('Comments', ['controller' => 'Comments', 'action' => 'index']) ?>
								</div>
								<div class="tags col-sm-1">
									<?= $this->Html->link('Tags', ['controller' => 'Tags','action' => 'index']) ?>
								</div>	
						<?php } ?>
						<div class="logout col-sm-1">
							<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?>
						</div>
				<?	}else{ ?>
						<div class="login col-sm-1">
						<?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?>
						</div>
				<?	} ?>
			</div>
		</div>
		<div class="row">
        <h1> All Tags </h1>
        <table>
            <tr>
                <th>Value</th>
                <th>slug</th>
				<th>Articles</th>
				<th>Delete</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($tags as $tag): ?>
            <tr>
                <td> <?= $this->Html->link($tag->value,  ['action' => 'view', $tag->id]) ?>  
</td>                
                <td><?= $tag->slug ?> </td>    
				<td> <?= $this->Html->link('View',  ['action' => 'view', $tag->id]) ?>  
</td>
<!--
                <td> //$this->Html->link($comment->article_id, ['controller' => 'Articles', 'action'=>'view', $comment->article_id]) </td>-->

				<td>
                    <?= $this->Html->link('Delete', ['action' => 'deleteTag', $tag->id], ['confirm' => 'Are you sure?']) ?>  
                </td>  
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>