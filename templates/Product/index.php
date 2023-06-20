<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $product
 */
?>
<div class="product index content">
    <?= $this->Html->link(__('Novo produto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Produto') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('price', 'Preço') ?></th>
                    <th><?= $this->Paginator->sort('category_id', 'Categoria') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= $this->Number->format($product->price, ['places' => 2, 'precision' => 2, 'locale' => 'pt_BR', 'before' => 'R$ ']) ?></td>
                    <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Category', 'action' => 'view', $product->category->id]) : '' ?></td>
                    <td><?= h($product->created->format('d/m/Y H:i:s')) ?></td>
                    <td><?= h($product->modified->format('d/m/Y H:i:s')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja remover o produto {0}?', $product->name)]) ?>
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
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} produto(s) de {{count}} no total')) ?></p>
    </div>
</div>
