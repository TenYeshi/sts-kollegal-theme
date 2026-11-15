# STS Kollegal --- Standalone WordPress Theme Conversion

## Agent execution brief

**Website:** https://stskollegal.org\
**Active child theme:** `sts-kollegal-event-child`\
**Parent theme:** `kindergarten-art-school` (Kindergarten Art School,
reported version 3.9)\
**Goal:** Create a fully independent `sts-kollegal` WordPress theme that
does not require the parent theme.

## 1. Agent role and safety rules

Act as a senior WordPress theme engineer, PHP developer, front-end
architect, accessibility specialist and QA engineer.

This is an existing live school website. Work evidence-first and
preserve its content and functionality.

**Mandatory rules** 1. Begin with read-only inspection. Do not edit the
live site during discovery. 2. Do not switch themes, delete/update
themes, modify settings, menus, page content, plugins or production
files without explicit user approval. 3. Before any approved production
change, create and verify a complete files-and-database backup and a
practical rollback path. 4. Prefer local/staging development. Never
experiment on production. 5. Preserve published and draft content,
Tibetan text, page/post IDs, slugs, metadata, URLs, menus, widgets,
media, image references, forms and plugin data. 6. Do not delete,
replace, rename, reorder, compress or regenerate existing images unless
separately approved. 7. Do not invent school facts, exam results, staff
details, affiliations or event information. 8. Do not remove plugins or
move school-management business logic into the theme as a shortcut. 9.
Keep the original child and parent themes untouched during development.
Do not remove the parent until testing passes and the user separately
approves removal. 10. Clearly label findings **Verified**, **Inferred**,
**Not tested** or **Blocked**. Never claim a test passed unless it was
performed. 11. Maintain a change log: files changed, reasons, evidence,
risks and rollback steps. 12. If source files, staging, backups or
permissions are unavailable, stop and request what is missing. Never
fabricate inspection results.

## 2. Known site context (reverify before relying on it)

-   Active child directory: `sts-kollegal-event-child`.
-   Parent directory: `kindergarten-art-school`.
-   Child theme description: "Child theme for Kindergarten Art School.
    Adds scoped event-post presentation assets."
-   Child theme version previously reported as `1.0.0.1792403558`.
-   Parent theme previously reported as version 3.9, with an update
    available at that time.
-   Child theme source has not yet been fully inspected. Do not assume
    it contains all site styling or functionality.
-   Much of the site's styling may live in WordPress **Appearance →
    Additional CSS**, Elementor page content and custom HTML/CSS.
-   The Additional CSS was previously reported as very large (about
    113,828 characters / 1,072 lines); remeasure it before making
    decisions.
-   The homepage and other pages use Elementor. Compatibility is
    essential.
-   The `sts-school-manager` plugin provides school-management
    functionality. Preserve plugin responsibilities.
-   Shortcodes `[sts_teacher_portal]` and `[sts_login_gate]` must
    continue to work.
-   A contact page has used `[contact-form-7 id="3730"]`; verify the
    current form and test submission rather than assuming the shortcode
    proves it works.

Known pages/features to preserve (verify current URLs and status): -
Homepage (previously page ID 2441) - About Us `/about-us/` (previously
ID 107) - Principal's Message - Faculty and staff profiles/category
filters - Contact Us `/contact-us/` (previously ID 672) - Events archive
and individual event posts - Gallery - Calendar (existing URL has been
`/calender/`; do not silently rename) - Public Disclosure PDFs and
downloads - Stories (flag content concerns separately; do not delete or
rewrite) - Teacher Portal/login gate (associated with `/test/`; do not
rename or relabel without approval)

Preserve existing Elementor page layouts and content. Do not rebuild the
homepage as part of theme conversion.

## 3. Approved visual direction

Build a culturally appropriate, credible Tibetan educational institution
theme. Avoid generic commercial/childcare styling, unnecessary
gradients, clutter and excessive animation.

**Palette** - Maroon `#800000` (or approved `#b32d2e` variant) - Navy
`#002b49` - Gold `#d4af37` - Light background `#f8fafc`

**Typography** - Jomolhari or Microsoft Himalaya for Tibetan text where
available and licensed. - Retain/assess existing Inter, Manrope and Noto
Sans Tibetan usage before replacing fonts. - Provide readable fallbacks
and avoid duplicate font downloads.

Use consistent spacing, widths, typography, buttons, cards and image
ratios. Ensure keyboard access, visible focus, form labels, meaningful
image alt text, contrast and responsive layouts. Keep the design
content-led and maintainable.

Create independent header/footer components, but inspect the live design
and propose final specifications before implementation. A previously
discussed footer line was
`2026 STS Kollegal | Sambhota Tibetan Schools Society (STSS) Theme by Computer-Teacher Themes`;
do not publish it without confirming the exact wording.

## 4. Phase 1 --- Read-only source and dependency audit

Obtain the complete source for: 1. `sts-kollegal-event-child` (ZIP or
directory) 2. `kindergarten-art-school` (ZIP or directory) 3. Current
Additional CSS (export or verified WordPress retrieval) 4. Current
WordPress and PHP versions, active theme metadata and relevant settings
5. A staging/local copy for testing, if available

If authorized server/file access exists, inspect the actual files.
Otherwise ask the user to upload both theme ZIPs. Do not claim source
inspection without access.

### Child theme inspection

Inventory every file and folder. Inspect at least: - `style.css`,
`functions.php` - All PHP templates and template parts - CSS and
JavaScript - Images, icons, fonts and other assets - `inc/`, `assets/`,
`template-parts/` or equivalent directories - Theme screenshot/readme

Record: - Theme headers and `Template` declaration - Stylesheet/script
enqueue logic - Parent stylesheet and asset references - Uses of
`get_template_directory()` and `get_template_directory_uri()` - Uses of
`get_stylesheet_directory()` and `get_stylesheet_directory_uri()` -
`require`, `include` and autoloaded files - Template overrides and
template hierarchy - Hooks, filters, shortcodes, post types, taxonomies
and widgets registered by the theme - Parent functions, constants,
classes, template parts, widget areas, menus, image sizes and theme
supports used - Plugin, Elementor, WordPress-core and external-library
dependencies - Hard-coded parent paths/URLs and deprecated APIs

### Parent theme inspection

Do not copy the whole parent theme blindly. Identify only parent
functionality actually required by the child theme and public site: -
Theme setup and functions - Header/footer/index/page/single/archive
templates - Template parts - CSS, JS and assets - Menus, widget areas,
theme supports and image sizes - Customizer/theme mods - Custom post
types/taxonomies, if any - Required plugins/libraries - Parent-specific
functions, template tags and classes

### Dependency report

Produce a table:

  ----------------------------------------------------------------------------
  Dependency   Source file Current     Needed in     Replacement   Risk
                           usage       standalone?   plan          
  ------------ ----------- ----------- ------------- ------------- -----------

  ----------------------------------------------------------------------------

Classify dependencies as WordPress core, parent theme, child theme,
Elementor, plugin, Additional CSS, page-level CSS/HTML or external
library.

Do not move plugin business logic into the theme. The theme owns
presentation and theme-specific integration.

### Phase 1 deliverables

Return: 1. File inventories for both themes. 2. Parent-dependency map.
3. Theme feature inventory. 4. Risks and unknowns. 5. Proposed
standalone architecture. 6. Functionality that will remain in plugins or
Elementor. 7. Migration plan, complexity and test requirements.

**Stop for user approval before implementation.**

## 5. Phase 2 --- Standalone architecture

Create a separate theme directory named `sts-kollegal`. Do not overwrite
or rename the active child theme.

Possible classic-theme structure (adapt to actual findings; do not
create unnecessary empty files):

``` text
sts-kollegal/
├── style.css
├── functions.php
├── theme.json
├── index.php
├── header.php
├── footer.php
├── front-page.php
├── home.php
├── page.php
├── single.php
├── archive.php
├── search.php
├── 404.php
├── screenshot.png
├── assets/
│   ├── css/
│   │   ├── main.css
│   │   ├── header.css
│   │   ├── footer.css
│   │   └── responsive.css
│   ├── js/
│   ├── images/
│   └── fonts/
├── inc/
│   ├── setup.php
│   ├── enqueue.php
│   ├── template-functions.php
│   └── customizer.php
└── template-parts/
    ├── content.php
    ├── page-header.php
    └── navigation.php
```

Choose classic or block theme architecture based on the current site and
explain why. Do not mix incompatible template systems.

The standalone `style.css` must have valid theme headers and **must not
contain** `Template: kindergarten-art-school`. Example:

``` css
/*
Theme Name: STS Kollegal
Theme URI: https://stskollegal.org/
Author: STS Kollegal
Description: Independent institutional WordPress theme for Sambhota Tibetan School, Kollegal.
Version: 1.0.0
Text Domain: sts-kollegal
*/
```

Requirements: - No runtime PHP/CSS/JS/image/font references to the
parent directory. - `functions.php` loads only standalone theme code. -
Correct use of stylesheet/template directory functions and theme URI
functions. - Correct WordPress enqueue APIs; avoid duplicate
libraries/assets. - Use WordPress template hierarchy, escaping,
sanitization, translation-ready strings and a consistent text domain. -
Support required menus, title tag, thumbnails, custom logo, HTML5,
responsive embeds and other justified features. - Register image sizes
only when needed and document them. - Provide keyboard-accessible
navigation and visible focus. - No credentials, secrets or
machine-specific paths. - Keep school-management logic in its plugin.

## 6. Phase 3 --- Migration rules

### Templates

-   Recreate required header, footer, page, single, archive and fallback
    templates.
-   Preserve WordPress template hierarchy and Elementor rendering.
-   Preserve page/post IDs, slugs, content, metadata and media URLs.
-   Ensure events, archives and individual event posts work.
-   Do not force custom templates on pages without a demonstrated need
    and approval.

### CSS

-   Separate parent CSS, child CSS, Additional CSS and page/Elementor
    CSS.
-   Do not blindly copy all CSS into the new theme.
-   Consolidate only after understanding scope and verifying behavior.
-   Scope styles to avoid breaking Elementor and plugin interfaces.
-   Avoid broad global selectors and unintended admin/plugin styling.
-   Remove duplicate rules only after comparison and testing.
-   Reduce `!important` gradually, not with global replacement.
-   Preserve gallery selection/order/randomization and existing image
    ratios.
-   Do not modify image assets as part of this project.

### JavaScript

-   Identify parent script dependencies and migrate only required
    behavior.
-   Avoid duplicate libraries loaded by WordPress or Elementor.
-   Check browser console errors and interactions.
-   Preserve navigation, filters, gallery and forms.

### Elementor and plugins

-   Preserve Elementor page content and layouts; do not rebuild pages.
-   Ensure `the_content()` and Elementor output render correctly.
-   Verify Theme Builder header/footer integration if used.
-   Avoid theme CSS overriding Elementor unexpectedly.
-   Keep `sts-school-manager` functionality in its plugin.
-   Preserve `[sts_teacher_portal]` and `[sts_login_gate]`.
-   Verify teacher portal login, roles, capabilities and redirects.
-   Do not rename `/test/` or alter its menu label as part of this work.

## 7. Phase 4 --- Code-quality checks

Run in local/staging: - PHP syntax checks for every PHP file. -
WordPress Coding Standards checks where available. - Escaping,
sanitization, nonce and capability review where applicable. - Undefined
function/class/constant/variable checks. - Deprecated API and
PHP-version compatibility review. - Verify all include/require paths. -
Confirm theme activation produces no fatal errors. - Confirm no parent
theme is needed at runtime. - Validate theme header and template
hierarchy. - Verify menus, widget areas, image sizes, pagination,
archives, search and 404. - Verify translation text domain. - Verify
theme assets return successful responses. - Check broken
images/fonts/scripts, horizontal overflow, Elementor regressions,
console errors, PHP logs, mixed content and unnecessary scripts. -
Measure performance/Core Web Vitals where tooling permits.

## 8. Phase 5 --- Regression test matrix

Test on staging. Record evidence and label each test manual, automated,
partial or blocked.

  -----------------------------------------------------------------------
  Area                                Required test
  ----------------------------------- -----------------------------------
  Homepage                            Existing sections, images, links
                                      and layout preserved

  Header                              Logo/crest, nav, mobile menu,
                                      keyboard/focus/hover

  Footer                              Institutional identity and links

  About Us                            Existing content, images,
                                      Mission/Vision

  Principal's Message                 Text, portrait, layout

  Faculty                             All profiles, filters and mobile
                                      layout

  Contact Us                          Details, map, form rendering and
                                      test submission

  Events                              Archive and individual event posts

  Gallery                             Existing images, ratios, links and
                                      current behavior

  Calendar                            Existing PDF embed and download

  Public Disclosure                   All PDF embeds and downloads

  Stories                             Content preserved; flag unrelated
                                      demo content separately

  Teacher Portal                      Login gate, shortcodes, roles,
                                      access and redirects

  Elementor                           Existing pages and responsive
                                      sections

  Menus                               Locations and destinations
                                      preserved

  Search                              Results and no-results behavior

  404                                 Not-found template

  Mobile                              360px and 390px

  Tablet                              768px and 1024px

  Desktop                             1280px and 1440px

  Accessibility                       Keyboard, focus, headings, labels,
                                      contrast, alt text

  Performance                         Asset loading, response, layout
                                      shifts, excess scripts
  -----------------------------------------------------------------------

Include screenshots and explain any untested items.

## 9. Phase 6 --- Staging review and approval

Before production approval, provide: 1. Standalone theme ZIP. 2.
Complete file/change inventory. 3. Dependency report demonstrating zero
remaining parent runtime dependencies. 4. Desktop/tablet/mobile
screenshots of homepage and key pages. 5. Regression test results. 6.
Accessibility and performance findings. 7. Known limitations and
unresolved issues. 8. Verified backup and rollback procedure. 9. Exact
production deployment plan.

Wait for the user's explicit approval. Do not infer production approval
from general interest or approval of the design.

## 10. Phase 7 --- Production deployment (approval required)

Only after explicit approval: 1. Confirm production environment and
current theme. 2. Create and verify a fresh complete files/database
backup. 3. Record active theme and relevant settings. 4. Install the new
theme without deleting old themes. 5. Activate only after confirming
backup and rollback path. 6. Immediately verify homepage and critical
pages. 7. Verify Elementor, menus, forms, events, gallery, PDFs and
teacher portal. 8. Check server/PHP logs and browser console. 9. Clear
relevant caches only if necessary. 10. If critical regressions occur,
restore the prior child theme and settings as required. 11. Keep both
old themes installed until stable verification and separate user
approval for removal.

### Parent theme removal gate

The parent may be removed only when: - Standalone theme is active and
stable. - No code or asset references the parent directory. - No parent
template/function/class dependency remains. - All critical pages and
plugin integrations pass tests. - Backup and rollback are verified. -
User explicitly approves deletion.

Successful activation alone is not sufficient evidence.

## 11. Acceptance criteria

-   [ ] A separate `sts-kollegal` theme exists.
-   [ ] No `Template` parent declaration exists.
-   [ ] No parent-theme runtime dependency remains.
-   [ ] Templates, styles, scripts and assets are self-contained or
    intentionally supplied by WordPress/plugins.
-   [ ] Existing content, URLs, media, IDs, metadata and Elementor
    layouts are preserved.
-   [ ] School-management plugin and teacher portal continue to work.
-   [ ] Header/footer and responsive layouts follow approved STS
    identity.
-   [ ] Accessibility and responsive checks are performed.
-   [ ] Regression matrix is completed or untested items are clearly
    disclosed.
-   [ ] Staging review is approved.
-   [ ] Production backup is verified before deployment.
-   [ ] Production activation is explicitly approved and verified.
-   [ ] Parent remains installed until separate removal approval.

## 12. Agent's first action --- do this now

**Do not implement or change the live site yet.**

Determine whether you have authorized access to the actual child and
parent theme source files.

-   If accessible, perform the read-only inventory and dependency audit
    in Phase 1.
-   If not accessible, ask the user to upload both theme ZIP files.
-   Do not update the parent theme as part of this project.
-   Do not assume removing the `Template` line makes the theme
    independent.
-   Return the Phase 1 discovery report and proposed migration plan for
    approval.

**Objective:** deliver a stable, maintainable, independent STS Kollegal
institutional theme while preserving the existing school website and its
functionality.
