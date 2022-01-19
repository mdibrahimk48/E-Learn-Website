 <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
    <div class="htc__blog__right__sidebar mt--50">
        <!-- Start All Courses -->
        <div class="htc__blog__courses">
            <h2 class="title__style--2">All Notices</h2>
            <ul class="blog__courses">
               <?php 
                $notices=$notice->getNotices();
                if ($notices) {
               while ($result=$notices->fetch_assoc()) {
             ?>
                <li><a href="notice-details.php?noticeID=<?php echo($result['id']) ; ?>"><?php echo($result['title']) ;?>,<?php echo(date('M  Y', strtotime($result['started_at']))); ?></a></li>
                <?php }}?>
            </ul>
        </div>
        <!-- End All Courses -->
        
        
        
    </div>
</div>