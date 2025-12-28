# Architecture Overview

This project is a production-grade static website built for a real
commercial cleaning company.

The architecture prioritizes:
- SEO-first delivery
- Performance and caching
- Predictable structure
- Compatibility with Apache / cPanel hosting
- Long-term maintainability

No frameworks, build steps, or server-side dependencies are used.
All decisions favor simplicity, portability, and clarity.

---

## Architectural Principles

- **Static-first**: all pages are pre-rendered HTML
- **SEO-aware**: semantic markup and clean routing
- **Hosting-agnostic**: runs on GitHub Pages or Apache
- **Low complexity**: minimal JavaScript, no runtime dependencies
- **Client-grade**: structure mirrors real production constraints

---

## Target Environment

- Apache + cPanel (production)
- GitHub Pages (preview)
- HTTPS enforced at hosting level
