<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Remover'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Tem certeza que deseja remover o produto {0}?', $product->name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Product'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="product form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Editar Produto') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('description', ['label' => 'Descrição']);
                    echo $this->Form->control('price', ['label' => 'Preço']);
                    echo $this->Form->control('category_id', ['label' => 'Categoria', 'options' => $category]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
