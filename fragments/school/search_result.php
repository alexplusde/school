<section class="">
    <div
        class="container <?= rex_config::get("plus_bs5", "container_class") ?>">
        <?php
$server = rtrim(rex::getServer(), "/");
        $request = rex_request('search', 'string', false);

        if ($request) {
            $search_it = new search_it();
            $result = $search_it->search($request);
            # dump($result); // Zum Debuggen ausgeben.

            if ($result['count']) {
                echo '<h2 class="search_it-headline">{{ Suchergebnisse }}</h2>';

                echo '<ul class="search_it-results">';
                foreach ($result['hits'] as $hit) {

                    # dump($hit);
                    if ($hit['type'] == 'db_column' and $hit['table'] == rex::getTablePrefix().'article') {
                        $text = $hit['article_teaser'];
                    } else {
                        $text = $hit['highlightedtext'];
                    }

                    if (($hit['type'] == 'db_column' and $hit['table'] == rex::getTablePrefix().'article') || ($hit['type'] == 'article')) {
                        $article = rex_article::get($hit['fid']);
                        $hit_server = $server;
                        if (rex_addon::get('yrewrite')->isAvailable()) {
                            $hit_domain = rex_yrewrite::getDomainByArticleId($hit['fid'], $hit['clang']);
                            $hit_server = rtrim($hit_domain->getUrl(), "/");
                        }
                        echo '<li class="search_it-result search_it-article">'; ?>


        <a class="d-block card mb-3 text-decoration-none text-reset" href="'.$hit_server.$article->getUrl().'"
            title="'.$article->getName().'">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= $article->getName() ?>
                        </h2>
                        <p class="card-text"><?= $hit_server.rex_getUrl($hit['fid'], $hit['clang'], []) ?>
                        </p>
                        <p class="text"><?= $text ?>
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <?php
echo '</li>';
                    } else {
                        // '<p class="alert alert-info">Das Suchergebnis vom Typ <i class="search_it-type">'.$hit['type'].' </i> kann nicht dargestellt werden.</p>';
                    }
                }
                echo '</ul>';
            } elseif (!$result['count']) {
                echo '<p class="alert alert-info"><i class="bi bi-info-circle"></i> Die Suche nach <i class="search_it-request">'. rex_escape($request).' </i> ergab keine Treffer.</p>';
            }
        }
        ?>
    </div>
</section>