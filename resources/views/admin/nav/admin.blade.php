<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview"><a href="#"><i class="fa fa-lock"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}"> {{trans('label.administrator')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
            <li class="treeview"><a href="#"><i class="fa fa-user fa-fw"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.user')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('/admin/user')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li><li class="treeview">
                    {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                    {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.position')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('/admin/position/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li><li class="treeview">
                </ul>
<<<<<<< HEAD
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-language" aria-hidden="true"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.language')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
=======
            <li class="treeview"><a href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>

            </li>
            <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>


            <li class="treeview"><a href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
                <ul class="treeview-menu">
                    <li><a href="{{route('language.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.categoryproduct')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('categoryproduct.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li><li class="treeview">
                    <li><a href="{{route('categoryproduct.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li>
                </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.category')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li><li class="treeview">
                </ul>
            </li>
<<<<<<< HEAD
=======

            <li class="treeview"><a href="#"><i class="fa fa-user-md"></i> Doctor <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('doctor.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-stethoscope"></i> Servay <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
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
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8

            <li class="treeview"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.client')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('client.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li><li class="treeview">
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


    {{--product--}}
    <li class="treeview">
        <a href="#"><i class="fa fa-product-hunt"></i><span> <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.product')}}</span></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            {{--<span class="pull-right-container">--}}
            {{--<span class="label label-primary pull-right">4</span>--}}
            {{--</span>--}}
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li>
            <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.view')}}</span></a></li>

        </ul>
    </li>
    {{--product--}}




    {{--Article--}}
    <li class="treeview">
        <a href="#"><i class="fa fa-files-o"></i><span> <span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.article')}}</span></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('article.create')}}"><i class="fa fa-circle-o"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.add_new')}}</span></a></li>
            <li><a href="{{route('article.index')}}"><i class="fa fa-circle-o"></i><span class="{{Lang::locale()=== 'kh'? 'kh-os' : 'arial'}}">{{trans('label.view')}}</span></a></li>
        </ul>
    </li>
    {{--end article--}}







</ul>

    <li class="treeview"><a href="#"><i class="fa fa-area-chart"></i><span> Stock Management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">

            <li class="treeview"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Category <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-product-hunt" aria-hidden="true"></i> Product <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('product.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-money" aria-hidden="true"></i> Pricelist <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('pricelist.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-industry" aria-hidden="true"></i> Suppliers <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('suppliers.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-industry" aria-hidden="true"></i> Import Product <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="{{route('import.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                </ul>
            </li>

        </ul>
    </li>
</ul>