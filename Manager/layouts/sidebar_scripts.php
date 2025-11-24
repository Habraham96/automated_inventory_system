
<script>
(function() {
  'use strict';
  
  console.log('Initializing sidebar toggle...');
  
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
    
    console.log('Sidebar toggle initialized successfully');
  }
  
  function handleToggleClick(e) {
    e.preventDefault();
    e.stopPropagation();
    
    var body = document.body;
    body.classList.toggle('sidebar-collapsed');
    
    // Save state to localStorage
    var isCollapsed = body.classList.contains('sidebar-collapsed');
    localStorage.setItem('sidebarCollapsed', isCollapsed.toString());
    
    console.log('Sidebar toggled:', isCollapsed ? 'collapsed' : 'expanded');
  }
  
  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSidebarToggle);
  } else {
    initSidebarToggle();
  }
  // ...existing code...
  
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
document.addEventListener('DOMContentLoaded', function () {
  var sidebar = document.getElementById('sidebar');
  
  // Profile dropdown responsive handler
  var userDropdownToggle = document.getElementById('UserDropdown');
  if (userDropdownToggle) {
    // Initialize Bootstrap dropdown
    var dropdown = new bootstrap.Dropdown(userDropdownToggle, {
      autoClose: true,
      boundary: 'viewport'
    });
    
    // Enhanced click handler for better responsiveness
    userDropdownToggle.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      console.log('Profile picture clicked');
      
      var dropdownMenu = this.nextElementSibling;
      if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
        // Toggle dropdown visibility
        if (dropdownMenu.classList.contains('show')) {
          dropdown.hide();
        } else {
          dropdown.show();
        }
      }
    });
    
    // Touch event handler for mobile devices
    userDropdownToggle.addEventListener('touchstart', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      var dropdownMenu = this.nextElementSibling;
      if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
        if (dropdownMenu.classList.contains('show')) {
          dropdown.hide();
        } else {
          dropdown.show();
        }
      }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      if (!userDropdownToggle.contains(e.target)) {
        dropdown.hide();
      }
    });
    
    // Close dropdown on ESC key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        dropdown.hide();
      }
    });
  }
});
// Global sidebar parent collapse handler: ensure single-open behavior and toggle on click
document.addEventListener('DOMContentLoaded', function () {
  function initSidebarCollapses() {
    var menuLinks = document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]');

    function sidebarCollapseClick(e) {
      e.preventDefault();
      e.stopPropagation();

      var link = this;
      // support href="#id" or data-bs-target
      var targetSelector = link.getAttribute('href') || link.getAttribute('data-bs-target') || link.dataset.bsTarget;
      if (!targetSelector) return;
      // ensure selector starts with # for query
      if (targetSelector.indexOf('#') !== 0) {
        var idx = targetSelector.indexOf('#');
        if (idx !== -1) targetSelector = targetSelector.substring(idx);
      }

      var target = document.querySelector(targetSelector);
      if (!target) return;

      // Collapse any other open sidebar collapse elements
      var openCollapses = document.querySelectorAll('.sidebar .collapse.show');
      openCollapses.forEach(function(open) {
        if (open !== target) {
          try {
            bootstrap.Collapse.getOrCreateInstance(open).hide();
          } catch (err) {
            // defensive: ignore if bootstrap not available yet
            console.warn('Could not hide open collapse', err);
          }
        }
      });

      // Toggle the clicked target
      try {
        bootstrap.Collapse.getOrCreateInstance(target).toggle();
      } catch (err) {
        console.warn('Could not toggle target collapse', err);
      }
    }

    menuLinks.forEach(function(link) {
      // remove possible duplicate handlers first
      link.removeEventListener('click', sidebarCollapseClick);
      link.addEventListener('click', sidebarCollapseClick);
    });
    // After collapse handlers are in place, try to apply active link styling
    try {
      applyActiveSidebarLinkWithRetries();
    } catch (err) {
      console.warn('applyActiveSidebarLinkWithRetries call failed', err);
    }
  }

  // initialize now and a short while later (in case of late DOM inserts)
  initSidebarCollapses();
  setTimeout(initSidebarCollapses, 300);
  window.addEventListener('load', initSidebarCollapses);

  // Ensure collapse <-> trigger stay in sync: update trigger classes and arrow rotation
  function syncCollapseTriggers() {
    var collapses = document.querySelectorAll('.sidebar .collapse');
    collapses.forEach(function(col) {
      // find trigger for this collapse
      var id = col.id ? ('#' + col.id) : null;
      if (!id) return;
      var trigger = document.querySelector('.sidebar .nav-link[href="' + id + '"]') || document.querySelector('.sidebar .nav-link[data-bs-target="' + id + '"]');
      if (!trigger) return;

      // find arrow element inside trigger
      var arrow = trigger.querySelector('.menu-arrow');

      // attach events once
      if (col.dataset.syncAttached) return;
      col.dataset.syncAttached = '1';

      col.addEventListener('shown.bs.collapse', function() {
        try { trigger.classList.remove('collapsed'); } catch(e){}
        try { trigger.setAttribute('aria-expanded', 'true'); } catch(e){}
        if (arrow) arrow.classList.add('rotated');
      });

      col.addEventListener('hidden.bs.collapse', function() {
        try { trigger.classList.add('collapsed'); } catch(e){}
        try { trigger.setAttribute('aria-expanded', 'false'); } catch(e){}
        if (arrow) arrow.classList.remove('rotated');
      });

      // set initial state
      if (col.classList.contains('show')) {
        trigger.classList.remove('collapsed');
        trigger.setAttribute('aria-expanded', 'true');
        if (arrow) arrow.classList.add('rotated');
      } else {
        trigger.classList.add('collapsed');
        trigger.setAttribute('aria-expanded', 'false');
        if (arrow) arrow.classList.remove('rotated');
      }
    });
  }

  // run sync after initialization and on delayed load
  try { syncCollapseTriggers(); setTimeout(syncCollapseTriggers, 250); window.addEventListener('load', syncCollapseTriggers); } catch (e) { console.warn('syncCollapseTriggers failed', e); }

  // Active link & arrow rotation: centralize active state handling with retries until Bootstrap is available
  function applyActiveSidebarLink() {
    var path = window.location.pathname.split('/').pop();
    if (!path) path = window.location.href.split('/').pop();

    // Try to match exact filename first
    var activeLink = document.querySelector('.sidebar a[href$="' + path + '"]');

    // Fallback: match by pathname fragment
    if (!activeLink) {
      var links = document.querySelectorAll('.sidebar a');
      for (var i = 0; i < links.length; i++) {
        var href = links[i].getAttribute('href') || '';
        if (href && href.indexOf(path) !== -1) { activeLink = links[i]; break; }
      }
    }

    if (!activeLink) return false;

    // Mark the found link as active
    activeLink.classList.add('active');
    var navItem = activeLink.closest('.nav-item');
    if (navItem) navItem.classList.add('active');

    // If the link is inside a collapsed submenu, expand its parent and style the trigger
    var parentCollapse = activeLink.closest('.collapse');
    if (parentCollapse && parentCollapse.id) {
      if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
        try { bootstrap.Collapse.getOrCreateInstance(parentCollapse).show(); } catch (e){}
      }

      // Find the trigger that opens this collapse
      var trigger = document.querySelector('.sidebar .nav-link[href="#' + parentCollapse.id + '"]') || document.querySelector('.sidebar .nav-link[data-bs-target="#' + parentCollapse.id + '"]');
      if (trigger) {
        trigger.classList.remove('collapsed');
        trigger.setAttribute('aria-expanded', 'true');
        var triggerItem = trigger.closest('.nav-item');
        if (triggerItem) triggerItem.classList.add('active');
      }
    }

    return true;
  }

  // Retry wrapper — attempt until Bootstrap is available or max attempts reached
  function applyActiveSidebarLinkWithRetries(maxAttempts = 10, interval = 100) {
    var attempts = 0;
    function tryOnce() {
      attempts++;
      var done = applyActiveSidebarLink();
      if (done) return;
      if (attempts < maxAttempts) {
        setTimeout(tryOnce, interval);
      }
    }
    tryOnce();
  }

  // Ensure a fallback call on DOMContentLoaded in case initSidebarCollapses didn't run in time
  document.addEventListener('DOMContentLoaded', function() { setTimeout(applyActiveSidebarLinkWithRetries, 150); });
});
</script>