<div class="container-fluid">        
		<div class="row">
			<div class="menu">
				<? if($this->request->session()->read('Auth.User.id') > 0){ ?>
						<div class="customLink col-sm-1">
							<?= $this->Html->link('Add User', ['controller' => 'Users', 'action' => 'add']) ?>

						</div>
						<div class="customLink col-sm-1">
							<?= $this->Html->link('Add Article', ['controller' => 'Articles', 'action' => 'add']) ?>

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
		<div class="users form">
		<?= $this->Flash->render('auth') ?>
		<?= $this->Form->create() ?>
			<fieldset>
				<legend><?= __('Please enter your username and password') ?></legend>
				<?= $this->Form->input('username') ?>
				<?= $this->Form->input('password') ?>
			</fieldset>
		<?= $this->Form->button(__('Login')); ?>
		<?= $this->Form->end() ?>
		</div>
	</div>
</div>
