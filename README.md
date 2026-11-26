# Wiktionary Clone — Final Project

Course: 03CIT4053 Technology for Web Development (HKCT)
Group 4 — SHI Hau Yan (25532012), Hui Ka Tung (25553258), Huang Kin Ming (25531056)

Reference site: https://en.wiktionary.org/wiki/Wiktionary:Main_Page

## What this is

A Bootstrap front end that reproduces the main pages of the chosen reference site
(Part I), extended into a PHP + XML driven site (Part II). Data is stored in XML
files under `data/`; MySQL is not used.

## Folder structure

```
project/
├── img/                      all images (logos, badges, photos)
├── css/                      all CSS files
├── js/                       all JavaScript files
├── data/                     all XML data files (users.xml, items.xml, ...)
├── includes/                 shared code: page parts, XML helpers, validation
├── index.php                 home page
├── items.php                 item list page (reads XML)
├── item.php                  item detail page (?id=)
├── login.php                 login page
├── register.php              register page (validation, hashed password)
├── forgot-password.php       password reset with e-mailed verification code
├── faq.php                   FAQ page
├── contact.php               contact page
└── group_contribution_form.pdf
```

## How to run

1. Start Apache (and PHP) in XAMPP.
2. Put this folder in the web root (`htdocs`), e.g. `htdocs/wiktionary`.
3. Open `http://localhost/wiktionary/index.php`.

Shared footer is in `includes/footer.php`; every page includes it once:

```php
<?php require __DIR__ . '/includes/footer.php'; ?>
```

## Current status

- [x] Shared footer (`includes/footer.php`, `css/style.css`)
- [ ] Navbar + the eight pages
- [ ] XML data files and the shared helpers in `includes/`
- [ ] Registration / login / forgot-password logic
