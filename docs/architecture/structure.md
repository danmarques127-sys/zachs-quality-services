# Structure

## Root
- `index.html` is the homepage entrypoint.
- `robots.txt`, `sitemap.xml`, `site.webmanifest`, and `browserconfig.xml` remain at root for standards/tooling compatibility.

## Pages
All HTML routes live under `/pages` (except `index.html`).

- `/pages/about.html`
- `/pages/contact.html`
- `/pages/quote.html`
- `/pages/reviews.html`
- `/pages/industries.html`
- `/pages/services/*`
- `/pages/gallery/*`

## Assets
All assets are under `/assets` and referenced using absolute paths:

- `/assets/css/style.css`
- `/assets/js/script.js`
- `/assets/images/*`
- `/assets/favicons/*`

