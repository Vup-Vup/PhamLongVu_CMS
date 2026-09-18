---
name: wordpress-maintenance
description: Use this skill when working on the local WordPress project, including configuration changes, database imports, plugin or theme work, troubleshooting, and site maintenance.
---

# WordPress Site Maintenance

## Scope
This workspace is a WordPress installation. Use this skill for tasks related to:

- WordPress configuration and environment setup
- Theme or plugin troubleshooting
- Database handling and SQL import/export work
- URL/site configuration issues
- Core file safety and minimal-risk edits
- Local development debugging and validation

## Project context

Important files and folders in this project:

- `wp-config.php` for database and site configuration
- `wp-content/` for theme, plugin, and custom code
- `dbwordpress_PhamLongVu.sql` for the database export
- `wp-admin/` and `wp-includes/` for WordPress core internals
- `.htaccess` for rewrite rules and permalink behavior

## Operating rules

- Prefer small, reversible changes over broad edits.
- Avoid modifying WordPress core files unless the task explicitly requires it.
- Prefer theme or plugin-based customizations over editing core behavior.
- Keep database credentials and secret values masked in output.
- Validate changes with the smallest relevant check, such as PHP linting, log review, or browser verification.

## Recommended workflow

1. Identify whether the issue is code, config, database, or environment-related.
2. Inspect the most relevant file first: `wp-config.php`, a plugin/theme file, or the SQL dump.
3. Check for obvious WordPress configuration issues such as DB credentials, URL mismatch, or rewrite rules.
4. Make the minimal fix and explain why it addresses the root cause.
5. Verify with a targeted check and summarize the result.

## Safety guidance

- Do not overwrite the existing database dump casually.
- Do not expose admin credentials or secret values in logs or summaries.
- When troubleshooting plugins/themes, test with one change at a time.
- If the issue affects production data or credentials, treat the site as sensitive and avoid broad changes.

## Typical task examples

- Fix a broken WordPress site after a database or URL mismatch
- Update plugin or theme configuration for local development
- Diagnose a fatal error in `wp-content`
- Review SQL import issues from `dbwordpress_PhamLongVu.sql`
- Check whether a WordPress admin issue is caused by PHP, server config, or plugin conflicts

## Response style

When aiding with this project, provide:

- a concise diagnosis of the root cause
- the exact file(s) involved
- the smallest safe fix
- confirmation steps or validation commands
- a short note on any risk or follow-up concern
