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
        ]);    
		
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
			]);
	}
    
	public function isOwnedBy($articleId, $userId)
	{
		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}
   
}


?>