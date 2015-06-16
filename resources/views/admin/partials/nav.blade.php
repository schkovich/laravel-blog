<div class="input-group">
    <input type="text" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
            <i class="fa fa-search"></i>
        </button>
      </span>
</div>


<ul class="nav nav-pills nav-stacked" id="menu">
    <li {{ (Request::is('admin/dashboard') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/dashboard')}}"
                >
            <i class="fa fa-dashboard fa-fw"></i><span class="hidden-sm text">
Dashboard</span>
        </a>
    </li>
    <li {{ (Request::is('admin/language*') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/language')}}"
                >
            <i class="fa fa-language"></i><span
                    class="hidden-sm text"> Language</span>
        </a>
    </li>
    <li {{ (Request::is('admin/blogs*') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/blogs')}}">
            <i class="glyphicon glyphicon-bullhorn"></i> Blogs items<span
                    class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse">
            <li {{ (Request::is('admin/blogscategory') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/blogscategory')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text"> Blogs categories </span>
                </a>
            </li>
            <li {{ (Request::is('admin/blogs') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/blogs')}}">
                    <i class="glyphicon glyphicon-bullhorn"></i><span
                            class="hidden-sm text"> Blogs</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('admin/photo*') ? ' class=active' : '') }}>
        <a href="{{URL::to('admin/photos')}}">
            <i class="glyphicon glyphicon-camera"></i> Photo items<span
                    class="fa arrow"></span>
        </a>
        <ul class="nav nav-second-level collapse" id="collapseTwo">
            <li  {{ (Request::is('admin/album') ? ' class=active' : '') }} >
                <a href="{{URL::to('admin/album')}}">
                    <i class="glyphicon glyphicon-list"></i><span
                            class="hidden-sm text"> Photo albums</span>
                </a>
            </li>
            <li {{ (Request::is('admin/photo') ? ' class=active' : '') }}>
                <a href="{{URL::to('admin/photo')}}"
                        >
                    <i class="glyphicon glyphicon-camera"></i><span
                            class="hidden-sm text"> Photo</span>
                </a>
            </li>
        </ul>
    </li>
    <li {{ (Request::is('admin/bloggers*') ? ' class=active' : '') }} >
        <a href="{{URL::to('admin/bloggers')}}"
                >
            <i class="glyphicon glyphicon-user"></i><span
                    class="hidden-sm text"> Users</span>
        </a>
    </li>
</ul>
