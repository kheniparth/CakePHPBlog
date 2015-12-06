<?php

// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;
use Cake\ORM\Table;

class ArticlesTagsTable extends Table
{
	

    public function initialize(array $config)
    {
		
        $this->addBehavior('Timestamp');

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
		 
    }
}


?>