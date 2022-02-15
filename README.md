## PHP + page.js Router

A simple and easy to use, page.js based + php integration AJAX page router.

### Installation

Clone the repo into your brand new website.

```
git clone https://github.com/Coasters-Crafters/php-router.git
```

Then, depending on your webserver, follow [this guide](https://github.com/visionmedia/page.js#server-configuration).

### Configuration

This router works like the Next.js router, only PHP.

#### Global PHP File

In `router.php` on line `2`, there's a require_once, update this with a php file you want included on all pages. This is useful for specifying classes or a database connection. 

#### Normal Routing

All routes look inside of the `pages/files` directory with the path of the url.

e.g: I want to navigate to https://example.com/help. To do this, I would make a file in `pages/files` called `help.php`.

Since this doesn't have any parameters in it, I don't need to edit the router settings.

#### Param Routing

Now, lets say I want to lookup a user. I can do this by naming my php file something special.

e.g: I want to view a user called Joe with the user ID of 1, the URL is https://example.com/users/1. To do this, I would make a file called `users[id].php`. Then, navigate to the router.js file and add to the `customRoutes` list. This route's name would be `/users/:id`. Then, in that PHP file, I can specify the following to get the params.

```php
<?php echo $_PARAMS['id']?>
```

This also works for multiple params by naming the file `users[param1][param2].php`. The route that goes in router.js would look like `/:param1/:param2.php`

Extending this past the params involves turning the php file into a folder (so the folder name would be `users[id]`) and putting an `index.php` inside the folder, then you can append to your `customRoutes` in `router.js` and add more routes under the `users[id]` folder.

There are examples of all ways of routing in the boilerplate.

#### Posting & Other Request Methods

Use the path specified in the `router.js` file to be able to post, here's a fetch example.

```js
let resp = (await fetch("/pages/router.php?path=/your/path/in/router.js", {
    method: "POST",
    
    body: JSON.stringify({
        your: "body"
    }),

    headers: {
        "Content-type": "application/json; charset=UTF-8"
    }
}));

```

#### Custom 404 Page

Edit the `404.html` page in `/pages/` to customize what your 404 page should look like.

### Development

The easiest way to quickly start this up is with the PHP Development Server:

```cmd
php -S localhost:8080
```