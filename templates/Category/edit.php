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
            <?= $this->Form->postLink(
                __('Remover'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Tem certeza que deseja remover a categoria {0}?', $category->name), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="category form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Editar Categoria') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
