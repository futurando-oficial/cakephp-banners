<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $banner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Banners'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="banners form large-9 medium-8 columns content">
    <?= $this->Form->create($banner,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Banner') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('alt');
            echo $this->Form->control('file',['type'=>'file']);
            echo $this->Form->control('file_mobile',['type'=>'file']);
            echo $this->Form->control('link');
            echo $this->Form->control('sort');
            echo $this->Form->control('status',['options'=>['1'=>'Ativo','0'=>'Inativo']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
