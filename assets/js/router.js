//create custom routes, accessed in php by $_GET['params']['param_name_without_:'], remember to not leave a / at the end of the route.
let customRoutes = [
    "/news/:id",
    "/users/:id",
	"/users/:id/email",
	"/settings/:name/:value"
]
let navBarWrapperSelector = ".navbar-nav";
let contentSelector = "main";

//----

customRoutes.forEach((route) => {
    page(route, setContent);
})

page("*", setContent);

page();

async function setContent(ctx) {
	let path = ctx.routePath == "(.*)" ? ctx.path : ctx.routePath;

	let params = {path, params:JSON.stringify(ctx.params)};
	let esc = encodeURIComponent;
	let query = Object.keys(params)
    .map(k => esc(k) + '=' + esc(params[k]))
    .join('&');

	let content = await fetch("/pages/router.php?"+query);
	document.querySelectorAll(contentSelector)[0].innerHTML = await content.text();
}