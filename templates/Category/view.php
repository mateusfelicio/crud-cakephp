<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('Editar Categoria'), ['action' => 'edit', $category->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Remover Categoria'), ['action' => 'delete', $category->id], ['confirm' => __('Tem certeza que deseja remover a categoria {0}?', $category->name), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Categoria'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Criar Categoria'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="category view content">
            <h3><?= h($category->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($category->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($category->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado em') ?></th>
                    <td><?= h($category->created->format('d/m/Y H:i:s')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado em') ?></th>
                    <td><?= h($category->modified->format('d/m/Y H:i:s')) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Produto relacionado') ?></h4>
                <?php if (!empty($category->product)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Descrição') ?></th>
                            <th><?= __('Preço') ?></th>
                            <th><?= __('Categoria') ?></th>
                            <th><?= __('Criado em') ?></th>
                            <th><?= __('Modificado em') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($category->product as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td><?= $this->Number->format($product->price, ['places' => 2, 'precision' => 2, 'locale' => 'pt_BR', 'before' => 'R$ ']) ?></td>
                            
                            <td><?= h($product->category_id) ?></td>
                            <td><?= h($product->created->format('d/m/Y H:i:s')) ?></td>
                            <td><?= h($product->modified->format('d/m/Y H:i:s')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Visualizar'), ['controller' => 'Product', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Product', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Remover'), ['controller' => 'Product', 'action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja remover a categoria {0}?', $product->name)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
