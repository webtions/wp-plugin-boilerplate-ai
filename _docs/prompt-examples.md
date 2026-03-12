# Prompt Examples

Ask for **one thing at a time** (a hook, a class, a shortcode, a fix) so the AI stays within the plugin structure and you can review and run standards after each step. Use these as templates; replace placeholders with your actual plugin slug, text domain, or feature.

## Adding features

- **Admin menu:** "Add an admin menu page under Settings that shows a simple 'Hello' message. Use a new class in `includes/admin/` and register it from the main Plugin class."
- **Settings page:** "Add a settings page with one text field, saved as an option. Use nonces and capability checks. Put the class in `includes/admin/`."
- **Shortcode:** "Add a shortcode `[my_shortcode]` that outputs a div with the content escaped. New class in `includes/`, register the shortcode from the Plugin class."
- **Action/filter:** "Add a filter that runs on `the_content` and appends a small notice. Put it in a new class in `includes/` and hook it from the loader."
- **Enqueue on one page:** "Enqueue our admin CSS/JS only on our plugin's admin page, using the `$hook_suffix` in `enqueue_admin_assets`."

## Fixes and standards

- **Escaping:** "In `includes/class-settings.php`, escape all output in the form and the success message with `esc_attr` / `esc_html` where appropriate."
- **Sanitization:** "Sanitize the option we save in the settings page: use `sanitize_text_field` for the text input."
- **Database:** "This query uses raw user input; switch it to `$wpdb->prepare` and pass the value as a parameter."

## Small, scoped requests (preferred)

- "Add a class `includes/admin/class-admin-menu.php` that registers a submenu under Settings. No settings yet, just the page and a title."
- "In the admin menu class, add a form with one field and save it as an option. Use a nonce and `current_user_can( 'manage_options' )`."
- "Add a `[greeting]` shortcode that accepts a `name` attribute, sanitizes it, and outputs 'Hello, {name}' with proper escaping."

## What to avoid

- "Build a full plugin that does X, Y, Z." → Break into: add menu, then add form, then add save logic, etc.
- "Add a feature" without saying where (which class, which file). → Specify "in a new class in `includes/admin/`" or "in the existing Plugin class".
- "Fix all the issues." → Prefer "Fix the escaping in the settings page output" or "Add sanitization to the option save."

## After the AI responds

- Run `composer cs` (or `composer cbf`) and `composer analyze` before committing.
- If you use git, run the commit yourself with a message like `feat(admin): add settings page` (see workflow rules in `.cursor/rules/workflow.mdc`).
