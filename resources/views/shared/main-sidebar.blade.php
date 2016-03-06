<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- Optionally, you can add icons to the links -->
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="active" ><a href="/projects"><i class="fa fa-edit"></i> <span>Projects</span></a></li>

        <?php
        $companyID = Auth::user()->companyID;
        if(TESTMATE_COMPANY_ID == $companyID){ ?>
          <li class="header">ADMIN</li>
          <li><a href="/admin/companies"><i class="fa fa fa-users"></i> <span>Companies</span></a></li>
          <li><a href="/admin/projects"><i class="fa fa-th"></i> <span>Projects</span></a></li>
        <?php } ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
