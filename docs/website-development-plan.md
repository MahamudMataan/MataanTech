# Mataan Tech website development plan

## Scope and baseline

Redesign Mataan Tech as a premium digital agency site. Start with the phone experience for customers and staff, then adapt layouts for tablet and desktop. Use the existing Laravel 12, Blade, Tailwind and Vite setup. Preserve the logo asset at `public/images/mataan-tech-logo.png`, the public URLs, Dutch and English switching, database-managed content, enquiry storage, and authorized admin workflows.

This plan is based on GitHub `main` at `27df5ec`. Before implementation, compare that baseline with an owner-provided snapshot of the changes on Hostinger and account for any differences. Build and test with local or isolated preview data. Keep implementation on focused `codex/` branches with draft pull requests and reviewable diffs. This work stops at review. Hostinger deployment and production data changes are outside scope.

## 1. Mobile layout and homepage

| Area | Implementation | Acceptance |
| --- | --- | --- |
| Shared public layout | Update `resources/views/layouts/app.blade.php`, `resources/css/app.css` and the existing menu script. Keep the original logo in the header and footer. Use a compact header with Home, About, Services, Pricing, Portfolio, Contact, and the NL/EN switcher. Set the document language from the Laravel locale and move revised copy into `lang/en/site.php` and `lang/nl/site.php`. | Menu works with touch and keyboard, announces expanded state, closes with Escape and returns focus to its toggle. The active page and language are clear. The quote link stays easy to reach and the header clears focused elements and anchors. |
| Homepage | Reorder `resources/views/pages/home.blade.php` into hero, selected work, services, process, about and proof, and contact. Use an offer-led headline, a primary **Start a project** action and secondary **View our work** action. Use logo-led color, deliberate typography, and real project imagery. Keep the featured project, service and testimonial data from `PageController` and reuse the Blade components. | The offer and primary action are clear on the first screen of a typical phone. Content reads in the same order visually and with assistive technology. Longer Dutch copy wraps and calls to action stack where needed. |
| Portfolio | Revise `pages/portfolio.blade.php` and `components/project-card.blade.php` to show a readable preview, client context and a project link. Preserve pagination and the existing project management flow. Feature Wurmpie.com using the brief supplied by the owner, a website built for a teacher starting a book club. Confirm the live link, screenshots and any claimed features before adding the record through the project editor. | Single-column previews work on phones. Images have meaningful alt text, dimensions and appropriately sized sources. Existing project links and pagination still work. |
| Pricing | Update `pages/pricing.blade.php` and `components/package-card.blade.php`. Stack packages with the price, billing period, main inclusions and quote action visible in reading order. Keep optional care plans clearly separate and preserve existing package data and ordering. | Long names, prices and badges wrap without overlap. Visitors can compare packages and reach the enquiry form without swiping sideways. |
| Enquiry form | Use a single-column phone layout in `pages/contact.blade.php`, clear required and optional labels, suitable mobile keyboards, autocomplete, and accessible inline errors. Preserve entered values after validation and keep the review link and form confirmation. | Visitors can submit and recover from validation or temporary rate limits using touch or keyboard. Error and success states are announced in the selected language. |

## 2. Lead protection and mobile admin

Start the lead-protection work alongside the mobile foundation. Complete the admin authorization check before using real enquiries in any preview.

- **Enquiry intake.** Keep the existing `contact.store` route, CSRF protection, field validation and database save. Add a dedicated Laravel rate limit and a honeypot that stays out of the keyboard and screen-reader flow. Add a localized retry response. If automated abuse persists, evaluate a server-verified bot challenge with an accessible retry path and a defined service-outage behavior.
- **Sales pitches.** Use several signals such as repeated text, unsolicited offers and links to flag likely spam for review. Keep valid enquiries visible even when they mention SEO. Store a reviewable flag and reason separately from the lead's existing status. Make the data change additive so existing leads retain their statuses and remain visible. Keep flagged leads out of the default inbox and recent-lead counts, with a separate count and a restore action.
- **Admin navigation and access.** Add a phone menu to `resources/views/layouts/admin.blade.php` with access to Leads, Projects, Pricing, Services, Testimonials, the website and logout. Use stacked list items and full-width editor controls on narrow screens. Verify that administrative actions require explicit authorization and that existing authorized users can still sign in and complete their work.
- **Lead workflow.** Update the admin dashboard, submission controller and views with Inbox and Spam views, search, status filters, and clear status/date summaries. Keep `new`, `contacted`, `won` and `closed`. Support one-tap reply, marking and restoring spam, and bulk spam triage with a clear selection count. Keep deletion separate and confirm it. Leave notes, priority and activity history for a follow-up after the inbox workflow is tested.
- **Regression checks.** Extend the existing public-page and contact tests with valid enquiries that ask for SEO, bot rejection, rate limits, spam review and restoration, status preservation, and admin authorization. Check dashboard counts and filtered pagination. On a phone, open a lead, reply, update its status, restore a flagged lead, and edit a project and package.

## 3. Public contact address

The confirmed public contact address is `info@mataantech.com`. Preserve it in the shared footer, homepage quote copy, contact page and review link. During the redesign, check that the displayed address and `mailto:` links match in both locales and that the review link keeps its subject. The enquiry form continues to store submissions in the database.

## Review checklist

- Check 320, 375, 390, 768 and 1024 px widths and desktop. Exercise iOS Safari and Android Chrome for the menu, form submission and admin lead actions. Check keyboard use, visible focus, 200% zoom, reduced motion, and long Dutch labels. Require no page-level horizontal scrolling and aim for 44 by 44 px touch targets on primary controls.
- Run `composer test` and `npm run build` in the implementation checkout. Smoke-test public pages, locale persistence, portfolio pagination, pricing actions, admin sign-in/out and content editing. Check the home page on a throttled mobile connection and make sure project imagery does not shift the layout.
- Attach paired phone and desktop screenshots and a short test report to each implementation PR. Record any Hostinger differences the owner needs to reconcile before a future release.
