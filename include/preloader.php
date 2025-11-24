<?php
// Shared preloader include for root pages
// Usage: include 'include/preloader.php' from top-level PHP pages
?>
<!-- Preloader -->
<div id="preloader" style="position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#fff;z-index:99999;transition:opacity 0.35s ease;">
  <div class="spinner" style="width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;"></div>
</div>
<script>
  // Ensure spinner keyframes exist and hide preloader on load (defensive)
  (function(){
    var css = '@keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}';
    if (!document.getElementById('preloader-spin-style')){
      var s = document.createElement('style'); s.id = 'preloader-spin-style'; s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
    }
    function hidePreloader(){
      var p = document.getElementById('preloader');
      if(!p) return;
      p.style.opacity = '0';
      setTimeout(function(){ if(p && p.parentNode) p.parentNode.removeChild(p); }, 420);
    }
    if (document.readyState === 'complete') hidePreloader(); else { window.addEventListener('load', hidePreloader); setTimeout(hidePreloader, 6000); }
  })();
</script>
