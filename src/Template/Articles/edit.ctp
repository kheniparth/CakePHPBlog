<!-- File: src/Template/Articles/view.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row" >
        <h1>Edit Article</h1>
            <?php
                echo $this->Form->create($article);
                echo $this->Form->input('title');
                echo $this->Form->input('content', ['rows' => '15']);                               echo $this->Form->input('publish', array('type' => 'checkbox', 'name' => 'publish'));
                echo $this->Form->input('comments', array('type' => 'checkbox', 'name' => 'comments'));
                echo $this->Form->button(__('Save Article'));
                echo $this->Form->end();
            ?>
        </div>
</div>