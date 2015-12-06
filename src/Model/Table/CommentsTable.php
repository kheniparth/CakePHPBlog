<?php

// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;
use Cake\ORM\Table;

class CommentsTable extends Table
{
	

//	var $belongsTo = 'Articles';
    public function initialize(array $config)
    {
		$this->addBehavior('Timestamp');

       $this->belongsTo('Articles', [
			'foreignKey' => 'article_id',
			]);
		
		 
    }
}


?>