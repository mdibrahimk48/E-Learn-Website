 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>


 <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="full-container">
                        <div class="email-app">
                            <div class="email-side-nav remain-height ov-h">
                                <div class="h-100 layers">
                                    <div class="p-20 bgc-grey-100 layer w-100"><a href="compose.php" class="btn btn-danger btn-block">New Message</a></div>
                                    <div class="scrollable pos-r bdT layer w-100 fxg-1">
                                        <ul class="p-20 nav flex-column">
                                            <li class="nav-item"><a href="javascript:void(0)" class="nav-link c-grey-800 cH-blue-500 active">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed">
                                                            <a href="">
                                                                <i class="mR-10 ti-email"></i> <span>Inbox</span>
                                                            </a>
                                                            
                                                        </div>
                                                        <div class="peer"><span class="badge badge-pill bgc-deep-purple-50 c-deep-purple-700">+99</span></div>
                                                    </div>
                                                </a></li>
                                            <li class="nav-item"><a href="#" class="nav-link c-grey-800 cH-blue-500">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-share"></i> <span>Sent</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-green-50 c-green-700">12</span></div>
                                                    </div>
                                                </a></li>
                                          </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="email-wrapper row remain-height pos-r scrollable bgc-white">
                                <div class="email-content open no-inbox-view">
                                    <div class="email-compose">
                                        <div class="d-n@md+ p-20"><a class="email-side-toggle c-grey-900 cH-blue-500 td-n" href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                                        <?php 
                                            if(isset($_POST['sendmail'])) {
                                                require_once '../vendor/autoload.php';
                                                require '../credential.php';
                                                // Create the Transport
                                                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
                                                  ->setUsername(EMAIL)
                                                  ->setPassword(PASS)
                                                ;

                                                // Create the Mailer using your created Transport
                                                $mailer = new Swift_Mailer($transport);

                                                // Create a message
                                                $message = (new Swift_Message($_POST['subject']))
                                                  ->setFrom([EMAIL => 'Test email send'])
                                                  ->setTo([$_POST['email']])
                                                  ->setBody($_POST['message'])
                                                  ;

                                                  if (isset($_FILES['file'])) {
                                                  $message->attach(Swift_Attachment::fromPath($_FILES['file']['tmp_name'])->setFilename('php.jpg'));
                                                  

                                                  }
                                                  if (isset($_FILES['file'])) {
                                                    if(!$mailer->send($message)) {
                                                    echo 'Message could not be sent with attachment.';
                                                    
                                                    } else {
                                                        echo 'Message has been sent with attachment';
                                                    }
                                                  }else{

                                                // Send the message
                                                $result = $mailer->send($message);
                                                if(!$result) {
                                                    echo 'Message could not be sent.';
                                                    
                                                } else {
                                                    echo 'Message has been sent';
                                                }
                                            }
                                                        }
                                         ?>
                                        <form class="email-compose-body" method="post" enctype="multipart/form-data">
                                            <h4 class="c-grey-900 mB-20">Send Message</h4>
                                            
                                            <div class="send-header">
                                                <div class="form-group">
                                                    <input type="email" name="email"  class="form-control" placeholder="Email" >
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" name="subject" placeholder="Email Subject">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">File:</label>
                                                     <input name="file" class="form-control" type="file" id="file">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" placeholder="Say Hi..." rows="10" maxlength="6000"></textarea>
                                                </div>
                                            </div>
                                            <div id="compose-area"></div>
                                            <div class="text-right mrg-top-30"><button class="btn btn-danger" name="sendmail">Send</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
<?php include 'inc/footer.php';?> 
