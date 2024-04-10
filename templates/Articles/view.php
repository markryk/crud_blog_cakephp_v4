<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<br>
<!--<p><? // echo $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></p>-->
<?= $this->Html->link('Back', '/', ['class' => 'button']) ?>
&nbsp;
<?= $this->Html->link('Edit', '/articles/edit/'.$article->slug, ['class' => 'button']) ?>
