 <!-- ============================================================== -->
 <!-- Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 <aside class="left-sidebar" data-sidebarbg="skin5">
     <!-- Sidebar scroll-->
     <div class="scroll-sidebar">
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav">
             <ul id="sidebarnav" class="pt-4">
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link"
                         href="{{ route('superAdmin.dashboard') }}" aria-expanded="false"><i
                             class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('users.list') }}"
                         aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                             class="hide-menu">Users</span></a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('file.import') }}"
                         aria-expanded="false"><i class="mdi mdi-cloud-upload"></i><span class="hide-menu">File
                             Imports</span></a>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="javascript:void(0)"
                         aria-expanded="false" data-bs-toggle="modal"
                         data-bs-target="#addYear" ><i class="mdi mdi-backup-restore"></i><span class="hide-menu">Add Year</span></a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                         aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
                     <ul aria-expanded="false" class="collapse first-level">
                         <li class="sidebar-item">
                             <a href="form-basic.html" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span
                                     class="hide-menu"> Form Basic </span></a>
                         </li>
                         <li class="sidebar-item">
                             <a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span
                                     class="hide-menu"> Form Wizard </span></a>
                         </li>
                     </ul>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-buttons.html"
                         aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span
                             class="hide-menu">Buttons</span></a>
                 </li>


             </ul>
         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!-- ============================================================== -->
 <!-- End Left Sidebar - style you can find in sidebar.scss  -->
 <!-- ============================================================== -->
 @include('layouts.allModal')