<?php require APPROOT . '/views/includes/header.php'; ?>
    <?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT ;?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Posts
            </a>
        </div>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <div class="bg-light p-2 mb3">
                Author: <?php echo $post->name; ?> on <?php echo $post->date_created; ?>
            </div>
            <p class="card-text mt-3">
                <?php echo $post->body; ?>
            </p>
            <a href="<?php URLROOT; ?>/posts/show/<?php echo $post->post_id; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>