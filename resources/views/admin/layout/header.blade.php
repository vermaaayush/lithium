@php
  use App\Models\Config;
  $company = Config::first();
  
@endphp

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{$company->name}}</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ $company->favicon }}">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/unslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/weather-icons/climacons.min.css') }}">
<!-- END VENDOR CSS-->
<!-- BEGIN ROBUST CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
<!-- END ROBUST CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/calendars/clndr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-switch.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/switch.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
<!-- END Page Level CSS-->
<!-- BEGIN Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">
<!-- END Custom CSS-->
<style>
  label{
      font-weight: bold;
      font-size:18px
  }


    /* Hide number spinner for number input */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

</style>
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" src="{{ $company->favicon }}">
                <h3 class="brand-text">Admin Control</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
            
             
            </ul>
            <ul class="nav navbar-nav float-right">         
             
            
             
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="{{ $company->favicon }}" alt="avatar"><i></i></span><span class="user-name">{{ $company->name }}</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><i class="ft-server"></i> Settings</a>
                  <a class="dropdown-item" href="/system_config"><i class="ft-settings"></i>System Config</a>
                  <a class="dropdown-item" href="/bank_info"><i class="ft-file"></i>Bank Info</a>
                  {{-- <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> --}}
                 <a  class="dropdown-item" href="/admin_logout"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="/admin_dashboard"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
          
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.users.main">Users</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="/add_user" data-i18n="nav.users.users_contacts">Add New User</a>
              </li>
              <li><a class="menu-item" href="/users" data-i18n="nav.users.users_contacts">Users List</a>
              </li>
            
              <li><a class="menu-item" href="/blacklisted_user" data-i18n="nav.users.user_cards">Suspended Users</a>
              </li>
            </ul>
          </li> 

          <li class=" nav-item"><a href="#"><i class="icon-screen-desktop"></i><span class="menu-title" data-i18n="nav.users.main">Investment</span></a>
            <ul class="menu-content">
             
              <li><a class="menu-item" href="/add_plan" data-i18n="nav.users.users_contacts">Add New Plan</a>
              </li>
              <li><a class="menu-item" href="/plans" data-i18n="nav.users.user_profile">All Plans</a>
              </li>
              <li><a class="menu-item" href="/all_investment" data-i18n="nav.users.user_cards">All Investment</a>
              </li>
            </ul>
          </li>

          {{-- <li class=" nav-item"><a href="#"><i class="icon-credit-card"></i><span class="menu-title" data-i18n="nav.users.main">Deposite</span></a>
            <ul class="menu-content">
             
            
              <li><a class="menu-item" href="/deposits" data-i18n="nav.users.user_profile">All Deposits</a>
              </li>
              <li><a class="menu-item" href="#" data-i18n="nav.users.user_cards">Invest Now</a>
              </li>
            </ul>
          </li> --}}

          <li class=" nav-item"><a href="/deposits"><i class="ft-trending-up"></i><span class="menu-title" data-i18n="nav.dash.main">Deposite</span></a>
          
          </li>

          <li class=" nav-item"><a href="/withrawals"><i class="ft-trending-down"></i><span class="menu-title" data-i18n="nav.dash.main">Withdrawal</span></a>
          
          </li>

          <li class=" nav-item"><a href="/user_transfer"><i class="ft-radio"></i><span class="menu-title" data-i18n="nav.dash.main">User Transfers</span></a>
          
          </li>

          <li class=" nav-item"><a href="/system_config"><i class="icon-trophy"></i><span class="menu-title" data-i18n="nav.dash.main">Add bonus</span></a>
          
          </li>

          <li class=" nav-item"><a href="/system_config"><i class="icon-fire"></i><span class="menu-title" data-i18n="nav.dash.main">Add Penalty</span></a>
          
          </li>

          <li class=" nav-item"><a href="/trs_history"><i class="ft-layers"></i><span class="menu-title" data-i18n="nav.dash.main">Transaction History</span></a>
          
          </li>
          <li class=" nav-item"><a href="/newsletter"><i class="ft-heart"></i><span class="menu-title" data-i18n="nav.dash.main">Send a Newsletter</span></a>
          
          </li>

          
          <li class=" nav-item"><a href="/system_config"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.dash.main">Referral</span></a>
          
          </li>


          <li class=" nav-item"><a href="/access_control"><i class="ft-shield"></i><span class="menu-title" data-i18n="nav.dash.main">User Access Control</span></a>
          
          </li>
         
          <li class=" nav-item"><a href="/system_config"><i class="ft-settings"></i><span class="menu-title" data-i18n="nav.dash.main">System Config</span></a>
          
          </li>

          <li class=" nav-item"><a href="/system_config"><i class="ft-cpu"></i><span class="menu-title" data-i18n="nav.dash.main">Auto Withdrawals</span></a>
          
          </li>
          <li class=" nav-item"><a href="/system_config"><i class="ft-chrome"></i><span class="menu-title" data-i18n="nav.dash.main">IP Logs</span></a>
          
          </li>

          <li class=" nav-item"><a href="/admin_logout"><i class="ft-power"></i><span class="menu-title" data-i18n="nav.dash.main">Logout</span></a>
          
          </li>


          <br>
          <br>
          <br>
          
          {{-- <li class=" navigation-header"><span data-i18n="nav.category.support">Support</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Support"></i>
          </li>
          <li class=" nav-item"><a href="http://support.pixinvent.com/"><i class="icon-support"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Raise Support</span></a>
          </li>
          <li class=" nav-item"><a href="https://pixinvent.com/robust-bootstrap-admin-template/documentation"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span></a>
          </li> --}}
        </ul>
      </div>
    </div>