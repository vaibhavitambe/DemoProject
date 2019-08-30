<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('admin/dist/img/avatar3.png')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          
          <li class="active">
            <a href="{{ route('users.index') }}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>User Management</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
              </span>
            </a> 
          </li>
          
          <li class="active">
            <a href="{{ route('configurations.index') }}">
              <i class="fa fa-cog" aria-hidden="true"></i>
              <span>Configuration Management</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
              </span>
            </a> 
          </li>

          <li class="active">
            <a href="{{ route('banners.index') }}">
              <i class="fa fa-link" aria-hidden="true"></i>
              <span>Banner Management</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
              </span>
            </a> 
          </li>

          <li class="active">
            <a href="{{ route('categories.index') }}">
              <i class="fa fa-list-alt" aria-hidden="true"></i>
              <span>Category Management</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
              </span>
            </a> 
          </li>

          <li class="treeview">
            <a href="{{ route('products.index') }}">
              <i class="fa fa-product-hunt"></i> <span>Product Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> Product</a></li>
              <li><a href="{{ route('attributes.index') }}"><i class="fa fa-circle-o"></i> Product-Attribute</a></li></ul>
          </li>

          <li class="active">
            <a href="{{ route('coupons.index') }}">
              <i class="fa fa-tag fa-lg" aria-hidden="true"></i>
              <span>Coupon Management</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right"></span>
              </span>
              
            </a> 
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

  