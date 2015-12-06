<?php

// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;
use Cake\ORM\Table;

class TagsTable extends Table
{
	

    public function initialize(array $config)
    {
		$this->addBehavior('Timestamp');

		$this->belongsToMany('Articles', [
            'joinTable' => 'articles_tags',
			'dependent' => true,

        ]);
		
//		$this->belongsToMany('Articles', [
//            'joinTable' => 'articles_tags',
//            'foreignKey' => 'tag_id',
//            'associationForeignKey' => 'article_id'
//        ]);   
		
//		$this->hasMany('ArticlesTags', [
//            'foreignKey' => 'tag_id',
//			'dependent' => true
//        ]);
		 
    }
}


?>