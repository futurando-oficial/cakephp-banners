<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $banner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $banner->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Banners'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="banners form large-9 medium-8 columns content">
    <?= $this->Form->create($banner) ?>
    <fieldset>
        <legend><?= __('Edit Banner') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('alt');
            echo $this->Form->control('file');
            echo $this->Form->control('file_mobile');
            echo $this->Form->control('link');
            echo $this->Form->control('order');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
