<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'image' => '',
            'buttons' => []
        ], $directive["args"]
    );
    $args['class'] = trim('PhotoSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $args['class'] ?>">
    <div class="PhotoSection-container">
    <div class="PhotoSection-wrap">
    <div class="PhotoSection-text">
    <h2 class="PhotoSection-title"><?= $args['title'] ?></h2>
<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    <?php if (count($args["buttons"])): ?>
        <p class="PhotoSection-buttons">
            <?php foreach ($args["buttons"] as $button): ?>
                <a class="Button PhotoSection-button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
            <?php endforeach; ?>
        </p>
    <?php endif; ?>
    </div><!-- // END .PhotoSection-text -->
    <div class="PhotoSection-photo">
        <img
            class="lazyload"
            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
            data-srcset="
                <?= resized_image_url($args['image'], 1280, 'tall') ?> 1280w,
                <?= resized_image_url($args['image'], 800, 'tall') ?> 800w,
                <?= resized_image_url($args['image'], 480, 'tall') ?> 480w,
                <?= resized_image_url($args['image'], 320, 'tall') ?> 320w
            "
            sizes="
                (min-width: 960px) 50vw,
                100vw
            ">
    </div><!-- // END .PhotoSection-video -->
    </div><!-- // END .PhotoSection-wrap -->
    </div><!-- // END .PhotoSection-container -->
    </div><!-- // END .PhotoSection -->
<?php endif; ?>