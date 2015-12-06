<!-- File: src/Template/Articles/view.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row" >
        <h1>Add Tag</h1>
            <?php
                echo $this->Form->create($tag);
                echo $this->Form->input('value');
                echo $this->Form->button(__('Save'));
                echo $this->Form->end();
            ?>
        </div>
</div>