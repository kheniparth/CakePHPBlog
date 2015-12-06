<!-- File: src/Template/Articles/view.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid"> 
		<div class="row">
			<div class="menu">
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
					<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'login']) ?>
				</div>
			</div>
		</div>
		<div class="row" >
        <h1>Edit Article</h1>
            <?php
                echo $this->Form->create($article);
                echo $this->Form->input('title');
                echo $this->Form->input('content', ['rows' => '15']);    
				
				echo $this->Form->input('publish', array(
									'label' => __('Publish',true),
									'type' => 'checkbox'));
									



                echo $this->Form->input('commentsAllowed', array(
									'type' => 'checkbox', 
									'label' => 'Allow Comments'));


				$options = [];
				foreach($tags as $tag){
					$options[$tag->id] = $tag->value;
				}
				echo $this->Form->input('tags._ids',[
					'multiple' => 'checkbox',
					'options' => $options,
					'type'=>'select'
					]);
									
				echo $this->Form->button(__('Save Article'));
                echo $this->Form->end();
            ?>
        </div>
</div>