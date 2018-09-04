<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $banners
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Banner'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="banners index large-9 medium-8 columns content">
    <h3><?= __('Banners') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($banners as $banner): ?>
                <tr>
                    <td><?= $this->Number->format($banner->id) ?></td>
                    <td><?= h($banner->name) ?></td>
                    <td><?= $this->Number->format($banner->sort) ?></td>
                    <?php $status = [1 => 'ativo', 2 => 'inativo']; ?>
                    <td><?= $status[$banner->status] ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $banner->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $banner->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<script>
    $(function () {
        wireReorderList();
    });

    function wireReorderList() {
        $("#reorderExampleItems").sortable();
        $("#reorderExampleItems").disableSelection();
    }

    function saveOrderClick() {
        // ----- Retrieve the li items inside our sortable list
        var items = $("#reorderExampleItems li");

        var linkIDs = [items.size()];
        var index = 0;

        // ----- Iterate through each li, extracting the ID embedded as an attribute
        items.each(
                function (intIndex) {
                    linkIDs[index] = $(this).attr("ExampleItemID");
                    index++;
                });

        $get("<%=txtExampleItemsOrder.ClientID %>").value = linkIDs.join(",");
    }
</script>