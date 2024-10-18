<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="">
            <a href="index.html" class="logo">
                HRIS-Raktch &reg;
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a
                        data-bs-toggle="collapse"
                        href="#dashboard"
                        class="collapsed"
                        aria-expanded="false"
                    >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @foreach(getModule() as $module)
                    <li class="nav-item">
                        <a data-bs-toggle="{{$module->route==null ? 'collapse' : ""}}" href="{{$module->route==null ? '#'.$module->id : route($module->route)}}">
                            <i class="fas fa-layer-group"></i>
                            <p>{{$module->name}}</p>
                            <span class="caret {{$module->route==null ? '' : 'd-none'}}"></span>
                        </a>
                        @if($module->route == null)
                            <div class="collapse" id="{{$module->id}}">
                                <ul class="nav nav-collapse">
                                    @foreach($module->sub_module as $sub_module)

                                        <li>
                                            <a href="{{route($sub_module->route)}}">
                                                <span class="sub-item">{{$sub_module->name}}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        @endif
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
</div>
