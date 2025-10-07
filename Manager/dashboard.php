<style>
    body {
  min-height: 100vh;
  min-height: -webkit-fill-available;
  font-family: 'Comic Sans MS', 'Comic Sans', cursive;
}

html {
  height: -webkit-fill-available;
}

main {
  display: flex;
  flex-wrap: nowrap;
  height: 100vh;
  height: -webkit-fill-available;
  max-height: 100vh;
  overflow-x: auto;
  overflow-y: hidden;
}

.b-example-divider {
  flex-shrink: 0;
  width: 1.5rem;
  height: 100vh;
  background-color: rgba(0, 0, 0, .1);
  border: solid rgba(0, 0, 0, .15);
  border-width: 1px 0;
  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.bi {
  vertical-align: -.125em;
  pointer-events: none;
  fill: currentColor;
}

.dropdown-toggle { outline: 0; }

.nav-flush .nav-link {
  border-radius: 0;
}

.btn-toggle {
  display: inline-flex;
  align-items: center;
  padding: .25rem .5rem;
  font-weight: 600;
  color: rgba(0, 0, 0, .65);
  background-color: transparent;
  border: 0;
}
.btn-toggle:hover,
.btn-toggle:focus {
  color: rgba(0, 0, 0, .85);
  background-color: #d2f4ea;
}

.btn-toggle::before {
  width: 1.25em;
  line-height: 0;
  content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
  transition: transform .35s ease;
  transform-origin: .5em 50%;
}

.btn-toggle[aria-expanded="true"] {
  color: rgba(0, 0, 0, .85);
}
.btn-toggle[aria-expanded="true"]::before {
  transform: rotate(90deg);
}

.btn-toggle-nav a {
  display: inline-flex;
  padding: .1875rem .5rem;
  margin-top: .125rem;
  margin-left: 1.25rem;
  text-decoration: none;
}
.btn-toggle-nav a:hover,
.btn-toggle-nav a:focus {
  background-color: #d2f4ea;
}

.sidebar-link {
  padding: 14px 16px;
  color: #4b17a6;
  border-radius: 12px;
  display: flex;
  gap:16px;
  align-items:center;
  font-size: 1.18rem;
}
.sidebar-link svg { opacity:0.95 }
.sidebar-link:hover { background: rgba(122,62,202,0.06); color:#3a0f8a; text-decoration:none }
.sidebar-link.active { background: linear-gradient(90deg, rgba(125,42,232,0.10), rgba(90,27,191,0.04)); color:#5a1bbf; box-shadow: inset 0 1px 0 rgba(255,255,255,0.4); }
.nav-section { padding-left:4px }

/* Remove bullets and reset padding for sidebar lists */
.sidebar .nav,
.sidebar .nav ul,
.sidebar .nav li {
  list-style: none !important;
  margin: 0 !important;
  padding: 0 !important;
}
.sidebar .nav { padding-left: 6px }

.section-toggle { font-weight:700; color:#6b6b6b; border-radius:8px; padding:10px 12px; }
.section-toggle .section-toggle-icon { margin-right:12px; transition: transform .18s ease, opacity .18s ease; opacity:0.95; width:14px; height:14px; }
.section-toggle .section-toggle-label { font-size:1.12rem; color:#6b6b6b; font-weight:800 }
.nav-section-group .section-items { transition: max-height .22s ease, opacity .18s ease; overflow: hidden; }
.nav-section-group.collapsed .section-items { max-height: 0; opacity: 0; padding-top:0; padding-bottom:0; }
.nav-section-group .section-items { max-height: 600px; opacity: 1; }
.nav-section-group .section-items .nav-link { padding: 10px 14px; font-size: 1.1rem; border-radius: 10px; display: block; color: #4b17a6; }
.nav-section-group .section-items .nav-link:hover { background: rgba(122,62,202,0.06); color: #3a0f8a; text-decoration: none; }
.nav-section-group .section-toggle-icon { transform: rotate(0deg); transition: transform .18s ease, opacity .18s ease; }
/* rotate down (90deg) when expanded */
.nav-section-group .section-toggle[aria-expanded="true"] .section-toggle-icon,
.nav-section-group:not(.collapsed) .section-toggle-icon { transform: rotate(90deg); }
.nav-section-group.collapsed .section-toggle-icon { opacity:0.6 }
.nav-section-group:hover .section-toggle { background: rgba(120,60,200,0.04); }
.nav-section-group:hover .section-toggle .section-toggle-label { color:#44107a }

/* Hover-driven temporary expand (non-persistent) */
.nav-section-group .section-toggle:hover { cursor: pointer; }
.nav-section-group .section-items .nav-link { transition: background .15s ease, color .12s ease, transform .12s ease; }
.nav-section-group .section-items .nav-link:hover { transform: translateX(4px); }

@media (max-width: 1024px) {
  .sidebar { width: 220px !important }
  main { padding-top: 90px }
}

.sidebar.collapsed {
  width: 88px !important;
}
.sidebar.collapsed .nav-label,
.sidebar.collapsed .sidebar-brand {
  display: none !important;
}
.sidebar.collapsed .bi { margin-right: 0 !important }
.sidebar.collapsed .sidebar-link { justify-content: center; padding: 10px 6px }
.sidebar.collapsed .profile-box { justify-content: center; gap:8px }
.sidebar.collapsed .profile-box .text-small,
.sidebar.collapsed .profile-box div[style] { display: none }

.scrollarea {
  overflow-y: auto;
}

.fw-semibold { font-weight: 600; }
.lh-tight { line-height: 1.25; }

/* Profile dropdown adjustments: remove 'button' look and center menu under avatar */
.profile-box > a {
  padding: 0; /* remove button padding */
  border: none; /* no border */
  background: transparent;
}
.profile-box > a:hover, .profile-box > a:focus {
  background: rgba(125,42,232,0.04);
  text-decoration: none;
}
.profile-box .dropdown-menu {
  box-shadow: none; /* no heavy shadow to avoid button-like feel */
  border: 1px solid #ececf6;
  margin-top: 6px;
  min-width: 160px;
  left: 50% !important;
  right: auto !important;
  transform: translateX(-50%) !important; /* center under toggle */
}
.profile-box .dropdown-item {
  padding: 8px 12px;
}
</style>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    <!-- Bootstrap core CSS (CDN) -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJL7t27QvQ4c+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">

      <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  <!-- Custom styles for this template (already included above) -->
  </head>
  <body>
    <!-- Header copied from payment_options.php -->
    <style>
    /* Minimal header styles from payment_options.php */
    .app-header {
      position: fixed;
      height: 80px;
      width: 100%;
      z-index: 1000;
      padding: 0 20px;
      background: #fff;
      border-bottom: 2px solid #e0e0e0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .app-header .heading {
      font-size: 1.25rem;
      font-weight: 600;
      color: #7d2ae8;
      text-align: center;
    }
    /* push main content down so fixed header doesn't overlap */
    main { padding-top: 100px; }
    </style>

    <header class="app-header" role="banner">
      <div class="heading">Inventory And Sales Management Made Easy</div>
    </header>



<main>
  

  <!-- Removed thick vertical divider -->

  <div id="sidebar" class="sidebar d-flex flex-column flex-shrink-0 p-2 bg-white" style="width: 260px;min-height:100vh;justify-content:space-between;border-right:1px solid #f0eef8;transition:width .2s ease;">
    <div>

      <nav class="mt-1">
        <ul class="nav flex-column" style="gap:6px;">
          <li class="nav-section-group" data-group-id="home">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Home</span>
            </button>
          </li>

          <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="report">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Sales</span>
            </button>
            <ul class="section-items" style="list-style:none;margin:0;padding:6px 0 6px 6px;">
              <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Completed Sales</span></a></li>
              <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Saved Carts</span></a></li>
            </ul>
          </li>

           <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="report">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Report</span>
            </button>
            <ul class="section-items" style="list-style:none;margin:0;padding:6px 0 6px 6px;">
              <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Sales Summary</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Sales by item</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Sales by category</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Sales by Staff</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Inventory Evaluation</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Taxes</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Discounts</span></a></li>
            </ul>
          </li>

         <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="settings">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Customers</span>
            </button>
          </li>

            <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="settings">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Staffs</span>
            </button>
          </li>
         
            <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="settings">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Activity logs</span>
            </button>
          </li>

            <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="report">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Inventory</span>
            </button>
            <ul class="section-items" style="list-style:none;margin:0;padding:6px 0 6px 6px;">
              <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">All Items</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Categories</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">Stock history</span></a></li>
                <li><a href="#" class="nav-link sidebar-link d-flex align-items-center"><svg class="bi me-2" width="18" height="18"><use xlink:href="#"/></svg><span class="nav-label">###</span></a></li>
            </ul>
          </li>


         <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="settings">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Suppliers</span>
            </button>
          </li>


          <li style="height:1px;background:linear-gradient(90deg,#eee,#f7f3ff);margin:12px 0;border-radius:2px;"></li>

          <li class="nav-section-group" data-group-id="settings">
            <button class="section-toggle d-flex align-items-center w-100" aria-expanded="true" style="background:transparent;border:0;padding:8px 2px;">
              <svg class="section-toggle-icon" width="12" height="12" viewBox="0 0 16 16" fill="none"><use xlink:href="#chevron-right"/></svg>
              <span class="section-toggle-label nav-section small text-uppercase text-muted" style="letter-spacing:1px;padding:0;font-weight:700;">Settings</span>
            </button>
          </li>
        </ul>
      </nav>
    </div>

    <div class="profile-box" style="display:flex;flex-direction:row;align-items:center;padding:10px;border-radius:10px;gap:10px;background:linear-gradient(180deg,#fff,#fbf9ff);box-shadow:inset 0 1px 0 rgba(255,255,255,0.6);">
      <div style="width:40px;height:40px;border-radius:50%;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.06);flex-shrink:0;">
        <img src="https://github.com/mdo.png" alt="profile" width="40" height="40" style="display:block;object-fit:cover;width:40px;height:40px;" />
      </div>
      <div style="flex:1;min-width:0;">
        <div style="font-weight:700;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">User's Name</div>
        <div style="font-size:0.78rem;color:#6b6b6b;">Manager</div>
      </div>
      <div style="margin-left:6px;display:flex;align-items:center;">
        <button id="profileToggle" class="btn btn-sm" style="background:transparent;border:none;padding:6px;border-radius:6px;">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#6b45c9" class="bi bi-caret-down-fill" viewBox="0 0 16 16" aria-hidden="true">
            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592c.859 0 1.319 1.013.753 1.658L8.753 11.14a1 1 0 0 1-1.506 0z"/>
          </svg>
        </button>
      </div>
      <div class="profile-dropdown-menu" style="display:none;position:absolute;left:240px;bottom:64px;z-index:1001;margin-top:8px;min-width:180px;background:#fff;border:1px solid #ececf6;border-radius:8px;box-shadow:0 6px 18px 0 rgba(125,42,232,0.08);">
        <ul class="text-small" style="list-style:none;margin:0;padding:8px 0;">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cplQ/1eQJY1Hc8Y8f7Bqv1eE2Vn0q6Zr5oR1V6z1zv9+6rJc3K5q1bJc+8G1fQ" crossorigin="anonymous"></script>
    <script>
    /* global bootstrap: false */
    (function () {
      'use strict'
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl)
      })
    })()
    </script>
    <script>
    // Sidebar collapse toggle and persistence
    (function(){
      var sidebar = document.getElementById('sidebar');
      var toggle = document.getElementById('sidebarToggle');
      if(!sidebar || !toggle) return;
      // restore state
      var collapsed = localStorage.getItem('sidebarCollapsed');
      if(collapsed === 'true') sidebar.classList.add('collapsed');
      toggle.addEventListener('click', function(e){
        e.preventDefault();
        var isCollapsed = sidebar.classList.toggle('collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed ? 'true' : 'false');
      });
      // adjust dropdown position when collapsed/expanded
      var profileMenu = document.querySelector('.profile-dropdown-menu');
      var observer = new MutationObserver(function(){
        if(sidebar.classList.contains('collapsed')){
          if(profileMenu) profileMenu.style.left = (sidebar.offsetWidth + 8) + 'px';
        } else {
          if(profileMenu) profileMenu.style.left = (sidebar.offsetWidth + 20) + 'px';
        }
      });
      observer.observe(sidebar, { attributes:true, attributeFilter:['class'] });
    })();
    </script>
    <script>
    // Section group expand/collapse with persistence (stable IDs)
    (function(){
      var groups = document.querySelectorAll('.nav-section-group');
      groups.forEach(function(group){
        var toggle = group.querySelector('.section-toggle');
        var items = group.querySelector('.section-items');
        if(!toggle || !items) return;
        var id = group.getAttribute('data-group-id') || group.dataset.groupId;
        var key = 'navGroupOpen_' + (id || Array.prototype.indexOf.call(groups, group));
        // restore
        var open = localStorage.getItem(key);
        if(open === 'false') {
          group.classList.add('collapsed');
          toggle.setAttribute('aria-expanded','false');
        } else {
          toggle.setAttribute('aria-expanded','true');
        }
        function setState(openState){
          if(openState){
            group.classList.remove('collapsed');
            toggle.setAttribute('aria-expanded','true');
          } else {
            group.classList.add('collapsed');
            toggle.setAttribute('aria-expanded','false');
          }
          localStorage.setItem(key, openState ? 'true' : 'false');
        }
        toggle.addEventListener('click', function(e){
          e.preventDefault();
          setState(group.classList.toggle('collapsed') ? false : true);
        });
        // keyboard support
        toggle.addEventListener('keydown', function(e){
          if(e.key === 'Enter' || e.key === ' '){
            e.preventDefault();
            toggle.click();
          }
        });
      });
    })();
    // Hover-to-expand (temporary, non-persistent) for usability
    (function(){
      var sidebar = document.getElementById('sidebar');
      var groups = document.querySelectorAll('.nav-section-group');
      groups.forEach(function(group){
        var wasCollapsed = null;
        group.addEventListener('mouseenter', function(){
          if(!sidebar || sidebar.classList.contains('collapsed')) return; // don't expand on hover when sidebar is collapsed
          // remember original state
          wasCollapsed = group.classList.contains('collapsed');
          if(wasCollapsed){
            group.classList.remove('collapsed');
            var t = group.querySelector('.section-toggle'); if(t) t.setAttribute('aria-expanded','true');
          }
        });
        group.addEventListener('mouseleave', function(){
          if(!sidebar || sidebar.classList.contains('collapsed')) return;
          if(wasCollapsed){
            group.classList.add('collapsed');
            var t = group.querySelector('.section-toggle'); if(t) t.setAttribute('aria-expanded','false');
          }
          wasCollapsed = null;
        });
      });
    })();
    </script>
    <script>
    // Custom profile dropdown toggle
    (function(){
      var toggle = document.getElementById('profileToggle');
      var menu = document.querySelector('.profile-dropdown-menu');
      if(!toggle || !menu) return;
      toggle.addEventListener('click', function(e){
        e.preventDefault();
        var isOpen = menu.style.display === 'block';
        menu.style.display = isOpen ? 'none' : 'block';
      });
      // Optional: close menu when clicking outside
      document.addEventListener('click', function(e){
        if(!toggle.contains(e.target) && !menu.contains(e.target)){
          menu.style.display = 'none';
        }
      });
    })();
    </script>
  </body>
</html>
