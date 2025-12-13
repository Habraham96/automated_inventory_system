<?php
// Shared preloader include for Manager views
// Usage: include '../layouts/preloader.php' from inside Manager/views/*
?>
<!-- Preloader -->
<div id="preloader" style="position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#fff;z-index:99999;transition:opacity 0.35s ease;">
  <div class="spinner" style="width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;"></div>
</div>
<script>
  // Ensure spinner keyframes exist and hide preloader on load (defensive)
  (function(){
    // Add spin keyframes if not present
    var hasSpin = false;
    try{
      var ss = document.styleSheets;
      for(var i=0;i<ss.length;i++){
        var rules = ss[i].cssRules||ss[i].rules;
        if(!rules) continue;
        for(var j=0;j<rules.length;j++){
          var r = rules[j];
          if(r.type===7 && /@keyframes\s+spin/.test(r.cssText)) { hasSpin = true; break; }
        }
        if(hasSpin) break;
      }
    }catch(e){ /* ignore cross-origin styleSheets */ }
    if(!hasSpin){
      var css = '@keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}';
      var s = document.createElement('style'); s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
    }

    function hidePreloader(){
      var p = document.getElementById('preloader');
      if(!p) return;
      p.style.opacity = '0';
      p.style.pointerEvents = 'none';
      setTimeout(function(){ if(p && p.parentNode) p.parentNode.removeChild(p); }, 420);
    }

    if (document.readyState === 'complete') {
      hidePreloader();
    } else {
      window.addEventListener('load', hidePreloader);
      // Fallback: ensure preloader removed after 6s to avoid stuck states
      setTimeout(hidePreloader, 6000);
    }
  })();
</script>
