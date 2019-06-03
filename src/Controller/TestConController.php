<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TestCon Controller
 *
 *
 * @method \App\Model\Entity\TestCon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestConController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $testCon = $this->paginate($this->TestCon);

        $this->set(compact('testCon'));
    }

    /**
     * View method
     *
     * @param string|null $id Test Con id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testCon = $this->TestCon->get($id, [
            'contain' => []
        ]);

        $this->set('testCon', $testCon);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testCon = $this->TestCon->newEntity();
        if ($this->request->is('post')) {
            $testCon = $this->TestCon->patchEntity($testCon, $this->request->getData());
            if ($this->TestCon->save($testCon)) {
                $this->Flash->success(__('The test con has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test con could not be saved. Please, try again.'));
        }
        $this->set(compact('testCon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Con id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testCon = $this->TestCon->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testCon = $this->TestCon->patchEntity($testCon, $this->request->getData());
            if ($this->TestCon->save($testCon)) {
                $this->Flash->success(__('The test con has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The test con could not be saved. Please, try again.'));
        }
        $this->set(compact('testCon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Con id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testCon = $this->TestCon->get($id);
        if ($this->TestCon->delete($testCon)) {
            $this->Flash->success(__('The test con has been deleted.'));
        } else {
            $this->Flash->error(__('The test con could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
