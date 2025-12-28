# Deployment

This project supports two deployment targets:
GitHub Pages (preview) and Apache / cPanel (production).

---

## GitHub Pages

- Branch: `main`
- Folder: `/ (root)`
- Used only as a preview environment

---

## Apache / cPanel (Production)

Steps:
1. Upload all files to `public_html/`
2. Ensure `.htaccess` overrides are enabled
3. Confirm access to:
   - `/seo/robots.txt`
   - `/seo/sitemap.xml`
4. Validate internal links and assets

---

## HTTPS

SSL is enforced at the hosting provider level.
No HTTP resources are referenced inside the site.
