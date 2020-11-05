<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! env('APP_NAME','') !!}</title>
    <script src="/temas/inspinia/js/jquery-3.1.1.min.js"></script>
    <link href="/temas/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="/temas/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/temas/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="/temas/inspinia/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/temas/inspinia/css/animate.css" rel="stylesheet">
    <link href="/temas/inspinia/css/style.css" rel="stylesheet">
    <link href="/temas/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="/temas/inspinia/img/profile_small.jpg"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{!! Auth()->user()->name !!}</span>
                                <span class="text-muted text-xs block">{!! Auth()->user()->email !!}<b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">IN+</div>
                    </li>
                    <li class="{!! Request::is('home') ? 'active' : Null !!}"><a href="/home"><i class="fa fa-dashboard"></i> <span class="nav-label">Painel</span></a></li>
                    <li class="{!! Request::is('configuracoes') ? 'active' : Null !!}"><a href="/configuracoes"><i class="fa fa-cogs"></i> <span class="nav-label">Configurações</span></a></li>
                    <li class="{!! Request::is('moedas/*') ? 'active' : Null !!}">
                        <a href="#"><i class="fa fa-usd"></i> <span class="nav-label">Moedas</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{!! Request::is('moedas/criptomoedas') ? 'active' : Null !!}"><a href="/moedas/criptomoedas"><i class="fa fa-caret-right"></i> CriptoMoedas</a></li>
                            <li class="{!! Request::is('moedas/moedas') ? 'active' : Null !!}"><a href="/moedas/moedas"><i class="fa fa-caret-right"></i> Moedas</a></li>
                        </ul>
                    </li>
                    <li class="{!! Request::is('currencylayer') ? 'active' : Null !!}"><a href="/currencylayer"><i class="fa fa-paperclip"></i> <span class="nav-label">Dados da API</span></a></li>
                    <li class="{!! Request::is('ips_bloqueados') ? 'active' : Null !!}"><a href="/ips_bloqueados"><i class="fa fa-align-justify"></i> <span class="nav-label">IP's bloqueados</span></a></li>
                    <li class="{!! Request::is('cadastros/*') ? 'active' : Null !!}">
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Cadastros</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{!! Request::is('cadastros/administradores') ? 'active' : Null !!}"><a href="/cadastros/administradores"><i class="fa fa-caret-right"></i> Administradores</a></li>
                            <li class="{!! Request::is('cadastros/clientes') ? 'active' : Null !!}"><a href="/cadastros/clientes"><i class="fa fa-caret-right"></i> Clientes</a></li>
                        </ul>
                    </li>
                    <li class="{!! Request::is('relatorios/*') ? 'active' : Null !!}">
                        <a href="#">
                            <i class="fa fa-area-chart"></i>
                            <span class="nav-label">Relatórios</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{!! Request::is('relatorios/consultas_realizadas') ? 'active' : Null !!}"><a href="/relatorios/consultas_realizadas"><i class="fa fa-caret-right"></i> Consultas realizadas</a></li>
                            <li class="{!! Request::is('relatorios/consultas_por_cliente') ? 'active' : Null !!}"><a href="/relatorios/consultas_por_cliente"><i class="fa fa-caret-right"></i> Consultas por cliente</a></li>
                        </ul>
                    </li>
                    <li><a href="/sair"><i class="fa fa-power-off"></i> <span class="nav-label">Sair</span></a></li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <?php /*
                        <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.9.3/search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    */ ?>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li style="padding: 20px">
                        <span class="m-r-sm text-muted welcome-message">{!! trataTraducoes('Bem vindo') !!}</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/temas/inspinia/img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="float-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/temas/inspinia/img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="float-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a class="dropdown-item float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="/temas/inspinia/img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="float-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html" class="dropdown-item">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="profile.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="float-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="grid_options.html" class="dropdown-item">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="float-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html" class="dropdown-item">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <li>
                        <a class="right-sidebar-toggle">
                            <i class="fa fa-tasks"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        @yield('content')








        <!-- Toast notification -->

        <?php
            /*
            <div class="toast toast toast-bootstrap hide" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top:20px; right:20px">
                <div class="toast-header">
                    <i class="fa fa-square text-navy"> </i>
                    <strong class="mr-auto m-l-sm">Notification</strong>
                    <small>1 min ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Welcome to <strong>INSPINIA</strong> - Responsive Admin Theme.
                </div>
            </div>
            */
            ?>

            <!-- Mainly scripts -->
            <script src="/temas/inspinia/js/popper.min.js"></script>
            <script src="/temas/inspinia/js/bootstrap.js"></script>
            <script src="/temas/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="/temas/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <!-- Flot -->
            <script src="/temas/inspinia/js/plugins/flot/jquery.flot.js"></script>
            <script src="/temas/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
            <script src="/temas/inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
            <script src="/temas/inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
            <script src="/temas/inspinia/js/plugins/flot/jquery.flot.pie.js"></script>

            <!-- Peity -->
            <script src="/temas/inspinia/js/plugins/peity/jquery.peity.min.js"></script>
            <script src="/temas/inspinia/js/demo/peity-demo.js"></script>

            <!-- Custom and plugin javascript -->
            <script src="/temas/inspinia/js/inspinia.js"></script>
            <script src="/temas/inspinia/js/plugins/pace/pace.min.js"></script>

            <!-- jQuery UI -->
            <script src="/temas/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

            <!-- GITTER -->
            <script src="/temas/inspinia/js/plugins/gritter/jquery.gritter.min.js"></script>

            <!-- Sparkline -->
            <script src="/temas/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

            <!-- Sparkline demo data  -->
            <script src="/temas/inspinia/js/demo/sparkline-demo.js"></script>

            <!-- ChartJS-->
            <script src="/temas/inspinia/js/plugins/chartJs/Chart.min.js"></script>

            <!-- Toastr -->
            <script src="/temas/inspinia/js/plugins/toastr/toastr.min.js"></script>

            <script src="/temas/inspinia/js/plugins/dataTables/datatables.min.js"></script>
            <script src="/temas/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>


            <script>
                $(document).ready(function() {

                    let toast = $('.toast');

                    setTimeout(function() {
                        toast.toast({
                            delay: 5000,
                            animation: true
                        });
                        toast.toast('show');

                    }, 2200);

                    var data1 = [
                    [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
                    ];
                    var data2 = [
                    [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
                    ];
                    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                        data1, data2
                        ],
                        {
                            series: {
                                lines: {
                                    show: false,
                                    fill: true
                                },
                                splines: {
                                    show: true,
                                    tension: 0.4,
                                    lineWidth: 1,
                                    fill: 0.4
                                },
                                points: {
                                    radius: 0,
                                    show: true
                                },
                                shadowSize: 2
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#d5d5d5",
                                borderWidth: 1,
                                color: '#d5d5d5'
                            },
                            colors: ["#1ab394", "#1C84C6"],
                            xaxis:{
                            },
                            yaxis: {
                                ticks: 4
                            },
                            tooltip: false
                        }
                        );

                    var doughnutData = {
                        labels: ["App","Software","Laptop" ],
                        datasets: [{
                            data: [300,50,100],
                            backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                        }]
                    } ;


                    var doughnutOptions = {
                        responsive: false,
                        legend: {
                            display: false
                        }
                    };


                    var ctx4 = document.getElementById("doughnutChart").getContext("2d");
                    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

                    var doughnutData = {
                        labels: ["App","Software","Laptop" ],
                        datasets: [{
                            data: [70,27,85],
                            backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                        }]
                    } ;


                    var doughnutOptions = {
                        responsive: false,
                        legend: {
                            display: false
                        }
                    };


                    var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
                    new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

                });

                $(window).bind("scroll", function () {
                    let toast = $('.toast');
                    toast.css("top", window.pageYOffset + 20);

                });
            </script>
        </body>
        </html>