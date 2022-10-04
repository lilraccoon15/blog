<h1>Mes articles</h1>

<?php foreach($posts as $post) : ?>
    <?= htmlspecialchars($post->getDay()) ?>
    <?= htmlspecialchars($post->getMonth()) ?>
    <?= htmlspecialchars($post->getDate()) ?>
    <?= htmlspecialchars($post->getHour()) ?>
    <a href="/post/show?id=<?= $post->getId() ?>"><?= htmlspecialchars($post->getTitle()) ?></a>
    <?= htmlspecialchars($post->getContent()) ?>
    Rédigé par <a href="#"><?= htmlspecialchars($post->getAuthor()) ?></a>
    # <a href="#"><?= htmlspecialchars($post->getCategory()) ?></a>
<?php endforeach; ?>