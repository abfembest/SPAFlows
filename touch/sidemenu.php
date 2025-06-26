<?php  include 'topmenu.php'; ?>
<title>Perfect Touch Salon and SPA</title>
 <aside class="main-sidebar sidebar-dark-olive" style="font-size: 20px;">
    <!-- Brand Logo -->
    <a href="front.php" class="brand-link">
      <!--<img src="dist/img/" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-bold" style="font-size: 14px; font-weight: bolder; font-family: sans-serif;">Perfect Touch Salon and SPA</span>
    </a>
      


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php $name = $_SESSION['name'];

                include 'image.php'; 
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color:white; font-weight: bold;"><?php  
          echo $_SESSION["name"];
          
          ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="front.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!--<i class="right fas fa-angle-left"></i>-->
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="services.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Render service</p>
                </a>
              </li>
              
            </ul>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="servicelists.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service lists</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="expenses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expenses</p>
                </a>
              </li>
            </ul>
            
          </li>
          
              
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Customers
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="debtsrpt.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer lists</p>
                </a>
              </li>              
                          
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reg. services
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="servicelists.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update services</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="newservices.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New services</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="newasset.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asset management</p>
                </a>
              </li>          
            </ul> 
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reportpage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>reports</p>
                </a>
              </li>
            </ul>
            
            
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Others
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="userlist.php" class="nav-link">
                  <i class="far fas fa-sign-out-alt"></i>
                  <p>User management</p>
                </a>
              </li>

                  <li class="nav-item">
                <a href="stafflist.php" class="nav-link">
                  <i class="far fas fa-sign-out-alt"></i>
                  <p>Staff list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="createuser.php" class="nav-link">
                  <i class="far fas fa-sign-out-alt"></i>
                  <p>Create new user</p>
                </a>
              </li>
              
                <li class="nav-item">
                <a href="exit.php" class="nav-link">
                  <i class="far fas fa-sign-out-alt"></i>
                  <p>Log Out</p>
                </a>
              </li>
              </ul>
     
      </nav>
      <!-- /.sidebar-menu -->
      <?php include 'javascriptlinks.php'?>
    </div>
    <!-- /.sidebar -->
  </aside>
     
