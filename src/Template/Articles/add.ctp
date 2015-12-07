
	<div class="container-fluid">        
		<div class="row">
			<div class="menu">
				<? if($this->request->session()->read('Auth.User.id') > 0){ $this->request->session()->read('Auth.User')?>

						<div class="customLink">
							<?= $this->Html->link('Dashboard', ['controller' => 'users', 'action' => 'dashboard']) ?>

						</div>
						<div class="articles">
							<?= $this->Html->link('Posts', ['controller' => 'users','action' => 'posts']) ?>
						</div>
						<?php 
							if($this->request->session()->read('Auth.User.role') == 'admin'){ 
						?>
								<div class="users">
									<?= $this->Html->link('Users', ['controller' => 'users', 'action' => 'all']) ?>
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
				<?
						}else{
							echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']); 
						}
				?>
			</div>
		</div>
		<div class="row" >
        <h1>Add Article</h1>
            <?php
                echo $this->Form->create($article);
                echo $this->Form->input('title');
                echo $this->Form->input('content', ['rows' => '15']);
                echo $this->Form->input('publish', array('type' => 'checkbox', 'name' => 'publish'));
                echo $this->Form->input('comments', array('type' => 'checkbox', 'name' => 'comments'));
				echo $this->Form->label(__('Tags',true));

//				foreach($tags as $id=>$tag):
//						echo $this->Form->input('Tag',array(
//														'options' => $tags,
//														'type' => 'checkbox',
//													)); 
//				endforeach;
				echo $this->Form->input("Tags", array("multiple" => "checkbox", "options" => $tags));

                echo $this->Form->button(__('Save'));
                echo $this->Form->end();
            ?>
        </div>
</div>