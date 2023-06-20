<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editar Produto'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Remover Produto'), ['action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja remover o produto {0}?', $product->name), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Produtos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Novo Produto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="product view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Category', 'action' => 'view', $product->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Preço') ?></th>
                    <td><?= $this->Number->format($product->price, ['places' => 2, 'precision' => 2, 'locale' => 'pt_BR', 'before' => 'R$ ']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado em') ?></th>
                    <td><?= h($product->created->format('d/m/Y H:i:s')) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado em') ?></th>
                    <td><?= h($product->modified->format('d/m/Y H:i:s')) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descrição') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
