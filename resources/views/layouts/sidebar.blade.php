<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @php
            $permissionUser = App\Models\PermissionRole::getPermission('User', Auth::user()->role_id );
            $permissionRole = App\Models\PermissionRole::getPermission('Role', Auth::user()->role_id );
            $permissionCategory = App\Models\PermissionRole::getPermission('Category', Auth::user()->role_id );
            $permissionProduct = App\Models\PermissionRole::getPermission('Product', Auth::user()->role_id );
            $permissionSetting = App\Models\PermissionRole::getPermission('Setting', Auth::user()->role_id );
        @endphp
      <li class="nav-item">
        <a class="nav-link " href="{{ url('layouts.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
@if(!empty($permissionUser))

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('user/add') }}">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li><!-- End Profile Page Nav -->
@endif
@if(!empty($permissionRole))

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('role') }}">
          <i class="bi bi-question-circle"></i>
          <span>Role</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
@endif
@if(!empty($permissionProduct))

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('products') }}">
          <i class="bi bi-question-circle"></i>
          <span>products</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
@endif
@if(!empty($permissionCategory))

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('category') }}">
          <i class="bi bi-question-circle"></i>
          <span>category</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    @endif
    @if(!empty($permissionSetting))

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('setting') }}">
          <i class="bi bi-question-circle"></i>
          <span>setting</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    @endif
    </ul>

  </aside><!-- End Sidebar-->
