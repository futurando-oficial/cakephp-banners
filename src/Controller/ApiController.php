<?php

namespace Banners\Controller;

use Banners\Controller\AppController;

/**
 * Api Controller
 *
 *
 * @method \Banners\Model\Entity\Api[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->loadModel('Banners');
        $bannersdata = $this->Banners->find()->where(['status' => $this->Banners::STATUS_ATIVO])->order(['Banners__order' => 'ASC']);
        $banners = $this->paginate($bannersdata);

        $this->set(compact('banners'));
        $this->set('_serialize', ['banners']);
    }

}
