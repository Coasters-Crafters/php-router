**Coasters & Crafters Web Rooter**
_This is used to control and make pages on our website load faster._

**Requirements**
- nd_mysqli (Not mysqli)
- mysqlnd
- PHP 7.4
- Database

**Installing the rooter.**

_Uploading_
> To install the rooter you need to upload all of the files to a public html folder and install the <i>websites.sql</i> to a MYSQL database.

_Setting up Database._
> go to */_inc/config.inc.php* and update the IP, username, password & database accordingly.

_Changing File Location._
> go to */_inc/global.inc.php* and update */home/user/public_html (line 2)* with the correct file path to the website.

_Changing the Domain Settings._
> go to */_inc/global.php* and change *domain.com (line 15)* to the correct domain for your site.

_Updating the website title._
> go to */_inc/pages.inc.php* and change *Domain - {$title} (line 24)* to the correct title make sure to keep {$title} as that will display the page name.

_Installing CSS & Scripts._
> Go to */index.php* and add add css files at the top of the file. (Store CSS files in */assets/css/*) and for scripts, add them at the bottom of the file. (Store CSS files in */assets/scripts/*)



**Editing Pages.**

_Editing the header and footer._
> Go to */index.php* and update the header and footer of the website by changing the code inbetween the header or the footer tags.

_Editing the home page._
> Go to */_pages/_internal/home.php* and add the code for your homepage. (no need to add a header and footer, the rooter deals with this)

_Creating a page._
> Go to */_pages/_internal/* create a PHP file for the page, in the database visit the pages table and create a new entry with the location eg. /page2 the file (the one you made in the folder) and the page title.



**Other Information**

_Using params._
> Go to the database and edit the location to include :paramname (eg. :id) so it will look like */page2/:id*. Once done the page will save the param as a variable. This variable will be *$page['params']['paramname']* (eg. $page['params']['id']) which you can use in your PHP code.

_Posting to the page._
> When posting to a page you must start by creating a function:
```
  function name {
      $.post("/_pages/router.php", {
          request: "name",
          route: "/location"
      }, (data) => {
          if (data.success) {
              alert(data.success);
          } else {
              alert(data.error);
          }
      })
  }
```
> the request must be the name of the function and the route must be the location (eg. route: "/page2"). Once the function is made, you can create the post by adding this at the top of the page:
```
if (isset($_POST['request'])) {
    $response = new stdClass();
    if ($_POST['request'] == "name") {
        // Success Message
        $response->success = "Sucess message!";
        // Error Message
        $response->error = "Error Message!";
    }
    header("content-type:application/json");
    echo json_encode($response);
    die();
}
```
> you can do multiple posts on a page by creating multiple functions. at the top of the page the code will change to look like this.
```
if (isset($_POST['request'])) {
    $response = new stdClass();
    if ($_POST['request'] == "name") {
        // Success Message
        $response->success = "Sucess message!";
        // Error Message
        $response->error = "Error Message!";
    } else if ($_POST['request'] == "name2") {
        // Success Message
        $response->success = "Sucess message!";
        // Error Message
        $response->error = "Error Message!";
    }
    header("content-type:application/json");
    echo json_encode($response);
    die();
}
```
