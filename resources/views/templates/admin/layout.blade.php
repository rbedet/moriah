<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moriah Admin Panel</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/favicon.png')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('admin/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-plus"></i> <span>Mt. Moriah</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{asset('admin/images/user.png')}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2> {{ Auth::user()->name }}</h2>
                                @foreach(Auth::user()->roles as $r)
                                    <span class="user_info"> {{$r->display_name}} </span>
                                @endforeach
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home </a></li>
                                <li><a><i class="fa fa-file-text"></i> Products <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
										@role('admin')
                                        <li><a href="{{route('lot-groups.index')}}">Memorial Lot Groups</a></li>
                                        <li><a href="{{route('lot-types.index')}}">Memorial Lot Types</a></li>
										@endrole
										@role('manager' || 'admin')
                                        <li><a href="{{route('lots.index')}}">Memorial Lots List</a></li>
										@endrole
                                    </ul>
                                </li>
								@role('admin')
                                <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> Users </a></li>
								@endrole
                                <li><a href="{{route('sales.index')}}"><i class="fa fa-line-chart"></i> Sales </a></li>
                                <li><a href="{{route('payments.index')}}"><i class="fa fa-money"></i> Payments</a></li>
								<li><a><i class="fa fa-edit"></i> Record <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('customers.index')}}">Client/Owner</a></li>
                                        <li><a href="{{route('sales-person.index')}}">Sales Person</a></li>
                                        <li><a href="{{route('deceased.index')}}">Deceased</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('admin/images/user.png')}}" alt=""> {{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="#"> Profile</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
								</ul>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @include('templates.admin.partials.alerts')
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/js/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/js/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/js/datatables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/js/jszip.min.js')}}"></script>
    <script src="{{asset('admin/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/js/vfs_fonts.js')}}"></script>
    <!-- Autocomplete -->
    <script src="{{asset('admin/js/jquery.autocomplete.js')}}"></script>
    <!-- Lot Computation -->
	<script src="{{asset('manager/js/lot_computation.js')}}"></script>
	<!-- Payment Breakdown Computation -->
	<script src="{{asset('manager/js/payment.js')}}"></script>
	<!-- Input Mask -->
	<script src="{{asset('manager/js/inputmask.min.js')}}"></script>
	<script src="{{asset('manager/js/jquery.inputmask.min.js')}}"></script>
	<script src="{{asset('manager/js/inputmask.extensions.min.js')}}"></script>
	<script src="{{asset('manager/js/inputmask.numeric.extensions.min.js')}}"></script>

 
    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin/js/custom.min.js')}}"></script>
	
    <script>
		var customer_list;
		var sales_people_list;
		var lot_list;
		
        $('#customer').autocomplete({
            lookup: customer_list,
            onSelect: function (suggestion) {
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				$( "#customer" ).val( suggestion.value );
				$( "#customer_id" ).val( suggestion.data );
            }
        });
		
        $('#sales_person').autocomplete({
            lookup: sales_people_list,
            onSelect: function (suggestion) {
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				$( "#sales_person" ).val( suggestion.value );
				$( "#sales_person_id" ).val( suggestion.data );
				
            }
        });
				
        $('#lot').autocomplete({
            lookup: lot_list,
            onSelect: function (suggestion) {
                //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				$( "#lot" ).val( suggestion.value );
				$( "#lot_id" ).val( suggestion.data );
            }
        });
		
    </script>
    <!-- Datatables -->
    <script>
        $(document).ready(function() {
			//input mask for  thousand separator
			$(".numeric").inputmask("decimal", { radixPoint: ".", autoGroup: true, groupSeparator: ",", groupSize: 3 ,removeMaskOnSubmit: true,rightAlign: false,autoUnmask: true});
			
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        dom: "Bfrtip",
                        buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            $('#datatable').dataTable();

            $('#datatable-keytable').DataTable({
                keys: true
            });

            $('#datatable-responsive').DataTable();

            $('#datatable-scroller').DataTable({
                ajax: "js/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });

            $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });

            var $datatable = $('#datatable-checkbox');

            $datatable.dataTable({
                'order':	 [[ 1, 'asc' ]],
                'columnDefs': [
                { orderable: false, targets: [0] }
                ]
            });
            $datatable.on('draw.dt', function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green'
                });
            });

            TableManageButtons.init();
			
			$('#payments').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					{
						extend: "copy",
						className: "btn-sm", 
						footer: true
					},
					{
						extend: "csv",
						className: "btn-sm", 
						footer: true
					},
					{
						extend: "excel",
						className: "btn-sm",
						footer: true
					},
					{
						extend: "pdfHtml5",
						className: "btn-sm", 
						footer: true
					},
					{
						extend: "print",
						className: "btn-sm", 
						footer: true
					},
				],
				"footerCallback": function ( row, data, start, end, display ) {
					var api = this.api(), data;
 
					// Remove the formatting to get integer data for summation
					var intVal = function ( i ) {
						return typeof i === 'string' ?
							i.replace(/[\$,]/g, '')*1 :
							typeof i === 'number' ?
								i : 0;
					};
					
					
					// Total over all pages
					/*
					total = api
						.column( 4 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					*/
					// Total over this page
					interment = api
						.column( 4, { search: 'applied'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					lot = api
						.column( 5, { search: 'applied'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					pcf= api
						.column( 6, { search: 'applied'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					vat = api
						.column( 7, { search: 'applied'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					payment = api
						.column( 8, { search: 'applied'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Update footer
					$( api.column(4 ).footer() ).html(
						'Php '+ interment.toFixed(2)
					);
					$( api.column( 5 ).footer() ).html(
						'Php '+ lot.toFixed(2)
					);
					$( api.column( 6 ).footer() ).html(
						'Php '+ pcf.toFixed(2)
					);
					$( api.column( 7 ).footer() ).html(
						'Php '+ vat.toFixed(2)
					);
					$( api.column( 8 ).footer() ).html(
						'Php '+ payment.toFixed(2)
					);
					
				}
			} );		
	//
        });
    </script>
    <!-- /Datatables -->
</body>
</html>