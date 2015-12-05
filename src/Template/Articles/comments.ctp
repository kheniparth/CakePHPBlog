<!-- File: src/Template/Articles/admin.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row">
        <?= $this->Html->link('Add Article', ['action' => 'add']) ?>
         <?= $this->Html->link('Logout', ['action' => 'login']) ?>
        <h1> Articles </h1>
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