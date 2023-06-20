<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $category
 */
?>
<div class="category index content">
    <?= $this->Html->link(__('Criar Categoria'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Categoria') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado em') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $category): ?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td><?= h($category->name) ?></td>
                    <td><?= h($category->created->format('d/m/Y H:i:s')) ?></td>
                    <td><?= h($category->modified->format('d/m/Y H:i:s')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'view', $category->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $category->id]) ?>
                        <?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $category->id], ['confirm' => __('Tem certeza que deseja remover a categoria {0}?', $category->name)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} categoria(s) de {{count}} no total')) ?></p>
    </div>
</div>
