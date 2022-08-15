<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>

<?php use Phalcon\Tag; ?>

<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(["client/index", "Go Back"]); ?></li>
            <li class="next"><?php echo $this->tag->linkTo(["client/new", "Create "]); ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?php echo $this->getContent(); ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($page->items as $client): ?>
            <tr>
                <td><?php echo $client->getId() ?></td>
            <td><?php echo $client->getName() ?></td>
            <td><?php echo $client->getAddress() ?></td>
            <td><?php echo $client->getPhone() ?></td>

                <td><?php echo $this->tag->linkTo(["client/edit/" . $client->getId(), "Edit"]); ?></td>
                <td><?php echo $this->tag->linkTo(["client/delete/" . $client->getId(), "Delete"]); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?php echo $page->current, "/", $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo("client/search", "First") ?></li>
                <li><?php echo $this->tag->linkTo("client/search?page=" . $page->before, "Previous") ?></li>
                <li><?php echo $this->tag->linkTo("client/search?page=" . $page->next, "Next") ?></li>
                <li><?php echo $this->tag->linkTo("client/search?page=" . $page->last, "Last") ?></li>
            </ul>
        </nav>
    </div>
</div>
