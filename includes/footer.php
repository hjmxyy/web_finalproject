<?php
/**
 * =============================================================================
 * footer.php - shared footer for all pages of the Wiktionary clone
 *
 * Group number  : Group 4
 * Group members : SHI Hau Yan (25532012), Hui Ka Tung (25553258), Huang Kin Ming (25531056)
 * Date          : 25 November 2026
 * Assignment    : Final Project Part II - Technology for Web Development
 *
 * What it does / why:
 *   All eight pages need the same footer, so it is written once here and pulled
 *   in at the bottom of every page with:
 *       <?php require __DIR__ . '/includes/footer.php'; ?>
 *   The file sits in includes/ because Part Two requires shared code (common
 *   page parts, XML helpers, validation) to live there instead of being
 *   copy-pasted into every page.
 *   Writing it once instead of pasting it eight times keeps the project
 *   maintainable (Part II: shared code must not be copy-pasted) and guarantees
 *   every page keeps exactly the same footer.
 *
 *   The band copies the footer of our reference site
 *   https://en.wiktionary.org/wiki/Wiktionary:Main_Page, block by block and
 *   in the same order:
 *     1. footer-info  : "This page was last edited on ..." + CC BY-SA sentence
 *     2. footer-places: the nine legal links, same wording as the reference
 *     3. footer-icons : Wikimedia Foundation + "Powered by MediaWiki" buttons
 *                       (grey bordered buttons, as on the reference footer)
 *   The two button images are stored locally in img/ and referenced with a
 *   relative path, because external image links are not allowed by the brief.
 *
 *   Note: this is coursework, not the real Wiktionary; that fact is recorded
 *   here in the source (not printed on the page) so the visible footer stays
 *   faithful to the reference design.
 *
 * Input  : no user input. The link list below is fixed data in this file and the
 *          "last edited" line is a fixed string, so the footer output is static.
 * Output : prints the <footer> markup directly; returns nothing.
 * =============================================================================
 */

/* -----------------------------------------------------------------------------
 * Legal links - the nine entries of the reference site's footer-places, in the
 * same order and with the same wording. Each entry now points at the real
 * Wikimedia page it stands for.
 * The 'href' is read per item, so a link can be switched back to plain,
 * non-clickable text by leaving its href empty: the loop then prints the label
 * without a link, and no URL preview appears on hover.
 * -------------------------------------------------------------------------- */
$footerLegalLinks = [
    ['label' => 'Privacy policy',
     'href'  => 'https://foundation.wikimedia.org/wiki/Policy:Privacy_policy'],
    ['label' => 'About Wiktionary',
     'href'  => 'https://en.wiktionary.org/wiki/Wiktionary:Welcome,_newcomers'],
    ['label' => 'Disclaimers',
     'href'  => 'https://en.wiktionary.org/wiki/Wiktionary:General_disclaimer'],
    ['label' => 'Legal & safety contacts',
     'href'  => 'https://foundation.wikimedia.org/wiki/Legal:Wikimedia_Foundation_Legal_and_Safety_Contact_Information'],
    ['label' => 'Code of Conduct',
     'href'  => 'https://foundation.wikimedia.org/wiki/Policy:Universal_Code_of_Conduct'],
    ['label' => 'Developers',
     'href'  => 'https://developer.wikimedia.org'],
    ['label' => 'Statistics',
     'href'  => 'https://stats.wikimedia.org/#/en.wiktionary.org'],
    ['label' => 'Cookie statement',
     'href'  => 'https://foundation.wikimedia.org/wiki/Policy:Cookie_statement'],
    ['label' => 'Mobile view',
     'href'  => 'https://en.wiktionary.org/wiki/Wiktionary:Main_Page'],
];
?>

<!-- ============================== SITE FOOTER ============================== -->
<footer class="wk-footer">

  <div class="wk-shell">

    <!-- ---- 1. footer-info: last-edit line + licence sentence ----
         Same two lines, same wording and same order as the reference footer.
         The date shown is the fixed value required for the demo, so the band
         looks identical on every page and on every day it is marked. -->
    <ul class="wk-footer__info list-unstyled">

      <li class="wk-footer__lastedit">
        This page was last edited on 23 September 2026, at 21:43.
      </li>

      <li class="wk-footer__license">
        Definitions and other text are available under the
        <!-- The three names link to the real licence and policy pages; they
             open in a new tab so the demo page is not lost. -->
        <a href="https://creativecommons.org/licenses/by-sa/4.0/"
           target="_blank" rel="noopener noreferrer">
          Creative Commons Attribution-ShareAlike License</a>;
        additional terms may apply. By using this site, you agree to the
        <a href="https://foundation.wikimedia.org/wiki/Policy:Terms_of_Use"
           target="_blank" rel="noopener noreferrer">Terms of Use</a>
        and
        <a href="https://foundation.wikimedia.org/wiki/Policy:Privacy_policy"
           target="_blank" rel="noopener noreferrer">Privacy Policy</a>.
      </li>

    </ul>

    <!-- ---- 2. footer-places: legal links on the left; 3. footer-icons:
         the two badges on the right ----
         Flex row, so the buttons slide under the links on narrow screens
         instead of forcing a horizontal scrollbar. -->
    <div class="wk-footer__bottom">

      <ul class="wk-footer__links wk-footer__places list-unstyled">
        <?php foreach ($footerLegalLinks as $link) { ?>
          <li>
            <?php if (!empty($link['href'])) { ?>
              <!-- Live link: real page in a new tab; both values escaped. -->
              <a href="<?php echo htmlspecialchars($link['href'], ENT_QUOTES, 'UTF-8'); ?>"
                 target="_blank" rel="noopener noreferrer">
                <?php echo htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8'); ?>
              </a>
            <?php } else { ?>
              <!-- Safety path: no href, so this label cannot be clicked at all. -->
              <a><?php echo htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8'); ?></a>
            <?php } ?>
          </li>
        <?php } ?>
      </ul>

      <!-- The two grey buttons of the reference footer.
           Images live in img/ and load with a relative path; width and height
           are fixed so the layout does not jump while the SVGs load.
           Each badge links to its own site: the Wikimedia badge to
           wikimedia.org, the MediaWiki badge to mediawiki.org. -->
      <ul class="wk-footer__icons list-unstyled">
        <li>
          <a href="https://www.wikimedia.org/" target="_blank" rel="noopener noreferrer">
            <img src="img/wikimedia-button.svg" alt="Wikimedia Foundation"
                 width="88" height="28" loading="lazy">
          </a>
        </li>
        <li>
          <a href="https://www.mediawiki.org/wiki/MediaWiki"
             target="_blank" rel="noopener noreferrer">
            <img src="img/poweredby_mediawiki.svg" alt="Powered by MediaWiki"
                 width="89" height="31" loading="lazy">
          </a>
        </li>
      </ul>

    </div>

  </div>

</footer>
<!-- ============================ /SITE FOOTER ============================= -->
