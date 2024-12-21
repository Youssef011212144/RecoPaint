<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                <span>Gold Member</span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small"><form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        
       
        
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('product')}}">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">ADD Image Home Page</span>
          </a>
        </li>
        
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('ShowVideoAdmin')}}">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">AddVideo</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{('ShowAddProductsAdmin  ')}}">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">AddProductsHomePage</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{('showAllImages')}}">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">UpdateImageHomePage</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{('showAllVideo')}}">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">UpdateVideo</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{('showAllProductes')}}">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Update products for Sell</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="{{url('showvideo')}}">
            <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">ADD VIDEO</span>
          </a>
        </li>



      </ul>
    </nav>