<div class="row" id="logo">
        <h1>TechMuzz</h1>
 </div>
	
	<div class="container-fluid">        
		<div class="row">
			<div class="menu">
				<div class="customLink">
					<?= $this->Html->link('Add Article', ['controller' => 'Articles', 'action' => 'add']) ?>

				</div>
				<div class="articles">
					<?= $this->Html->link('Posts', ['controller' => 'Users','action' => 'posts']) ?>
				</div>
				<?php 
					if($this->request->session()->read('Auth.User.role') == 'admin'){ 
				?>
						<div class="users">
							<?= $this->Html->link('Users', ['controller' => 'Users','action' => 'all']) ?>
						</div>
						<div class="comments">
							<?= $this->Html->link('Comments', ['controller' => 'Comments', 'action' => 'index']) ?>
						</div>
						<div class="tags">
							<?= $this->Html->link('Tags', ['controller' => 'Tags','action' => 'index']) ?>
						</div>	
				<?php } ?>
				<div class="logout">
					<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'login']) ?>
				</div>
			</div>
		</div>
	</div>