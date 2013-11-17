                <div class="row-fluid">
                    <div class="span12">
                        <h3 class="page-title"><?php echo $template['title']; ?></h3>
                        <!-- BEGIN BREADCRUMBS -->
                        <ul class="breadcrumb">
<?php while($breadcrumb = array_shift($template['breadcrumbs'])): ?>
                            <li><?php if(isset($breadcrumb['icon'])) echo "<i class='{$breadcrumb['icon']}'></i> "; echo anchor($breadcrumb['uri'], $breadcrumb['title']); if(!empty($template['breadcrumbs'])) echo ' <span class="icon-angle-right"></span>'; ?></li>
<?php endwhile; ?>
                        </ul>
                        <!-- END BREADCRUMBS -->
                    </div>
                </div>
