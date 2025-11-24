<style>
/* Using system Comic Sans family — no external import needed */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Comic Sans MS', 'Comic Sans', cursive;
}
a {
  text-decoration: none;
}
.header {
  position: fixed;
  height: 80px;
  width: 100%;
  z-index: 100;
  padding: 0 20px;
  background: #fff;
  border-bottom: 2px solid #e0e0e0;
}
.nav {
  max-width: 1100px;
  width: 100%;
  margin: 0 auto;
}
.nav,
.nav_item {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: space-between;
}
.nav_logo,
.nav_link,
.button {
  color: #fff;
}

.nav_logo.active {
  color: red !important;
}

#form-open.button {
  color: red !important;
  border-color: red !important;
}
.nav_logo {
  font-size: 25px;
}
.nav_item {
  column-gap: 25px;
}
.nav_link:hover {
  color: #007bff;
}
.nav_link.active {
  color: #007bff;
  font-weight: bold;
  border-bottom: 3px solid #007bff;
}
.button {
  padding: 6px 24px;
  border: 2px solid #fff;
  background: transparent;
  border-radius: 6px;
  cursor: pointer;
}
.button:active {
  transform: scale(0.98);
}
/* Home */
.home {
  position: relative;
  height: 100vh;
  width: 100%;
  background-image: url("website-forms-bg.jpg");
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
  padding-top: 100px;
}
/* .home::before and .home.show::before removed to prevent overlay hiding form */
/* From */
.form_container {
    max-width: 500px;
  min-width: 400px;
  width: 100%;
  min-height: 60vh;
  background: rgba(255,255,255,0.98);
  padding: 40px 32px;
  border-radius: 24px;
  box-shadow: 0 8px 48px 0 rgba(0,0,0,0.25), 0 1.5px 8px 0 rgba(0,0,0,0.10);
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease-out;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 10;
}
/* .home.show .form_container not needed */
.signup_form {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #fff;
  opacity: 0;
  pointer-events: none;
  transform: translateY(100%);
  transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), opacity 0.4s;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.form_container.active .signup_form {
  opacity: 1;
  pointer-events: auto;
  transform: translateY(0);
}
.login_form {
  position: relative;
  z-index: 1;
  transition: opacity 0.4s;
  opacity: 1;
}
.form_container.active .login_form {
  opacity: 1;
}
.form_close {
  position: absolute;
  top: 10px;
  right: 20px;
  color: #0b0217;
  font-size: 22px;
  opacity: 0.7;
  cursor: pointer;
}
.form_container h2 {
  font-size: 2.5rem;
  color: #0b0217;
  text-align: center;
  font-weight: bold;
  margin-bottom: 32px;
}
.input_box {
  position: relative;
  margin-top: 30px;
  width: 100%;
  height: 40px;
}
.input_box input {
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  padding: 0 30px;
  color: #222;
  font-size: 1.25rem;
  font-weight: 500;
  transition: all 0.2s ease;
  border-bottom: 2.5px solid #7d2ae8;
  background: #fff;
  border: 1.5px solid #ececf6;
  border-radius: 10px;
  outline: none;
  padding: 0 54px 0 64px; /* Increase right padding for icon spacing */
  color: #222;
  font-size: 1.25rem;
  font-weight: 500;
  transition: all 0.2s ease;
}
.input_box input:focus {
  border-color: #7d2ae8;
  box-shadow: 0 0 8px 2px #a084e8, 0 0 0 4px rgba(125,42,232,0.10);
  outline: none;
  transition: box-shadow 0.3s, border-color 0.3s;
}
.input_box i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
  color: #707070;
}
.input_box i.email,
.input_box i.password {
  left: 18px;
}
.input_box input:focus ~ i.email,
.input_box input:focus ~ i.password {
  color: #7d2ae8;
}
.input_box i.pw_hide {
  right: 14px; /* Add space from right border */
  font-size: 18px;
  cursor: pointer;
}
.option_field {
  margin-top: 14px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form_container a {
  color: #7d2ae8;
  font-size: 12px;
}
.form_container a:hover {
  text-decoration: underline;
}
.checkbox {
  display: flex;
  column-gap: 8px;
  white-space: nowrap;
}
.checkbox input {
  accent-color: #7d2ae8;
}
.checkbox label {
  font-size: 12px;
  cursor: pointer;
  user-select: none;
  color: #0b0217;
}
.form_container .button {
  background: #7d2ae8;
  margin-top: 40px;
  width: 60%;
  padding: 10px 0;
  border-radius: 10px;
  font-size: 1rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  font-weight: bold;
  letter-spacing: 1px;
  box-shadow: 0 2px 12px 0 rgba(125,42,232,0.15);
}
.login_signup {
  font-size: 12px;
  text-align: center;
  margin-top: 15px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory | Sales</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  </head>
  <body>
    <?php include 'include/preloader.php'; ?>

    <!-- Header -->
    <header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo active"><img src="asset/images/salespilot%20logo2.png" alt="SalesPilot Logo" style="height:36px;display:block;object-fit:contain;"></a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Sales Pilot</h2>
        </ul>
        <!-- <button class="button" id="form-open">Login</button> -->
      </nav>
    </header>
    <section class="home">
  <div style="width:100%;max-width:600px;margin:40px 50px auto;">
    <h2 style="margin-bottom:32px;text-align:center;">Welcome ABRAHAM</h2>
    <p style="text-align:center;font-size:1.1rem;color:#555;max-width:600px;margin:0 auto 24px auto;">Please select the account type you want to continue with:</p>
    <div class="account-type-list-container expanded">
      <!-- <div class="account-user-name" style="text-align:center;font-size:1.18rem;font-weight:bold;color:#7d2ae8;margin-bottom:18px;">DARAMOLA ABRAHAM DAMILOLA</div> -->
      <ul class="account-type-list">
        <li class="account-type-list-item" data-type="manager" style="flex-direction:column;align-items:flex-start;gap:2px;">
          <div style="display:flex;align-items:center;gap:16px;width:100%;">
            <span class="account-type-label">DARAMOLA ABRAHAM DAMILOLA</span>
          </div>
          <span class="account-type-user" style="display:block;font-size:1.01rem;color:#444;margin-left:0;margin-top:0;">Manager Account</span>
        </li>
        <li class="account-type-list-item" data-type="staff" style="flex-direction:column;align-items:flex-start;gap:2px;">
          <div style="display:flex;align-items:center;gap:16px;width:100%;">
            <span class="account-type-label">DARAMOLA ABRAHAM DAMILOLA</span>
          </div>
          <span class="account-type-user" style="display:block;font-size:1.01rem;color:#444;margin-left:0;margin-top:0;">Staff Account</span>
        </li>
      </ul>
    </div>
  
    <div id="accountTypeMsg" style="text-align:center;font-size:1.05rem;color:#7d2ae8;margin-bottom:18px;display:none;"></div>
    <div style="text-align:center;">
      <button id="proceedAccountTypeBtn" class="button" style="background:#7d2ae8;color:#fff;border:none;border-radius:10px;padding:12px 38px;font-size:1.1rem;font-weight:bold;box-shadow:0 2px 12px 0 rgba(125,42,232,0.12);cursor:pointer;opacity:0.6;pointer-events:none;transition:opacity 0.2s;">Proceed</button>
    </div>
  </section>


    <style>
  .account-type-list-container {
    width: 100%;
    max-width: 600px;
    margin: 32px auto 32px auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 24px 0 rgba(125,42,232,0.13);
    padding: 36px 0 24px 0;
    border: 2.5px solid #ececf6;
  }
  .account-type-list-container.expanded {
    max-width: 700px;
    padding: 44px 0 32px 0;
  }
  .account-user-name {
    font-size: 1.18rem;
    font-weight: bold;
    color: #7d2ae8;
    margin-bottom: 18px;
    letter-spacing: 0.5px;
  }
  .account-type-list {
    list-style: none;
    margin: 0;
    padding: 0 24px;
    display: flex;
    flex-direction: column;
    gap: 18px;
  }
  .account-type-list-item {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 2px;
    padding: 16px 24px;
    border-radius: 12px;
    cursor: pointer;
    transition: background 0.18s, box-shadow 0.18s, border-color 0.18s, color 0.18s;
    font-size: 1.08rem;
    font-weight: 500;
    color: #7d2ae8;
    border: 2px solid transparent;
    background: #fff;
    width: 100%;
    box-sizing: border-box;
  }
  .account-type-list-item:hover {
    background: #f7f3ff;
    box-shadow: 0 2px 8px 0 rgba(125,42,232,0.10);
    border-color: #d1c4e9;
    color: #5a1bbf;
  }
  .account-type-list-item.selected {
    background: #f7f3ff;
    border-color: #7d2ae8;
    color: #5a1bbf;
    box-shadow: 0 2px 8px 0 rgba(125,42,232,0.10);
    width: 100%;
  }
  .account-type-label {
    font-size: 1.08rem;
    color: inherit;
    font-weight: 500;
  }
  .plan-card {
        flex: 1 1 200px;
        min-width: 200px;
        max-width: 260px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px 0 rgba(125,42,232,0.10);
        padding: 32px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 2px solid #ececf6;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        cursor: pointer;
        outline: none;
      }
      .plan-card h3 {
        margin-bottom: 12px;
        color: #7d2ae8;
        font-size: 1.3rem;
      }
      .plan-price {
        font-size: 1.1rem;
        margin-bottom: 8px;
        font-weight: bold;
      }
      .plan-desc {
        font-size: 1rem;
        color: #555;
        text-align: center;
        margin-bottom: 16px;
      }
      .plan-detail-btn {
        background: #7d2ae8;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 18px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
      }
      .plan-card:hover {
        border-color: #7d2ae8;
        box-shadow: 0 4px 24px 0 rgba(125,42,232,0.18);
        background: #f7f3ff;
      }
      .plan-card.selected, .plan-card:focus {
        border-color: #007bff;
        box-shadow: 0 6px 32px 0 rgba(0,123,255,0.18);
        background: #eaf1ff;
      } 
    </style>
    <script>
      // Inject spinner keyframes for inline usage
      (function(){
        var css = '@keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}';
        var s = document.createElement('style'); s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
        // Root preloader handled via include 'include/preloader.php'
      })();

      // Account type selection logic (vertical list)
      document.addEventListener('DOMContentLoaded', function() {
        var accountTypeItems = document.querySelectorAll('.account-type-list-item');
        var proceedBtn = document.getElementById('proceedAccountTypeBtn');
        var msg = document.getElementById('accountTypeMsg');
        var selectedType = null;
        accountTypeItems.forEach(function(item) {
          item.addEventListener('click', function() {
            accountTypeItems.forEach(function(i) { i.classList.remove('selected'); });
            item.classList.add('selected');
            selectedType = item.getAttribute('data-type');
            proceedBtn.style.opacity = '1';
            proceedBtn.style.pointerEvents = 'auto';
            msg.style.display = 'block';
            // msg.textContent = (selectedType === 'manager') ? 'You have selected Manager Account.' : 'You have selected Staff Account.';
          });
        });
        proceedBtn.addEventListener('click', function() {
          if (!selectedType) return;
          msg.textContent = 'Proceeding with ' + (selectedType === 'manager' ? 'Manager' : 'Staff') + ' Account...';
          // Example: window.location.href = selectedType + '_dashboard.php';
        });
      });
    </script>
  </body>
</html>