<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- search form (Optional)
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- Optionally, you can add icons to the links -->
      <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="active"><a href="/projects"><i class="fa fa-edit"></i> <span>Projects</span></a></li>

        <?php
        $companyID = Auth::user()->companyID;
        if(TESTMATE_COMPANY_ID == $companyID){ ?>
          <li><a href="/users"><i class="fa fa fa-users"></i> <span>Users</span></a></li>
        <?php } ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
