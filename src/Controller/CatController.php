<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cat Controller
 *
 *
 * @method \App\Model\Entity\Cat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CatController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cat = $this->paginate($this->Cat);

        $this->set(compact('cat'));
    }

    /**
     * View method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cat = $this->Cat->get($id, [
            'contain' => []
        ]);

        $this->set('cat', $cat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cat = $this->Cat->newEntity();
        if ($this->request->is('post')) {
            $cat = $this->Cat->patchEntity($cat, $this->request->getData());
            if ($this->Cat->save($cat)) {
                $this->Flash->success(__('The cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat could not be saved. Please, try again.'));
        }
        $this->set(compact('cat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cat = $this->Cat->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cat = $this->Cat->patchEntity($cat, $this->request->getData());
            if ($this->Cat->save($cat)) {
                $this->Flash->success(__('The cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat could not be saved. Please, try again.'));
        }
        $this->set(compact('cat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cat = $this->Cat->get($id);
        if ($this->Cat->delete($cat)) {
            $this->Flash->success(__('The cat has been deleted.'));
        } else {
            $this->Flash->error(__('The cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
