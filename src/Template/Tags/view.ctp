<!-- File: src/Template/Articles/admin.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row">
        <?= $this->Html->link('Add Article', ['controller' => 'Articles', 'action' => 'add']) ?>
         <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'login']) ?>
        <h1> Articles </h1>
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
            <?php foreach ($articlesArray as $object): 
					$article = $object->article; 
			?>
			<tr>
                <td>
                    <?= $this->Html->link($article->title, ['controller' => 'Articles', 'action' => 'view', $article->id]) ?>       
                </td>                
                <td><?= $article->date ?></td>
                <td><?= $this->Html->link($article->commentCount, ['controller' => 'Articles', 'action' => 'comments', $article->id]) ?> </td>
                <td>
                    <?= $this->Html->link('Edit', ['controller' => 'Articles', 'action' => 'edit', $article->id]) ?>       
                </td>
                <td>
                    <?= $this->Form->postLink(
                        'Delete',
                        ['controller' => 'Articles', 'action' => 'delete', $article->id],
                        ['confirm' => 'Are you sure?'])
                    ?>
                </td>
                <td>
                    
                    <?php 
//                       var_dump($article->publish);
                        if($article->publish){
                            echo $this->Form->postLink(
                                'Draft',
                                ['controller' => 'Articles', 'action' => 'draft', $article->id],
                                ['confirm' => 'Are you sure?']);
                        }else{
                            echo $this->Form->postLink(
                                'Publish',
                                ['controller' => 'Articles', 'action' => 'publish', $article->id],
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
                                ['controller' => 'Articles', 'action' => 'block', $article->id],
                                ['confirm' => 'Are you sure?']);
                        }else{
                            echo $this->Form->postLink(
                                'Allow',
                                ['controller' => 'Articles', 'action' => 'allow', $article->id],
                                ['confirm' => 'Are you sure?']);

                        }
    
                    ?>
                </td>
            </tr>
			<?php endforeach; ?>
        </table>
    </div>
</div>