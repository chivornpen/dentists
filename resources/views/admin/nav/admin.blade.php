<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview"><a href="#"><i class="fa fa-lock"></i><span> Administrator</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
            <li class="treeview"><a href="#"><i class="fa fa-user fa-fw"></i> User <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/admin/user')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add User</a></li><li class="treeview">
                </ul>
            </li>
            {{--permissions--}}
            <li class="treeview"><a href="#"><i class="fa fa-exchange" aria-hidden="true"></i> Permission <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/permission')}}">&nbsp;&nbsp;&nbsp;&nbsp; permission</a></li><li class="treeview">
                </ul>
            <li class="treeview"><a href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

            </li>
            <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/position/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Staff <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('staff.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-university " aria-hidden="true"></i> Branch <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('branch.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-user-md"></i> Doctor <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('doctor.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-user-md"></i> Servay <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('servay.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-users " aria-hidden="true"></i> Client <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('client.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>

            </li>
            <li class="treeview"><a href="#"><i class="fa fa-thermometer-quarter " aria-hidden="true"></i> Treatment <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('treatment.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    <li><a href="{{route('view-treatment')}}">&nbsp;&nbsp;&nbsp;&nbsp; Views</a></li><li class="treeview">
                </ul>

            </li>
            <li class="treeview"><a href="#"><i class="fa fa-tasks " aria-hidden="true"></i> Plan <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('plan.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    <li><a href="{{route('plan.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; Views</a></li><li class="treeview">
                </ul>

            </li>

            <li class="treeview"><a href="#"><i class="fa fa-suitcase " aria-hidden="true"></i> Treatment Procedure <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('treatmentprocedure.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    <li><a href="{{route('treatmentprocedure.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; Views</a></li><li class="treeview">
                </ul>

            </li>

            <li class="treeview"><a href="#"><i class="fa fa-file-pdf-o " aria-hidden="true"></i> Invoice <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('invoice.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    <li><a href="{{route('invoice.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; Views</a></li><li class="treeview">
                </ul>

            </li>

            <li class="treeview"><a href="#"><i class="fa fa-medkit " aria-hidden="true"></i> Prescription <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('prescription.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    <li><a href="{{route('prescription.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; Views</a></li><li class="treeview">
                </ul>

            </li>


        </ul>

    </li>

</ul>