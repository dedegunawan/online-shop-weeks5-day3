<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            <li class="header">MENU UTAMA</li>

            <?php
            $menus = (new \App\Menu())->menu_parent();
            ?>

            @foreach($menus as $menu)
                <?php
                $has_child = $menu->child->count();
                ?>
                @if($has_child)
                    <li class="treeview">
                        <a href="{{url($menu['url'])}}">
                            <i class="{{$menu['icon']?$menu['icon']:'fa fa-files-o'}}"></i> <span>{{$menu['nama_menu']}}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @foreach($menu->child as $child)
                                <li>
                                    <a href="{{url($child['url'])}}">
                                        <i class="{{$child['icon']?$child['icon']:'fa fa-files-o'}}"></i> <span>{{$child['nama_menu']}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{url($menu['url'])}}">
                            <i class="{{$menu['icon']?$menu['icon']:'fa fa-files-o'}}"></i> <span>{{$menu['nama_menu']}}</span>
                        </a>
                    </li>
                @endif


            @endforeach

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
