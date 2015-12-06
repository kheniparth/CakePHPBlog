<?php foreach($articles as $article): ?>
<?php 
	echo $article['title']."</br>";
	echo $article['content']."</br>"?>

	<?php foreach($article['comments'] as $comment): ?>
	</br></br>
	<?php echo $comment['content'].'</br>'; ?>
	<?php echo $comment['date'].'</br>'; ?>
	<?php echo $comment['authorName'].'</br>'; ?>
	<?php endforeach; ?>   
<?php endforeach; ?>   