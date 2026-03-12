# WordPress.org plugin directory assets

This folder holds assets for the [WordPress.org plugin directory](https://developer.wordpress.org/plugins/wordpress-org/plugin-assets/). When you deploy to the plugin SVN repo, copy these into the top-level **assets** folder (same level as `trunk/`), not inside your plugin code.

**Icons (in this folder)**

* `icon.svg` — Plugin icon (256×256). Used in search results and on the plugin page.
* `icon-{plugin-slug}.svg` — Same icon with your plugin slug in the filename (e.g. after renaming the boilerplate, use `icon-your-slug.svg`).

Replace the placeholder (circle on plain background) with your own icon before submission.

**Optional: banners**

WordPress.org can show a banner at the top of your plugin page. Add to this folder (or to SVN `assets/` when you deploy):

* `banner-772x250.(jpg|png)` — 772×250 px.
* `banner-1544x500.(jpg|png)` — Retina, 1544×500 px.

Max 4MB; use exact dimensions. See the [Plugin Assets handbook](https://developer.wordpress.org/plugins/wordpress-org/plugin-assets/) for details.
