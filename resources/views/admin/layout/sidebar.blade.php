  <!-- ========== Left Sidebar Start ========== -->
  <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <img src="{{asset("admin")}}/images/logo.png" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ config('app.name')}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="md md-settings"></i> Reset Profile</a></li>
                        </ul>
                    </div>

                    <p class="text-muted m-0">Admin</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ route("dashboard")}}" class="waves-effect {{set_Topmenu("dashboard")}}"><i class="md md-home"></i><span> Dashboard </span></a>
                    </li>
                    <li>
                        <a href="{{ route("subscribe.index")}}" class="waves-effect {{set_Topmenu("subscribe")}}"><i class="ion ion-android-sort"></i><span> Subscribe </span></a>
                    </li>
                    <li>
                        <a href="{{ route("segment.index")}}" class="waves-effect {{set_Topmenu("segment")}}"><i class="ion ion-android-sort"></i><span> Segment </span></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->
