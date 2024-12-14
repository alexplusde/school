<?php

namespace Alexplusde\School;

/** @var rex_fragment $this */

use rex_article;

$content1 = $this->getVar('content1');
$content2 = $this->getVar('content2');

if ($content2 === '') {
    $class_content1 = 'col-12';
    $class_content2 = 'd-none';
} else {
    $class_content1 = 'col-12 col-md-9';
    $class_content2 = 'col-12 col-md-3';
}

?>
<!--  BEGIN school/fragments/bs5/template/main.php  -->
<main id="content" class="container">
    <article class="row">
        <div class="<?= $class_content1 ?>">
        <h1 class="my-5"><?= rex_article::getCurrent()->getName() ?></h1>
        <?php echo $this->getVar('content1') ?>
        </div>
        <aside class="<?= $class_content2 ?>">
<?php echo $this->getVar('content2') ?>
        </aside>
    </article>
</main>
<!--  END school/fragments/bs5/template/main.php  -->
