# Plugin Architecture

This document describes the structure of the plugin so you (and AI tools) know where code and assets belong. Keep this layout consistent as you add features.

## Directory layout

```
wp-plugin-boilerplate-ai/
├── wp-plugin-boilerplate-ai.php   # Bootstrap only — no business logic
├── includes/                      # PHP classes and plugin logic
├── assets/                        # Front-end assets
│   ├── css/
│   └── js/
├── languages/                     # .pot (template), .po / .mo — generate with: composer pot
├── readme.txt                     # WordPress.org-style readme; copy and adapt
├── uninstall.php                  # Runs on plugin delete; add cleanup here
├── composer.json                  # Dev tooling (PHPCS, WPCS, PHPStan, package, pot)
├── .phpcs.xml                     # PHP_CodeSniffer + WordPress Coding Standards
├── .gitattributes                  # export-ignore for composer package zip
└── phpstan.neon.dist              # PHPStan configuration
```

## Main plugin file (`wp-plugin-boilerplate-ai.php`)

- **Purpose:** Bootstrap only.
- **Contains:** Plugin header, ABSPATH check, constants, and a single `require` for the main loader class. Nothing else.
- **Do not:** Put hooks, output, or business logic here. All of that lives in `includes/`.

## `includes/`

- **Purpose:** All PHP classes and plugin logic.
- **Conventions:**
  - One main loader: `class-plugin.php` (namespace `WpPluginBoilerplateAi`). It registers actions and filters and may load other classes.
  - Add new classes in `includes/`. Use the same namespace or sub-namespaces (e.g. `WpPluginBoilerplateAi\Admin`, `WpPluginBoilerplateAi\Frontend`).
  - Class files can be named `class-*.php` (WordPress style) or match the class name (PSR-4 style). Keep one class per file.
- **Do not:** Put HTML, CSS, or JS inline in PHP beyond minimal template output. Use `assets/` for static files.

## `assets/`

- **Purpose:** Scripts and styles for the front-end or admin.
- **Structure:**
  - `assets/css/` — stylesheets.
  - `assets/js/` — JavaScript. Enqueue via `wp_enqueue_script` / `wp_enqueue_style` from a class in `includes/` (e.g. an admin or frontend class).
- **Do not:** Commit built/bundled files from external toolchains here unless you intend to version them; add build output to `.gitignore` if you use a bundler.

## Adding new features

1. **New hook or behaviour:** Add a new class in `includes/` (or a subfolder like `includes/admin/`). Instantiate it or register its hooks from the main `Plugin` class (or a dedicated "feature loader").
2. **New admin page or UI:** Class in `includes/` (or `includes/admin/`); enqueue CSS/JS from that class using `assets/css/` and `assets/js/`.
3. **New shortcode or block:** New class in `includes/` that registers the shortcode or block; keep rendering logic in that class or a small helper, not in the main plugin file.

## `languages/`

- **Purpose:** Translation template (`.pot`) and locale files (`.po`, `.mo`).
- Generate the `.pot` with `composer pot` (requires [WP-CLI](https://wp-cli.org/) and `wp i18n make-pot`). After renaming the plugin, update the script in `composer.json` to use your text domain and output path.

## Standards and tooling

- **PHP:** Minimum PHP 8.0. Use type hints and strict typing where possible.
- **Coding style:** Enforced by PHP_CodeSniffer and WordPress Coding Standards (WPCS). Run `composer standards:check` (or `composer cs`) and `composer standards:fix` (or `composer cbf`) before committing.
- **Static analysis:** PHPStan is configured via `phpstan.neon.dist`. Run `composer analyze` regularly. Fix or document baseline issues so the codebase stays clean.

Keeping the main file as bootstrap-only and all logic in `includes/` with clear asset locations gives both humans and AI a predictable structure to follow and extend.
