<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    {{-- <span class="badge rounded-pill bg-success float-end">3</span> --}}
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-store-2-line"></i>
                    <span>Photos</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('admin.photos.allPhotos') }}">All Photos</a></li>
                    <li><a href="{{ route('admin.photos.singleUpload') }}">Single Photo Upload</a></li>
                    <li><a href="#">Bulk Photo Upload</a></li>
                </ul>
            </li>
            
            
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-store-2-line"></i>
                    <span>Videos</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#">All Videos</a></li>
                    <li><a href="#">Single Videos Upload</a></li>
                    <li><a href="#">Bulk Videos Upload</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-mail-send-line"></i>
                    <span>Settings</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Confiuration</a></li>
                </ul>
            </li>

            

            

            

            

            

            

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->