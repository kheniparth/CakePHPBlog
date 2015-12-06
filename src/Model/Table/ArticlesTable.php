<?php


namespace App\Model\Table;
use Cake\ORM\Table;


class ArticlesTable extends Table {

//	var $hasMany = 'Comments';
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		$this->displayField('Value');

 		$this->hasMany('Comments', [
            'foreignKey' => 'article_id',
            'dependent' => true,
        ]);    
		
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
			]);
		
		$this->hasMany('ArticlesTags', [
            'foreignKey' => 'article_id'
        ]);
		
		
//		$this->hasAndBelongsToMany = array(
//        'Tags' => array(
//            'className' => 'Tag',
//            'joinTable' => 'articles_tags',
//            'foreignKey' => 'article_id',
//            'associationForeignKey' => 'tag_id'
//        ),
//    );   
		
		$this->hasMany('Tags', [
            'joinTable' => 'articles_tags',
            'foreignKey' => 'article_id',
            'associationForeignKey' => 'tag_id'
        ]);   
		
		
	}
    
	public function isOwnedBy($articleId, $userId)
	{
		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}
   
}


?>