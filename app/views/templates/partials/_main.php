<div id="main">
    <div class="container">
        <div class="row">
            <?php include '../app/views/templates/partials/_sidebar.php'; ?>
            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
                <div class="col-md-12 page-body">
                    <div class="row">
                        <div class="col-md-12 content-page">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
                <?php include '../app/views/templates/partials/_footer.php'; ?>
            </div>
            <!-- Blog Post (Right Sidebar) End -->
        </div>
    </div>
</div>