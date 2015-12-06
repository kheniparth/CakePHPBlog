<!-- File: src/Template/Articles/admin.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row">
         <?= $this->Html->link('DashBoard', ['controller'=>'Users', 'action' => 'index']) ?>
         <?= $this->Html->link('Add Tag', ['action' => 'add']) ?>
         <?= $this->Html->link('Logout', ['controller'=>'Users', 'action' => 'logout']) ?>
        <h1> All Tags </h1>
        <table>
            <tr>
                <th>Value</th>
                <th>slug</th>
				<th>Articles</th>
				<th>Delete</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($tags as $tag): ?>
            <tr>
                <td> <?= $this->Html->link($tag->value,  ['action' => 'view', $tag->id]) ?>  
</td>                
                <td><?= $tag->slug ?> </td>    
				<td>View</td>
<!--
                <td> //$this->Html->link($comment->article_id, ['controller' => 'Articles', 'action'=>'view', $comment->article_id]) </td>-->

				<td>
                    <?= $this->Html->link('Delete', ['action' => 'deleteTag', $tag->id], ['confirm' => 'Are you sure?']) ?>  
                </td>  
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>