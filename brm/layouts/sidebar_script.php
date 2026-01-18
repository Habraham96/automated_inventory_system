
<script>
(function() {
  'use strict';
  
  console.log('Initializing BRM sidebar toggle...');
  
  function initSidebarToggle() {
    var toggle = document.getElementById('sidebarToggle');
    var body = document.body;
    
    if (!toggle) {
      console.error('Sidebar toggle button not found! Checking DOM...');
      console.log('Available elements with sidebarToggle:', document.querySelectorAll('[id*="sidebar"]'));
      return;
    }
    
    console.log('Sidebar toggle button found:', toggle);
    console.log('Button classes:', toggle.className);
    console.log('Button parent:', toggle.parentElement);
    
    // Load saved state from localStorage
    var savedState = localStorage.getItem('sidebarCollapsed');
    if (savedState === 'true') {
      body.classList.add('sidebar-collapsed');
      console.log('Restored collapsed state from localStorage');
    }
    
    // Remove any existing event listeners to prevent duplicates
    toggle.removeEventListener('click', handleToggleClick);
    
    // Add click event listener
    toggle.addEventListener('click', handleToggleClick);
    
    console.log('BRM Sidebar toggle initialized successfully');
  }
  
  function handleToggleClick(e) {
    e.preventDefault();
    e.stopPropagation();
    
    var body = document.body;
    body.classList.toggle('sidebar-collapsed');
    
    // Save state to localStorage
    var isCollapsed = body.classList.contains('sidebar-collapsed');
    localStorage.setItem('sidebarCollapsed', isCollapsed.toString());
    
    console.log('BRM Sidebar toggled:', isCollapsed ? 'collapsed' : 'expanded');
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSidebarToggle);
  } else {
    initSidebarToggle();
  }
  
  // Backup initialization with longer delay
  setTimeout(function() {
    initSidebarToggle();
  }, 500);
  
  // Additional backup after all resources are loaded
  window.addEventListener('load', initSidebarToggle);
  
  // Emergency fallback - try every second for 10 seconds if button not found
  var attempts = 0;
  var maxAttempts = 10;
  var fallbackInterval = setInterval(function() {
    attempts++;
    if (document.getElementById('sidebarToggle') || attempts >= maxAttempts) {
      clearInterval(fallbackInterval);
      if (document.getElementById('sidebarToggle')) {
        console.log('Fallback initialization successful');
        initSidebarToggle();
      }
    }
  }, 1000);
  
  // Global function for manual testing
  window.testSidebarToggle = function() {
    console.log('Manual test initiated');
    var button = document.getElementById('sidebarToggle');
    if (button) {
      console.log('Button found, triggering click');
      button.click();
    } else {
      console.log('Button not found');
    }
  };
})();


// Profile dropdown and other sidebar functionality
(function() {
  'use strict';
  
  function initUserDropdown() {
    var dropdown = document.getElementById('UserDropdown');
    if (!dropdown) {
      console.log('User dropdown not found');
      return;
    }
    
    console.log('User dropdown initialized');
  }
  
  // Initialize dropdown
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initUserDropdown);
  } else {
    initUserDropdown();
  }
})();


// Submenu collapse/expand functionality
(function() {
  'use strict';
  
  function initSubmenus() {
    var collapseLinks = document.querySelectorAll('[data-bs-toggle="collapse"]');
    
    console.log('Initializing', collapseLinks.length, 'collapse menus');
    
    collapseLinks.forEach(function(link) {
      var targetId = link.getAttribute('href');
      if (!targetId) return;
      
      // Remove # if present
      targetId = targetId.replace('#', '');
      var targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        console.log('Setting up collapse for:', targetId);
        
        // Initialize Bootstrap Collapse if available
        if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
          try {
            new bootstrap.Collapse(targetElement, {
              toggle: false
            });
          } catch(e) {
            console.log('Bootstrap Collapse initialization error:', e);
          }
        }
        
        // Listen for Bootstrap collapse events
        targetElement.addEventListener('shown.bs.collapse', function() {
          link.setAttribute('aria-expanded', 'true');
          var arrow = link.querySelector('.menu-arrow');
          if (arrow) arrow.classList.add('rotated');
          console.log('Submenu expanded:', targetId);
        });
        
        targetElement.addEventListener('hidden.bs.collapse', function() {
          link.setAttribute('aria-expanded', 'false');
          var arrow = link.querySelector('.menu-arrow');
          if (arrow) arrow.classList.remove('rotated');
          console.log('Submenu collapsed:', targetId);
        });
        
        // Set initial state
        if (targetElement.classList.contains('show')) {
          link.setAttribute('aria-expanded', 'true');
          var arrow = link.querySelector('.menu-arrow');
          if (arrow) arrow.classList.add('rotated');
        } else {
          link.setAttribute('aria-expanded', 'false');
        }
        
        // Add click handler as fallback
        link.addEventListener('click', function(e) {
          e.preventDefault();
          var isExpanded = this.getAttribute('aria-expanded') === 'true';
          
          if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
            var bsCollapse = bootstrap.Collapse.getInstance(targetElement);
            if (bsCollapse) {
              bsCollapse.toggle();
            } else {
              // Manual toggle if Bootstrap instance not found
              if (isExpanded) {
                targetElement.classList.remove('show');
              } else {
                targetElement.classList.add('show');
              }
              this.setAttribute('aria-expanded', !isExpanded);
            }
          } else {
            // Manual toggle without Bootstrap
            if (isExpanded) {
              targetElement.classList.remove('show');
            } else {
              targetElement.classList.add('show');
            }
            this.setAttribute('aria-expanded', !isExpanded);
            
            var arrow = this.querySelector('.menu-arrow');
            if (arrow) {
              if (isExpanded) {
                arrow.classList.remove('rotated');
              } else {
                arrow.classList.add('rotated');
              }
            }
          }
        });
      }
    });
    
    console.log('Submenu functionality initialized');
  }
  
  // Initialize submenus
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSubmenus);
  } else {
    initSubmenus();
  }
  
  // Backup initialization
  setTimeout(initSubmenus, 500);
  window.addEventListener('load', initSubmenus);
})();


// Active menu item highlighting
(function() {
  'use strict';
  
  function highlightActiveMenuItem() {
    var currentPath = window.location.pathname;
    var currentPage = currentPath.substring(currentPath.lastIndexOf('/') + 1);
    
    var navLinks = document.querySelectorAll('.sidebar .nav-link');
    
    navLinks.forEach(function(link) {
      var href = link.getAttribute('href');
      
      if (href === currentPage || href === './' + currentPage) {
        link.classList.add('active');
        
        // Expand parent menu if this is a submenu item
        var parentCollapse = link.closest('.collapse');
        if (parentCollapse) {
          parentCollapse.classList.add('show');
          var parentToggle = document.querySelector('[href="#' + parentCollapse.id + '"]');
          if (parentToggle) {
            parentToggle.setAttribute('aria-expanded', 'true');
          }
        }
      }
    });
    
    console.log('Active menu item highlighted for page:', currentPage);
  }
  
  // Highlight active item on load
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', highlightActiveMenuItem);
  } else {
    highlightActiveMenuItem();
  }
})();


// Responsive sidebar behavior
(function() {
  'use strict';
  
  function handleResponsiveSidebar() {
    var width = window.innerWidth;
    var body = document.body;
    
    if (width < 768) {
      // On mobile, default to collapsed
      if (!localStorage.getItem('sidebarCollapsed')) {
        body.classList.add('sidebar-collapsed');
      }
    }
  }
  
  window.addEventListener('resize', handleResponsiveSidebar);
  window.addEventListener('load', handleResponsiveSidebar);
  
  // Initial check
  handleResponsiveSidebar();
})();
</script>
