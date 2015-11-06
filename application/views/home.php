<!doctype html>
<!--
@license
Copyright (c) 2015 The Polymer Project Authors. All rights reserved.
This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
Code distributed by Google as part of the polymer project is also
subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
-->

<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Polymer Starter Kit" />
  <title>Junk On Us!</title>
  <!-- Place favicon.ico in the `app/` directory -->

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#2E3AA1">

  <!-- Web Application Manifest -->
  <link rel="manifest" href="<?php echo base_url(); ?>manifest.json">

  <!-- Tile color for Win8 -->
  <meta name="msapplication-TileColor" content="#3372DF">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="PSK">
  <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>images/touch/chrome-touch-icon-192x192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>images/touch/apple-touch-icon.png">

  <!-- Tile icon for Win8 (144x144) -->
  <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>images/touch/ms-touch-icon-144x144-precomposed.png">

  <!-- build:css styles/main.css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>styles/main.css">
  <!-- endbuild-->

  <!-- build:js bower_components/webcomponentsjs/webcomponents-lite.min.js -->
  <script src="<?php echo base_url(); ?>bower_components/webcomponentsjs/webcomponents-lite.js"></script>
  <!-- endbuild -->

  <!-- will be replaced with elements/elements.vulcanized.html -->
  <link rel="import" href="<?php echo base_url(); ?>elements/elements.html">
  <!-- endreplace-->

  <!-- For shared styles, shared-styles.html import in elements.html -->
  <style is="custom-style" include="shared-styles"></style>
  
  <link rel="import" href="<?php echo base_url(); ?>bower_components/paper-card/paper-card.html">
  <link rel="import" href="<?php echo base_url(); ?>bower_components/paper-input/paper-input.html">
  <link rel="import" href="<?php echo base_url(); ?>bower_components/paper-button/paper-button.html">
  <link rel="import" href="<?php echo base_url(); ?>bower_components/paper-icon-button/paper-icon-button.html">
  <link rel="import" href="<?php echo base_url(); ?>bower_components/iron-icons/iron-icons.html">
  <link rel="import" href="<?php echo base_url(); ?>bower_components/iron-flex-layout/iron-flex-layout.html">
  <link rel="import" href="<?php echo base_url(); ?>bower_components/paper-styles/color.html">

  <link rel="stylesheet" href="<?php echo base_url(); ?>bower_components/paper-styles/demo.css">
  
  <style is="custom-style">
    body {
      background-color: var(--paper-grey-50);
    }
    #cards {
      @apply(--layout-horizontal);
	  display:block;
      margin-left: auto;
      margin-right: auto;
    }
    paper-card {
      width: device-width;
      margin-bottom: 8px;
	  margin-top: 8px;
	  margin-right: 8px;
	  margin-left: 8px;
    }
    .avatar {
      display: inline-block;
      height: 64px;
      width: 64px;
      border-radius: 50%;
      background: var(--paper-pink-500);
      color: white;
      line-height: 64px;
      font-size: 30px;
      text-align: center;
    }
    .fancy .title {
      position: absolute;
      top: 30px;
      left: 100px;
      color: var(--paper-indigo-500);
    }
    .fancy img {
      width: 100%;
    }
    .fancy .big {
      font-size: 22px;
      padding: 8px 0 16px;
      color: var(--google-grey-500);
    }
    .fancy .medium {
      font-size: 16px;
      padding-bottom: 8px;
    }
    .pink {
      --paper-card-header-color: var(--paper-pink-500);
    }
  </style>

</head>

<body unresolved class="fullbleed layout vertical">
  <span id="browser-sync-binding"></span>
  <template is="dom-bind" id="app">

    <paper-drawer-panel id="paperDrawerPanel">
      <!-- Drawer Scroll Header Panel -->
      <paper-scroll-header-panel drawer fixed>

        <!-- Drawer Toolbar -->
        <paper-toolbar id="drawerToolbar">
          <span class="paper-font-title">Menu</span>
        </paper-toolbar>

        <!-- Drawer Content -->
        <paper-menu class="list" attr-for-selected="data-route" selected="[[route]]">
          <a data-route="home" href="/home" on-click="onDataRouteClick">
            <iron-icon icon="home"></iron-icon>
            <span>Home</span>
          </a>
		  
		  <a data-route="post-item" href="/post-item" on-click="onDataRouteClick">
            <iron-icon icon="create"></iron-icon>
            <span>Post Item</span>
          </a>
		  
		  <a data-route="browse-posts" href="/browse-posts" on-click="onDataRouteClick">
            <iron-icon icon="list"></iron-icon>
            <span>Browse Posts</span>
          </a>

          <a data-route="users" href="/users" on-click="onDataRouteClick">
            <iron-icon icon="info"></iron-icon>
            <span>Users</span>
          </a>

          <a data-route="contact" href="/contact" on-click="onDataRouteClick">
            <iron-icon icon="mail"></iron-icon>
            <span>Contact</span>
          </a>

          <a href="<?php echo base_url() . 'HomeController/map'?>">
            <iron-icon icon="map"></iron-icon>
            <span>Map</span>
          </a>

          <!-- Show logout when person has logged in otherwise show Sign Up -->
          <?php 
          if($this->session->userdata('is_logged_in') == 1) {
            echo '<a href="' . base_url() . 'HomeController/logout">
            <iron-icon icon="arrow-back"></iron-icon>
            <span>Logout</span>
          </a>';
          } else {
            echo '<a href="' . base_url() . 'LoginController/register">
            <iron-icon icon="add-box"></iron-icon>
            <span>Register</span>
          </a>';
          }
          ?>
        </paper-menu>
      </paper-scroll-header-panel>

      <!-- Main Area -->
      <paper-scroll-header-panel main condenses keep-condensed-header>

        <!-- Main Toolbar -->
        <paper-toolbar id="mainToolbar" class="tall">
          <paper-icon-button id="paperToggle" icon="menu" paper-drawer-toggle></paper-icon-button>
          <span class="flex"></span>

          <!-- Toolbar icons -->
          <paper-icon-button icon="refresh"></paper-icon-button>
          <paper-icon-button icon="search"></paper-icon-button>

          <!-- Application name -->
          <div class="middle middle-container center horizontal layout">
            <div class="app-name">Junk On Us</div>
          </div>

          <!-- Application sub title -->
          <div class="bottom bottom-container center horizontal layout">
            <div class="bottom-title paper-font-subhead">Get stuff for free</div>
          </div>

        </paper-toolbar>

        <!-- Main Content -->
        <div class="content">
          <iron-pages attr-for-selected="data-route" selected="{{route}}">

            <section data-route="home">
				<div id="cards">
					<paper-card class='fancy'>
						<div class="card-content">
							<div class="avatar">:)</div>
							<div class="title">
							<div class="medium"><a href="#">Item Title</a></div>
							<div class="small">description...</div>
							</div>
						</div>
				
						<!-- take this out of the content class so that it can span the whole card -->
						<img src="http://placehold.it/350x150">
				
						<div class="card-content">
							<div class="small">Time posted...</div>
						</div>
					</paper-card>
				</div>
            </section>
			
			<section data-route="post-item">
				<paper-material elevation="1">
					<h2 class="page-title">Post Item</h2>
					<p>Post anything you want to get rid of!</p>
					<div class="form">
						<!--<form id="formPost" method="post" action="<?php echo base_url(); ?>homeController/index#!/post-handler">-->
						<?php echo form_open('PostController/post'); ?>
							<paper-input name="name" label="Item Name" required></paper-input>
							<paper-input name="description" label="Item Description" required></paper-input><br/>
              Category:
							<select name="category">
								<option value="mysterybag">Mystery Bag</option>
								<option value="clothing">Clothing</option>
								<option value="electronics">Electronics</option>
								<option value="toys">Toys</option>
								<option value="other">Other...</option>
							</select>
							<br><br><br>
							<!--<paper-button raised type="submit">Submit</paper-button>-->
							<button type="submit">Submit</button>
						</form>
					</div>
				</paper-material>
			</section>
			
			<section data-route="post-handler">
				<paper-material elevation="1">
					<?php 
						$continue = false;
						date_default_timezone_set("America/Vancouver");

						if(((strip_tags($_REQUEST['name'])) !=  ($_REQUEST['name'])) && ((strip_tags($_REQUEST['description'])) !=  ($_REQUEST['description']))){
							echo "NO";
						}else{
							$continue = true;
						}
						
						if($_REQUEST['name'] == ""){
							$continue = false;
						}
						
						if($continue == true){
							// write to file
							$name = $this->input->post('name');
							$description = $this->input->post('description');
							$date = $this->input->post('date("l") . date("y/m/d") . date("h:ia")');
							/*
							$fhandler = @fopen("items.txt", "a") or die("file error");
							
							fwrite($fhandler, "<paper-card class='fancy'>
												<div class='card-content'>
												<div class='avatar'>:)</div>
												<div class='title'>
												<div class='medium'><a href='#'>" . $_REQUEST['name'] . "</a></div>");
							fwrite($fhandler, "<div class='small'>" . $_REQUEST['description'] . "</div></div></div>");
							fwrite($fhandler, "<img src='http://placehold.it/350x150'>");
							fwrite($fhandler, "<div class='card-content'>
												<div class='small'>Posted " . date("l") . " " . date("y/m/d") . " at " . date("h:ia") . "</div></div></paper-card>");
							
							fclose($fhandler);*/
							
							echo "<p>Post Created!</p>";
						}
					?>
				</paper-material>
			</section>
			
			<section data-route="browse-posts">
				<?php
					/*
					$cursor = $collection->find();

					foreach($cursor as $document){
						echo $document['name'] . "<br/>";
						echo $document['description'] . "<br/>";
					}

					//echo '<a href="' . base_url() . 'PostController/readAll>';

					$allPosts = $this->readAll();

					foreach($allPosts as $post) {
						echo $post;
					}*/
					
					$array = file('items.txt');
	
					foreach($array as $oneline){
						echo $oneline;
					}
				?>
			</section>

            <section data-route="users">
              <paper-material elevation="1">
                <h2 class="page-title">Users</h2>
                <p>This is the users section</p>
                <a href="/users/Rob">Rob</a>
              </paper-material>
            </section>

            <section data-route="user-info">
              <paper-material elevation="1">
                <h2 class="page-title">
                User:<span>{{params.name}}</span>
                </h2>
                <div>This is <span>{{params.name}}</span>'s section</div>
              </paper-material>
            </section>

            <section data-route="contact">
              <paper-material elevation="1">
                <h2 class="page-title">Contact</h2>
                <p>This is the contact section</p>
              </paper-material>
            </section>

          </iron-pages>
        </div>
      </paper-scroll-header-panel>
    </paper-drawer-panel>

    <!-- Uncomment next block to enable Service Worker support (1/2) -->
    <!--
    <paper-toast id="caching-complete"
                 duration="6000"
                 text="Caching complete! This app will work offline.">
    </paper-toast>

    <platinum-sw-register auto-register
                          clients-claim
                          skip-waiting
                          on-service-worker-installed="displayInstalledToast">
      <platinum-sw-cache default-cache-strategy="fastest"
                         cache-config-file="cache-config.json">
      </platinum-sw-cache>
    </platinum-sw-register>
    -->

  </template>

  <!-- build:js scripts/app.js -->
  <script src="<?php echo base_url(); ?>scripts/app.js"></script>
  <!-- endbuild-->
</body>

</html>
