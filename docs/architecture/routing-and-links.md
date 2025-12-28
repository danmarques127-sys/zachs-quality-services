# Routing and Links

This site uses a flat, file-based routing model.

Each page corresponds to a physical `.html` file
served directly by the web server.

---

## Routing Strategy

- No client-side routing
- No SPA behavior
- No JavaScript-based navigation
- Predictable URLs for SEO and crawling

Example:
- `/index.html` → Home
- `/services.html`
- `/contact.html`

---

## Linking Rules

- Internal links use **relative paths**
- No absolute production URLs inside HTML
- GitHub Pages and Apache use the same paths
- Assets are referenced via `/assets/...`

This guarantees portability across environments.
