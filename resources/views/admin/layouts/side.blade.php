<!-- <li class="m-menu__item" aria-haspopup="true">
    <a href="{{url('admincp')}}" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-line-graph"></i>
        <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">إحصائيات عامة</span>
            </span>
        </span>
    </a>
</li> -->
<li class="m-menu__item" aria-haspopup="true">
    <a href="/admincp/countries" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-layers"></i>
        <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">Countries</span>
            </span>
        </span>
    </a>
</li>

<li class="m-menu__item" aria-haspopup="true">
    <a href="/admincp/cities" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-layers"></i>
        <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">Cities</span>
            </span>
        </span>
    </a>
</li>

<li class="m-menu__item" aria-haspopup="true">
    <a href="/admincp/regions" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-layers"></i>
        <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">Regions</span>
            </span>
        </span>
    </a>
</li>

<li class="m-menu__item" aria-haspopup="true">
    <a href="/admincp/countries" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-layers"></i>
        <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">Currencies</span>
            </span>
        </span>
    </a>
</li>

@can('role-list')
    <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="javascript:;" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon flaticon-customer"></i>
            <span class="m-menu__link-text">نظام الصلاحيات</span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
        </a>
        <div class="m-menu__submenu ">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
                <li class="m-menu__item" aria-haspopup="true">
                    <a href="{{url('admincp/roles')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                        <span class="m-menu__link-text">عرض المجموعات</span>
                    </a>
                </li>
                @can('role-create')
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{url('admincp/roles/create')}}" class="m-menu__link ">
                            <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                            <span class="m-menu__link-text">إضافه مجموعه جديده</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcan

<!-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
    <a href="javascript:;" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-layers"></i>
        <span class="m-menu__link-text">مثال لقائمة</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item " aria-haspopup="true">
                <a href="#" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">قائمة أولى</span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                    <span class="m-menu__link-text">قائمة فرعيه</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">قائمة</span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true">
                            <a href="#" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">قائمة</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
    <a href="javascript:;" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-layers"></i>
        <span class="m-menu__link-text">المناطق</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            <li class="m-menu__item " aria-haspopup="true">
                <a href="/admincp/countries" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">الدول</span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true">
                <a href="/admincp/cities" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">المدن</span>
                </a>
            </li>
            <li class="m-menu__item " aria-haspopup="true">
                <a href="/admincp/zones" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">الاحياء</span>
                </a>
            </li>

        </ul>
    </div>
</li> -->
