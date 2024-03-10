
<main>
  <style>
      * {
        box-sizing: border-box;
      }
      body {
        font-family: "Lato", sans-serif;
      }

      /* Style the tab */
      .tab {
        float: left;
        border-bottom: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 12%;
        height: 100vh;
      }

      /* Style the buttons inside the tab */
      .tab button {
        display: block;
        background-color: inherit;
        color: #222;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 12px;
      }

      /* Change background color of buttons on hover */
      .tab button:hover {
        border-left: 4px solid #ccc !important;
      }

      /* Create an active/current "tab button" class */
      .tab button.active {
        background-color: #fff;
        color: #222;
        border-left: 4px solid blue !important;
      }

      /* Style the tab content */
      .tabcontent {
        float: left;
        padding: 14px;
        border-bottom: 1px solid #ccc;
        background-color: #fff;
        width: 85%;
        border-left: none;
        height: 100vh;
      }

      .nav-link {
        color: #999;
      }

      /*.nav-link:hover {*/
      /*  color: #999;*/
      /*  border-top: 4px solid #ccc !important;*/
      /*}*/

      .nav-item .active {
        border-top: 4px solid blue !important;
      }
    </style>

  
<ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="retur-tab" data-bs-toggle="tab" data-bs-target="#retur" type="button" role="tab"
          aria-controls="retur"
          aria-selected="true">
          Retur Transfer
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="transfer-tab"
          data-bs-toggle="tab"
          data-bs-target="#transfer"
          type="button"
          role="tab"
          aria-controls="transfer"
          aria-selected="false"
        >
          Transfer Barang
        </button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div
        class="tab-pane fade show active"
        id="retur"
        role="tabpanel"
        aria-labelledby="retur-tab">
        <div class="tab">
          <button
            class="tablinks active"
            onclick="openCity(event, 'Tab1')"
            id="defaultOpen">
            Baru Di Buat
          </button>
          <button class="tablinks" onclick="openCity(event, 'Tab2')">
            Sedang Di Jalan
          </button>
          <button class="tablinks" onclick="openCity(event, 'Tab3')">
            Selesai
          </button>
        </div>

        <div id="Tab1" class="tabcontent">
         <?php 
         include 'retur.php';
         ?>
        </div>

        <div id="Tab2" class="tabcontent">
        <?php 
         include 'retur_dijalan.php';
         ?>
        </div>

        <div id="Tab3" class="tabcontent">
        <?php 
         include 'retur_selesai.php';
         ?>
        </div>
      </div>
      <div class="tab-pane fade" id="transfer"
        role="tabpanel"
        aria-labelledby="transfer-tab">
        <div class="tab">
          <button
            class="tablinks"
            onclick="openCity(event, 'T1')"
            id="default">
            Baru Di buat
          </button>
          <button class="tablinks" onclick="openCity(event, 'T2')">
            Sedang Di Jalan
          </button>
          <button class="tablinks" onclick="openCity(event, 'T3')">
            Selesai
          </button>
        </div>

        <div id="T1" class="tabcontent">
         <?php 
         include 'transaksi.php';
         ?>
        </div>

        <div id="T2" class="tabcontent">
            <div class="menu">
        <?php 
         include 'transfer_dijalan.php';
         ?>
         </div>
        </div>

        <div id="T3" class="tabcontent">
            <div class="menu2">
        <?php 
         include 'transaksi_selesai.php';
         ?>
         </div>
        </div>
      </div>
   
    
    </main>
    <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
    </script> 