<?php


namespace App\Model\Table;
use Cake\ORM\Table;


class ArticlesTable extends Table {

//	var $hasMany = 'Comments';
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

 		$this->hasMany('Comments', [
            'foreignKey' => 'article_id',
            'dependent' => true,
			'cascadeCallbacks' => true

        ]);    
		
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
			]);
		
//		$this->hasMany('ArticlesTags', [
//            'foreignKey' => 'article_id'
//        ]);
		
		
		$this->belongsToMany('Tags', [
            'joinTable' => 'articles_tags',
			'dependent' => true,

        ]);
		
//		$this->belongsToMany('Tags', [
//            'joinTable' => 'articles_tags',
//            'foreignKey' => 'article_id',
//            'associationForeignKey' => 'tag_id'
//        ]);   
		
		
	}
    
	public function isOwnedBy($articleId, $userId)
	{
		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}
   
}


?>