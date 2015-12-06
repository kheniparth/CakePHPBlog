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
                echo $this->Form->input('content', ['rows' => '15']);    
				
				echo $this->Form->input('publish', array(
									'label' => __('Publish',true),
									'type' => 'checkbox'));
									
                echo $this->Form->input('commentsAllowed', array(
									'type' => 'checkbox', 
									'label' => 'Allow Comments'));
				echo $this->Form->label(__('Tags',true));


				foreach($selectedAllTags as $object):
					$selectedTags[] = $object->tag_id;
				endforeach;
				foreach($tags as $id=>$tag):
						echo $this->Form->input('Tag',array(
														'value' => $id,
														'label' => $tag,
														'type' => 'checkbox',
														'checked' => (in_array($id,$selectedTags) ?'checked':false)
													)); 
				endforeach;
				
				echo $this->Form->button(__('Save Article'));
                echo $this->Form->end();
            ?>
        </div>
</div>