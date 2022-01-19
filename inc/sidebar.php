 <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
    <div class="htc__blog__right__sidebar mt--50">
        <!-- Start All Courses -->
        <div class="htc__blog__courses">
            <h2 class="title__style--2">All Classes</h2>
            <ul class="blog__courses">
                <?php 
                $classes=[
                    'six'    =>'Six',
                    'seven'  =>'Seven',
                    'eight'  =>'Eight',
                    'nine'   =>'Nine',
                    'ten'    =>'Ten',
                    'eleven' =>'Eleven',
                    'twelve' =>'Twelve'
                ];
                foreach ($classes as $key => $class) {
                ?>
                <li><a href="searchbyclass.php?classId=<?php echo($key); ?>"><?php echo($class); ?></a></li>
                <?php }?>
            </ul>
        </div>
        <!-- End All Courses -->
        
        
        
    </div>
</div>