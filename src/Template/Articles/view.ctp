
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
		<?php foreach($articles as $article):?>
			
		<?php	echo $article['title']."</br>";			echo $article['content']."</br>";			?>
		<?php 	echo $article['authorName']."</br>";	echo $article['date']."</br>";	?>
		</div>
		
			<?php if($article['commentsAllowed']){ ?>
		<div class="row" >
        <h1>Add Comment</h1>
            <?php
				echo $this->Form->create('Comment', array('url'=>array('controller'=>'comments', 'action'=>'add')));
                echo $this->Form->input('Name', array('name' => 'authorName'));
				echo $this->Form->hidden('article_id', array('value' => $article['id']));
				echo $this->Form->hidden('date', array('value' => $article['id']));
                echo $this->Form->input('E-Mail', array('name' => 'authorEmail'));
                echo $this->Form->input('content', ['rows' => '5']);
                echo $this->Form->button(__('Send'));
                echo $this->Form->end();
            ?>
        </div>
		<?php } ?>
		<div class="row">
			<?php foreach($article['comments'] as $comment): ?>
			</br></br>
			<?php echo $comment['content'].': Author-> '.$comment['authorName'].'</br>'; ?>
			<?php endforeach; ?>   
        </div>       
		<?php 			endforeach; ?>
		
</div>