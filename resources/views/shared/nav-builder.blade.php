      <div class="c-sidebar-brand bg-light"><img class="c-sidebar-brand-full" src="{{ asset("public/img/full_logo.png") }}" width="118" height="54" alt="shafee"><img class="c-sidebar-brand-minimized" src="{{ asset("public/img/min_logo.png") }}" width="118" height="54" alt="shafee"></div>
        <ul class="c-sidebar-nav" data-drodpown-accordion="true">
            <li class="c-sidebar-nav-divider"></li>
            <li class="c-sidebar-nav-title">مدیریت</li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("dashboard") }}"><span class="c-sidebar-nav-icon c-icon cil-home"></span> خانه</a></li>
            @if(session("UserData")->type=="Manager")
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("project.create") }}"><span class="c-sidebar-nav-icon c-icon cil-apps-settings"></span>  افزودن پروژه</a></li>
            @endif
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("project.index") }}"><span class="c-sidebar-nav-icon c-icon cil-blur-circular"></span>  مدیریت پروژه</a></li>
            @if(session("UserData")->type=="Manager")
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("user.create") }}"><span class="c-sidebar-nav-icon c-icon cil-user-follow"></span>  افزودن کاربر</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("user.index") }}"><span class="c-sidebar-nav-icon c-icon cil-user"></span>  مدیریت کاربران</a></li>
                @endif
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("media.create") }}"><span class="c-sidebar-nav-icon c-icon cil-image-plus"></span>  افزودن رسانه</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("media.index") }}"><span class="c-sidebar-nav-icon c-icon cil-media-play"></span>  مدیریت رسانه</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("comment.index") }}"><span class="c-sidebar-nav-icon c-icon cil-comment-bubble"></span>  مدیریت نظرات</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("logout") }}"><span class="c-sidebar-nav-icon c-icon cil-account-logout"></span>خروج </a></li>
{{--            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">--}}
{{--                <a class="c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--                    <span class="c-sidebar-nav-icon c-icon cil-apps-settings"></span> &nbsp; Buttons</a>--}}
{{--                <ul class="c-sidebar-nav-dropdown-items">--}}
{{--                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"> Buttons</a></li>--}}
{{--                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"> Brand Buttons</a></li>--}}
{{--                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"> Buttons Group</a></li>--}}
{{--                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"> Dropdowns</a></li>--}}
{{--                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/loading-buttons.html"> Loading Buttons<span class="badge badge-danger">PRO</span></a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}

        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
