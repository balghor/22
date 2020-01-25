<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col justify-content-lg-start">
                <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar"
                        data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>
                <a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ asset("img/avatar.png") }}"
                                                                  width="97" height="46" alt="CoreUI Logo"></a>
                <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar"
                        data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span>
                </button>
            </div>
            <div class="col justify-content-lg-end">
                <ul class="c-header-nav float-md-left">
                    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                                                              role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="c-avatar"><img class="c-avatar-img" src="{{ asset("img/avatar.png") }}" alt="user">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left pt-0">
                            <div class="dropdown-header bg-light py-2 text-lg-right"><strong>حساب کاربری</strong></div>
                            <a class="dropdown-item" href="#">
                                تغییر کلمه عبور</a>
                            <a class="dropdown-item" href="#">
                                خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

        <div class="c-subheader px-3">
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item"><a href="/">خانه</a></li>
                <?php $segments = ''; ?>
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    <?php $segments .= '/' . Request::segment($i); ?>
                    @if($i < count(Request::segments()))
                        <li class="breadcrumb-item">{{ Request::segment($i) }}</li>
                    @else
                        <li class="breadcrumb-item active">{{ Request::segment($i) }}</li>
                    @endif
                @endfor
            </ol>
        </div>
    </header>
