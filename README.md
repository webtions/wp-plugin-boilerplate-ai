# WP Plugin Boilerplate AI

A structured WordPress plugin foundation for **AI-assisted development**. Clone this repo, rename it to your plugin, and build with clear guardrails: a consistent structure, coding standards, and static analysis so generated code stays maintainable and secure.

This boilerplate is intended for developers who already understand [WordPress plugin development](https://developer.wordpress.org/plugins/) (hooks, filters, escaping, sanitization). It is not a beginner tutorial.

**Related:** [Building WordPress Plugins with AI the Right Way](https://example.com) — article that explains the workflow and why this structure exists.

---

## What’s included

- **Minimal working plugin** — one bootstrap file and one loader class; no bloat.
- **Defined structure** — `includes/` for PHP, `assets/` for CSS/JS; main plugin file is bootstrap only.
- **Composer** — for development tooling only (no runtime Composer autoload required for the plugin itself).
- **PHP_CodeSniffer + WordPress Coding Standards (WPCS)** — enforce style and catch common issues.
- **PHPStan** — static analysis to catch type and logic errors.
- **_docs/ARCHITECTURE.md** — describes where code and assets belong so you and AI tools stay consistent.
- **.cursor/rules** — Rules for Cursor (and similar AI IDEs): plugin architecture, git/commit workflow, and **prompt examples** for asking the AI in small, scoped steps.
- **readme.txt** — Template showing the recommended structure of a WordPress.org plugin readme (header, Description, Installation, FAQ, Changelog, Upgrade Notice). Copy into your plugin and fill in each section; it teaches the format rather than describing this repo.
- **.gitattributes** — line endings and `export-ignore` so `composer package` produces a clean zip.
- **uninstall.php** — runs on plugin delete; add cleanup logic as needed.

---

## Quick start

1. **Clone and rename**
   - Clone the repo into `wp-content/plugins/` (or your preferred location).
   - Rename the folder to your plugin slug (e.g. `my-plugin`).
   - Find-and-replace `wp-plugin-boilerplate-ai` and `WpPluginBoilerplateAi` with your plugin slug and namespace in:
     - Main plugin file (e.g. `wp-plugin-boilerplate-ai.php` → `my-plugin.php`)
     - `includes/class-plugin.php` (namespace and text domain)
     - `composer.json` (`name` and any references)
     - This README and _docs/ARCHITECTURE.md if you want docs to match.

2. **Install dev dependencies**
   ```bash
   cd wp-content/plugins/your-plugin-slug
   composer install
   ```

3. **Run standards and analysis**
   ```bash
   composer cs        # Check coding standards (PHPCS + WPCS)
   composer cbf       # Auto-fix coding standards where possible
   composer analyze   # Run PHPStan
   composer qa        # Run both cs and analyze
   ```

4. **Activate** the plugin in WordPress and start adding features in `includes/` and assets in `assets/`.

### Composer scripts

| Command | Description |
|--------|-------------|
| `composer cs` | Run PHPCS + WPCS (coding standards check). |
| `composer cbf` | Auto-fix coding standards where possible. |
| `composer analyze` | Run PHPStan. |
| `composer qa` | Run `cs` and `analyze`. |
| `composer package` | Create a distribution zip (respects `.gitattributes` export-ignore). Requires at least one Git commit. |
| `composer pot` | Generate translation template (`.pot`) in `languages/`. **Requires [WP-CLI](https://wp-cli.org/)** and the [i18n command](https://developer.wordpress.org/cli/commands/i18n/make-pot/). |

---

## Requirements

- PHP 8.0+
- WordPress 6.0+
- Composer (for development only)

---

## Project structure (summary)

| Path | Purpose |
|------|--------|
| `wp-plugin-boilerplate-ai.php` | Bootstrap only: constants + load main class. No business logic. |
| `includes/` | All PHP classes and plugin logic. Start from `class-plugin.php`. |
| `assets/css/` | Stylesheets. |
| `assets/js/` | Scripts. Enqueue from a class in `includes/`. |
| `languages/` | Translation template (`.pot`) and locale files. Generate with `composer pot`. |
| `readme.txt` | Template for WordPress.org readme structure; copy and fill in for your plugin. |
| `uninstall.php` | Runs when the plugin is deleted; add cleanup (options, transients) here. |
| `composer.json` | Dev tooling and scripts (PHPCS, WPCS, PHPStan, package, pot). |
| `.phpcs.xml` | PHPCS + WPCS configuration. |
| `.gitattributes` | Line endings and export-ignore for `composer package` zip. |
| `phpstan.neon.dist` | PHPStan configuration. |
| `_docs/ARCHITECTURE.md` | Full structure and conventions. |

See **_docs/ARCHITECTURE.md** for where to put new hooks, classes, and assets.

---

## Cursor rules (and similar IDEs)

The `.cursor/rules/` folder contains three rule files (always applied in Cursor when this project is open):

| Rule | Purpose |
|------|--------|
| **plugin-architecture.mdc** | Where code and assets go; WPCS, PHPStan, security. |
| **workflow.mdc** | Commit message format (`type: description`); git commands are only suggested — you run them. |
| **prompt-examples.mdc** | Prefer small, scoped requests; points to `_docs/prompt-examples.md` for full examples. |

Full copy-paste prompt examples (admin menu, shortcode, escaping, etc.) are in **`_docs/prompt-examples.md`**. The rule keeps the AI aligned with "one thing at a time". Open the doc when you want copy-paste prompts for “add a settings page”, “add a shortcode”, “fix escaping”, etc. Other IDEs (e.g. Windsurf) can use the same rules if they support project-level instructions.

---

## License

GPL-2.0-or-later.
