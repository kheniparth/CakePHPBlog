
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
		<div class="row">
        <h1>All Articles </h1>
        <table>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Comments</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Status</th>
                <th>Allow Comments</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($articles as $article): ?>
            <tr>
                <td>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>       
                </td>                
                <td><?= $article->date ?></td>
                <td><?= $this->Html->link($article->commentCount, ['action' => 'comments', $article->id]) ?> </td>
                <td>
                    <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>       
                </td>
                <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['action' => 'delete', $article->id],
                        ['confirm' => 'Are you sure?'])
                    ?>
                </td>
                <td>
                    
                    <?php 
//                       var_dump($article->publish);
                        if($article->publish){
                            echo $this->Form->postLink(
                                'Draft',
                                ['action' => 'draft', $article->id],
                                ['confirm' => 'Are you sure?']);
                        }else{
                            echo $this->Form->postLink(
                                'Publish',
                                ['action' => 'publish', $article->id],
                                ['confirm' => 'Are you sure?']);

                        }
    
                    ?>
                </td>
                <td>
                    
                    <?php 
//                       var_dump($article->publish);
                        if($article->commentsAllowed){
                            echo $this->Form->postLink(
                                'Block',
                                ['action' => 'block', $article->id],
                                ['confirm' => 'Are you sure?']);
                        }else{
                            echo $this->Form->postLink(
                                'Allow',
                                ['action' => 'allow', $article->id],
                                ['confirm' => 'Are you sure?']);

                        }
    
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="submitButton">
            <?= $this->Html->link('Logout', ['action' => 'login']) ?>
        </div>
    </div>
</div>