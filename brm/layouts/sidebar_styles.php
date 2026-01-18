
<style>
  /* Sidebar collapse/expand toggle styles (minimal, local overrides) */
.sidebar{
  transition: width 0.2s ease;
  width: 280px;
  z-index: 1040 !important;
  background: transparent !important;
  box-shadow: 2px 0 8px rgba(0,0,0,0.04);
  position: fixed !important;
  left: 0;
  top: 70px;
  height: 100vh;
}
.main-panel, .page-body-wrapper{
  transition: margin-left 0.2s ease;
}

.main-panel {
  margin-left: 280px !important;
  min-height: calc(100vh - 70px);
  background-color: #f5f7fa;
}

body.sidebar-collapsed .main-panel {
  margin-left: 70px !important;
}

@media (max-width: 768px) {
  .main-panel {
    margin-left: 0 !important;
  }
  body.sidebar-collapsed .main-panel {
    margin-left: 0 !important;
  }
  .sidebar {
    width: 100vw !important;
    left: 0 !important;
    height: auto !important;
    position: fixed !important;
    z-index: 1040 !important;
  }
}

/* Collapsed sidebar state */
body.sidebar-collapsed .sidebar{
  width: 70px !important;
  overflow: hidden;
}
body.sidebar-collapsed .sidebar .menu-title,
body.sidebar-collapsed .sidebar .menu-arrow {
  display: none !important;
}
body.sidebar-collapsed .sidebar .nav-link .menu-title {
  display: none !important;
}
body.sidebar-collapsed .sidebar .menu-icon{
  margin-right: 0 !important;
  text-align: center;
  width: 100%;
}
body.sidebar-collapsed .main-panel{
  margin-left: 70px !important;
}

/* Ensure sidebar menu items remain clickable */
.sidebar .nav-link {
  display: flex !important;
  align-items: center !important;
}

/* Sub-menu visibility control */
.sidebar .sub-menu {
  transition: all 0.2s ease;
}

body.sidebar-collapsed .sidebar .sub-menu {
  display: none !important;
}

/* Fixed logo container - completely transparent */
.fixed-logo-container {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  width: 280px !important;
  height: 70px !important;
  background: transparent !important;
  border: none !important;
  z-index: 9999 !important;
  box-shadow: none !important;
  transition: width 0.2s ease !important;
}

/* Adjust logo container when sidebar is collapsed */
body.sidebar-collapsed .fixed-logo-container {
  width: 70px !important;
}

.logo-hamburger-wrapper {
  display: flex !important;
  align-items: center !important;
  gap: 12px !important;
  padding: 0 20px !important;
  height: 100% !important;
  background: transparent !important;
}

/* Hamburger button styles */
#sidebarToggle {
  background: transparent !important;
  border: none !important;
  padding: 8px !important;
  cursor: pointer !important;
  transition: all 0.2s ease !important;
  color: #6c757d !important;
  flex-shrink: 0 !important;
  outline: none !important;
  box-shadow: none !important;
}

#sidebarToggle:hover {
  color: #000 !important;
  background: rgba(0,0,0,0.05) !important;
  border-radius: 4px !important;
}

#sidebarToggle i {
  font-size: 1.5rem !important;
  line-height: 1 !important;
  display: block !important;
}

/* Brand logo styles */
.brand-logo {
  display: flex !important;
  align-items: center !important;
  text-decoration: none !important;
  transition: opacity 0.2s ease !important;
}

.brand-logo img {
  height: 40px !important;
  width: auto !important;
  max-width: 180px !important;
  object-fit: contain !important;
}

/* Hide logo when sidebar is collapsed */
body.sidebar-collapsed .brand-logo {
  opacity: 0 !important;
  pointer-events: none !important;
}

/* Navbar styling */
.navbar.default-layout {
  background: #fff !important;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08) !important;
  z-index: 9998 !important;
}

.navbar-brand-wrapper {
  background: transparent !important;
}

/* Sidebar navigation items */
.sidebar .nav {
  padding-top: 1rem !important;
}

.sidebar .nav-item {
  margin-bottom: 0.25rem !important;
}

.sidebar .nav-link {
  padding: 0.75rem 1.25rem 0.75rem 1.5rem !important;
  display: flex !important;
  align-items: center !important;
  gap: 0.75rem !important;
  color: #6c757d !important;
  transition: all 0.2s ease !important;
  border-radius: 0 !important;
  position: relative !important;
}

.sidebar .nav-link:hover {
  background: rgba(102, 126, 234, 0.08) !important;
  color: #667eea !important;
}

.sidebar .nav-link.active,
.sidebar .nav-item.active > .nav-link {
  background: linear-gradient(90deg, rgba(102, 126, 234, 0.15) 0%, transparent 100%) !important;
  color: #667eea !important;
  border-left: 3px solid #667eea !important;
}

.sidebar .menu-icon {
  font-size: 1.25rem !important;
  flex-shrink: 0 !important;
  width: 20px !important;
  text-align: center !important;
}

.sidebar .menu-title {
  font-size: 0.9rem !important;
  font-weight: 500 !important;
  white-space: nowrap !important;
}

/* Arrow rotation helper for sidebar parent triggers */
.sidebar .menu-arrow {
  display: inline-block !important;
  width: 0.8rem !important;
  height: 0.8rem !important;
  margin-left: auto !important;
  transition: transform .18s ease !important;
}
.sidebar .menu-arrow.rotated { transform: rotate(90deg) !important; }

/* Collapse animation */
.collapse {
  transition: height 0.3s ease !important;
}

.collapse.show {
  display: block !important;
}

.collapse:not(.show) {
  display: none !important;
}

/* Category labels */
.sidebar .nav-category {
  padding: 1.5rem 1.5rem 0.5rem !important;
  color: #adb5bd !important;
  font-size: 0.75rem !important;
  font-weight: 600 !important;
  text-transform: uppercase !important;
  letter-spacing: 0.5px !important;
}

/* Submenu styles */
.sidebar .sub-menu {
  list-style: none !important;
  padding: 0.5rem 0 !important;
  margin: 0 !important;
  background: rgba(0,0,0,0.02) !important;
}

.sidebar .sub-menu .nav-item {
  margin: 0 !important;
  list-style: none !important;
  list-style-type: none !important;
}

.sidebar .sub-menu .nav-link {
  padding: 0.6rem 1.5rem 0.6rem 3.5rem !important;
  font-size: 0.85rem !important;
  color: #6c757d !important;
}

.sidebar .sub-menu .nav-link:hover {
  background: rgba(102, 126, 234, 0.06) !important;
  color: #667eea !important;
}

.sidebar .sub-menu .nav-link.active {
  color: #667eea !important;
  font-weight: 600 !important;
}

/* User dropdown in sidebar */
.sidebar .user-dropdown {
  margin-top: auto !important;
  border-top: 1px solid rgba(0,0,0,0.08) !important;
  padding-top: 1rem !important;
}

.sidebar .user-dropdown .nav-link {
  padding: 1rem 1.5rem !important;
}

.sidebar .user-dropdown img {
  border: 2px solid #fff !important;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
}

/* Dropdown menu */
.dropdown-menu {
  border: none !important;
  box-shadow: 0 4px 16px rgba(0,0,0,0.12) !important;
  border-radius: 8px !important;
  overflow: hidden !important;
}

.dropdown-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
  color: white !important;
  border-radius: 0 !important;
}

.dropdown-header p {
  color: rgba(255,255,255,0.9) !important;
}

.dropdown-item {
  transition: all 0.2s ease !important;
}

.dropdown-item:hover {
  background: rgba(102, 126, 234, 0.08) !important;
  color: #667eea !important;
}

/* Scrollbar styling */
.sidebar::-webkit-scrollbar {
  width: 6px !important;
}

.sidebar::-webkit-scrollbar-track {
  background: transparent !important;
}

.sidebar::-webkit-scrollbar-thumb {
  background: rgba(0,0,0,0.2) !important;
  border-radius: 3px !important;
}

.sidebar::-webkit-scrollbar-thumb:hover {
  background: rgba(0,0,0,0.3) !important;
}

/* Main panel content wrapper adjustments */
.content-wrapper {
  padding: 2rem !important;
  background: #f4f5f7 !important;
}

/* Smooth transitions for all sidebar-related animations */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;
}
</style>
