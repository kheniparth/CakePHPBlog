<!-- File: src/Template/Articles/admin.ctp -->
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
		<div class="row">
        <h1> Article Comments </h1>
        <table>
            <tr>
                <th>Content</th>
                <th>Date</th>
                <th>Author name</th>
                <th>Author Email</th>
                <th>Status</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($comments as $comment): ?>
            <tr>
                <td>
                    <?= $this->Html->link($comment->content, ['action' => 'view', $comment->id]) ?>       
                </td>                
                <td><?= $comment->date ?></td>
                <td><?= $comment->authorName ?></td>
                <td><?= $comment->authorEmail ?></td>
				<td>
                <?php 
//                       var_dump($comment->approved);
                        if($comment->approved){
                            echo $this->Form->postLink('Disapprove',array(
								'controller'=>'Comments', 
								'action' => 'disapproveComment',
								$comment->id),
                                ['confirm' => 'Are you sure?']);
						}else {
							echo $this->Form->postLink('Approve',array(
								'controller'=>'Comments', 
								'action' => 'approveComment',
								$comment->id),
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