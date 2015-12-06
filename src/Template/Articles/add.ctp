<!-- File: src/Template/Articles/view.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row" >
		<?= $this->Html->link('Add Article', ['action' => 'add']) ?>
         <?= $this->Html->link('Dashboard', ['controller' => 'Users', 'action' => 'index']) ?>
         <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'login']) ?>
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