# Architecture Overview

This repository is a static-first marketing website with a clean separation between:
- **/pages**: user-facing routes (HTML)
- **/assets**: static assets (CSS/JS/images/favicons)
- **/server**: optional PHP utilities and server-side scripts (non-public by default)
- **/docs**: project documentation (architecture, conventions, deployment)

## Goals
- Keep the root folder clean and production-ready.
- Use consistent absolute paths for assets and routes.
- Make it easy to grow the project (more pages, multiple brands, or a future SaaS layer).

