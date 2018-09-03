<?php
namespace Banners\Controller\Painel;

use Banners\Controller\AppController;

/**
* Banners Controller
*
*
* @method \Banners\Model\Entity\Banner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
*/
class BannersController extends AppController
{
    
    /**
    * Index method
    *
    * @return \Cake\Http\Response|void
    */
    public function index()
    {
        $banners = $this->paginate($this->Banners);
        
        $this->set(compact('banners'));
    }
    
    /**
    * View method
    *
    * @param string|null $id Banner id.
    * @return \Cake\Http\Response|void
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
        $banner = $this->Banners->get($id, [
        'contain' => []
        ]);
        
        $this->set('banner', $banner);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $banner = $this->Banners->newEntity();
        if ($this->request->is('post')) {
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            if(!empty($banner->url)){
                $banner->type = $this->typeDetector($banner->url);
            }else{
                $banner->type = 'image';
            }
            if($banner->type === false){
                $this->Flash->error(__('URL de video incompativel'));
            }else{
                if ($this->Banners->save($banner)) {
                    $this->Flash->success(__('The banner has been saved.'));
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The banner could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('banner'));
    }
    
    /**
    * Edit method
    *
    * @param string|null $id Banner id.
    * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $banner = $this->Banners->get($id, [
        'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banner = $this->Banners->patchEntity($banner, $this->request->getData());
            if(!empty($banner->url)){
                $banner->type = $this->typeDetector($banner->url);
            }else{
                $banner->type = 'image';
            }
            if($banner->type === false){
                $this->Flash->error(__('URL de video incompativel'));
            }else{
                if ($this->Banners->save($banner)) {
                    $this->Flash->success(__('The banner has been saved.'));
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The banner could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('banner'));
    }
    
    /**
    * Delete method
    *
    * @param string|null $id Banner id.
    * @return \Cake\Http\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        if ($this->Banners->delete($banner)) {
            $this->Flash->success(__('The banner has been deleted.'));
        } else {
            $this->Flash->error(__('The banner could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    private function typeDetector($url){
        
        $VimeoRgx = '/https:\/\/player\.vimeo\.com\/video\//m'; //viemo Regex
        preg_match_all($VimeoRgx, $url, $matches, PREG_SET_ORDER, 0);
        if(count($matches)){
            return 'vimeo';
        }
        
        $YoutudotbeRgx = '/https:\/\/youtu\.be\//m';
        preg_match_all($YoutudotbeRgx, $url, $matches, PREG_SET_ORDER, 0);
        if(count($matches)){
            return 'youtube';
        }
        
        $YoutubeRgx = '/https:\/\/www\.youtube\.com\/watch\?v=/m';
        preg_match_all($YoutubeRgx, $url, $matches, PREG_SET_ORDER, 0);
        if(count($matches)){
            return 'youtube';
        }
        
        return false;
    }
}