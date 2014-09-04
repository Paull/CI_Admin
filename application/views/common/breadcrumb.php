<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title"><?php echo $template['title']; ?></h3>
            <ul class="breadcrumb breadcrumb-arrows breadcrumb-default">
                <li><a href="#ignore"><i class="fa fa-home fa-lg"></i></a></li>
<?php while($breadcrumb = array_shift($template['breadcrumbs'])): ?>
                <li><a href="<?php echo $breadcrumb['uri']; ?>"><?php if(isset($breadcrumb['icon'])) echo "<i class='{$breadcrumb['icon']}'></i> "; echo $breadcrumb['title']; ?></a></li>
<?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>
