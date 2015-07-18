<div class="row">
    <div class="col-sm-8">
        <?php foreach (App::getInstance()->getTable('Post')->last() as $post): ?>
            <h2>
                <a href="<?= $post->url ?>"><?= $post->title; ?></a>
            </h2>
            <p>
                <em><?= $post->categories; ?></em>
            </p>
            <p><?= $post->preview; ?></p>
        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach (App::getInstance()->getTable('Categorie')->all() as $categories): ?>
                <li>
                    <a href="<?= $categories->url; ?>"><?= $categories->title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>