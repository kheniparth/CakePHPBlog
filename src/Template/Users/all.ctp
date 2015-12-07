<!-- File: src/Template/Articles/admin.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row">
			<div class="menu">
				<div class="customLink">
					<?= $this->Html->link('Add User', ['controller' => 'users', 'action' => 'add']) ?>

				</div>
				<div class="customLink">
					<?= $this->Html->link('Dashboard', ['controller' => 'users', 'action' => 'dashboard']) ?>

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
					<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?>
				</div>
			</div>
		</div>
		<div class="row">
        <h1> Users </h1>
        <table>
            <tr>
                <th>UserName</th>
                <th>Role</th>
                <th>Delete</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->
			<?php foreach ($users as $user): 
			?>
            <tr>
                <td>
                    <?= $user->username ?>       
                </td>                
                <td><?= $user->role ?></td>
                <td><?
				if($this->request->session()->read('Auth.User.role') == 'admin' && $this->request->session()->read('Auth.User.id') != $user->id){
						echo $this->Html->link('Delete', ['controller' => 'Users','action' => 'delete', $user->id]);

							}
					?>
				</td>
            </tr>
			<?php endforeach; ?>
        </table>
    </div>
</div>