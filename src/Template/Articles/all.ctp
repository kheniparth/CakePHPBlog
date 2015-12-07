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
	
	<?php foreach($articles as $article): ?>
		<div class="row">
			<div class="articleCotainer">
				<div class="article">
					<div class="articleTitle"> 
						<?= $article['title'] ?>
					</div>
					<div class="articleContent">
						<?= $article['content'] ?>
					</div>
					<div clsss="comments">
						<div class="comment">
							<?php foreach($article['comments'] as $comment): ?>
							<?php echo $comment['content'].'</br>'; ?>
							<?php echo $comment['date'].'</br>'; ?>
							<?php echo $comment['authorName'].'</br>'; ?>
							<?php endforeach; ?> 
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>   
</div>