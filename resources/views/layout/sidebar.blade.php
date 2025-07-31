@include('layout/head')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>{{Auth::user()}}</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('view')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-poll"></i>
                <span>Survey</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">My Survey:</h6>
                    <a class="collapse-item" href="{{ route('my_survey')}}">Add Survey</a>
                    <a class="collapse-item" href="{{ route('shared')}}">Shared</a>
                    <a class="collapse-item" href="{{ route('draft')}}">Draft</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <!-- <i class="fas fa-fw fa-wrench"></i> -->
                <!-- <i class="fa-brands fa-squarespace"></i> -->
                <!-- <i class="fa-solid fa-business-time"></i> -->
                <i class="fa-brands fa-intercom"></i>
                <span>Template</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Email:</h6>
                    <!-- <a class="collapse-item" href="{{ route('email_create_new')}}">Create New Template</a> -->
                    <a class="collapse-item" href="{{ route('quest_list')}}">Create Template with question</a>

                    <a class="collapse-item" href="{{ route('show-temp')}}">Show Template</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">SMS:</h6>

                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Template List:</h6>
                    <a class="collapse-item" href="{{ route('email_create_new')}}">Template one</a>
                    <a class="collapse-item" href="{{ route('temp-email-show-all')}}">Template two</a>
                    <a class="collapse-item" href="{{ route('temp-email-draft')}}">Template three</a>
                    <a class="collapse-item" href="{{ route('sms_create_new')}}">Template four</a>
                    <a class="collapse-item" href="{{ route('sms_show_all')}}">Template five</a>
                    <a class="collapse-item" href="{{ route('sms_draft')}}">Template six</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Integration</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Integration With:</h6>
                    <a class="collapse-item" href="{{ route('integration-email')}}">Email</a>
                    <a class="collapse-item" href="{{ route('inter-sms')}}">SMS</a>
                    <a class="collapse-item" href="{{ route('google-sheet')}}">Google Sheet</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                aria-expanded="true" aria-controls="collapsePage">
                <!-- <i class="fas fa-fw fa-folder"></i> -->
                <i class="fa-regular fa-address-book"></i>
                <span>contacts</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Integration With:</h6> -->
                    <a class="collapse-item" href="{{ route('conct-email')}}">Email</a>
                    <a class="collapse-item" href="{{ route('conct-sms')}}">SMS</a>

                </div>
            </div>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Review</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->
</div>