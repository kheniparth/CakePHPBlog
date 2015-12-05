<?php
namespace App\Controller;
use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class CommentsController extends AppController {
    
	
    
    public function add()
    {
		$now = Time::now();
		$comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $tempComment = $this->request->data;
			$tempComment['date'] = $now;
//			var_dump($tempComment);
            $comment = $this->Comments->patchEntity($comment, $tempComment);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('Your comment has been sent for approval by admin.'));
                return $this->redirect('/articles/increasecomment/'.$tempComment['article_id']);
            }
            $this->Flash->error(__('Unable save your comment.'));
        }
        $this->set('comment', $comment);
    }
    
  public function index()
    {

//        $this->set(compact('articles'));
//	  $comments = TableRegistry::get('Comments');
        $comments = $comments->find('all')->contain('alias');
        $this->set(compact('comments'));

    }
	
	public function approveComment($id){
		$commentsTable = TableRegistry::get('Comments');
		$comment = $commentsTable->get($id); // Return article with id 12

		$comment->approved = true;
		$commentsTable->save($comment);
		$this->redirect($this->referer());
//		return $this->redirect('/articles/comments/'.$id);
	}
	
	public function disapproveComment($id){
		$commentsTable = TableRegistry::get('Comments');
		$comment = $commentsTable->get($id); // Return article with id 12

		$comment->approved = false;
		$commentsTable->save($comment);
		$this->redirect($this->referer());
	}
   
}
?>