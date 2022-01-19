<?php include_once("inc/inc/header.php"); ?>
  <?php 
     
     ?>
   <!-- Header Layout Content -->
<div class="mdk-header-layout__content">

<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content page ">

        <div class="container-fluid page__container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="take-quiz.php">Take Quiz</a></li>

                <li class="breadcrumb-item active">Quiz Results</li>
            </ol>
              <?php 
                    $quiz_result=$quiz->viewAllResults();
                    if ($quiz_result) {
                   while ($result=$quiz_result->fetch_assoc()) {
                ?>
            <div>
            <div class="media mb-headings align-items-center">
                <div class="media-left">
                    <img src="admin/<?php echo($result['image']);?>" alt="" width="80" class="rounded">
                </div>
                <div class="media-body">
                    <h1 class="h2"><?php echo($result['title']);?></h1>
                    <p class="text-muted">submited on <?php echo(date('d M Y', strtotime($result['created_at'])));?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Result</h4>
                </div>
                <div class="card-body media align-items-center">
                    <div class="media-body">
                        <h4 class="mb-0"><?php echo($result['result']);?></h4>
                    </div>
                    
                </div>
            </div>
            </div>
            <?php }}else{ ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Result</h4>
                </div>
                <div class="card-body media align-items-center">
                    <div class="media-body">
                        <h1 class="mb-0">Your have no taken any quiz</h1>
                    </div>
                    
                </div>
            </div>
            <?php } ?>
        </div>

    </div>

<?php include_once("inc/inc/sidebar.php"); ?>
  </div>
         
    </div>
</div>
<?php include_once("inc/inc/footer.php"); ?>

  