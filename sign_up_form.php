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
    <link rel="stylesheet" href="asset/css/sign_up_form.css" />
  </head>
  <body>
    <!-- Preloader -->
    <div id="preloader" style="position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:#fff;z-index:99999;transition:opacity 0.35s ease;">
      <div class="spinner" style="width:72px;height:72px;border-radius:50%;border:8px solid rgba(125,42,232,0.12);border-top-color:#7d2ae8;animation:spin 1s linear infinite;"></div>
    </div>

    <!-- Header -->
    <header class="header">
     <nav class="nav">
        <a href="#" class="nav_logo active">LOGO</a>
        <ul class="nav_items" style="width:100%;display:flex;justify-content:center;align-items:center;">
          <h2 style="margin:0 auto;text-align:center;font-size:1.7rem;font-weight:600;color:#7d2ae8;">Inventory And Sales Management Made Easy</h2>
        </ul>
        <!-- <button class="button" id="form-open">Login</button> -->
      </nav>
    </header>

    <section class="home">
      <div class="form_container">
          <h2 style="margin-top: 60px;">Signup</h2>
        <form action="#">
      <div class="signup-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px 32px; width: 95%; margin-bottom: 32px;">
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <input type="text" placeholder="First Name" required />
          <i class="uil uil-user"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <input type="text" placeholder="Surname" required />
          <i class="uil uil-user"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <input type="text" placeholder="Other name(s)" />
          <i class="uil uil-user"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <input type="text" placeholder="Business Name" required />
          <i class="uil uil-briefcase"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <label for="businessLogo" style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;background:#fff;border:1.5px solid #ececf6;border-radius:10px;cursor:pointer;position:relative;">
            <span id="logoPlaceholder" style="width:100%;text-align:center;color:#888;font-size:1.1rem;">Upload business logo</span>
            <input id="businessLogo" type="file" accept="image/*" style="opacity:0;position:absolute;left:0;top:0;width:100%;height:100%;cursor:pointer;" />
            <i class="uil uil-image" style="position:absolute;right:18px;top:50%;transform:translateY(-50%);"></i>
          </label>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <input type="text" placeholder="Address" required />
          <i class="uil uil-location-point"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <select id="stateSelect" required style="height:100%;width:100%;border:none;outline:none;padding:0 30px;color:#222;font-size:1.25rem;font-weight:500;transition:all 0.2s ease;border-bottom:2.5px solid #7d2ae8;background:#f7f7fa;">
            <option value="">Select State</option>
            <option value="Abia">Abia</option>
            <option value="Adamawa">Adamawa</option>
            <option value="Akwa Ibom">Akwa Ibom</option>
            <option value="Anambra">Anambra</option>
            <option value="Bauchi">Bauchi</option>
            <option value="Bayelsa">Bayelsa</option>
            <option value="Benue">Benue</option>
            <option value="Borno">Borno</option>
            <option value="Cross River">Cross River</option>
            <option value="Delta">Delta</option>
            <option value="Ebonyi">Ebonyi</option>
            <option value="Edo">Edo</option>
            <option value="Ekiti">Ekiti</option>
            <option value="Enugu">Enugu</option>
            <option value="FCT">FCT</option>
            <option value="Gombe">Gombe</option>
            <option value="Imo">Imo</option>
            <option value="Jigawa">Jigawa</option>
            <option value="Kaduna">Kaduna</option>
            <option value="Kano">Kano</option>
            <option value="Katsina">Katsina</option>
            <option value="Kebbi">Kebbi</option>
            <option value="Kogi">Kogi</option>
            <option value="Kwara">Kwara</option>
            <option value="Lagos">Lagos</option>
            <option value="Nasarawa">Nasarawa</option>
            <option value="Niger">Niger</option>
            <option value="Ogun">Ogun</option>
            <option value="Ondo">Ondo</option>
            <option value="Osun">Osun</option>
            <option value="Oyo">Oyo</option>
            <option value="Plateau">Plateau</option>
            <option value="Rivers">Rivers</option>
            <option value="Sokoto">Sokoto</option>
            <option value="Taraba">Taraba</option>
            <option value="Yobe">Yobe</option>
            <option value="Zamfara">Zamfara</option>
          </select>
          <i class="uil uil-map"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <select id="lgaSelect" required style="height:100%;width:100%;border:none;outline:none;padding:0 30px;color:#222;font-size:1.25rem;font-weight:500;transition:all 0.2s ease;border-bottom:2.5px solid #7d2ae8;background:#f7f7fa;">
            <option value="">Select Local Government Area</option>
          </select>
          <i class="uil uil-map-marker"></i>
        </div>
        <div class="input_box" style="flex:1 1 45%; min-width:180px;">
          <input type="tel" placeholder="Phone number" required />
          <i class="uil uil-phone"></i>
        </div>
      </div>
      <div class="input_box" style="max-width:830px;width:100%;">
        <input type="email" placeholder="(Automatically fix the verified E-mail here)" required />
        <i class="uil uil-envelope-alt email"></i>
      </div>
  <div style="display:flex;gap:40px;width:100%;justify-content:flex-start;">
  <div class="input_box" style="max-width:500px;width:100%;">
          <input type="password" placeholder="Create password" required />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>
  <div class="input_box" style="max-width:800px;width:90%;">
          <input type="password" placeholder="Confirm password" required />
          <i class="uil uil-lock password"></i>
          <i class="uil uil-eye-slash pw_hide"></i>
        </div>
      </div>
      <div style="height:24px;"></div>
  <button class="button" type="submit" id="signupSubmitBtn">Signup Now</button>
    </form>
    <!-- <div class="login_signup">Already have an account? <a href="index.php" id="login">Login</a></div> -->
    </form>
  </div>
    </section>
    <script>
    // Inject spinner keyframes and hide preloader on load
    (function(){
      var css = '@keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}';
      var s = document.createElement('style'); s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
      function hidePreloader(){
        var p = document.getElementById('preloader');
        if(!p) return;
        p.style.opacity = '0';
        setTimeout(function(){ if(p && p.parentNode) p.parentNode.removeChild(p); }, 420);
      }
      if (document.readyState === 'complete') hidePreloader(); else { window.addEventListener('load', hidePreloader); setTimeout(hidePreloader, 5000); }
    })();

    // Redirect to plans.php after form submission
    document.addEventListener('DOMContentLoaded', function() {
      var signupForm = document.querySelector('.form_container form');
      if(signupForm) {
        signupForm.addEventListener('submit', function(e) {
          e.preventDefault();
          // Optionally, validate form here
          window.location.href = 'plans.php';
        });
      }
    });
        // Nigerian States and LGAs
        const stateLGAs = {
          "Abia": ["Aba North","Aba South","Arochukwu","Bende","Ikwuano","Isiala Ngwa North","Isiala Ngwa South","Isuikwuato","Obi Ngwa","Ohafia","Osisioma","Ugwunagbo","Ukwa East","Ukwa West","Umuahia North","Umuahia South","Umu Nneochi"],
          "Adamawa": ["Demsa","Fufore","Ganye","Gayuk","Gombi","Grie","Hong","Jada","Lamurde","Madagali","Maiha","Mayo Belwa","Michika","Mubi North","Mubi South","Numan","Shelleng","Song","Toungo","Yola North","Yola South"],
          "Akwa Ibom": ["Abak","Eastern Obolo","Eket","Esit Eket","Essien Udim","Etim Ekpo","Etinan","Ibeno","Ibesikpo Asutan","Ibiono-Ibom","Ika","Ikono","Ikot Abasi","Ikot Ekpene","Ini","Itu","Mbo","Mkpat-Enin","Nsit-Atai","Nsit-Ibom","Nsit-Ubium","Obot Akara","Okobo","Onna","Oron","Oruk Anam","Udung-Uko","Ukanafun","Uruan","Urue-Offong/Oruko","Uyo"],
          "Anambra": ["Aguata","Anambra East","Anambra West","Anaocha","Awka North","Awka South","Ayamelum","Dunukofia","Ekwusigo","Idemili North","Idemili South","Ihiala","Njikoka","Nnewi North","Nnewi South","Ogbaru","Onitsha North","Onitsha South","Orumba North","Orumba South","Oyi"],
          "Bauchi": ["Alkaleri","Bauchi","Bogoro","Damban","Darazo","Dass","Gamawa","Ganjuwa","Giade","Itas/Gadau","Jama'are","Katagum","Kirfi","Misau","Ningi","Shira","Tafawa Balewa","Toro","Warji","Zaki"],
          "Bayelsa": ["Brass","Ekeremor","Kolokuma/Opokuma","Nembe","Ogbia","Sagbama","Southern Ijaw","Yenagoa"],
          "Benue": ["Ado","Agatu","Apa","Buruku","Gboko","Guma","Gwer East","Gwer West","Katsina-Ala","Konshisha","Kwande","Logo","Makurdi","Obi","Ogbadibo","Ohimini","Oju","Okpokwu","Otukpo","Tarka","Ukum","Ushongo","Vandeikya"],
          "Borno": ["Abadam","Askira/Uba","Bama","Bayo","Biu","Chibok","Damboa","Dikwa","Gubio","Guzamala","Gwoza","Hawul","Jere","Kaga","Kala/Balge","Konduga","Kukawa","Kwaya Kusar","Mafa","Magumeri","Maiduguri","Marte","Mobbar","Monguno","Ngala","Nganzai","Shani"],
          "Cross River": ["Abi","Akamkpa","Akpabuyo","Bakassi","Bekwarra","Biase","Boki","Calabar Municipal","Calabar South","Etung","Ikom","Obanliku","Obubra","Obudu","Odukpani","Ogoja","Yakuur","Yala"],
          "Delta": ["Aniocha North","Aniocha South","Bomadi","Burutu","Ethiope East","Ethiope West","Ika North East","Ika South","Isoko North","Isoko South","Ndokwa East","Ndokwa West","Okpe","Oshimili North","Oshimili South","Patani","Sapele","Udu","Ughelli North","Ughelli South","Ukwuani","Uvwie","Warri North","Warri South","Warri South West"],
          "Ebonyi": ["Abakaliki","Afikpo North","Afikpo South","Ebonyi","Ezza North","Ezza South","Ikwo","Ishielu","Ivo","Izzi","Ohaozara","Ohaukwu","Onicha"],
          "Edo": ["Akoko-Edo","Egor","Esan Central","Esan North-East","Esan South-East","Esan West","Etsako Central","Etsako East","Etsako West","Igueben","Ikpoba Okha","Oredo","Orhionmwon","Ovia North-East","Ovia South-West","Owan East","Owan West","Uhunmwonde"],
          "Ekiti": ["Ado Ekiti","Efon","Ekiti East","Ekiti South-West","Ekiti West","Emure","Gbonyin","Ido Osi","Ijero","Ikere","Ikole","Ilejemeje","Irepodun/Ifelodun","Ise/Orun","Moba","Oye"],
          "Enugu": ["Aninri","Awgu","Enugu East","Enugu North","Enugu South","Ezeagu","Igbo Etiti","Igbo Eze North","Igbo Eze South","Isi Uzo","Nkanu East","Nkanu West","Nsukka","Oji River","Udenu","Udi","Uzo Uwani"],
          "FCT": ["Abaji","Bwari","Gwagwalada","Kuje","Kwali","Municipal Area Council"],
          "Gombe": ["Akko","Balanga","Billiri","Dukku","Funakaye","Gombe","Kaltungo","Kwami","Nafada","Shongom","Yamaltu/Deba"],
          "Imo": ["Aboh Mbaise","Ahiazu Mbaise","Ehime Mbano","Ezinihitte","Ideato North","Ideato South","Ihitte/Uboma","Ikeduru","Isiala Mbano","Isu","Mbaitoli","Ngor Okpala","Njaba","Nkwerre","Nwangele","Obowo","Oguta","Ohaji/Egbema","Okigwe","Onuimo","Orlu","Orsu","Oru East","Oru West","Owerri Municipal","Owerri North","Owerri West"],
          "Jigawa": ["Auyo","Babura","Biriniwa","Birnin Kudu","Buji","Dutse","Gagarawa","Garki","Gumel","Guri","Gwaram","Gwiwa","Hadejia","Jahun","Kafin Hausa","Kaugama","Kazaure","Kiri Kasama","Kiyawa","Maigatari","Malam Madori","Miga","Ringim","Roni","Sule Tankarkar","Taura","Yankwashi"],
          "Kaduna": ["Birnin Gwari","Chikun","Giwa","Igabi","Ikara","Jaba","Jema'a","Kachia","Kaduna North","Kaduna South","Kagarko","Kajuru","Kaura","Kauru","Kubau","Kudan","Lere","Makarfi","Sabon Gari","Sanga","Soba","Zangon Kataf","Zaria"],
          "Kano": ["Ajingi","Albasu","Bagwai","Bebeji","Bichi","Bunkure","Dala","Dambatta","Dawakin Kudu","Dawakin Tofa","Doguwa","Fagge","Gabasawa","Garko","Garun Mallam","Gaya","Gezawa","Gwale","Gwarzo","Kabo","Kano Municipal","Karaye","Kibiya","Kiru","Kumbotso","Kunchi","Kura","Madobi","Makoda","Minjibir","Nasarawa","Rano","Rimin Gado","Rogo","Shanono","Sumaila","Takai","Tarauni","Tofa","Tsanyawa","Tudun Wada","Ungogo","Warawa","Wudil"],
          "Katsina": ["Bakori","Batagarawa","Batsari","Baure","Bindawa","Charanchi","Dandume","Danja","Dan Musa","Daura","Dutsi","Dutsin Ma","Faskari","Funtua","Ingawa","Jibia","Kafur","Kaita","Kankara","Kankia","Katsina","Kurfi","Kusada","Mai'Adua","Malumfashi","Mani","Mashi","Matazu","Musawa","Rimi","Sabuwa","Safana","Sandamu","Zango"],
          "Kebbi": ["Aleiro","Arewa Dandi","Argungu","Augie","Bagudo","Birnin Kebbi","Bunza","Dandi","Fakai","Gwandu","Jega","Kalgo","Koko/Besse","Maiyama","Ngaski","Sakaba","Shanga","Suru","Wasagu/Danko","Yauri","Zuru"],
          "Kogi": ["Adavi","Ajaokuta","Ankpa","Bassa","Dekina","Ibaji","Idah","Igalamela Odolu","Ijumu","Kabba/Bunu","Kogi","Lokoja","Mopa-Muro","Ofu","Ogori/Magongo","Okehi","Okene","Olamaboro","Omala","Yagba East","Yagba West"],
          "Kwara": ["Asa","Baruten","Edu","Ekiti","Ifelodun","Ilorin East","Ilorin South","Ilorin West","Irepodun","Isin","Kaiama","Moro","Offa","Oke Ero","Oyun","Pategi"],
          "Lagos": ["Agege","Ajeromi-Ifelodun","Alimosho","Amuwo-Odofin","Apapa","Badagry","Epe","Eti Osa","Ibeju-Lekki","Ifako-Ijaiye","Ikeja","Ikorodu","Kosofe","Lagos Island","Lagos Mainland","Mushin","Ojo","Oshodi-Isolo","Shomolu","Surulere"],
          "Nasarawa": ["Akwanga","Awe","Doma","Karu","Keana","Keffi","Kokona","Lafia","Nasarawa","Nasarawa Egon","Obi","Toto","Wamba"],
          "Niger": ["Agaie","Agwara","Bida","Borgu","Bosso","Chanchaga","Edati","Gbako","Gurara","Katcha","Kontagora","Lapai","Lavun","Magama","Mariga","Mashegu","Mokwa","Munya","Paikoro","Rafi","Rijau","Shiroro","Suleja","Tafa","Wushishi"],
          "Ogun": ["Abeokuta North","Abeokuta South","Ado-Odo/Ota","Egbado North","Egbado South","Ewekoro","Ifo","Ijebu East","Ijebu North","Ijebu North East","Ijebu Ode","Ikenne","Imeko Afon","Ipokia","Obafemi Owode","Odeda","Odogbolu","Ogun Waterside","Remo North","Shagamu"],
          "Ondo": ["Akoko North-East","Akoko North-West","Akoko South-West","Akoko South-East","Akure North","Akure South","Ese Odo","Idanre","Ifedore","Ilaje","Ile Oluji/Okeigbo","Irele","Odigbo","Okitipupa","Ondo East","Ondo West","Ose","Owo"],
          "Osun": ["Aiyedaade","Aiyedire","Atakumosa East","Atakumosa West","Boluwaduro","Boripe","Ede North","Ede South","Egbedore","Ejigbo","Ife Central","Ife East","Ife North","Ife South","Ifedayo","Ifelodun","Ila","Ilesa East","Ilesa West","Irepodun","Irewole","Isokan","Iwo","Obokun","Odo Otin","Ola Oluwa","Olorunda","Oriade","Orolu","Osogbo"],
          "Oyo": ["Afijio","Akinyele","Atiba","Atisbo","Egbeda","Ibadan North","Ibadan North-East","Ibadan North-West","Ibadan South-East","Ibadan South-West","Ibarapa Central","Ibarapa East","Ibarapa North","Ido","Irepo","Iseyin","Itesiwaju","Iwajowa","Kajola","Lagelu","Ogbomosho North","Ogbomosho South","Ogo Oluwa","Olorunsogo","Oluyole","Ona Ara","Orelope","Ori Ire","Oyo","Oyo East","Saki East","Saki West","Surulere"],
          "Plateau": ["Barkin Ladi","Bassa","Bokkos","Jos East","Jos North","Jos South","Kanam","Kanke","Langtang North","Langtang South","Mangu","Mikang","Pankshin","Qua'an Pan","Riyom","Shendam","Wase"],
          "Rivers": ["Abua/Odual","Ahoada East","Ahoada West","Akuku-Toru","Andoni","Asari-Toru","Bonny","Degema","Eleme","Emohua","Etche","Gokana","Ikwerre","Khana","Obio/Akpor","Ogba/Egbema/Ndoni","Ogu/Bolo","Okrika","Omuma","Opobo/Nkoro","Oyigbo","Port Harcourt","Tai"],
          "Sokoto": ["Binji","Bodinga","Dange Shuni","Gada","Goronyo","Gudu","Gwadabawa","Illela","Isa","Kebbe","Kware","Rabah","Sabon Birni","Shagari","Silame","Sokoto North","Sokoto South","Tambuwal","Tangaza","Tureta","Wamako","Wurno","Yabo"],
          "Taraba": ["Ardo Kola","Bali","Donga","Gashaka","Gassol","Ibi","Jalingo","Karim Lamido","Kumi","Lau","Sardauna","Takum","Ussa","Wukari","Yorro","Zing"],
          "Yobe": ["Bade","Bursari","Damaturu","Fika","Fune","Geidam","Gujba","Gulani","Jakusko","Karasuwa","Machina","Nangere","Nguru","Potiskum","Tarmuwa","Yunusari","Yusufari"],
          "Zamfara": ["Anka","Bakura","Birnin Magaji/Kiyaw","Bukkuyum","Bungudu","Gummi","Gusau","Kaura Namoda","Maradun","Maru","Shinkafi","Talata Mafara","Chafe","Zurmi"]
        };

        document.addEventListener('DOMContentLoaded', function() {
          const stateSelect = document.getElementById('stateSelect');
          const lgaSelect = document.getElementById('lgaSelect');
          if(stateSelect && lgaSelect) {
            stateSelect.addEventListener('change', function() {
              const state = this.value;
              lgaSelect.innerHTML = '<option value="">Select Local Government Area</option>';
              if(stateLGAs[state]) {
                stateLGAs[state].forEach(function(lga) {
                  const opt = document.createElement('option');
                  opt.value = lga;
                  opt.textContent = lga;
                  lgaSelect.appendChild(opt);
                });
              }
            });
          }
        });

        // ...existing code...
        const home = document.querySelector(".home");
        const formContainer = document.querySelector(".form_container");
        const formOpenBtn = document.getElementById('form-open');
        const formCloseBtn = document.querySelector(".form_close");
        const signupBtns = document.querySelectorAll("#signup");
        const loginBtns = document.querySelectorAll("#login");
        const pwShowHide = document.querySelectorAll(".pw_hide");
        const signupFormContainer = document.getElementById("signupFormContainer");

        if (formOpenBtn && home) {
          formOpenBtn.addEventListener("click", () => home.classList.add("show"));
        }
        if (formCloseBtn && signupFormContainer && home) {
          formCloseBtn.addEventListener("click", () => {
            home.classList.remove("show");
            signupFormContainer.style.opacity = 0;
            signupFormContainer.style.pointerEvents = "none";
            signupFormContainer.style.transform = "translateY(100vh)";
          });
        }
// Make pw toggle icons keyboard-accessible and robustly find their inputs
// Event delegation for pw toggle icons — works even if elements are shown/hidden later
document.addEventListener('click', function(e) {
  const icon = e.target.closest('.pw_hide');
  if (!icon) return;
  // find the input in the same .input_box
  const container = icon.closest('.input_box');
  const input = container ? container.querySelector('input[type="password"], input[type="text"]') : null;
  if (!input) return;
  if (input.type === 'password') {
    input.type = 'text';
    icon.classList.remove('uil-eye-slash');
    icon.classList.add('uil-eye');
  } else {
    input.type = 'password';
    icon.classList.remove('uil-eye');
    icon.classList.add('uil-eye-slash');
  }
});
signupBtns.forEach(btn => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    signupFormContainer.style.opacity = 1;
    signupFormContainer.style.pointerEvents = "auto";
    signupFormContainer.style.transform = "translateY(0)";
  });
});
loginBtns.forEach(btn => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    signupFormContainer.style.opacity = 0;
    signupFormContainer.style.pointerEvents = "none";
    signupFormContainer.style.transform = "translateY(100vh)";
  });
});
	</script>
  </body>
</html>
