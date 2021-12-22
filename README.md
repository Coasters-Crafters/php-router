<h3>Coasters & Crafters Web Rooter</h3>
<h5>This is used to control and make pages on our website load faster.</h5>

<hr>

<h4>Requirements</h4>
<ol>
  <li>nd_mysqli <i>Not mysqli</i></li>
  <li>mysqlnd</li>
  <li>PHP 7.4</li>
  <li>Database</li>
</ol>
<br>

<hr>

<h4>Installing the rooter.</h4>
<h5>Uploading</h5>
<p>To install the rooter you need to upload all of the files to a public html folder and install the <i>websites.sql</i> to a MYSQL database.</p>
<br>
<h5>Setting up Database.</h5>
<p>go to <i>/_inc/config.inc.php</i> and update the IP, username, password & database accordingly.</p>
<br>
<h5>Changing File Location.</h5>
<p>go to <i>/_inc/global.inc.php</i> and update <i>/home/user/public_html (line 2)</i> with the correct file path to the website.</p>
<br>
<h5>Changing the Domain Settings.</h5>
<p>go to <i>/_inc/global.php</i> and change<i>domain.com (line 15)</i> to the correct domain for your site.</p>
<br>
<h5>Updating the website title.</h5>
<p>go to <i>/_inc/pages.inc.php</i> and change<i>Domain - {$title} (line 24)</i> to the correct title make sure to keep {$title} as that will display the page name.</p>
<br>
<h5>Installing CSS & Scripts.</h5>
<p>Go to <i>/index.php</i> and add add css files at the top of the file. (Store CSS files in <i>/assets/css/</i>) and for scripts, add them at the bottom of the file. (Store CSS files in <i>/assets/scripts/</i>)</p>

<hr>

<h4>Editing Pages.</h4>
<h5>Editing the header and footer.</h5>
<p>Go to <i>/index.php</i> and update the header and footer of the website by changing the code inbetween the <header> or the <footer> tags.</p>
<br>
<h5>Editing the home page.</h5>
<p>Go to <i>/_pages/_internal/home.php</i> and add the code for your homepage. (no need to add a header and footer, the rooter deals with this)</p>
<br>
<h5>Creating a page.</h5>
<p>Go to <i>/_pages/_internal/</i> create a PHP file for the page, in the database visit the pages table and create a new entry with the location eg. /page2 the file (the one you made in the folder) and the page title.</p>

<hr>

<h5>Other Information</h5>
<h5>Using params.</h5>
<p>Go to the database and edit the location to include :paramname (eg. :id) so it will look like <i>/page2/:id</i>. Once done the page will save the param as a variable. This variable will be <i>$page['params']['paramname']</i> (eg. $page['params']['id']) which you can use in your PHP code.</p>
<br>
  
  
  
  
<h5></h5>
<p></p>
<br>
