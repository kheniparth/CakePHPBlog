<?php

// src/Controller/ArticlesController.php

namespace App\Controller;
use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;



class ArticlesController extends AppController
{
	var $uses = array('Article', 'Comment'); 

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('all');
    }
 
	
	
	public function isAuthorized($user)
	{
		print($this->request->action);
		// All registered users can add articles
		if ($this->request->action === 'add') {
			return true;
		}
		

		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['edit', 'delete'])) {
			$articleId = (int)$this->request->params['pass'][0];
			if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
	
	
	
    public function all()
    {
        $articles = $this->Articles->find('all')->contain([
			'Comments' => function ($q) {
							   return $q
									->select()
									->where(['Comments.approved' => true]);
							}
				]);
        $this->set(compact('articles'));
    }
    public function index()
    {
//        $articles = $this->Articles->find('all');
//        $this->set(compact('articles'));
//		 $articles=TableRegistry::get('Articles');

        $articles = $this->Articles->find('all')->contain(['Comments']);
        $this->set(compact('articles'));

    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $Article = $this->Articles->get($id);
        if ($this->Articles->delete($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been deleted.', h($id)));
            return $this->redirect($this->referer());
        }
    }
    
    public function draft($id)
    {
        $this->request->allowMethod(['post', 'draft']);

        $Article = $this->Articles->get($id);
        $Article['publish'] = "False";
        if ($this->Articles->save($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been updated.', h($id)));
            return $this->redirect($this->referer());
        }
    }
    
     public function publish($id)
    {
        $this->request->allowMethod(['post', 'publish']);

        $Article = $this->Articles->get($id);
        $Article['publish'] = "True";
        if ($this->Articles->save($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been updated.', h($id)));
            return $this->redirect($this->referer());
        }
    }
    
    public function block($id)
    {
//        $this->request->allowMethod(['post', 'block']);
		$articlesTable = TableRegistry::get('Articles');

        $Article = $articlesTable->get($id);
        $Article['commentsAllowed'] = false;
        if ($articlesTable->save($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been updated.', h($id)));
            return $this->redirect($this->referer());
        }
    }
    
     public function allow($id)
    {
        $articlesTable = TableRegistry::get('Articles');

        $Article = $articlesTable->get($id);
        $Article['commentsAllowed'] = true;
        if ($articlesTable->save($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been updated.', h($id)));
            return $this->redirect($this->redirect($this->referer()));
        }
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $login = $this->request->data;
//            print_r($login);
            if($login['username'] == 'admin' && $login['password'] == 'conestoga'){
                    $this->Flash->success(__('Successfully Logged In.'));
                    return $this->redirect($this->referer());
                }
            
            $this->Flash->error(__('Please Enter Right Credentials.'));
        }
    }
    
    
    public function view($id)
    {
		$articlesTable = TableRegistry::get('Articles');
		$articles = $articlesTable->find('all', array('conditions' => array('id' => $id)))->contain([
			'Comments' => function ($q) {
							   return $q
									->select()
									->where(['Comments.approved' => true]);
							}
				]);
        $this->set(compact('articles'));
    }
	
	public function increasecomment($id){
		$articlesTable = TableRegistry::get('Articles');
		$article = $articlesTable->get($id); // Return article with id 12

		$article->commentCount += 1;
		$articlesTable->save($article);
		return $this->redirect('/articles/view/'.$id);

	}
	
	public function comments($id){
		$commentsTable = TableRegistry::get('Comments');
		$comments = $commentsTable->find('all', array('conditions' => array('article_id' => $id)));
        $this->set(compact('comments'));
	}

    public function edit($id){
			$tagsTable = TableRegistry::get('Tags');
			$tags = $tagsTable->find('all');
			$this->set(compact('tags'));

		
			$articlesTable = TableRegistry::get('Articles');
            $article = $articlesTable->get($id, ['contain' => 'Tags']);

			$tempArticle = $this->request->data;
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->data,[
				'associated' => [
					'Tags'
				]
				
				]);
				
						if($this->Articles->save($article)){
							 $this->Flash->success(__('Your tag pair has been saved.'));
						}
						$this->Flash->error(__('Unable to create relation of article and tag.'));
					}


            $this->set('article', $article);
        }

    public function add()
    {

		$now = Time::now();

		$tagsTable = TableRegistry::get('Tags');
		$articlestagsTable = TableRegistry::get('ArticlesTags');
		$articlesTable = TableRegistry::get('Articles');
		$count = $articlesTable->find('all');
		$newArticleId = $count->last()->id +1;
        $query = $this->Articles->Tags->find('list', [
				'keyField' => 'id',
				'valueField' => 'value'
			]);
			$tags = $query->toArray();
			$this->set(compact('tags'));

		
		
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $tempArticle = $this->request->data;
            $article = $this->Articles->patchEntity($article, $this->request->data);
			$article->user_id = $this->Auth->user('id');
			$article->date = $now;
			$tuple = $articlestagsTable->newEntity();
			$flag = $articlestagsTable->findAllByArticleId($newArticleId);
			$flagCount = $flag->count();
			if($flagCount>0)
			{
//				print("flag found");
			}else{
//								print("flag not found");

				foreach($tempArticle['Tags'] as $tag):
						
						$tuple->article_id= $newArticleId;
						$tuple->tag_id= $tag;					
						if($articlestagsTable->save($tuple)){
							 $this->Flash->success(__('Your tag pair has been saved.'));
						}
						$this->Flash->error(__('Unable to create relation of article and tag.'));
				endforeach;
				
				if ($this->Articles->save($article)) {
					$this->Flash->success(__('Your article has been saved.'));
					return $this->redirect($this->referer());
				}
				$this->Flash->error(__('Unable to add your article.'));
			}
			
            
        }
        $this->set('article', $article);
    }
}
?>