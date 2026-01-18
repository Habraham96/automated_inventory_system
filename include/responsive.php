<!-- Responsive Meta Tags and Styles -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="theme-color" content="#667eea">

<style>
/* ========================================
   RESPONSIVE UTILITY STYLES
   ======================================== */

/* Responsive Container */
.responsive-container {
  width: 100%;
  max-width: 100%;
  padding-left: 15px;
  padding-right: 15px;
  margin-left: auto;
  margin-right: auto;
}

/* Responsive Images */
img {
  max-width: 100%;
  height: auto;
  display: block;
}

/* Responsive Tables */
@media (max-width: 768px) {
  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  
  table {
    width: 100%;
    max-width: 100%;
  }
}

/* Responsive Typography */
@media (max-width: 576px) {
  html {
    font-size: 14px;
  }
  
  h1 { font-size: 1.75rem; }
  h2 { font-size: 1.5rem; }
  h3 { font-size: 1.25rem; }
  h4 { font-size: 1.1rem; }
  h5 { font-size: 1rem; }
  h6 { font-size: 0.9rem; }
}

/* Responsive Grid System */
.row {
  display: flex;
  flex-wrap: wrap;
  margin-left: -15px;
  margin-right: -15px;
}

.col, .col-1, .col-2, .col-3, .col-4, .col-5, .col-6,
.col-7, .col-8, .col-9, .col-10, .col-11, .col-12 {
  padding-left: 15px;
  padding-right: 15px;
}

/* Mobile-first responsive columns */
@media (max-width: 576px) {
  .col-xs-12 { width: 100%; }
  .col-xs-6 { width: 50%; }
  .col-xs-4 { width: 33.333%; }
  .col-xs-3 { width: 25%; }
}

@media (max-width: 768px) {
  .col-sm-12 { width: 100%; }
  .col-sm-6 { width: 50%; }
  .col-sm-4 { width: 33.333%; }
  .col-sm-3 { width: 25%; }
}

@media (max-width: 992px) {
  .col-md-12 { width: 100%; }
  .col-md-6 { width: 50%; }
  .col-md-4 { width: 33.333%; }
  .col-md-3 { width: 25%; }
}

@media (max-width: 1200px) {
  .col-lg-12 { width: 100%; }
  .col-lg-6 { width: 50%; }
  .col-lg-4 { width: 33.333%; }
  .col-lg-3 { width: 25%; }
}

/* Responsive Utilities */
@media (max-width: 576px) {
  .hide-xs { display: none !important; }
  .show-xs { display: block !important; }
}

@media (max-width: 768px) {
  .hide-sm { display: none !important; }
  .show-sm { display: block !important; }
}

@media (max-width: 992px) {
  .hide-md { display: none !important; }
  .show-md { display: block !important; }
}

@media (max-width: 1200px) {
  .hide-lg { display: none !important; }
  .show-lg { display: block !important; }
}

/* Responsive Padding and Margins */
@media (max-width: 768px) {
  .p-responsive { padding: 1rem !important; }
  .px-responsive { padding-left: 1rem !important; padding-right: 1rem !important; }
  .py-responsive { padding-top: 1rem !important; padding-bottom: 1rem !important; }
  .m-responsive { margin: 1rem !important; }
  .mx-responsive { margin-left: 1rem !important; margin-right: 1rem !important; }
  .my-responsive { margin-top: 1rem !important; margin-bottom: 1rem !important; }
}

/* Responsive Sidebar - Dashboard Pages */
@media (max-width: 992px) {
  .sidebar {
    position: fixed;
    left: -280px;
    transition: left 0.3s ease;
    z-index: 1050;
  }
  
  .sidebar.active {
    left: 0;
  }
  
  .main-panel {
    margin-left: 0 !important;
    width: 100% !important;
  }
  
  .sidebar-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1040;
  }
  
  .sidebar-overlay.active {
    display: block;
  }
}

/* Mobile Navigation Toggle */
.mobile-menu-toggle {
  display: none;
  position: fixed;
  top: 15px;
  left: 15px;
  z-index: 1060;
  background: #667eea;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 10px 15px;
  cursor: pointer;
  font-size: 20px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

@media (max-width: 992px) {
  .mobile-menu-toggle {
    display: block;
  }
}

/* Responsive Cards */
@media (max-width: 768px) {
  .card, .stats-card {
    margin-bottom: 1rem;
  }
  
  .card-body {
    padding: 1rem;
  }
}

/* Responsive Forms */
@media (max-width: 576px) {
  .form-control, .form-select, .btn {
    font-size: 16px; /* Prevents zoom on iOS */
  }
  
  .input-group {
    flex-wrap: wrap;
  }
}

/* Responsive Buttons */
@media (max-width: 576px) {
  .btn {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
  }
  
  .btn-block-mobile {
    display: block;
    width: 100%;
  }
}

/* Responsive Modals */
@media (max-width: 576px) {
  .modal-dialog {
    margin: 0.5rem;
    max-width: calc(100% - 1rem);
  }
  
  .modal-content {
    border-radius: 8px;
  }
}

/* Responsive Navigation */
@media (max-width: 768px) {
  .navbar-nav {
    flex-direction: column;
    width: 100%;
  }
  
  .navbar-nav .nav-item {
    width: 100%;
  }
}

/* Touch-friendly Interactions */
@media (hover: none) and (pointer: coarse) {
  button, .btn, a {
    min-height: 44px; /* Apple's recommended touch target size */
    min-width: 44px;
  }
}

/* Responsive Spacing */
@media (max-width: 768px) {
  .container, .container-fluid {
    padding-left: 15px;
    padding-right: 15px;
  }
}

/* Landscape Mode Adjustments */
@media (max-height: 500px) and (orientation: landscape) {
  .sidebar {
    overflow-y: auto;
  }
}

/* Print Styles */
@media print {
  .sidebar, .navbar, .btn, .mobile-menu-toggle, .sidebar-overlay {
    display: none !important;
  }
  
  .main-panel {
    margin-left: 0 !important;
    width: 100% !important;
  }
  
  .card {
    page-break-inside: avoid;
  }
}

/* Flexible Box Utilities */
.d-flex { display: flex !important; }
.flex-wrap { flex-wrap: wrap !important; }
.flex-column { flex-direction: column !important; }
.justify-content-center { justify-content: center !important; }
.justify-content-between { justify-content: space-between !important; }
.align-items-center { align-items: center !important; }

@media (max-width: 768px) {
  .flex-column-mobile { flex-direction: column !important; }
}

/* Responsive Text Alignment */
@media (max-width: 768px) {
  .text-center-mobile { text-align: center !important; }
  .text-left-mobile { text-align: left !important; }
  .text-right-mobile { text-align: right !important; }
}

/* ========================================
   END RESPONSIVE UTILITY STYLES
   ======================================== */
</style>

<!-- Responsive JavaScript -->
<script>
// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
  // Create mobile menu toggle button if it doesn't exist
  if (window.innerWidth <= 992 && !document.querySelector('.mobile-menu-toggle')) {
    const toggleBtn = document.createElement('button');
    toggleBtn.className = 'mobile-menu-toggle';
    toggleBtn.innerHTML = '<i class="mdi mdi-menu" style="font-size: 24px;"></i>';
    toggleBtn.setAttribute('aria-label', 'Toggle Menu');
    document.body.appendChild(toggleBtn);
    
    // Create overlay
    const overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    document.body.appendChild(overlay);
    
    // Toggle sidebar
    toggleBtn.addEventListener('click', function() {
      const sidebar = document.querySelector('.sidebar');
      if (sidebar) {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
      }
    });
    
    // Close sidebar when clicking overlay
    overlay.addEventListener('click', function() {
      const sidebar = document.querySelector('.sidebar');
      if (sidebar) {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
      }
    });
  }
  
  // Responsive table wrapper
  const tables = document.querySelectorAll('table:not(.table-responsive table)');
  tables.forEach(function(table) {
    if (!table.parentElement.classList.contains('table-responsive')) {
      const wrapper = document.createElement('div');
      wrapper.className = 'table-responsive';
      table.parentNode.insertBefore(wrapper, table);
      wrapper.appendChild(table);
    }
  });
  
  // Viewport height fix for mobile browsers
  function setVH() {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  }
  
  setVH();
  window.addEventListener('resize', setVH);
  window.addEventListener('orientationchange', setVH);
});
</script>
