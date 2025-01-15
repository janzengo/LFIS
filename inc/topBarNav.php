<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container-lg d-flex justify-content-between px-4">
    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= base_url ?>" class="logo d-flex align-items-center">
        <img src="<?= validate_image($_settings->info('logo')) ?>" alt="System Logo">
        <span class="d-none d-lg-block">LostButFound</span>
      </a>
    </div>
    
    <!-- End Logo -->
    <nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mainNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="<?= base_url ?>" class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>">Home</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url."?page=about" ?>" class="nav-link <?= $activePage === 'about' ? 'active' : '' ?>">About</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url.'?page=items' ?>" class="nav-link <?= $activePage === 'items' ? 'active' : '' ?>">Lost and Found</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url.'?page=found' ?>" class="nav-link <?= $activePage === 'found' ? 'active' : '' ?>">Post an Item</a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url.'?page=contact' ?>" class="nav-link <?= $activePage === 'contact' ? 'active' : '' ?>">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>

    <!-- End Icons Navigation -->


    <!-- Removed the admin login button for security  -->


  </div>
  <div class="navbar-backdrop"></div>
</header><!-- End Header -->