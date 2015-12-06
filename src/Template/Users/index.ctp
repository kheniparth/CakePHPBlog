<!-- File: src/Template/Articles/admin.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row">
			<div class="articles">
        		<?= $this->Html->link('Articles', ['action' => 'posts']) ?>
			</div>
			<?php 
				if($this->request->session()->read('Auth.User.role') == 'admin'){ 
			?>
					<div class="users">
						<?= $this->Html->link('Users', ['action' => 'all']) ?>
					</div>
					<div class="comments">
						<?= $this->Html->link('Comments', ['controller' => 'Comments', 'action' => 'index']) ?>
					</div>
					<div class="tags">
						<?= $this->Html->link('Tags', ['controller' => 'Tags','action' => 'index']) ?>
					</div>	
			<?php } ?>
			
         <?= $this->Html->link('Logout', ['action' => 'login']) ?>
        
		</div>
</div>