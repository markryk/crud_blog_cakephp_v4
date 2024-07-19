<h1>Articles</h1>
<?= $this->Html->link('New post', '/articles/add', ['class' => 'button']); ?>

<div class="tags index content">
    <div class="table-responsive">
        <table>
            <tr>
                <th>Title</th>
                <th>Created</th>
                <th>Last modified</th>
                <th>Actions</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($articles as $article): ?>
            <tr>
                <td>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
                </td>
                <td>
                    <?= $article->created->format(DATE_RFC850) ?>
                </td>
                <td>
                    <?= $article->modified->format(DATE_RFC850) ?>
                </td>
                <td>
                    <?= $this->Html->link('View', '/articles/view/'.$article->slug, ['class' => 'button']) ?>
                    <?= $this->Html->link('Edit', '/articles/edit/'.$article->slug, ['class' => 'button']) ?>
                    <?= $this->Form->postLink('Delete', '/articles/delete/'.$article->slug, ['class' => 'button','confirm' => 'Are you sure?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
