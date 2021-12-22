<?php
require_once("../_inc/global.inc.php");

if ($isPost) {
    //get page view from database
    $page = $pages->getPage($_POST['route']);
    //make sure its in there
    if ($page) {
        //make sure user can access page
        //make sure the resource page exists
        //merge post data from request inside of $page var
        $page = array_merge($_POST, $page);
        if (file_exists("./_internal/{$page['resource']}")) {
            //require it / echoing out php
            require("./_internal/{$page['resource']}");
            //set title, just echos out <script>
            $pages->setTitle($page['name']);
        } else {
            $pages->setTitle("502");
            require("./_internal/util/404.php");
        }
    } else {
        $pages->setTitle("404");
        require("./_internal/util/404.php");
    }
    die();
}

?>

<?php
    //loop over all page views and echo them out so page.js can easily parse it.
    foreach ($pages->getPages() as $page) {
        echo "page(\"{$page['url']}\", route);";
    }
?>

page('*', route);

//initiate router
page();

function route(ctx) {

    //remove all event handlers on page
    $("#content").find("*").unbind();

    //remove load event on document
    $(document).unbind("pageLoad");

    //instruct that we are loading
    $("body").addClass("loading-page");

    //remove all highlighted icons
    $(`[href]`).parent().removeClass("active");

    //make request to system
    $.ajax({
        type: 'POST',
        url: "/_pages/router.php",
        data: {
            path: ctx.path,
            route: ctx.routePath,
            params: ctx.params
        },
        success: (html) => {
            //remove padding from content

            //write html
            $("#router").html(html);

            //scroll to top of page
            $(window).scrollTop(0);

            $("body").removeClass("loading-page");

            $(document).trigger("pageLoad");
        },
        error: (xhr, status, errorThrown) => {
            page.redirect('/')
            console.log(xhr);
        }
    })
}