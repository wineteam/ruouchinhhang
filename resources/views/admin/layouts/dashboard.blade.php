<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{ asset('') }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Quanlity Wine') }}</title>
  <link rel="icon" href="{{ asset('images/icon-website.png') }}">
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <script src="https://kit.fontawesome.com/7da7bccd11.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/zabuto_calendar.css')}}">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/styleADmin.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet">
  <script src="{{ asset('lib/chart-master/Chart.js')}}"></script>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{ route('home') }}" class="logo"><b>Brand <span>Genuine Wine</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">

          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('Logout') }}">{{__('Logout')}}</a></li>
        </ul>
        
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="{{route('profile.edit',Auth::user()->id)}}"><img src="{{ asset('storage/avatar_user/'.Auth::user()->avatar) }}" width="80"></a></p>
          <h5 class="centered">{{Auth::user()->name}}</h5>
          <li class="mt">
          <a class="active" href="{{route ('dashboard')}}">
              <i class="fa fa-dashboard"></i>
              <span>{{__('dashboard')}}</span>
              </a>
          </li>
          <li class="sub-menu"><!-- CATELOG -->
            <a href="javascript:;">
             <i class="fas fa-book-open"></i>
              <span>Danh mục</span>
              </a>
            <ul class="sub">
              <li><a href="{{route ('dashboard.catelog')}}">Danh mục tổng</a></li>
              <li><a href="{{route ('dashboard.catelog_product')}}">Danh mục sản phẩm</a></li>
              <li><a href="{{route ('dashboard.catelog_blog')}}">Danh mục bài viết</a></li>
            </ul>
          </li>
          <li><!-- PRODUCTS -->
            <a href="{{route ('dashboard.tags')}}">
              <i class="fa fa-tags" aria-hidden="true"></i>
              <span>Tags</span>
            </a>
          </li>
          <li><!-- PRODUCTS -->
            <a href="{{route ('dashboard.product')}}">
              <i class="fas fa-wine-bottle"></i>
              <span>Sản phẩm </span>
            </a>
          </li>
          <li>
            <a href="{{route ('dashboard.blog')}}">
              <i class="far fa-newspaper"></i>
              <span>Bài viết </span>
            </a>
          </li>
          <li>
            <a href="{{route ('dashboard.coupon')}}">
              <i class="fa fa-ticket" aria-hidden="true"></i>
              <span>Mã giảm giá </span>
            </a>
          </li>
          <li>
            <a href="{{route ('dashboard.comment')}}">
              <i class="fas fa-comment"></i>
              <span>Bình luận </span>
            </a>
          </li>
          <li>
            <a href="{{route ('dashboard.banner')}}">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
              <span>Banner</span>
            </a>
          </li>
          <li>
            <a href="{{route ('dashboard.language')}}">
              <i class="fas fa-language"></i>
              <span>Ngôn ngữ</span>
            </a>
          </li>
          <li class="sub-menu"><!-- CATELOG -->
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>Tài khoản</span>
              </a>
            <ul class="sub">
              <li><a href="{{route ('dashboard.user')}}">Tài khoản</a></li>
              <li><a href="{{route ('dashboard.AdminUser')}}">Quyền quản trị</a></li>
              <li><a href="{{route ('dashboard.Passreset')}}">Thay mật khẩu</a></li>
            </ul>
          </li>
          <li class="sub-menu"><!-- ORDERS -->
            <a href="javascript:;">
              <i class="fas fa-file-invoice-dollar"></i>
              <span>Đơn hàng</span>
              </a>
            <ul class="sub">
              <li><a href="{{route ('dashboard.order')}}">Đơn hàng</a></li>
              <li><a href="{{route ('dashboard.orderdetail')}}">Đơn hàng chi tiết</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
      @yield('contentAdmin')
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Brand Genuine Wine</strong>. All Rights Reserved
        </p>
        <div class="credits">

        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
