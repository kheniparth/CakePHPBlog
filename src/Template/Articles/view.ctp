<!-- File: src/Template/Articles/view.ctp -->
<div class="row" id="logo">
        <h1>TechMuzz</h1>
    </div>
	
	<div class="container-fluid">        
		<div class="row" >
		<?php foreach($articles as $article):?>
			
		<?php	echo $article['title']."</br>";			echo $article['content']."</br>";			?>
		<?php 	echo $article['authorName']."</br>";	echo $article['date']."</br>";	?>
		</div>
		
			<?php if($article['commentsAllowed']){ ?>
		<div class="row" >
        <h1>Add Comment</h1>
            <?php
				echo $this->Form->create('Comment', array('url'=>array('controller'=>'comments', 'action'=>'add')));
                echo $this->Form->input('Name', array('name' => 'authorName'));
				echo $this->Form->hidden('article_id', array('value' => $article['id']));
				echo $this->Form->hidden('date', array('value' => $article['id']));
                echo $this->Form->input('E-Mail', array('name' => 'authorEmail'));
                echo $this->Form->input('content', ['rows' => '5']);
                echo $this->Form->button(__('Send'));
                echo $this->Form->end();
            ?>
        </div>
		<?php } ?>
		<div class="row">
			<?php foreach($article['comments'] as $comment): ?>
			</br></br>
			<?php echo $comment['content'].': Author-> '.$comment['authorName'].'</br>'; ?>
			<?php endforeach; ?>   
        </div>       
		<?php 			endforeach; ?>
		
</div>