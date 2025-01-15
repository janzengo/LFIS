<?php require_once('./config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('inc/header.php') ?>
  <body class="toggle-sidebar">
    <style>
      #banner-slider {
        height: 400px;
      }
      #banner-slider .carousel-inner {
        height: 100%;
      }
      #banner-slider img.d-block.w-100 {
        object-fit: cover;
        object-position: center center;
      }
      #site-header {
        background-image: var(--bg);
        background-size: cover;
        background-position: center;
        text-align: center;
        color: #fff;
        padding: 80px 15px;
      }
      #site-header .siteTitle {
        font-size: 2rem;
        font-weight: 700;
      }
    </style>
    <?php 
      $page = isset($_GET['page']) ? $_GET['page'] : 'home';
      $activePage = $_GET['page'] ?? 'home';
    ?>
    <?php 
      $pageSplit = explode("/", $page);  
      if (isset($pageSplit[1]))
        $pageSplit[1] = (strtolower($pageSplit[1]) == 'list') ? $pageSplit[0].' List' : $pageSplit[1];
    ?>
    <?php require_once('inc/topBarNav.php') ?>
    
    <!-- Content Wrapper. Contains page content -->
    <!-- Ensure the main content is wrapped in a responsive container -->
    <main id="main" class="main container-fluid">
    <div class="row">
        <div class="container-xl px-3 px-md-5">
            <div id="msg-container">
                <?php if ($_settings->chk_flashdata('success')): ?>
                    <script>
                        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
                    </script>
                <?php endif; ?>   
            </div>
            <?php 
                if (!file_exists($page.".php") && !is_dir($page)) {
                    include '404.html';
                } else {
                    if (is_dir($page))
                        include $page.'/index.php';
                    else
                        include $page.'.php';
                }
            ?>
        </div>
    </div>
</main>


  
    <!-- Modals -->
    <div class="modal fade" id="uni_modal" role="dialog">
      <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary bg-gradient-teal border-0 rounded-0" id="submit" onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="uni_modal_right" role="dialog">
      <div class="modal-dialog modal-full-height modal-md rounded-0" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="fa fa-arrow-right"></span>
            </button>
          </div>
          <div class="modal-body"></div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="confirm_modal" role="dialog">
      <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
          </div>
          <div class="modal-body">
            <div id="delete_content"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary bg-gradient-teal border-0 rounded-0" id="confirm" onclick="">Continue</button>
            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="viewer_modal" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-dismiss="modal">
            <span class="fa fa-times"></span>
          </button>
          <img src="" alt="">
        </div>
      </div>
    </div>
    <?php require_once('inc/footer.php') ?>
  </body>
</html>
