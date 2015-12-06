<?php
namespace App\Controller;
use App\Controller\AppController;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class TagsController extends AppController {
    
	public function index()
    {
        $this->set('tags', $this->paginate($this->Tags));
        $this->set('_serialize', ['tags']);
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
		$articlestagsTable = TableRegistry::get('ArticlesTags');
        $articlesArray = $articlestagsTable->find('all', array('conditions' => array('tag_id' => $id)))->contain(['Articles']);
		
		
		$this->set(compact('articlesArray'));
    }

	
    
    public function add()
    {
		$tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $tempTag = $this->request->data;
			$tempTag['slug'] = urlencode($tempTag['value']);
            $tag = $this->Tags->patchEntity($tag, $tempTag);
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('Tag created successfully.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Unable save your comment.'));
        }
        $this->set('tag', $tag);
    }
    
//  public function index()
//    {
//	  	$tagsTable = TableRegistry::get('Tags');
//
//        $tags = $tagsTable->find('all');
//        $this->set(compact('tags'));
//  	}
   public function deleteTag($id){
		$tagsTable = TableRegistry::get('Tags');
		$tag = $tagsTable->get($id); // Return article with id 12
	   if ($tagsTable->delete($tag)) {
            $this->Flash->success(__('The Tag has been deleted.'));
            return $this->redirect($this->referer());
        }
	}
   
}
?>