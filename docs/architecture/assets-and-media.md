# Assets and Media Policy

All static assets are centralized under `/assets`.

---

## Asset Types

- `/assets/css`   → Stylesheets
- `/assets/js`    → JavaScript
- `/assets/img`   → Images
- `/assets/icons` → Icons and favicons

---

## Rules

- No duplicated folders (`img/img`, `icons/icons`)
- Images are optimized before commit
- Icons are reused whenever possible
- Assets are cache-controlled via `.htaccess`

---

## Performance Considerations

- Assets are long-cacheable
- HTML is shorter-lived
- No external CDNs unless strictly required
