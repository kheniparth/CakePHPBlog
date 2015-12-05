<?php

// src/Controller/ArticlesController.php

namespace App\Controller;
use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class ArticlesController extends AppController
{
	var $uses = array('Post', 'Comment'); 

	
	public function isAuthorized($user)
	{
		// All registered users can add articles
		if ($this->request->action === 'add') {
			return true;
		}

		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['edit', 'delete','view','admin'])) {
			$articleId = (int)$this->request->params['pass'][0];
			if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
	
    public function admin()
    {
        $Articles = $this->Articles->find('all');
        $this->set(compact('Articles'));
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
            return $this->redirect(['action' => 'admin']);
        }
    }
    
    public function draft($id)
    {
        $this->request->allowMethod(['post', 'draft']);

        $Article = $this->Articles->get($id);
        $Article['publish'] = "False";
        if ($this->Articles->save($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been updated.', h($id)));
            return $this->redirect(['action' => 'admin']);
        }
    }
    
     public function publish($id)
    {
        $this->request->allowMethod(['post', 'publish']);

        $Article = $this->Articles->get($id);
        $Article['publish'] = "True";
        if ($this->Articles->save($Article)) {
            $this->Flash->success(__('The Article with id: {0} has been updated.', h($id)));
            return $this->redirect(['action' => 'admin']);
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
            return $this->redirect($this->redirect($this->referer()));
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
                    return $this->redirect(['action' => 'admin']);
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

    public function edit($id)
        {
            $article = $this->Articles->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Articles->patchEntity($article, $this->request->data);
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your article.'));
            }

            $this->set('article', $article);
        }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $tempArticle = $this->request->data;
            $article = $this->Articles->patchEntity($article, $this->request->data);
			$article->user_id = $this->Auth->user('id');
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }
//        $Articles = $this->Articles->find('all');
//        $this->set(compact('Articles'));
////        $Article = $this->Articles->newEntity();
////        if ($this->request->is('post')) {
//        $tempArticle = $this->request->data;
//                if(empty($tempArticle['toppings1']) && empty($tempArticle['toppings2']))
//                    {
//                    $this->Flash->success(__('Please Select atleast 1 topping.'));
//                    return $this->redirect(['action' => 'index']);
//                }else{
//                    if(empty($tempArticle['toppings1'])){
//                        $toppings = $tempArticle['toppings2'];
//                    }else if(empty($tempArticle['toppings2'])){
//                        $toppings = $tempArticle['toppings1'];
//                    }else{
//                        $toppings = null;
//                    }
//
//                     $toppingsCount=0;
//                    if($toppings != null)
//                    {
//                    $toppingsCount = count($toppings);
//                    $toppings = implode(",", $toppings);
//                    }
//                    $tempArticle['toppings'] = $toppings;
//                    unset($tempArticle['toppings1']);
//                    unset($tempArticle['toppings2']);
//
//                    $finalBill = 0;
//                    $sizeCost = 0;
//                    $toppingsCost = 0;
//                    $crustCost = 0;
//                    $taxValue = 1;
//                    $tax = $tempArticle['province'];
//                    switch($tax)
//                    {
//                        case "ontario":
//                            $taxValue = 13;
//                            break;
//                        case "quebec":
//                            $taxValue = 15;
//                            break;
//                        case "saskatchewan":
//                            $taxValue = 10;
//                            break;
//                        case "alberta":
//                            $taxValue = 5;
//                            break;
//                        default:
//                            $taxValue = 1;
//                            break;
//                    }
//
//
//                    $size = $tempArticle['size'];
//                    switch($size)
//                    {
//                        case "small":
//                            $sizeCost = 5;
//                            break;
//                        case "medium":
//                            $sizeCost = 10;
//                            break;
//                        case "large":
//                            $sizeCost = 15;
//                            break;
//                        case "extraLarge":
//                            $sizeCost = 20;
//                            break;
//                        default:
//                            $sizeCost = 0;
//                            break;
//                    }
//
//                    $crust = $tempArticle['crust'];
//                    switch($crust)
//                    {
//                        case "stuffed":
//                            $crustCost = 2;
//                            break;
//                        default:
//                            $crustCost = 0;
//                            break;
//                    }
//
//                    $toppingsCost = $toppingsCount * 0.5;
//
//                    $finalBill = $sizeCost + $toppingsCost + $crustCost;
//                    $finalBill = $finalBill + ($finalBill*$taxValue/100);
//
//                    $tempArticle['billAmount'] = $finalBill;
//
//                    $Article = $this->Articles->patchEntity($Article, $tempArticle);
//
//                    if ($this->Articles->save($Article)) {
//                        $this->Flash->success(__('Your Article has been saved. Bill Amount = $'.$finalBill));
//                        return $this->redirect(['action' => 'index']);
//                    }
//                    $this->Flash->error(__('Unable to add your Article.'));
//                    }
//            
//           
////        $this->set('Article', $Article);
//           
//    }
    
  
}
?>