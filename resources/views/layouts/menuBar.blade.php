<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fa fa-bus fa-lg"></i>
        </div>
        <div class="sidebar-brand-text mx-sm-1">{{ config('app.name') }}</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}"><i
                class="fa fa-home"></i><span>{{__('Dashboard')}}</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Routes -->
    <li class="nav-item">
        <a
            class="nav-link {{request()->routeIs(['route.list', 'route.show', 'route.add', 'route.edit']) ? 'expanded' : 'collapsed'}}"
            href="#"
            data-toggle="collapse"
            data-target="#nav-routes"
            aria-controls="nav-routes"
            aria-expanded="{{request()->routeIs(['route.list', 'route.show', 'route.add', 'route.edit'])}}">
            <i class="fa fa-bus"></i>
            <span>{{__('Routes')}}</span>
        </a>
        <div id="nav-routes"
             class="collapse {{request()->routeIs(['route.list', 'route.show', 'route.add', 'route.edit']) ? 'show' : ''}}"
             aria-labelledby="nav-routes"
             data-parent="#accordionSidebar">
            <div class="bg-gray-400 py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('route.list')}}">{{__('Show Routes')}}</a>
                <a class="collapse-item" href="{{route('route.add')}}">{{__('Add New Route')}}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Drivers -->
    <li class="nav-item">
        <a
            class="nav-link {{request()->routeIs(['driver.list', 'driver.show', 'driver.add', 'driver.edit']) ? 'expanded' : 'collapsed'}}"
            href="#"
            data-toggle="collapse"
            data-target="#nav-drivers"
            aria-controls="nav-drivers"
            aria-expanded="{{request()->routeIs(['driver.list', 'driver.show', 'driver.add', 'driver.edit'])}}">
            <i class="fas fa-id-card"></i>
            <span>{{__('Drivers')}}</span>
        </a>
        <div id="nav-drivers"
             class="collapse {{request()->routeIs(['driver.list', 'driver.show', 'driver.add', 'driver.edit']) ? 'show' : ''}}"
             aria-labelledby="nav-drivers"
             data-parent="#accordionSidebar">
            <div class="bg-gray-400 py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('driver.list')}}">{{__('Show Drivers')}}</a>
                <a class="collapse-item" href="{{route('driver.add')}}">{{__('Add New Driver')}}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Helpers -->
    <li class="nav-item">
        <a
            class="nav-link {{request()->routeIs(['helper.list', 'helper.show', 'helper.add', 'helper.edit']) ? 'expanded' : 'collapsed'}}"
            href="#"
            data-toggle="collapse"
            data-target="#nav-helpers"
            aria-controls="nav-helpers"
            aria-expanded="{{request()->routeIs(['helper.list', 'helper.show', 'helper.add', 'helper.edit'])}}">
            <i class="fas fa-id-card"></i>
            <span>{{__('Helpers')}}</span>
        </a>
        <div id="nav-helpers"
             class="collapse {{request()->routeIs(['helper.list', 'helper.show', 'helper.add', 'helper.edit']) ? 'show' : ''}}"
             aria-labelledby="nav-helpers"
             data-parent="#accordionSidebar">
            <div class="bg-gray-400 py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('helper.list')}}">{{__('Show Helpers')}}</a>
                <a class="collapse-item" href="{{route('helper.add')}}">{{__('Add New Helper')}}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Transports -->
    <li class="nav-item">
        <a
            class="nav-link {{request()->routeIs(['transport.list', 'transport.show', 'transport.add', 'transport.edit']) ? 'expanded' : 'collapsed'}}"
            href="#"
            data-toggle="collapse"
            data-target="#nav-transports"
            aria-controls="nav-transports"
            aria-expanded="{{request()->routeIs(['transport.list', 'transport.show', 'transport.add', 'transport.edit'])}}">
            <i class="fa fa-bus"></i>
            <span>{{__('Transports')}}</span>
        </a>
        <div id="nav-transports"
             class="collapse {{request()->routeIs(['transport.list', 'transport.show', 'transport.add', 'transport.edit']) ? 'show' : ''}}"
             aria-labelledby="nav-transports"
             data-parent="#accordionSidebar">
            <div class="bg-gray-400 py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('transport.list')}}">{{__('Show Transports')}}</a>
                <a class="collapse-item" href="{{route('transport.add')}}">{{__('Add New Transport')}}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- History -->
    <li class="nav-item">
        <a
            class="nav-link {{request()->routeIs(['log.list', 'log.show', 'log.add', 'log.edit']) ? 'expanded' : 'collapsed'}}"
            href="#"
            data-toggle="collapse"
            data-target="#nav-history"
            aria-controls="nav-history"
            aria-expanded="{{request()->routeIs(['log.list', 'log.show', 'log.add', 'log.edit'])}}">
            <i class="fa fa-calendar"></i>
            <span>{{__('Schedules')}}</span>
        </a>
        <div id="nav-history"
             class="collapse {{request()->routeIs(['log.list', 'log.show', 'log.add', 'log.edit']) ? 'show' : ''}}"
             aria-labelledby="nav-history"
             data-parent="#accordionSidebar">
            <div class="bg-gray-400 py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('log.list')}}">{{__('Show Schedules')}}</a>
                <a class="collapse-item" href="{{route('log.add')}}">{{__('Add New Schedule')}}</a>
            </div>
        </div>
    </li>

    <!-- Users -->
    <li class="nav-item">
        <a
            class="nav-link {{request()->routeIs(['user.list', 'user.show', 'user.add', 'user.edit']) ? 'expanded' : 'collapsed'}}"
            href="#"
            data-toggle="collapse"
            data-target="#nav-users"
            aria-controls="nav-users"
            aria-expanded="{{request()->routeIs(['user.list', 'user.show', 'user.add', 'user.edit'])}}">
            <i class="fa fa-users"></i>
            <span>{{__('Users')}}</span>
        </a>
        <div id="nav-users"
             class="collapse {{request()->routeIs(['user.list', 'user.show', 'user.add', 'user.edit']) ? 'show' : ''}}"
             aria-labelledby="nav-users"
             data-parent="#accordionSidebar">
            <div class="bg-gray-400 py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.list') }}">{{__('Show Users')}}</a>
                <a class="collapse-item" href="{{ route('user.add') }}">{{__('Add New User')}}</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggle -->
    <div class="text-center d-none d-md-inline">
        <button id="sidebarToggle" class="rounded-circle border-0"></button>
    </div>

</ul>
