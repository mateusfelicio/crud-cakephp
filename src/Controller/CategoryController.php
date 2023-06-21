<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Category Controller
 *
 * @property \App\Model\Table\CategoryTable $Category
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $category = $this->paginate($this->Category);

        $this->set(compact('category'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Category->get($id, [
            'contain' => ['Product'],
        ]);

        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Category->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Category->patchEntity($category, $this->request->getData());
            if ($this->Category->save($category)) {
                $this->Flash->success(__('Categoria criada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao criar a categoria'));
        }
        $this->set(compact('category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Category->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Category->patchEntity($category, $this->request->getData());
            if ($this->Category->save($category)) {
                $this->Flash->success(__('Categoria editada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao editar categoria'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Category->get($id);
        try {
            if ($this->Category->delete($category)) {
                $this->Flash->success(__('Categoria removida com sucesso'));
            } else {
                $this->Flash->error(__('Erro ao remover categoria'));
            }
        } catch (\Throwable $th) {
            $this->Flash->error(__('Erro ao remover categoria. Possivelmente existe items relacionado com essa categoria'));
        }
        

        return $this->redirect(['action' => 'index']);
    }
}
