<?php
// Require config
require_once 'config.php';
$icon_list = '';
$icon_list .= '<li><i class="fa-500px"></i><span class="icon-name">fa-500px</span></li><li><i class="fa-adjust"></i><span class="icon-name">fa-adjust</span></li><li><i class="fa-adn"></i><span class="icon-name">fa-adn</span></li><li><i class="fa-align-center"></i><span class="icon-name">fa-align-center</span></li><li><i class="fa-align-justify"></i><span class="icon-name">fa-align-justify</span></li><li><i class="fa-align-left"></i><span class="icon-name">fa-align-left</span></li><li><i class="fa-align-right"></i><span class="icon-name">fa-align-right</span></li><li><i class="fa-amazon"></i><span class="icon-name">fa-amazon</span></li><li><i class="fa-ambulance"></i><span class="icon-name">fa-ambulance</span></li><li><i class="fa-american-sign-language-interpreting"></i><span class="icon-name">fa-american-sign-language-interpreting</span></li><li><i class="fa-anchor"></i><span class="icon-name">fa-anchor</span></li><li><i class="fa-android"></i><span class="icon-name">fa-android</span></li><li><i class="fa-angellist"></i><span class="icon-name">fa-angellist</span></li><li><i class="fa-angle-double-down"></i><span class="icon-name">fa-angle-double-down</span></li><li><i class="fa-angle-double-left"></i><span class="icon-name">fa-angle-double-left</span></li><li><i class="fa-angle-double-right"></i><span class="icon-name">fa-angle-double-right</span></li><li><i class="fa-angle-double-up"></i><span class="icon-name">fa-angle-double-up</span></li><li><i class="fa-angle-down"></i><span class="icon-name">fa-angle-down</span></li><li><i class="fa-angle-left"></i><span class="icon-name">fa-angle-left</span></li><li><i class="fa-angle-right"></i><span class="icon-name">fa-angle-right</span></li><li><i class="fa-angle-up"></i><span class="icon-name">fa-angle-up</span></li><li><i class="fa-apple"></i><span class="icon-name">fa-apple</span></li><li><i class="fa-archive"></i><span class="icon-name">fa-archive</span></li><li><i class="fa-area-chart"></i><span class="icon-name">fa-area-chart</span></li><li><i class="fa-arrow-circle-down"></i><span class="icon-name">fa-arrow-circle-down</span></li><li><i class="fa-arrow-circle-left"></i><span class="icon-name">fa-arrow-circle-left</span></li><li><i class="fa-arrow-circle-o-down"></i><span class="icon-name">fa-arrow-circle-o-down</span></li><li><i class="fa-arrow-circle-o-left"></i><span class="icon-name">fa-arrow-circle-o-left</span></li><li><i class="fa-arrow-circle-o-right"></i><span class="icon-name">fa-arrow-circle-o-right</span></li><li><i class="fa-arrow-circle-o-up"></i><span class="icon-name">fa-arrow-circle-o-up</span></li><li><i class="fa-arrow-circle-right"></i><span class="icon-name">fa-arrow-circle-right</span></li><li><i class="fa-arrow-circle-up"></i><span class="icon-name">fa-arrow-circle-up</span></li><li><i class="fa-arrow-down"></i><span class="icon-name">fa-arrow-down</span></li><li><i class="fa-arrow-left"></i><span class="icon-name">fa-arrow-left</span></li><li><i class="fa-arrow-right"></i><span class="icon-name">fa-arrow-right</span></li><li><i class="fa-arrow-up"></i><span class="icon-name">fa-arrow-up</span></li><li><i class="fa-arrows"></i><span class="icon-name">fa-arrows</span></li><li><i class="fa-arrows-alt"></i><span class="icon-name">fa-arrows-alt</span></li><li><i class="fa-arrows-h"></i><span class="icon-name">fa-arrows-h</span></li><li><i class="fa-arrows-v"></i><span class="icon-name">fa-arrows-v</span></li><li><i class="fa-asl-interpreting"></i><span class="icon-name">fa-asl-interpreting</span></li><li><i class="fa-assistive-listening-systems"></i><span class="icon-name">fa-assistive-listening-systems</span></li><li><i class="fa-asterisk"></i><span class="icon-name">fa-asterisk</span></li><li><i class="fa-at"></i><span class="icon-name">fa-at</span></li><li><i class="fa-audio-description"></i><span class="icon-name">fa-audio-description</span></li><li><i class="fa-automobile"></i><span class="icon-name">fa-automobile</span></li><li><i class="fa-backward"></i><span class="icon-name">fa-backward</span></li><li><i class="fa-balance-scale"></i><span class="icon-name">fa-balance-scale</span></li><li><i class="fa-ban"></i><span class="icon-name">fa-ban</span></li><li><i class="fa-bank"></i><span class="icon-name">fa-bank</span></li><li><i class="fa-bar-chart"></i><span class="icon-name">fa-bar-chart</span></li><li><i class="fa-bar-chart-o"></i><span class="icon-name">fa-bar-chart-o</span></li><li><i class="fa-barcode"></i><span class="icon-name">fa-barcode</span></li><li><i class="fa-bars"></i><span class="icon-name">fa-bars</span></li><li><i class="fa-battery-1"></i><span class="icon-name">fa-battery-1</span></li><li><i class="fa-battery-2"></i><span class="icon-name">fa-battery-2</span></li><li><i class="fa-battery-3"></i><span class="icon-name">fa-battery-3</span></li><li><i class="fa-battery-4"></i><span class="icon-name">fa-battery-4</span></li><li><i class="fa-battery-empty"></i><span class="icon-name">fa-battery-empty</span></li><li><i class="fa-battery-full"></i><span class="icon-name">fa-battery-full</span></li><li><i class="fa-battery-half"></i><span class="icon-name">fa-battery-half</span></li><li><i class="fa-battery-quarter"></i><span class="icon-name">fa-battery-quarter</span></li><li><i class="fa-battery-three-quarters"></i><span class="icon-name">fa-battery-three-quarters</span></li><li><i class="fa-bed"></i><span class="icon-name">fa-bed</span></li><li><i class="fa-beer"></i><span class="icon-name">fa-beer</span></li><li><i class="fa-behance"></i><span class="icon-name">fa-behance</span></li><li><i class="fa-behance-square"></i><span class="icon-name">fa-behance-square</span></li><li><i class="fa-bell"></i><span class="icon-name">fa-bell</span></li><li><i class="fa-bell-o"></i><span class="icon-name">fa-bell-o</span></li><li><i class="fa-bell-slash"></i><span class="icon-name">fa-bell-slash</span></li><li><i class="fa-bell-slash-o"></i><span class="icon-name">fa-bell-slash-o</span></li><li><i class="fa-bicycle"></i><span class="icon-name">fa-bicycle</span></li><li><i class="fa-binoculars"></i><span class="icon-name">fa-binoculars</span></li><li><i class="fa-birthday-cake"></i><span class="icon-name">fa-birthday-cake</span></li><li><i class="fa-bitbucket"></i><span class="icon-name">fa-bitbucket</span></li><li><i class="fa-bitbucket-square"></i><span class="icon-name">fa-bitbucket-square</span></li><li><i class="fa-bitcoin"></i><span class="icon-name">fa-bitcoin</span></li><li><i class="fa-black-tie"></i><span class="icon-name">fa-black-tie</span></li><li><i class="fa-blind"></i><span class="icon-name">fa-blind</span></li><li><i class="fa-bluetooth"></i><span class="icon-name">fa-bluetooth</span></li><li><i class="fa-bluetooth-b"></i><span class="icon-name">fa-bluetooth-b</span></li><li><i class="fa-bold"></i><span class="icon-name">fa-bold</span></li><li><i class="fa-bolt"></i><span class="icon-name">fa-bolt</span></li><li><i class="fa-bomb"></i><span class="icon-name">fa-bomb</span></li><li><i class="fa-book"></i><span class="icon-name">fa-book</span></li><li><i class="fa-bookmark"></i><span class="icon-name">fa-bookmark</span></li><li><i class="fa-bookmark-o"></i><span class="icon-name">fa-bookmark-o</span></li><li><i class="fa-braille"></i><span class="icon-name">fa-braille</span></li><li><i class="fa-briefcase"></i><span class="icon-name">fa-briefcase</span></li><li><i class="fa-btc"></i><span class="icon-name">fa-btc</span></li><li><i class="fa-bug"></i><span class="icon-name">fa-bug</span></li><li><i class="fa-building"></i><span class="icon-name">fa-building</span></li><li><i class="fa-building-o"></i><span class="icon-name">fa-building-o</span></li><li><i class="fa-bullhorn"></i><span class="icon-name">fa-bullhorn</span></li><li><i class="fa-bullseye"></i><span class="icon-name">fa-bullseye</span></li><li><i class="fa-bus"></i><span class="icon-name">fa-bus</span></li><li><i class="fa-buysellads"></i><span class="icon-name">fa-buysellads</span></li><li><i class="fa-cab"></i><span class="icon-name">fa-cab</span></li><li><i class="fa-calculator"></i><span class="icon-name">fa-calculator</span></li><li><i class="fa-calendar"></i><span class="icon-name">fa-calendar</span></li><li><i class="fa-calendar-check-o"></i><span class="icon-name">fa-calendar-check-o</span></li><li><i class="fa-calendar-minus-o"></i><span class="icon-name">fa-calendar-minus-o</span></li><li><i class="fa-calendar-o"></i><span class="icon-name">fa-calendar-o</span></li><li><i class="fa-calendar-plus-o"></i><span class="icon-name">fa-calendar-plus-o</span></li><li><i class="fa-calendar-times-o"></i><span class="icon-name">fa-calendar-times-o</span></li><li><i class="fa-camera"></i><span class="icon-name">fa-camera</span></li><li><i class="fa-camera-retro"></i><span class="icon-name">fa-camera-retro</span></li><li><i class="fa-car"></i><span class="icon-name">fa-car</span></li><li><i class="fa-caret-down"></i><span class="icon-name">fa-caret-down</span></li><li><i class="fa-caret-left"></i><span class="icon-name">fa-caret-left</span></li><li><i class="fa-caret-right"></i><span class="icon-name">fa-caret-right</span></li><li><i class="fa-caret-square-o-down"></i><span class="icon-name">fa-caret-square-o-down</span></li><li><i class="fa-caret-square-o-left"></i><span class="icon-name">fa-caret-square-o-left</span></li><li><i class="fa-caret-square-o-right"></i><span class="icon-name">fa-caret-square-o-right</span></li><li><i class="fa-caret-square-o-up"></i><span class="icon-name">fa-caret-square-o-up</span></li><li><i class="fa-caret-up"></i><span class="icon-name">fa-caret-up</span></li><li><i class="fa-cart-arrow-down"></i><span class="icon-name">fa-cart-arrow-down</span></li><li><i class="fa-cart-plus"></i><span class="icon-name">fa-cart-plus</span></li><li><i class="fa-cc"></i><span class="icon-name">fa-cc</span></li><li><i class="fa-cc-amex"></i><span class="icon-name">fa-cc-amex</span></li><li><i class="fa-cc-diners-club"></i><span class="icon-name">fa-cc-diners-club</span></li><li><i class="fa-cc-discover"></i><span class="icon-name">fa-cc-discover</span></li><li><i class="fa-cc-jcb"></i><span class="icon-name">jcb</span></li><li><i class="fa-cc-mastercard"></i><span class="icon-name">fa-cc-mastercard</span></li><li><i class="fa-cc-paypal"></i><span class="icon-name">fa-cc-paypal</span></li><li><i class="fa-cc-stripe"></i><span class="icon-name">fa-cc-stripe</span></li><li><i class="fa-cc-visa"></i><span class="icon-name">fa-cc-visa</span></li><li><i class="fa-certificate"></i><span class="icon-name">fa-certificate</span></li><li><i class="fa-chain"></i><span class="icon-name">fa-chain</span></li><li><i class="fa-chain-broken"></i><span class="icon-name">fa-chain-broken</span></li><li><i class="fa-check"></i><span class="icon-name">fa-check</span></li><li><i class="fa-check-circle"></i><span class="icon-name">fa-check-circle</span></li><li><i class="fa-check-circle-o"></i><span class="icon-name">fa-check-circle-o</span></li><li><i class="fa-check-square"></i><span class="icon-name">fa-check-square</span></li><li><i class="fa-check-square-o"></i><span class="icon-name">fa-check-square-o</span></li><li><i class="fa-chevron-circle-down"></i><span class="icon-name">fa-chevron-circle-down</span></li><li><i class="fa-chevron-circle-left"></i><span class="icon-name">fa-chevron-circle-left</span></li><li><i class="fa-chevron-circle-right"></i><span class="icon-name">fa-chevron-circle-right</span></li><li><i class="fa-chevron-circle-up"></i><span class="icon-name">fa-chevron-circle-up</span></li><li><i class="fa-chevron-down"></i><span class="icon-name">fa-chevron-down</span></li><li><i class="fa-chevron-left"></i><span class="icon-name">fa-chevron-left</span></li><li><i class="fa-chevron-right"></i><span class="icon-name">fa-chevron-right</span></li><li><i class="fa-chevron-up"></i><span class="icon-name">fa-chevron-up</span></li><li><i class="fa-child"></i><span class="icon-name">fa-child</span></li><li><i class="fa-chrome"></i><span class="icon-name">fa-chrome</span></li><li><i class="fa-circle"></i><span class="icon-name">fa-circle</span></li><li><i class="fa-circle-o"></i><span class="icon-name">fa-circle-o</span></li><li><i class="fa-circle-o-notch"></i><span class="icon-name">fa-circle-o-notch</span></li><li><i class="fa-circle-thin"></i><span class="icon-name">fa-circle-thin</span></li><li><i class="fa-clipboard"></i><span class="icon-name">fa-clipboard</span></li><li><i class="fa-clock-o"></i><span class="icon-name">fa-clock-o</span></li><li><i class="fa-clone"></i><span class="icon-name">fa-clone</span></li><li><i class="fa-close"></i><span class="icon-name">fa-close</span></li><li><i class="fa-cloud"></i><span class="icon-name">fa-cloud</span></li><li><i class="fa-cloud-download"></i><span class="icon-name">fa-cloud-download</span></li><li><i class="fa-cloud-upload"></i><span class="icon-name">fa-cloud-upload</span></li><li><i class="fa-cny"></i><span class="icon-name">fa-cny</span></li><li><i class="fa-code"></i><span class="icon-name">fa-code</span></li><li><i class="fa-code-fork"></i><span class="icon-name">fa-code-fork</span></li><li><i class="fa-codepen"></i><span class="icon-name">fa-codepen</span></li><li><i class="fa-codiepie"></i><span class="icon-name">fa-codiepie</span></li><li><i class="fa-coffee"></i><span class="icon-name">fa-coffee</span></li><li><i class="fa-cog"></i><span class="icon-name">fa-cog</span></li><li><i class="fa-cogs"></i><span class="icon-name">fa-cogs</span></li><li><i class="fa-columns"></i><span class="icon-name">fa-columns</span></li><li><i class="fa-comment"></i><span class="icon-name">fa-comment</span></li><li><i class="fa-comment-o"></i><span class="icon-name">fa-comment-o</span></li><li><i class="fa-commenting"></i><span class="icon-name">fa-commenting</span></li><li><i class="fa-commenting-o"></i><span class="icon-name">fa-commenting-o</span></li><li><i class="fa-comments"></i><span class="icon-name">fa-comments</span></li><li><i class="fa-comments-o"></i><span class="icon-name">fa-comments-o</span></li><li><i class="fa-compass"></i><span class="icon-name">fa-compass</span></li><li><i class="fa-compress"></i><span class="icon-name">fa-compress</span></li><li><i class="fa-connectdevelop"></i><span class="icon-name">fa-connectdevelop</span></li><li><i class="fa-contao"></i><span class="icon-name">fa-contao</span></li><li><i class="fa-copy"></i><span class="icon-name">fa-copy</span></li><li><i class="fa-copyright"></i><span class="icon-name">fa-copyright</span></li><li><i class="fa-creative-commons"></i><span class="icon-name">fa-creative-commons</span></li><li><i class="fa-credit-card"></i><span class="icon-name">fa-credit-card</span></li><li><i class="fa-credit-card-alt"></i><span class="icon-name">fa-credit-card-alt</span></li><li><i class="fa-crop"></i><span class="icon-name">fa-crop</span></li><li><i class="fa-crosshairs"></i><span class="icon-name">fa-crosshairs</span></li><li><i class="fa-css3"></i><span class="icon-name">fa-css3</span></li><li><i class="fa-cube"></i><span class="icon-name">fa-cube</span></li><li><i class="fa-cubes"></i><span class="icon-name">fa-cubes</span></li><li><i class="fa-cut"></i><span class="icon-name">fa-cut</span></li><li><i class="fa-cutlery"></i><span class="icon-name">fa-cutlery</span></li><li><i class="fa-dashboard"></i><span class="icon-name">fa-dashboard</span></li><li><i class="fa-dashcube"></i><span class="icon-name">fa-dashcube</span></li><li><i class="fa-database"></i><span class="icon-name">fa-database</span></li><li><i class="fa-deaf"></i><span class="icon-name">fa-deaf</span></li><li><i class="fa-deafness"></i><span class="icon-name">fa-deafness</span></li><li><i class="fa-dedent"></i><span class="icon-name">fa-dedent</span></li><li><i class="fa-delicious"></i><span class="icon-name">fa-delicious</span></li><li><i class="fa-desktop"></i><span class="icon-name">fa-desktop</span></li><li><i class="fa-deviantart"></i><span class="icon-name">fa-deviantart</span></li><li><i class="fa-diamond"></i><span class="icon-name">fa-diamond</span></li><li><i class="fa-digg"></i><span class="icon-name">fa-digg</span></li><li><i class="fa-dollar"></i><span class="icon-name">fa-dollar</span></li><li><i class="fa-dot-circle-o"></i><span class="icon-name">fa-dot-circle-o</span></li><li><i class="fa-download"></i><span class="icon-name">fa-download</span></li><li><i class="fa-dribbble"></i><span class="icon-name">fa-dribbble</span></li><li><i class="fa-dropbox"></i><span class="icon-name">fa-dropbox</span></li><li><i class="fa-drupal"></i><span class="icon-name">fa-drupal</span></li><li><i class="fa-edge"></i><span class="icon-name">fa-edge</span></li><li><i class="fa-edit"></i><span class="icon-name">fa-edit</span></li><li><i class="fa-eject"></i><span class="icon-name">fa-eject</span></li><li><i class="fa-ellipsis-h"></i><span class="icon-name">fa-ellipsis-h</span></li><li><i class="fa-ellipsis-v"></i><span class="icon-name">fa-ellipsis-v</span></li><li><i class="fa-empire"></i><span class="icon-name">fa-empire</span></li><li><i class="fa-envelope"></i><span class="icon-name">fa-envelope</span></li><li><i class="fa-envelope-o"></i><span class="icon-name">fa-envelope-o</span></li><li><i class="fa-envelope-square"></i><span class="icon-name">fa-envelope-square</span></li><li><i class="fa-envira"></i><span class="icon-name">fa-envira</span></li><li><i class="fa-eraser"></i><span class="icon-name">fa-eraser</span></li><li><i class="fa-eur"></i><span class="icon-name">fa-eur</span></li><li><i class="fa-euro"></i><span class="icon-name">fa-euro</span></li><li><i class="fa-exchange"></i><span class="icon-name">fa-exchange</span></li><li><i class="fa-exclamation"></i><span class="icon-name">fa-exclamation</span></li><li><i class="fa-exclamation-circle"></i><span class="icon-name">fa-exclamation-circle</span></li><li><i class="fa-exclamation-triangle"></i><span class="icon-name">fa-exclamation-triangle</span></li><li><i class="fa-expand"></i><span class="icon-name">fa-expand</span></li><li><i class="fa-expeditedssl"></i><span class="icon-name">fa-expeditedssl</span></li><li><i class="fa-external-link"></i><span class="icon-name">fa-external-link</span></li><li><i class="fa-external-link-square"></i><span class="icon-name">fa-external-link-square</span></li><li><i class="fa-eye"></i><span class="icon-name">fa-eye</span></li><li><i class="fa-eye-slash"></i><span class="icon-name">fa-eye-slash</span></li><li><i class="fa-eyedropper"></i><span class="icon-name">fa-eyedropper</span></li><li><i class="fa-facebook"></i><span class="icon-name">fa-facebook</span></li><li><i class="fa-facebook-f"></i><span class="icon-name">fa-facebook-f</span></li><li><i class="fa-facebook-official"></i><span class="icon-name">fa-facebook-official</span></li><li><i class="fa-facebook-square"></i><span class="icon-name">fa-facebook-square</span></li><li><i class="fa-fast-backward"></i><span class="icon-name">fa-fast-backward</span></li><li><i class="fa-fast-forward"></i><span class="icon-name">fa-fast-forward</span></li><li><i class="fa-fax"></i><span class="icon-name">fa-fax</span></li><li><i class="fa-female"></i><span class="icon-name">fa-female</span></li><li><i class="fa-fighter-jet"></i><span class="icon-name">fa-fighter-jet</span></li><li><i class="fa-file"></i><span class="icon-name">fa-file</span></li><li><i class="fa-file-archive-o"></i><span class="icon-name">fa-file-archive-o</span></li><li><i class="fa-file-audio-o"></i><span class="icon-name">fa-file-audio-o</span></li><li><i class="fa-file-code-o"></i><span class="icon-name">fa-file-code-o</span></li><li><i class="fa-file-excel-o"></i><span class="icon-name">fa-file-excel-o</span></li><li><i class="fa-file-image-o"></i><span class="icon-name">fa-file-image-o</span></li><li><i class="fa-file-movie-o"></i><span class="icon-name">fa-file-movie-o</span></li><li><i class="fa-file-o"></i><span class="icon-name">fa-file-o</span></li><li><i class="fa-file-pdf-o"></i><span class="icon-name">fa-file-pdf-o</span></li><li><i class="fa-file-photo-o"></i><span class="icon-name">fa-file-photo-o</span></li><li><i class="fa-file-picture-o"></i><span class="icon-name">fa-file-picture-o</span></li><li><i class="fa-file-powerpoint-o"></i><span class="icon-name">fa-file-powerpoint-o</span></li><li><i class="fa-file-sound-o"></i><span class="icon-name">fa-file-sound-o</span></li><li><i class="fa-file-text"></i><span class="icon-name">fa-file-text</span></li><li><i class="fa-file-text-o"></i><span class="icon-name">fa-file-text-o</span></li><li><i class="fa-file-video-o"></i><span class="icon-name">fa-file-video-o</span></li><li><i class="fa-file-word-o"></i><span class="icon-name">fa-file-word-o</span></li><li><i class="fa-file-zip-o"></i><span class="icon-name">fa-file-zip-o</span></li><li><i class="fa-files-o"></i><span class="icon-name">fa-files-o</span></li><li><i class="fa-film"></i><span class="icon-name">fa-film</span></li><li><i class="fa-filter"></i><span class="icon-name">fa-filter</span></li><li><i class="fa-fire"></i><span class="icon-name">fa-fire</span></li><li><i class="fa-fire-extinguisher"></i><span class="icon-name">fa-fire-extinguisher</span></li><li><i class="fa-firefox"></i><span class="icon-name">fa-firefox</span></li><li><i class="fa-first-order"></i><span class="icon-name">fa-first-order</span></li><li><i class="fa-flag"></i><span class="icon-name">fa-flag</span></li><li><i class="fa-flag-checkered"></i><span class="icon-name">fa-flag-checkered</span></li><li><i class="fa-flag-o"></i><span class="icon-name">fa-flag-o</span></li><li><i class="fa-flash"></i><span class="icon-name">fa-flash</span></li><li><i class="fa-flask"></i><span class="icon-name">fa-flask</span></li><li><i class="fa-flickr"></i><span class="icon-name">fa-flickr</span></li><li><i class="fa-floppy-o"></i><span class="icon-name">fa-floppy-o</span></li><li><i class="fa-folder"></i><span class="icon-name">fa-folder</span></li><li><i class="fa-folder-o"></i><span class="icon-name">fa-folder-o</span></li><li><i class="fa-folder-open"></i><span class="icon-name">fa-folder-open</span></li><li><i class="fa-folder-open-o"></i><span class="icon-name">fa-folder-open-o</span></li><li><i class="fa-font"></i><span class="icon-name">fa-font</span></li><li><i class="fa-fonticons"></i><span class="icon-name">fa-fonticons</span></li><li><i class="fa-fort-awesome"></i><span class="icon-name">fa-fort-awesome</span></li><li><i class="fa-forumbee"></i><span class="icon-name">fa-forumbee</span></li><li><i class="fa-forward"></i><span class="icon-name">fa-forward</span></li><li><i class="fa-foursquare"></i><span class="icon-name">fa-foursquare</span></li><li><i class="fa-frown-o"></i><span class="icon-name">fa-frown-o</span></li><li><i class="fa-futbol-o"></i><span class="icon-name">fa-futbol-o</span></li><li><i class="fa-gamepad"></i><span class="icon-name">fa-gamepad</span></li><li><i class="fa-gavel"></i><span class="icon-name">fa-gavel</span></li><li><i class="fa-gbp"></i><span class="icon-name">fa-gbp</span></li><li><i class="fa-ge"></i><span class="icon-name">fa-ge</span></li><li><i class="fa-gear"></i><span class="icon-name">fa-gear</span></li><li><i class="fa-gears"></i><span class="icon-name">fa-gears</span></li><li><i class="fa-genderless"></i><span class="icon-name">fa-genderless</span></li><li><i class="fa-get-pocket"></i><span class="icon-name">fa-get-pocket</span></li><li><i class="fa-gg"></i><span class="icon-name">fa-gg</span></li><li><i class="fa-gg-circle"></i><span class="icon-name">fa-gg-circle</span></li><li><i class="fa-gift"></i><span class="icon-name">fa-gift</span></li><li><i class="fa-git"></i><span class="icon-name">fa-git</span></li><li><i class="fa-git-square"></i><span class="icon-name">fa-git-square</span></li><li><i class="fa-github"></i><span class="icon-name">fa-github</span></li><li><i class="fa-github-alt"></i><span class="icon-name">fa-github-alt</span></li><li><i class="fa-github-square"></i><span class="icon-name">fa-github-square</span></li><li><i class="fa-gitlab"></i><span class="icon-name">fa-gitlab</span></li><li><i class="fa-gittip"></i><span class="icon-name">fa-gittip</span></li><li><i class="fa-glass"></i><span class="icon-name">fa-glass</span></li><li><i class="fa-glide"></i><span class="icon-name">fa-glide</span></li><li><i class="fa-glide-g"></i><span class="icon-name">fa-glide-g</span></li><li><i class="fa-globe"></i><span class="icon-name">fa-globe</span></li><li><i class="fa-google"></i><span class="icon-name">fa-google</span></li><li><i class="fa-google-plus"></i><span class="icon-name">fa-google-plus</span></li><li><i class="fa-google-plus-square"></i><span class="icon-name">fa-google-plus-square</span></li><li><i class="fa-google-wallet"></i><span class="icon-name">fa-google-wallet</span></li><li><i class="fa-graduation-cap"></i><span class="icon-name">fa-graduation-cap</span></li><li><i class="fa-gratipay"></i><span class="icon-name">fa-gratipay</span></li><li><i class="fa-group"></i><span class="icon-name">fa-group</span></li><li><i class="fa-h-square"></i><span class="icon-name">fa-h-square</span></li><li><i class="fa-hacker-news"></i><span class="icon-name">fa-hacker-news</span></li><li><i class="fa-hand-grab-o"></i><span class="icon-name">fa-hand-grab-o</span></li><li><i class="fa-hand-lizard-o"></i><span class="icon-name">fa-hand-lizard-o</span></li><li><i class="fa-hand-o-down"></i><span class="icon-name">fa-hand-o-down</span></li><li><i class="fa-hand-o-left"></i><span class="icon-name">fa-hand-o-left</span></li><li><i class="fa-hand-o-right"></i><span class="icon-name">fa-hand-o-right</span></li><li><i class="fa-hand-o-up"></i><span class="icon-name">fa-hand-o-up</span></li><li><i class="fa-hand-paper-o"></i><span class="icon-name">fa-hand-paper-o</span></li><li><i class="fa-hand-peace-o"></i><span class="icon-name">fa-hand-peace-o</span></li><li><i class="fa-hand-pointer-o"></i><span class="icon-name">fa-hand-pointer-o</span></li><li><i class="fa-hand-rock-o"></i><span class="icon-name">fa-hand-rock-o</span></li><li><i class="fa-hand-scissors-o"></i><span class="icon-name">fa-hand-scissors-o</span></li><li><i class="fa-hand-spock-o"></i><span class="icon-name">fa-hand-spock-o</span></li><li><i class="fa-hand-stop-o"></i><span class="icon-name">fa-hand-stop-o</span></li><li><i class="fa-hard-of-hearing"></i><span class="icon-name">fa-hard-of-hearing</span></li><li><i class="fa-hashtag"></i><span class="icon-name">fa-hashtag</span></li><li><i class="fa-hdd-o"></i><span class="icon-name">fa-hdd-o</span></li><li><i class="fa-header"></i><span class="icon-name">fa-header</span></li><li><i class="fa-headphones"></i><span class="icon-name">fa-headphones</span></li><li><i class="fa-heart"></i><span class="icon-name">fa-heart</span></li><li><i class="fa-heart-o"></i><span class="icon-name">fa-heart-o</span></li><li><i class="fa-heartbeat"></i><span class="icon-name">fa-heartbeat</span></li><li><i class="fa-history"></i><span class="icon-name">fa-history</span></li><li><i class="fa-home"></i><span class="icon-name">fa-home</span></li><li><i class="fa-hospital-o"></i><span class="icon-name">fa-hospital-o</span></li><li><i class="fa-hotel"></i><span class="icon-name">fa-hotel</span></li><li><i class="fa-hourglass"></i><span class="icon-name">fa-hourglass</span></li><li><i class="fa-hourglass-1"></i><span class="icon-name">fa-hourglass-1</span></li><li><i class="fa-hourglass-2"></i><span class="icon-name">fa-hourglass-2</span></li><li><i class="fa-hourglass-3"></i><span class="icon-name">fa-hourglass-3</span></li><li><i class="fa-hourglass-end"></i><span class="icon-name">fa-hourglass-end</span></li><li><i class="fa-hourglass-half"></i><span class="icon-name">fa-hourglass-half</span></li><li><i class="fa-hourglass-o"></i><span class="icon-name">fa-hourglass-o</span></li><li><i class="fa-hourglass-start"></i><span class="icon-name">fa-hourglass-start</span></li><li><i class="fa-houzz"></i><span class="icon-name">fa-houzz</span></li><li><i class="fa-html5"></i><span class="icon-name">fa-html5</span></li><li><i class="fa-i-cursor"></i><span class="icon-name">fa-i-cursor</span></li><li><i class="fa-ils"></i><span class="icon-name">fa-ils</span></li><li><i class="fa-image"></i><span class="icon-name">fa-image</span></li><li><i class="fa-inbox"></i><span class="icon-name">fa-inbox</span></li><li><i class="fa-indent"></i><span class="icon-name">fa-indent</span></li><li><i class="fa-industry"></i><span class="icon-name">fa-industry</span></li><li><i class="fa-info"></i><span class="icon-name">fa-info</span></li><li><i class="fa-info-circle"></i><span class="icon-name">fa-info-circle</span></li><li><i class="fa-inr"></i><span class="icon-name">fa-inr</span></li><li><i class="fa-instagram"></i><span class="icon-name">fa-instagram</span></li><li><i class="fa-institution"></i><span class="icon-name">fa-institution</span></li><li><i class="fa-internet-explorer"></i><span class="icon-name">fa-internet-explorer</span></li><li><i class="fa-intersex"></i><span class="icon-name">fa-intersex</span></li><li><i class="fa-ioxhost"></i><span class="icon-name">fa-ioxhost</span></li><li><i class="fa-italic"></i><span class="icon-name">fa-italic</span></li><li><i class="fa-joomla"></i><span class="icon-name">fa-joomla</span></li><li><i class="fa-jpy"></i><span class="icon-name">fa-jpy</span></li><li><i class="fa-jsfiddle"></i><span class="icon-name">fa-jsfiddle</span></li><li><i class="fa-key"></i><span class="icon-name">fa-key</span></li><li><i class="fa-keyboard-o"></i><span class="icon-name">fa-keyboard-o</span></li><li><i class="fa-krw"></i><span class="icon-name">fa-krw</span></li><li><i class="fa-language"></i><span class="icon-name">fa-language</span></li><li><i class="fa-laptop"></i><span class="icon-name">fa-laptop</span></li><li><i class="fa-lastfm"></i><span class="icon-name">fa-lastfm</span></li><li><i class="fa-lastfm-square"></i><span class="icon-name">fa-lastfm-square</span></li><li><i class="fa-leaf"></i><span class="icon-name">fa-leaf</span></li><li><i class="fa-leanpub"></i><span class="icon-name">fa-leanpub</span></li><li><i class="fa-legal"></i><span class="icon-name">fa-legal</span></li><li><i class="fa-lemon-o"></i><span class="icon-name">fa-lemon-o</span></li><li><i class="fa-level-down"></i><span class="icon-name">fa-level-down</span></li><li><i class="fa-level-up"></i><span class="icon-name">fa-level-up</span></li><li><i class="fa-life-bouy"></i><span class="icon-name">fa-life-bouy</span></li><li><i class="fa-life-buoy"></i><span class="icon-name">fa-life-buoy</span></li><li><i class="fa-life-ring"></i><span class="icon-name">fa-life-ring</span></li><li><i class="fa-life-saver"></i><span class="icon-name">fa-life-saver</span></li><li><i class="fa-lightbulb-o"></i><span class="icon-name">fa-lightbulb-o</span></li><li><i class="fa-line-chart"></i><span class="icon-name">fa-line-chart</span></li><li><i class="fa-link"></i><span class="icon-name">fa-link</span></li><li><i class="fa-linkedin"></i><span class="icon-name">fa-linkedin</span></li><li><i class="fa-linkedin-square"></i><span class="icon-name">fa-linkedin-square</span></li><li><i class="fa-linux"></i><span class="icon-name">fa-linux</span></li><li><i class="fa-list"></i><span class="icon-name">fa-list</span></li><li><i class="fa-list-alt"></i><span class="icon-name">fa-list-alt</span></li><li><i class="fa-list-ol"></i><span class="icon-name">fa-list-ol</span></li><li><i class="fa-list-ul"></i><span class="icon-name">fa-list-ul</span></li><li><i class="fa-location-arrow"></i><span class="icon-name">fa-location-arrow</span></li><li><i class="fa-lock"></i><span class="icon-name">fa-lock</span></li><li><i class="fa-long-arrow-down"></i><span class="icon-name">fa-long-arrow-down</span></li><li><i class="fa-long-arrow-left"></i><span class="icon-name">fa-long-arrow-left</span></li><li><i class="fa-long-arrow-right"></i><span class="icon-name">fa-long-arrow-right</span></li><li><i class="fa-long-arrow-up"></i><span class="icon-name">fa-long-arrow-up</span></li><li><i class="fa-low-vision"></i><span class="icon-name">fa-low-vision</span></li></li><li><i class="fa-magic"></i><span class="icon-name">fa-magic</span></li><li><i class="fa-magnet"></i><span class="icon-name">fa-magnet</span></li><li><i class="fa-mail-forward"></i><span class="icon-name">fa-mail-forward</span></li><li><i class="fa-mail-reply"></i><span class="icon-name">fa-mail-reply</span></li><li><i class="fa-mail-reply-all"></i><span class="icon-name">fa-mail-reply-all</span></li><li><i class="fa-male"></i><span class="icon-name">fa-male</span></li><li><i class="fa-map"></i><span class="icon-name">fa-map</span></li><li><i class="fa-map-marker"></i><span class="icon-name">fa-map-marker</span></li><li><i class="fa-map-o"></i><span class="icon-name">fa-map-o</span></li><li><i class="fa-map-pin"></i><span class="icon-name">fa-map-pin</span></li><li><i class="fa-map-signs"></i><span class="icon-name">fa-map-signs</span></li><li><i class="fa-mars"></i><span class="icon-name">fa-mars</span></li><li><i class="fa-mars-double"></i><span class="icon-name">fa-mars-double</span></li><li><i class="fa-mars-stroke"></i><span class="icon-name">fa-mars-stroke</span></li><li><i class="fa-mars-stroke-h"></i><span class="icon-name">fa-mars-stroke-h</span></li><li><i class="fa-mars-stroke-v"></i><span class="icon-name">fa-mars-stroke-v</span></li><li><i class="fa-maxcdn"></i><span class="icon-name">fa-maxcdn</span></li><li><i class="fa-meanpath"></i><span class="icon-name">fa-meanpath</span></li><li><i class="fa-medium"></i><span class="icon-name">fa-medium</span></li><li><i class="fa-medkit"></i><span class="icon-name">fa-medkit</span></li><li><i class="fa-meh-o"></i><span class="icon-name">fa-meh-o</span></li><li><i class="fa-mercury"></i><span class="icon-name">fa-mercury</span></li><li><i class="fa-microphone"></i><span class="icon-name">fa-microphone</span></li><li><i class="fa-microphone-slash"></i><span class="icon-name">fa-microphone-slash</span></li><li><i class="fa-minus"></i><span class="icon-name">fa-minus</span></li><li><i class="fa-minus-circle"></i><span class="icon-name">fa-minus-circle</span></li><li><i class="fa-minus-square"></i><span class="icon-name">fa-minus-square</span></li><li><i class="fa-minus-square-o"></i><span class="icon-name">fa-minus-square-o</span></li><li><i class="fa-mixcloud"></i><span class="icon-name">fa-mixcloud</span></li><li><i class="fa-mobile"></i><span class="icon-name">fa-mobile</span></li><li><i class="fa-mobile-phone"></i><span class="icon-name">fa-mobile-phone</span></li><li><i class="fa-modx"></i><span class="icon-name">fa-modx</span></li><li><i class="fa-money"></i><span class="icon-name">fa-money</span></li><li><i class="fa-moon-o"></i><span class="icon-name">fa-moon-o</span></li><li><i class="fa-mortar-board"></i><span class="icon-name">fa-mortar-board</span></li><li><i class="fa-motorcycle"></i><span class="icon-name">fa-motorcycle</span></li><li><i class="fa-mouse-pointer"></i><span class="icon-name">fa-mouse-pointer</span></li><li><i class="fa-music"></i><span class="icon-name">fa-music</span></li><li><i class="fa-navicon"></i><span class="icon-name">fa-navicon</span></li><li><i class="fa-neuter"></i><span class="icon-name">fa-neuter</span></li><li><i class="fa-newspaper-o"></i><span class="icon-name">fa-newspaper-o</span></li><li><i class="fa-object-group"></i><span class="icon-name">fa-object-group</span></li><li><i class="fa-object-ungroup"></i><span class="icon-name">fa-object-ungroup</span></li><li><i class="fa-odnoklassniki"></i><span class="icon-name">fa-odnoklassniki</span></li><li><i class="fa-odnoklassniki-square"></i><span class="icon-name">fa-odnoklassniki-square</span></li><li><i class="fa-opencart"></i><span class="icon-name">fa-opencart</span></li><li><i class="fa-openid"></i><span class="icon-name">fa-openid</span></li><li><i class="fa-opera"></i><span class="icon-name">fa-opera</span></li><li><i class="fa-optin-monster"></i><span class="icon-name">fa-optin-monster</span></li><li><i class="fa-outdent"></i><span class="icon-name">fa-outdent</span></li><li><i class="fa-pagelines"></i><span class="icon-name">fa-pagelines</span></li><li><i class="fa-paint-brush"></i><span class="icon-name">fa-paint-brush</span></li><li><i class="fa-paper-plane"></i><span class="icon-name">fa-paper-plane</span></li><li><i class="fa-paper-plane-o"></i><span class="icon-name">fa-paper-plane-o</span></li><li><i class="fa-paperclip"></i><span class="icon-name">fa-paperclip</span></li><li><i class="fa-paragraph"></i><span class="icon-name">fa-paragraph</span></li><li><i class="fa-paste"></i><span class="icon-name">fa-paste</span></li><li><i class="fa-pause"></i><span class="icon-name">fa-pause</span></li><li><i class="fa-pause-circle"></i><span class="icon-name">fa-pause-circle</span></li><li><i class="fa-pause-circle-o"></i><span class="icon-name">fa-pause-circle-o</span></li><li><i class="fa-paw"></i><span class="icon-name">fa-paw</span></li><li><i class="fa-paypal"></i><span class="icon-name">fa-paypal</span></li><li><i class="fa-pencil"></i><span class="icon-name">fa-pencil</span></li><li><i class="fa-pencil-square"></i><span class="icon-name">fa-pencil-square</span></li><li><i class="fa-pencil-square-o"></i><span class="icon-name">fa-pencil-square-o</span></li><li><i class="fa-percent"></i><span class="icon-name">fa-percent</span></li><li><i class="fa-phone"></i><span class="icon-name">fa-phone</span></li><li><i class="fa-phone-square"></i><span class="icon-name">fa-phone-square</span></li><li><i class="fa-photo"></i><span class="icon-name">fa-photo</span></li><li><i class="fa-picture-o"></i><span class="icon-name">fa-picture-o</span></li><li><i class="fa-pie-chart"></i><span class="icon-name">fa-pie-chart</span></li><li><i class="fa-pied-piper"></i><span class="icon-name">fa-pied-piper</span></li><li><i class="fa-pied-piper-alt"></i><span class="icon-name">fa-pied-piper-alt</span></li><li><i class="fa-pied-piper-pp"></i><span class="icon-name">fa-pied-piper-pp</span></li><li><i class="fa-pinterest"></i><span class="icon-name">fa-pinterest</span></li><li><i class="fa-pinterest-p"></i><span class="icon-name">fa-pinterest-p</span></li><li><i class="fa-pinterest-square"></i><span class="icon-name">fa-pinterest-square</span></li><li><i class="fa-plane"></i><span class="icon-name">fa-plane</span></li><li><i class="fa-play"></i><span class="icon-name">fa-play</span></li><li><i class="fa-play-circle"></i><span class="icon-name">fa-play-circle</span></li><li><i class="fa-play-circle-o"></i><span class="icon-name">fa-play-circle-o</span></li><li><i class="fa-plug"></i><span class="icon-name">fa-plug</span></li><li><i class="fa-plus"></i><span class="icon-name">fa-plus</span></li><li><i class="fa-plus-circle"></i><span class="icon-name">fa-plus-circle</span></li><li><i class="fa-plus-square"></i><span class="icon-name">fa-plus-square</span></li><li><i class="fa-plus-square-o"></i><span class="icon-name">fa-plus-square-o</span></li><li><i class="fa-power-off"></i><span class="icon-name">fa-power-off</span></li><li><i class="fa-print"></i><span class="icon-name">fa-print</span></li><li><i class="fa-product-hunt"></i><span class="icon-name">fa-product-hunt</span></li><li><i class="fa-puzzle-piece"></i><span class="icon-name">fa-puzzle-piece</span></li><li><i class="fa-qq"></i><span class="icon-name">fa-qq</span></li><li><i class="fa-qrcode"></i><span class="icon-name">fa-qrcode</span></li><li><i class="fa-question"></i><span class="icon-name">fa-question</span></li><li><i class="fa-question-circle"></i><span class="icon-name">fa-question-circle</span></li><li><i class="fa-question-circle-o"></i><span class="icon-name">fa-question-circle-o</span></li><li><i class="fa-quote-left"></i><span class="icon-name">fa-quote-left</span></li><li><i class="fa-quote-right"></i><span class="icon-name">fa-quote-right</span></li><li><i class="fa-ra"></i><span class="icon-name">fa-ra</span></li><li><i class="fa-random"></i><span class="icon-name">fa-random</span></li><li><i class="fa-rebel"></i><span class="icon-name">fa-rebel</span></li><li><i class="fa-recycle"></i><span class="icon-name">fa-recycle</span></li><li><i class="fa-reddit"></i><span class="icon-name">fa-reddit</span></li><li><i class="fa-reddit-alien"></i><span class="icon-name">fa-reddit-alien</span></li><li><i class="fa-reddit-square"></i><span class="icon-name">fa-reddit-square</span></li><li><i class="fa-refresh"></i><span class="icon-name">fa-refresh</span></li><li><i class="fa-registered"></i><span class="icon-name">fa-registered</span></li><li><i class="fa-remove"></i><span class="icon-name">fa-remove</span></li><li><i class="fa-renren"></i><span class="icon-name">fa-renren</span></li><li><i class="fa-reorder"></i><span class="icon-name">fa-reorder</span></li><li><i class="fa-repeat"></i><span class="icon-name">fa-repeat</span></li><li><i class="fa-reply"></i><span class="icon-name">fa-reply</span></li><li><i class="fa-reply-all"></i><span class="icon-name">fa-reply-all</span></li><li><i class="fa-retweet"></i><span class="icon-name">fa-retweet</span></li><li><i class="fa-rmb"></i><span class="icon-name">fa-rmb</span></li><li><i class="fa-road"></i><span class="icon-name">fa-road</span></li><li><i class="fa-rocket"></i><span class="icon-name">fa-rocket</span></li><li><i class="fa-rotate-left"></i><span class="icon-name">fa-rotate-left</span></li><li><i class="fa-rotate-right"></i><span class="icon-name">fa-rotate-right</span></li><li><i class="fa-rouble"></i><span class="icon-name">fa-rouble</span></li><li><i class="fa-rss"></i><span class="icon-name">fa-rss</span></li><li><i class="fa-rss-square"></i><span class="icon-name">fa-rss-square</span></li><li><i class="fa-rub"></i><span class="icon-name">fa-rub</span></li><li><i class="fa-ruble"></i><span class="icon-name">fa-ruble</span></li><li><i class="fa-rupee"></i><span class="icon-name">fa-rupee</span></li><li><i class="fa-safari"></i><span class="icon-name">fa-safari</span></li><li><i class="fa-save"></i><span class="icon-name">fa-save</span></li><li><i class="fa-scissors"></i><span class="icon-name">fa-scissors</span></li><li><i class="fa-scribd"></i><span class="icon-name">fa-scribd</span></li><li><i class="fa-search"></i><span class="icon-name">fa-search</span></li><li><i class="fa-search-minus"></i><span class="icon-name">fa-search-minus</span></li><li><i class="fa-search-plus"></i><span class="icon-name">fa-search-plus</span></li><li><i class="fa-sellsy"></i><span class="icon-name">fa-sellsy</span></li><li><i class="fa-send"></i><span class="icon-name">fa-send</span></li><li><i class="fa-send-o"></i><span class="icon-name">fa-send-o</span></li><li><i class="fa-server"></i><span class="icon-name">fa-server</span></li><li><i class="fa-share"></i><span class="icon-name">fa-share</span></li><li><i class="fa-share-alt"></i><span class="icon-name">fa-share-alt</span></li><li><i class="fa-share-alt-square"></i><span class="icon-name">fa-share-alt-square</span></li><li><i class="fa-share-square"></i><span class="icon-name">fa-share-square</span></li><li><i class="fa-share-square-o"></i><span class="icon-name">fa-share-square-o</span></li><li><i class="fa-shekel"></i><span class="icon-name">fa-shekel</span></li><li><i class="fa-sheqel"></i><span class="icon-name">fa-sheqel</span></li><li><i class="fa-shield"></i><span class="icon-name">fa-shield</span></li><li><i class="fa-ship"></i><span class="icon-name">fa-ship</span></li><li><i class="fa-shirtsinbulk"></i><span class="icon-name">fa-shirtsinbulk</span></li><li><i class="fa-shopping-bag"></i><span class="icon-name">fa-shopping-bag</span></li><li><i class="fa-shopping-basket"></i><span class="icon-name">fa-shopping-basket</span></li><li><i class="fa-shopping-cart"></i><span class="icon-name">fa-shopping-cart</span></li><li><i class="fa-sign-in"></i><span class="icon-name">fa-sign-in</span></li><li><i class="fa-sign-language"></i><span class="icon-name">fa-sign-language</span></li><li><i class="fa-sign-out"></i><span class="icon-name">fa-sign-out</span></li><li><i class="fa-signal"></i><span class="icon-name">fa-signal</span></li><li><i class="fa-signing"></i><span class="icon-name">fa-signing</span></li><li><i class="fa-simplybuilt"></i><span class="icon-name">fa-simplybuilt</span></li><li><i class="fa-sitemap"></i><span class="icon-name">fa-sitemap</span></li><li><i class="fa-skyatlas"></i><span class="icon-name">fa-skyatlas</span></li><li><i class="fa-skype"></i><span class="icon-name">fa-skype</span></li><li><i class="fa-slack"></i><span class="icon-name">fa-slack</span></li><li><i class="fa-sliders"></i><span class="icon-name">fa-sliders</span></li><li><i class="fa-slideshare"></i><span class="icon-name">fa-slideshare</span></li><li><i class="fa-smile-o"></i><span class="icon-name">fa-smile-o</span></li><li><i class="fa-snapchat"></i><span class="icon-name">fa-snapchat</span></li><li><i class="fa-snapchat-ghost"></i><span class="icon-name">fa-snapchat-ghost</span></li><li><i class="fa-snapchat-square"></i><span class="icon-name">fa-snapchat-square</span></li><li><i class="fa-soccer-ball-o"></i><span class="icon-name">fa-soccer-ball-o</span></li><li><i class="fa-sort"></i><span class="icon-name">fa-sort</span></li><li><i class="fa-sort-alpha-asc"></i><span class="icon-name">fa-sort-alpha-asc</span></li><li><i class="fa-sort-alpha-desc"></i><span class="icon-name">fa-sort-alpha-desc</span></li><li><i class="fa-sort-amount-asc"></i><span class="icon-name">fa-sort-amount-asc</span></li><li><i class="fa-sort-amount-desc"></i><span class="icon-name">fa-sort-amount-desc</span></li><li><i class="fa-sort-asc"></i><span class="icon-name">fa-sort-asc</span></li><li><i class="fa-sort-desc"></i><span class="icon-name">fa-sort-desc</span></li><li><i class="fa-sort-down"></i><span class="icon-name">fa-sort-down</span></li><li><i class="fa-sort-numeric-asc"></i><span class="icon-name">fa-sort-numeric-asc</span></li><li><i class="fa-sort-numeric-desc"></i><span class="icon-name">fa-sort-numeric-desc</span></li><li><i class="fa-sort-up"></i><span class="icon-name">fa-sort-up</span></li><li><i class="fa-soundcloud"></i><span class="icon-name">fa-soundcloud</span></li><li><i class="fa-space-shuttle"></i><span class="icon-name">fa-space-shuttle</span></li><li><i class="fa-spinner"></i><span class="icon-name">fa-spinner</span></li><li><i class="fa-spoon"></i><span class="icon-name">fa-spoon</span></li><li><i class="fa-spotify"></i><span class="icon-name">fa-spotify</span></li><li><i class="fa-square"></i><span class="icon-name">fa-square</span></li><li><i class="fa-square-o"></i><span class="icon-name">fa-square-o</span></li><li><i class="fa-stack-exchange"></i><span class="icon-name">fa-stack-exchange</span></li><li><i class="fa-stack-overflow"></i><span class="icon-name">fa-stack-overflow</span></li><li><i class="fa-star"></i><span class="icon-name">fa-star</span></li><li><i class="fa-star-half"></i><span class="icon-name">fa-star-half</span></li><li><i class="fa-star-half-empty"></i><span class="icon-name">fa-star-half-empty</span></li><li><i class="fa-star-half-full"></i><span class="icon-name">fa-star-half-full</span></li><li><i class="fa-star-half-o"></i><span class="icon-name">fa-star-half-o</span></li><li><i class="fa-star-o"></i><span class="icon-name">fa-star-o</span></li><li><i class="fa-steam"></i><span class="icon-name">fa-steam</span></li><li><i class="fa-steam-square"></i><span class="icon-name">fa-steam-square</span></li><li><i class="fa-step-backward"></i><span class="icon-name">fa-step-backward</span></li><li><i class="fa-step-forward"></i><span class="icon-name">fa-step-forward</span></li><li><i class="fa-stethoscope"></i><span class="icon-name">fa-stethoscope</span></li><li><i class="fa-sticky-note"></i><span class="icon-name">fa-sticky-note</span></li><li><i class="fa-sticky-note-o"></i><span class="icon-name">fa-sticky-note-o</span></li><li><i class="fa-stop"></i><span class="icon-name">fa-stop</span></li><li><i class="fa-stop-circle"></i><span class="icon-name">fa-stop-circle</span></li><li><i class="fa-stop-circle-o"></i><span class="icon-name">fa-stop-circle-o</span></li><li><i class="fa-street-view"></i><span class="icon-name">fa-street-view</span></li><li><i class="fa-strikethrough"></i><span class="icon-name">fa-strikethrough</span></li><li><i class="fa-stumbleupon"></i><span class="icon-name">fa-stumbleupon</span></li><li><i class="fa-stumbleupon-circle"></i><span class="icon-name">fa-stumbleupon-circle</span></li><li><i class="fa-subscript"></i><span class="icon-name">fa-subscript</span></li><li><i class="fa-subway"></i><span class="icon-name">fa-subway</span></li><li><i class="fa-suitcase"></i><span class="icon-name">fa-suitcase</span></li><li><i class="fa-sun-o"></i><span class="icon-name">fa-sun-o</span></li><li><i class="fa-superscript"></i><span class="icon-name">fa-superscript</span></li><li><i class="fa-support"></i><span class="icon-name">fa-support</span></li><li><i class="fa-table"></i><span class="icon-name">fa-table</span></li><li><i class="fa-tablet"></i><span class="icon-name">fa-tablet</span></li><li><i class="fa-tachometer"></i><span class="icon-name">fa-tachometer</span></li><li><i class="fa-tag"></i><span class="icon-name">fa-tag</span></li><li><i class="fa-tags"></i><span class="icon-name">fa-tags</span></li><li><i class="fa-tasks"></i><span class="icon-name">fa-tasks</span></li><li><i class="fa-taxi"></i><span class="icon-name">fa-taxi</span></li><li><i class="fa-television"></i><span class="icon-name">fa-television</span></li><li><i class="fa-tencent-weibo"></i><span class="icon-name">fa-tencent-weibo</span></li><li><i class="fa-terminal"></i><span class="icon-name">fa-terminal</span></li><li><i class="fa-text-height"></i><span class="icon-name">fa-text-height</span></li><li><i class="fa-text-width"></i><span class="icon-name">fa-text-width</span></li><li><i class="fa-th"></i><span class="icon-name">fa-th</span></li><li><i class="fa-th-large"></i><span class="icon-name">fa-th-large</span></li><li><i class="fa-th-list"></i><span class="icon-name">fa-th-list</span></li><li><i class="fa-themeisle"></i><span class="icon-name">fa-themeisle</span></li><li><i class="fa-thumb-tack"></i><span class="icon-name">fa-thumb-tack</span></li><li><i class="fa-thumbs-down"></i><span class="icon-name">fa-thumbs-down</span></li><li><i class="fa-thumbs-o-down"></i><span class="icon-name">fa-thumbs-o-down</span></li><li><i class="fa-thumbs-o-up"></i><span class="icon-name">fa-thumbs-o-up</span></li><li><i class="fa-thumbs-up"></i><span class="icon-name">fa-thumbs-up</span></li><li><i class="fa-ticket"></i><span class="icon-name">fa-ticket</span></li><li><i class="fa-times"></i><span class="icon-name">fa-times</span></li><li><i class="fa-times-circle"></i><span class="icon-name">fa-times-circle</span></li><li><i class="fa-times-circle-o"></i><span class="icon-name">fa-times-circle-o</span></li><li><i class="fa-tint"></i><span class="icon-name">fa-tint</span></li><li><i class="fa-toggle-down"></i><span class="icon-name">fa-toggle-down</span></li><li><i class="fa-toggle-left"></i><span class="icon-name">fa-toggle-left</span></li><li><i class="fa-toggle-off"></i><span class="icon-name">fa-toggle-off</span></li><li><i class="fa-toggle-on"></i><span class="icon-name">fa-toggle-on</span></li><li><i class="fa-toggle-right"></i><span class="icon-name">fa-toggle-right</span></li><li><i class="fa-toggle-up"></i><span class="icon-name">fa-toggle-up</span></li><li><i class="fa-trademark"></i><span class="icon-name">fa-trademark</span></li><li><i class="fa-train"></i><span class="icon-name">fa-train</span></li><li><i class="fa-transgender"></i><span class="icon-name">fa-transgender</span></li><li><i class="fa-transgender-alt"></i><span class="icon-name">fa-transgender-alt</span></li><li><i class="fa-trash"></i><span class="icon-name">fa-trash</span></li><li><i class="fa-trash-o"></i><span class="icon-name">fa-trash-o</span></li><li><i class="fa-tree"></i><span class="icon-name">fa-tree</span></li><li><i class="fa-trello"></i><span class="icon-name">fa-trello</span></li><li><i class="fa-tripadvisor"></i><span class="icon-name">fa-tripadvisor</span></li><li><i class="fa-trophy"></i><span class="icon-name">fa-trophy</span></li><li><i class="fa-truck"></i><span class="icon-name">fa-truck</span></li><li><i class="fa-try"></i><span class="icon-name">fa-try</span></li><li><i class="fa-tty"></i><span class="icon-name">fa-tty</span></li><li><i class="fa-tumblr"></i><span class="icon-name">fa-tumblr</span></li><li><i class="fa-tumblr-square"></i><span class="icon-name">fa-tumblr-square</span></li><li><i class="fa-turkish-lira"></i><span class="icon-name">fa-turkish-lira</span></li><li><i class="fa-tv"></i><span class="icon-name">fa-tv</span></li><li><i class="fa-twitch"></i><span class="icon-name">fa-twitch</span></li><li><i class="fa-twitter"></i><span class="icon-name">fa-twitter</span></li><li><i class="fa-twitter-square"></i><span class="icon-name">fa-twitter-square</span></li><li><i class="fa-umbrella"></i><span class="icon-name">fa-umbrella</span></li><li><i class="fa-underline"></i><span class="icon-name">fa-underline</span></li><li><i class="fa-undo"></i><span class="icon-name">fa-undo</span></li><li><i class="fa-universal-access"></i><span class="icon-name">fa-universal-access</span></li><li><i class="fa-university"></i><span class="icon-name">fa-university</span></li><li><i class="fa-unlink"></i><span class="icon-name">fa-unlink</span></li><li><i class="fa-unlock"></i><span class="icon-name">fa-unlock</span></li><li><i class="fa-unlock-alt"></i><span class="icon-name">fa-unlock-alt</span></li><li><i class="fa-unsorted"></i><span class="icon-name">fa-unsorted</span></li><li><i class="fa-upload"></i><span class="icon-name">fa-upload</span></li><li><i class="fa-usb"></i><span class="icon-name">fa-usb</span></li><li><i class="fa-usd"></i><span class="icon-name">fa-usd</span></li><li><i class="fa-user"></i><span class="icon-name">fa-user</span></li><li><i class="fa-user-md"></i><span class="icon-name">fa-user-md</span></li><li><i class="fa-user-plus"></i><span class="icon-name">fa-user-plus</span></li><li><i class="fa-user-secret"></i><span class="icon-name">fa-user-secret</span></li><li><i class="fa-user-times"></i><span class="icon-name">fa-user-times</span></li><li><i class="fa-users"></i><span class="icon-name">fa-users</span></li><li><i class="fa-venus"></i><span class="icon-name">fa-venus</span></li><li><i class="fa-venus-double"></i><span class="icon-name">fa-venus-double</span></li><li><i class="fa-venus-mars"></i><span class="icon-name">fa-venus-mars</span></li><li><i class="fa-viacoin"></i><span class="icon-name">fa-viacoin</span></li><li><i class="fa-viadeo"></i><span class="icon-name">fa-viadeo</span></li><li><i class="fa-viadeo-square"></i><span class="icon-name">fa-viadeo-square</span></li><li><i class="fa-video-camera"></i><span class="icon-name">fa-video-camera</span></li><li><i class="fa-vimeo"></i><span class="icon-name">fa-vimeo</span></li><li><i class="fa-vimeo-square"></i><span class="icon-name">fa-vimeo-square</span></li><li><i class="fa-vine"></i><span class="icon-name">fa-vine</span></li><li><i class="fa-vk"></i><span class="icon-name">fa-vk</span></li><li><i class="fa-volume-control-phone"></i><span class="icon-name">fa-volume-control-phone</span></li><li><i class="fa-volume-down"></i><span class="icon-name">fa-volume-down</span></li><li><i class="fa-volume-off"></i><span class="icon-name">fa-volume-off</span></li><li><i class="fa-volume-up"></i><span class="icon-name">fa-volume-up</span></li><li><i class="fa-warning"></i><span class="icon-name">fa-warning</span></li><li><i class="fa-wechat"></i><span class="icon-name">fa-wechat</span></li><li><i class="fa-weibo"></i><span class="icon-name">fa-weibo</span></li><li><i class="fa-weixin"></i><span class="icon-name">fa-weixin</span></li><li><i class="fa-whatsapp"></i><span class="icon-name">fa-whatsapp</span></li><li><i class="fa-wheelchair"></i><span class="icon-name">fa-wheelchair</span></li><li><i class="fa-wheelchair-alt"></i><span class="icon-name">fa-wheelchair-alt</span></li><li><i class="fa-wifi"></i><span class="icon-name">fa-wifi</span></li><li><i class="fa-wikipedia-w"></i><span class="icon-name">fa-wikipedia-w</span></li><li><i class="fa-windows"></i><span class="icon-name">fa-windows</span></li><li><i class="fa-won"></i><span class="icon-name">fa-won</span></li><li><i class="fa-wordpress"></i><span class="icon-name">fa-wordpress</span></li><li><i class="fa-wpbeginner"></i><span class="icon-name">fa-wpbeginner</span></li><li><i class="fa-wpforms"></i><span class="icon-name">fa-wpforms</span></li><li><i class="fa-wrench"></i><span class="icon-name">fa-wrench</span></li><li><i class="fa-xing"></i><span class="icon-name">fa-xing</span></li><li><i class="fa-xing-square"></i><span class="icon-name">fa-xing-square</span></li><li><i class="fa-y-combinator"></i><span class="icon-name">fa-y-combinator</span></li><li><i class="fa-y-combinator-square"></i><span class="icon-name">fa-y-combinator-square</span></li><li><i class="fa-yahoo"></i><span class="icon-name">fa-yahoo</span></li><li><i class="fa-yc"></i><span class="icon-name">fa-yc</span></li><li><i class="fa-yelp"></i><span class="icon-name">fa-yelp</span></li><li><i class="fa-yen"></i><span class="icon-name">fa-yen</span></li><li><i class="fa-yoast"></i><span class="icon-name">fa-yoast</span></li><li><i class="fa-youtube"></i><span class="icon-name">fa-youtube</span></li><li><i class="fa-youtube-play"></i><span class="icon-name">fa-youtube-play</span></li><li><i class="fa-youtube-square"></i><span class="icon-name">fa-youtube-square</span></li>';
?>
<!-- IMIC Framework Shortcode Panel -->
<!-- OPEN html -->
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- OPEN head -->

<head>
    <!-- Title & Meta -->
    <title><?php _e('IMIC Framework Shortcodes', 'imithemes'); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
    <!-- LOAD scripts -->
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>shortcodes.js?ver=3"></script>
    <script language="javascript" type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>shortcode.embed.js?ver=3"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <base target="_self" />
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/font-awesome.min.css?ver=2.0.1" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/line-icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo plugin_dir_url(__FILE__); ?>base.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo plugin_dir_url(__FILE__); ?>shortcodes-style.css" rel="stylesheet" type="text/css" />
    <!-- CLOSE head -->
</head>
<!-- OPEN body -->

<body onLoad="tinyMCEPopup.executeOnLoad('init();');
            document.body.style.display = '';" id="link">
    <!-- OPEN imicframework_shortcode_form -->
    <form name="imicframework_shortcode_form" action="#">
        <!-- OPEN #shortcode_wrap -->
        <div id="shortcode_wrap">
            <!-- CLOSE #shortcode_panel -->
            <div id="shortcode_panel" class="current">
                <fieldset>
                    <h4><?php esc_html_e('Select a shortcode', 'vestige-core'); ?></h4>
                    <div class="option">
                        <label for="shortcode-select"><?php esc_html_e('Shortcode', 'vestige-core'); ?></label>
                        <select id="shortcode-select" name="shortcode-select">
                            <option value="0"></option>
                            <option value="shortcode-accordion"><?php esc_html_e('Accordions', 'vestige-core'); ?></option>
                            <option value="shortcode-buttons"><?php esc_html_e('Button', 'vestige-core'); ?></option>
                            <option value="shortcode-columns"><?php esc_html_e('Columns', 'vestige-core'); ?></option>
                            <option value="shortcode-counters"><?php esc_html_e('Counters', 'vestige-core'); ?></option>
                            <option value="shortcode-form"><?php esc_html_e('Form', 'vestige-core'); ?></option>
                            <option value="shortcode-gmap"><?php esc_html_e('Google Map', 'vestige-core'); ?></option>
                            <option value="shortcode-calendar"><?php esc_html_e('Event Calendar', 'vestige-core'); ?></option>
                            <option value="shortcode-calendar-exhibition"><?php _e('Exhibition Calendar', 'vestige-core'); ?></option>
                            <option value="shortcode-icons"><?php esc_html_e('Icons', 'vestige-core'); ?></option>
                            <option value="shortcode-icons-box"><?php esc_html_e('Icons Box', 'vestige-core'); ?></option>
                            <option value="shortcode-lists"><?php esc_html_e('Lists', 'vestige-core'); ?></option>
                            <option value="shortcode-modal"><?php esc_html_e('Modal Box', 'vestige-core'); ?></option>
                            <option value="shortcode-progressbar"><?php esc_html_e('Progress Bar', 'vestige-core'); ?></option>
                            <option value="shortcode-pricing-table"><?php esc_html_e('Pricing Table', 'vestige-core'); ?></option>
                            <option value="shortcode-tables"><?php esc_html_e('Table', 'vestige-core'); ?></option>
                            <option value="shortcode-video"><?php esc_html_e('Video', 'vestige-core'); ?></option>
                            <option value="shortcode-tooltip"><?php esc_html_e('Tooltip', 'vestige-core'); ?></option>
                            <option value="shortcode-typography"><?php esc_html_e('Typography', 'vestige-core'); ?></option>
                            <option value="shortcode-tabs"><?php esc_html_e('Tabs', 'vestige-core'); ?></option>
                            <option value="shortcode-toggle"><?php esc_html_e('Toggles', 'vestige-core'); ?></option>
                        </select>
                    </div>
                    <!--//////////////////////////////
                        ////	BUTTONS
                        //////////////////////////////-->
                    <div id="shortcode-buttons">
                        <h5><?php esc_html_e('Buttons', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="button-colour"><?php esc_html_e('Button colour', 'vestige-core'); ?></label>
                            <select id="button-colour" name="button-colour">
                                <option value="btn-default"><?php esc_html_e('Default', 'vestige-core'); ?></option>
                                <option value="btn-primary"><?php esc_html_e('Primary', 'vestige-core'); ?></option>
                                <option value="btn-success"><?php esc_html_e('Success', 'vestige-core'); ?></option>
                                <option value="btn-info"><?php esc_html_e('Info', 'vestige-core'); ?></option>
                                <option value="btn-warning"><?php esc_html_e('Warning', 'vestige-core'); ?></option>
                                <option value="btn-danger"><?php esc_html_e('Danger', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="button-type"><?php esc_html_e('Button type', 'vestige-core'); ?></label>
                            <select id="button-type" name="button-type">
                                <option value="enabled"><?php esc_html_e('Enabled', 'vestige-core'); ?></option>
                                <option value="disabled"><?php esc_html_e('Disabled', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="button-text"><?php esc_html_e('Button text', 'vestige-core'); ?></label>
                            <input id="button-text" name="button-text" type="text" value="<?php esc_html_e('Button text', 'vestige-core'); ?>" />
                        </div>
                        <div class="option">
                            <label for="button-url"><?php esc_html_e('Button URL', 'vestige-core'); ?></label>
                            <input id="button-url" name="button-url" type="text" value="http://" />
                        </div>
                        <div class="option">
                            <label for="button-target" class="for-checkbox"><?php esc_html_e('Open link in a new window?', 'vestige-core'); ?></label>
                            <input id="button-target" class="checkbox" name="button-target" type="checkbox" />
                        </div>
                        <div class="option">
                            <label for="button-size"><?php esc_html_e('Button Size', 'vestige-core'); ?></label>
                            <select id="button-size" name="button-size">
                                <option value=""><?php esc_html_e('Default', 'vestige-core'); ?></option>
                                <option value="btn-xs"><?php esc_html_e('Extra Small', 'vestige-core'); ?></option>
                                <option value="btn-sm"><?php esc_html_e('Small', 'vestige-core'); ?></option>
                                <option value="btn-lg"><?php esc_html_e('Large', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="button-extraclass"><?php esc_html_e('Button Extra Class', 'vestige-core'); ?></label>
                            <input id="button-extraclass" name="button-extraclass" type="text" value="" />
                            <p class="info"><?php esc_html_e('Optional, for extra styling/custom colour control.', 'vestige-core'); ?></a></p>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	ICONS
                        //////////////////////////////-->
                    <div id="shortcode-icons">
                        <h5><?php esc_html_e('Icons', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="icon-image"><?php esc_html_e('Icon image', 'vestige-core'); ?></label>
                            <input id="icon-image" name="icon-image" type="text" value="" style="visibility: hidden;" />
                            <ul class="font-icon-grid"><?php echo '' . $icon_list; ?></ul>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	VIDEO
                        //////////////////////////////-->
                    <div id="shortcode-video">
                        <h5><?php esc_html_e('Video', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="video-url"><?php esc_html_e('Insert Vimeo or Youtube URL', 'vestige-core'); ?></label>
                            <input id="video-url" name="video-url" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="video-width"><?php esc_html_e('Video Width', 'vestige-core'); ?></label>
                            <input id="video-width" name="video-width" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="video-height"><?php esc_html_e('Video Height', 'vestige-core'); ?></label>
                            <input id="video-height" name="video-height" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="video-full"><?php esc_html_e('Full Width', 'vestige-core'); ?></label>
                            <select id="video-full" name="video-full">
                                <option value="0"><?php esc_html_e('No', 'vestige-core'); ?></option>
                                <option value="1"><?php esc_html_e('Yes', 'vestige-core'); ?></option>
                            </select>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	GOOGLE MAP
                        //////////////////////////////-->
                    <div id="shortcode-gmap">
                        <h5><?php esc_html_e('Google Map', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="map-address"><?php esc_html_e('Address', 'vestige-core'); ?></label>
                            <input id="map-address" name="map-address" type="text" value="" />
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	ICONS BOX
                        //////////////////////////////-->
                    <div id="shortcode-icons-box">
                        <h5><?php esc_html_e('Icons Box', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="icon-box-image"><?php echo esc_attr_e('Fonts Icon image', 'vestige-core'); ?></label>
                            <input id="icon-box-image" name="icon-box-image" type="text" value="" style="visibility: hidden;" />
                            <?php echo '<ul class="font-icon-grid">' . $icon_list . '</ul>'; ?>
                        </div>
                        <div class="option">
                            <label for="icon-title"><?php echo esc_attr_e('Title', 'vestige-core'); ?></label>
                            <input id="icon-title" name="icon-title" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="icon-description"><?php echo esc_attr_e('Description', 'vestige-core'); ?></label>
                            <input id="icon-description" name="icon-description" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="icon-link"><?php echo esc_attr_e('URL', 'vestige-core'); ?></label>
                            <input id="icon-link" name="icon-link" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="icon-type"><?php echo esc_attr_e('Select Icon Center', 'vestige-core'); ?></label>
                            <select id="icon-type" name="icon-type">
                                <option value="ibox-center"><?php echo esc_attr_e('Yes', 'vestige-core'); ?></option>
                                <option value=""><?php echo esc_attr_e('No', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="icon-outline"><?php echo esc_attr_e('Select Icon Outline', 'vestige-core'); ?></label>
                            <select id="icon-outline" name="icon-outline">
                                <option value="ibox-outline"><?php echo esc_attr_e('Yes', 'vestige-core'); ?></option>
                                <option value=""><?php echo esc_attr_e('No', 'vestige-core'); ?></option>
                                <option value="ibox-border"><?php echo esc_attr_e('Border', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="icon-shade"><?php echo esc_attr_e('Select Icon Shade', 'vestige-core'); ?></label>
                            <select id="icon-shade" name="icon-shade">
                                <option value="ibox-dark"><?php echo esc_attr_e('Dark', 'vestige-core'); ?></option>
                                <option value="ibox-light"><?php echo esc_attr_e('Light', 'vestige-core'); ?></option>
                                <option value=""><?php echo esc_attr_e('Default', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="icon-effect"><?php echo esc_attr_e('Select Icon Effect', 'vestige-core'); ?></label>
                            <select id="icon-effect" name="icon-effect">
                                <option value="ibox-effect"><?php echo esc_attr_e('Yes', 'vestige-core'); ?></option>
                                <option value=""><?php echo esc_attr_e('No', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="icon-box"><?php echo esc_attr_e('Select Icon Box', 'vestige-core'); ?></label>
                            <select id="icon-box" name="icon-box">
                                <option value=""><?php echo esc_attr_e('Rounded', 'vestige-core'); ?></option>
                                <option value="ibox-rounded"><?php echo esc_attr_e('Square', 'vestige-core'); ?></option>
                                <option value="ibox-plain"><?php echo esc_attr_e('Plain', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <!--<div class="option">
                                    <label for="icon-box-type"><?php echo esc_attr_e('Select Icon Box type', 'vestige-core'); ?></label>
                                    <select id="icon-box-type" name="icon-box-type">
                                        <option value="with_description"><?php echo esc_attr_e('With description', 'vestige-core'); ?></option>
                                        <option value="with_out_description"><?php echo esc_attr_e('With Out description', 'vestige-core'); ?></option>
                                    </select>
                                </div>-->
                    </div>
                    <!--//////////////////////////////
                        ////	TYPOGRAPHY
                        //////////////////////////////-->
                    <div id="shortcode-typography">
                        <h5><?php esc_html_e('Typography', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="typography-type"><?php esc_html_e('Type', 'vestige-core'); ?></label>
                            <select id="typography-type" name="typography-type">
                                <option value="0"></option>
                                <option value="typo-anchor"><?php esc_html_e('Anchor Tag', 'vestige-core'); ?></option>
                                <option value="typo-div"><?php esc_html_e('Div', 'vestige-core'); ?></option>
                                <option value="typo-heading"><?php esc_html_e('Heading', 'vestige-core'); ?></option>
                                <option value="typo-paragraph"><?php esc_html_e('Paragraph', 'vestige-core'); ?></option>
                                <option value="typo-span"><?php esc_html_e('Span Tag', 'vestige-core'); ?></option>
                                <option value="typo-divider"><?php esc_html_e('Divider', 'vestige-core'); ?></option>
                                <option value="typo-container"><?php esc_html_e('Row', 'vestige-core'); ?></option>
                                <option value="typo-section"><?php esc_html_e('Section', 'vestige-core'); ?></option>
                                <option value="typo-spacer"><?php esc_html_e('Spacer', 'vestige-core'); ?></option>
                                <option value="typo-alert"><?php esc_html_e('Alert Box', 'vestige-core'); ?></option>
                                <option value="typo-blockquote"><?php esc_html_e('Blockquote', 'vestige-core'); ?></option>
                                <option value="typo-dropcap"><?php esc_html_e('Dropcap', 'vestige-core'); ?></option>
                                <option value="typo-code"><?php esc_html_e('Code', 'vestige-core'); ?></option>
                                <option value="typo-label"><?php esc_html_e('Label', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <!-- ANCHOR TAG -->
                        <div id="typo-anchor">
                            <h5><?php esc_html_e('Anchor Tag', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="anchor-href"><?php esc_html_e('Anchor Link', 'vestige-core'); ?></label>
                                <input id="anchor-href" name="anchor-href" type="text" value="" />
                            </div>
                            <div class="option">
                                <label for="anchor-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="anchor-xclass" name="anchor-xclass" type="text" value="" />
                            </div>
                        </div>
                        <div id="typo-div">
                            <h5><?php esc_html_e('Div Tag', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="div-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="div-xclass" name="div-xclass" type="text" value="" />
                            </div>
                        </div>
                        <div id="typo-spacer">
                            <h5><?php esc_html_e('Spacer Tag', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="spacer-size"><?php esc_html_e('Select Spacer', 'vestige-core'); ?></label>
                                <select id="spacer-size" name="spacer-size">
                                    <option value="spacer-10"><?php esc_html_e('Spacer 10', 'vestige-core'); ?></option>
                                    <option value="spacer-20"><?php esc_html_e('Spacer 20', 'vestige-core'); ?></option>
                                    <option value="spacer-39"><?php esc_html_e('Spacer 30', 'vestige-core'); ?></option>
                                    <option value="spacer-40"><?php esc_html_e('Spacer 40', 'vestige-core'); ?></option>
                                    <option value="spacer-50"><?php esc_html_e('Spacer 50', 'vestige-core'); ?></option>
                                    <option value="spacer-75"><?php esc_html_e('Spacer 75', 'vestige-core'); ?></option>
                                    <option value="spacer-100"><?php esc_html_e('Spacer 100', 'vestige-core'); ?></option>
                                </select>
                            </div>
                            <div class="option">
                                <label for="spacer-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="spacer-xclass" name="spacer-xclass" type="text" value="" />
                            </div>
                        </div>
                        <div id="typo-section">
                            <h5><?php esc_html_e('Section Tag', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="section-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="section-xclass" name="section-xclass" type="text" value="" />
                            </div>
                        </div>
                        <!-- PARAGRAPH -->
                        <div id="typo-paragraph">
                            <h5><?php esc_html_e('Paragraph', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="paragraph-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="paragraph-xclass" name="paragraph-xclass" type="text" value="" />
                            </div>
                        </div>
                        <!-- SPAN -->
                        <div id="typo-span">
                            <h5><?php esc_html_e('Span Tag', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="span-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="span-xclass" name="span-xclass" type="text" value="" />
                            </div>
                        </div>
                        <!-- DIVIDER -->
                        <div id="typo-divider">
                            <h5><?php esc_html_e('Divider', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="divider-extra"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="divider-extra" name="divider-extra" type="text" value="" />
                            </div>
                        </div>
                        <!-- HEADINGS -->
                        <div id="typo-heading">
                            <h5><?php esc_html_e('Heading', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="heading-icon"><?php esc_html_e('Icon image', 'vestige-core'); ?></label>
                                <input id="heading-icon" name="heading-icon" type="text" value="" style="visibility: hidden;" />
                                <ul class="font-icon-grid"><?php echo '' . $icon_list; ?></ul>
                            </div>
                            <div class="option">
                                <label for="heading-type"><?php esc_html_e('Select Heading Type', 'vestige-core'); ?></label>
                                <select id="heading-type" name="heading-type">
                                    <option value="standard"><?php esc_html_e('Standard', 'vestige-core'); ?></option>
                                    <option value="block"><?php esc_html_e('Block Heading', 'vestige-core'); ?></option>
                                </select>
                            </div>
                            <div class="option">
                                <label for="heading-size"><?php esc_html_e('Select Heading Tag', 'vestige-core'); ?></label>
                                <select id="heading-size" name="heading-size">
                                    <option value="h1"><?php esc_html_e('H1', 'vestige-core'); ?></option>
                                    <option value="h2"><?php esc_html_e('H2', 'vestige-core'); ?></option>
                                    <option value="h3"><?php esc_html_e('H3', 'vestige-core'); ?></option>
                                    <option value="h4"><?php esc_html_e('H4', 'vestige-core'); ?></option>
                                    <option value="h5"><?php esc_html_e('H5', 'vestige-core'); ?></option>
                                    <option value="h6"><?php esc_html_e('H6', 'vestige-core'); ?></option>
                                </select>
                            </div>
                            <div class="option">
                                <label for="heading-extra"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="heading-extra" name="heading-extra" type="text" value="" />
                            </div>
                        </div>
                        <!-- ALERT BOX -->
                        <div id="typo-alert">
                            <h5><?php esc_html_e('Alert Box', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="alert-type"><?php esc_html_e('Select Alert Box type', 'vestige-core'); ?></label>
                                <select id="alert-type" name="alert-type">
                                    <option value="alert-standard"><?php esc_html_e('Standard', 'vestige-core'); ?></option>
                                    <option value="alert-warning"><?php esc_html_e('Warning', 'vestige-core'); ?></option>
                                    <option value="alert-error"><?php esc_html_e('Error', 'vestige-core'); ?></option>
                                    <option value="alert-info"><?php esc_html_e('Info', 'vestige-core'); ?></option>
                                    <option value="alert-success"><?php esc_html_e('Success', 'vestige-core'); ?></option>
                                </select>
                            </div>
                            <div class="option">
                                <label for="alert-close" class="for-checkbox"><?php esc_html_e('Add Close Button', 'vestige-core'); ?></label>
                                <input id="alert-close" value="" class="checkbox" name="alert-close" type="checkbox" />
                            </div>
                        </div>
                        <!-- BLOCKQUOTE -->
                        <div id="typo-blockquote">
                            <h5><?php esc_html_e('Blockquote', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="blockquote-name"><?php esc_html_e('Blockquote Author Name', 'vestige-core'); ?></label>
                                <input id="blockquote-name" name="blockquote-name" type="text" value="" />
                            </div>
                        </div>
                        <!-- DROPCAP -->
                        <div id="typo-dropcap">
                            <h5><?php esc_html_e('Dropcap', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="dropcap-type"><?php esc_html_e('Dropcap Type', 'vestige-core'); ?></label>
                                <select id="dropcap-type" name="dropcap-type">
                                    <option value=""><?php esc_html_e('Style 1', 'vestige-core'); ?></option>
                                    <option value="secondary"><?php esc_html_e('Style 2', 'vestige-core'); ?></option>
                                </select>
                            </div>
                        </div>
                        <!-- CODE -->
                        <div id="typo-code">
                            <h5><?php esc_html_e('Code', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="code-type"><?php esc_html_e('Code Type', 'vestige-core'); ?></label>
                                <select id="code-type" name="code-type">
                                    <option value=""><?php esc_html_e('Standard', 'vestige-core'); ?></option>
                                    <option value="inline"><?php _e('Inline', 'vestige-core'); ?></option>
                                </select>
                            </div>
                        </div>
                        <!-- Container -->
                        <div id="typo-container">
                            <h5><?php esc_html_e('Container', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="container-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                                <input id="container-xclass" name="container-xclass" type="text" value="" />
                            </div>
                        </div>
                        <!-- LABEL TAGS -->
                        <div id="typo-label">
                            <h5><?php esc_html_e('Label', 'vestige-core'); ?></h5>
                            <div class="option">
                                <label for="label-type"><?php esc_html_e('Select Label Tag', 'vestige-core'); ?></label>
                                <select id="label-type" name="label-type">
                                    <option value="label-default"><?php esc_html_e('Default', 'vestige-core'); ?></option>
                                    <option value="label-primary"><?php esc_html_e('Primary', 'vestige-core'); ?></option>
                                    <option value="label-success"><?php esc_html_e('Success', 'vestige-core'); ?></option>
                                    <option value="label-info"><?php esc_html_e('Info', 'vestige-core'); ?></option>
                                    <option value="label-warning"><?php esc_html_e('Warning', 'vestige-core'); ?></option>
                                    <option value="label-danger"><?php esc_html_e('Danger', 'vestige-core'); ?></option>
                                    <option value="label-dark"><?php esc_html_e('Dark', 'vestige-core'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	COLUMNS
                        //////////////////////////////-->
                    <div id="shortcode-columns" class="shortcode-option">
                        <h5><?php esc_html_e('Columns', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="column-options"><?php esc_html_e('Layout', 'vestige-core'); ?></label>
                            <select id="column-options" name="column-options">
                                <option value="0"></option>
                                <option value="one_full"><?php esc_html_e('1', 'vestige-core'); ?></option>
                                <option value="two_halves"><?php esc_html_e('1/2 + 1/2', 'vestige-core'); ?></option>
                                <option value="one_halves_two_quarters"><?php esc_html_e('1/2 + 1/4 + 1/4', 'vestige-core'); ?></option>
                                <option value="three_thirds"><?php esc_html_e('1/3 + 1/3 + 1/3', 'vestige-core'); ?></option>
                                <option value="three_two_thirds"><?php esc_html_e('1/3 + 2/3', 'vestige-core'); ?></option>
                                <option value="two_thirds_one_thirds"><?php esc_html_e('2/3 + 1/3', 'vestige-core'); ?></option>
                                <option value="two_quarters_one_halves"><?php esc_html_e('1/4 + 1/4 + 1/2', 'vestige-core'); ?></option>
                                <option value="one_quarters_one_halves_one_quarters"><?php esc_html_e('1/4 + 1/2 + 1/4', 'vestige-core'); ?></option>
                                <option value="four_quarters"><?php esc_html_e('1/4 + 1/4 + 1/4 + 1/4', 'vestige-core'); ?></option>
                                <option value="six_one_sixths"><?php esc_html_e('1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6', 'vestige-core'); ?></option>
                                <option value=""><?php esc_html_e('Custom', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="column-xclass"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                            <input id="column-xclass" name="column-xclass" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="column-animation"><?php esc_html_e('Animation', 'vestige-core'); ?></label>
                            <select id="column-animation" name="column-animation">
                                <option value=""></option>
                                <option value="bounceInRight"><?php esc_html_e('From Right', 'vestige-core'); ?></option>
                                <option value="bounceInLeft"><?php esc_html_e('From Left', 'vestige-core'); ?></option>
                            </select>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	PROGRESS BAR
                        //////////////////////////////-->
                    <div id="shortcode-progressbar" class="shortcode-option">
                        <h5><?php esc_html_e('Progress Bar', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="progressbar-percentage"><?php esc_html_e('Percentage', 'vestige-core'); ?></label>
                            <input id="progressbar-percentage" name="progressbar-percentage" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter the percentage of the progress bar.', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="progressbar-text"><?php esc_html_e('Progress Text', 'vestige-core'); ?></label>
                            <input id="progressbar-text" name="progressbar-text" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter the text that you\'d like shown above the bar, i.e. "COMPLETED".', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="progressbar-value"><?php esc_html_e('Progress Value', 'vestige-core'); ?></label>
                            <input id="progressbar-value" name="progressbar-value" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter value that you\'d like shown at the end of the bar on completion, i.e. "90".', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="progressbar-type"><?php esc_html_e('Progress Bar Type', 'vestige-core'); ?></label>
                            <select id="progressbar-type" name="progressbar-type">
                                <option value=""><?php esc_html_e('Standard', 'vestige-core'); ?></option>
                                <option value="progress-striped"><?php esc_html_e('Striped', 'vestige-core'); ?></option>
                                <option value="colored"><?php esc_html_e('Colored', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="progressbar-colour"><?php esc_html_e('Progress Bar Colour Type', 'vestige-core'); ?></label>
                            <select id="progressbar-colour" name="progressbar-colour">
                                <option value="progress-bar-primary"><?php esc_html_e('Primary', 'vestige-core'); ?></option>
                                <option value="progress-bar-success"><?php esc_html_e('Success', 'vestige-core'); ?></option>
                                <option value="progress-bar-info"><?php esc_html_e('Info', 'vestige-core'); ?></option>
                                <option value="progress-bar-warning"><?php esc_html_e('Warning', 'vestige-core'); ?></option>
                                <option value="progress-bar-danger"><?php esc_html_e('Danger', 'vestige-core'); ?></option>
                            </select>
                            <p class="info"><?php esc_html_e('Select progress bar color for progress bar type striped and colored.', 'vestige-core'); ?></p>
                        </div>
                    </div>
                    <!--//////////////////////////////
                                                ////	MODAL BOX
                                                //////////////////////////////-->
                    <div id="shortcode-modal" class="shortcode-option">
                        <h5><?php esc_html_e('Modal Box', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="modal-id"><?php esc_html_e('Modal Box ID', 'vestige-core'); ?></label>
                            <input id="modal-id" name="modal-id" type="text" value='' />
                        </div>
                        <div class="option">
                            <label for="modal-title"><?php esc_html_e('Modal Box Title', 'vestige-core'); ?></label>
                            <input id="modal-title" name="modal-title" type="text" value='' />
                        </div>
                        <div class="option">
                            <label for="modal-text"><?php esc_html_e('Modal Box Body Text', 'vestige-core'); ?></label>
                            <input id="modal-text" name="modal-text" type="text" value='' />
                        </div>
                        <div class="option">
                            <label for="modal-button"><?php esc_html_e('Modal Box Button Text', 'vestige-core'); ?></label>
                            <input id="modal-button" name="modal-button" type="text" value='' />
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	TOOLTIP
                        //////////////////////////////-->
                    <div id="shortcode-tooltip" class="shortcode-option">
                        <h5><?php esc_html_e('Tooltip', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="tooltip-text"><?php esc_html_e('Text', 'vestige-core'); ?></label>
                            <input id="tooltip-text" name="tooltip-text" type="text" value='' />
                            <p class="info"><?php esc_html_e('Enter the text for the tooltip.', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="tooltip-link"><?php esc_html_e('Link', 'vestige-core'); ?></label>
                            <input id="tooltip-link" name="tooltip-link" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter the link that the tooltip text links to.', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="tooltip-direction"><?php esc_html_e('Direction', 'vestige-core'); ?></label>
                            <select id="tooltip-direction" name="tooltip-direction">
                                <option value="top"><?php esc_html_e('Top', 'vestige-core'); ?></option>
                                <option value="bottom"><?php esc_html_e('Bottom', 'vestige-core'); ?></option>
                                <option value="left"><?php esc_html_e('Left', 'vestige-core'); ?></option>
                                <option value="right"><?php esc_html_e('Right', 'vestige-core'); ?></option>
                            </select>
                            <p class="info"><?php esc_html_e('Choose the direction in which the tooltip appears.', 'vestige-core'); ?></p>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	COUNTERS
                        //////////////////////////////-->
                    <div id="shortcode-counters" class="shortcode-option">
                        <h5><?php esc_html_e('Counters', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="count-to"><?php esc_html_e('To Value', 'vestige-core'); ?></label>
                            <input id="count-to" name="count-to" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter the number from which the counter counts up to.', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="count-subject"><?php esc_html_e('Subject Text', 'vestige-core'); ?></label>
                            <input id="count-subject" name="count-subject" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter the text which you would like to show below the counter.', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="count-speed"><?php esc_html_e('Speed', 'vestige-core'); ?></label>
                            <input id="count-speed" name="count-speed" type="text" value="" />
                            <p class="info"><?php esc_html_e('Enter the time you want the counter to take to complete, this is in milliseconds and optional. The default is 2000.', 'vestige-core'); ?></p>
                        </div>
                        <div class="option">
                            <label for="count-image"><?php esc_html_e('Icon image', 'vestige-core'); ?></label>
                            <input id="count-image" name="count-image" type="text" value="" style="visibility: hidden;" />
                            <ul class="font-icon-grid"><?php echo '' . $icon_list; ?></ul>
                        </div>
                        <div class="option">
                            <label for="count-textstyle"><?php esc_html_e('Text style', 'vestige-core'); ?></label>
                            <select id="count-textstyle" name="count-textstyle">
                                <option value="div"><?php esc_html_e('Default', 'vestige-core'); ?></option>
                                <option value="h3"><?php esc_html_e('H3', 'vestige-core'); ?></option>
                                <option value="h6"><?php esc_html_e('H6', 'vestige-core'); ?></option>
                            </select>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	PRICING TABLE
                        //////////////////////////////-->
                    <div id="shortcode-pricing-table" class="shortcode-option">
                        <h5><?php esc_html_e('Pricing Table', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="pricing-table-columns"><?php esc_html_e('Number of columns', 'vestige-core'); ?></label>
                            <select id="pricing-table-columns" name="pricing-table-columns">
                                <option value="3"><?php esc_html_e('3', 'vestige-core'); ?></option>
                                <option value="4"><?php esc_html_e('4', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="pricing-table-active"><?php esc_html_e('Active Column', 'vestige-core'); ?></label>
                            <select id="pricing-table-active" name="pricing-table-active">
                                <option value="1"><?php esc_html_e('1', 'vestige-core'); ?></option>
                                <option value="2"><?php esc_html_e('2', 'vestige-core'); ?></option>
                                <option value="3"><?php esc_html_e('3', 'vestige-core'); ?></option>
                                <option value="4"><?php esc_html_e('4', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="pricing-table-rows"><?php esc_html_e('Number of rows', 'vestige-core'); ?></label>
                            <select id="pricing-table-rows" name="pricing-table-rows">
                                <option value="1"><?php esc_html_e('1', 'vestige-core'); ?></option>
                                <option value="2"><?php esc_html_e('2', 'vestige-core'); ?></option>
                                <option value="3"><?php esc_html_e('3', 'vestige-core'); ?></option>
                                <option value="4"><?php esc_html_e('4', 'vestige-core'); ?></option>
                                <option value="5"><?php esc_html_e('5', 'vestige-core'); ?></option>
                                <option value="6"><?php esc_html_e('6', 'vestige-core'); ?></option>
                                <option value="7"><?php esc_html_e('7', 'vestige-core'); ?></option>
                                <option value="8"><?php esc_html_e('8', 'vestige-core'); ?></option>
                                <option value="9"><?php esc_html_e('9', 'vestige-core'); ?></option>
                                <option value="10"><?php esc_html_e('10', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="pricing-currency"><?php esc_html_e('Currency', 'vestige-core'); ?></label>
                            <input id="pricing-currency" name="pricing-currency" type="text" value="" />
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	TABLE
                        //////////////////////////////-->
                    <div id="shortcode-tables" class="shortcode-option">
                        <h5><?php esc_html_e('Table', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="table-type"><?php esc_html_e('Table style', 'vestige-core'); ?></label>
                            <select id="table-type" name="table-type">
                                <option value="table-striped"><?php esc_html_e('Striped table', 'vestige-core'); ?></option>
                                <option value="table-bordered"><?php esc_html_e('Bordered table', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="table-head"><?php esc_html_e('Table Head', 'vestige-core'); ?></label>
                            <select id="table-head" name="table-head">
                                <option value="yes"><?php esc_html_e('Yes', 'vestige-core'); ?></option>
                                <option value="no"><?php esc_html_e('No', 'vestige-core'); ?></option>
                                <p class="info"><?php esc_html_e('Include a heading row in the table', 'vestige-core'); ?></p>
                            </select>
                        </div>
                        <div class="option">
                            <label for="table-columns"><?php esc_html_e('Number of columns', 'vestige-core'); ?></label>
                            <select id="table-columns" name="table-columns">
                                <option value="1"><?php esc_html_e('1', 'vestige-core'); ?></option>
                                <option value="2"><?php esc_html_e('2', 'vestige-core'); ?></option>
                                <option value="3"><?php esc_html_e('3', 'vestige-core'); ?></option>
                                <option value="4"><?php esc_html_e('4', 'vestige-core'); ?></option>
                                <option value="5"><?php esc_html_e('5', 'vestige-core'); ?></option>
                                <option value="6"><?php esc_html_e('6', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="table-rows"><?php esc_html_e('Number of rows', 'vestige-core'); ?></label>
                            <select id="table-rows" name="table-rows">
                                <option value="1"><?php esc_html_e('1', 'vestige-core'); ?></option>
                                <option value="2"><?php esc_html_e('2', 'vestige-core'); ?></option>
                                <option value="3"><?php esc_html_e('3', 'vestige-core'); ?></option>
                                <option value="4"><?php esc_html_e('4', 'vestige-core'); ?></option>
                                <option value="5"><?php esc_html_e('5', 'vestige-core'); ?></option>
                                <option value="6"><?php esc_html_e('6', 'vestige-core'); ?></option>
                                <option value="7"><?php esc_html_e('7', 'vestige-core'); ?></option>
                                <option value="8"><?php esc_html_e('8', 'vestige-core'); ?></option>
                                <option value="9"><?php esc_html_e('9', 'vestige-core'); ?></option>
                                <option value="10"><?php esc_html_e('10', 'vestige-core'); ?></option>
                            </select>
                        </div>
                    </div>
                    <!--//////////////////////////////
                        ////	LISTS
                        //////////////////////////////-->
                    <div id="shortcode-lists" class="shortcode-option">
                        <h5><?php esc_html_e('Lists', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="list-type"><?php esc_html_e('List style', 'vestige-core'); ?></label>
                            <select id="list-type" name="list-type">
                                <option value=""><?php esc_html_e('Custom Unordered List', 'vestige-core'); ?></option>
                                <option value="unordered"><?php esc_html_e('Unordered List', 'vestige-core'); ?></option>
                                <option value="ordered"><?php esc_html_e('Ordered List', 'vestige-core'); ?></option>
                                <option value="icon"><?php esc_html_e('Icon List', 'vestige-core'); ?></option>
                                <option value="inline"><?php esc_html_e('Inline List', 'vestige-core'); ?></option>
                                <option value="desc"><?php esc_html_e('Description List', 'vestige-core'); ?></option>
                            </select>
                        </div>
                        <div class="option">
                            <label for="list-icon"><?php esc_html_e('List icon', 'vestige-core'); ?></label>
                            <input id="list-icon" name="list-icon" type="text" value="" style="visibility: hidden;" />
                            <ul class="font-icon-grid"><?php echo '' . $icon_list; ?></ul>
                        </div>
                        <div class="option">
                            <label for="list-items"><?php esc_html_e('Number of list items', 'vestige-core'); ?></label>
                            <select id="list-items" name="list-items">
                                <option value="1"><?php esc_html_e('1', 'vestige-core'); ?></option>
                                <option value="2"><?php esc_html_e('2', 'vestige-core'); ?></option>
                                <option value="3"><?php esc_html_e('3', 'vestige-core'); ?></option>
                                <option value="4"><?php esc_html_e('4', 'vestige-core'); ?></option>
                                <option value="5"><?php esc_html_e('5', 'vestige-core'); ?></option>
                                <option value="6"><?php esc_html_e('6', 'vestige-core'); ?></option>
                                <option value="7"><?php esc_html_e('7', 'vestige-core'); ?></option>
                                <option value="8"><?php esc_html_e('8', 'vestige-core'); ?></option>
                                <option value="9"><?php esc_html_e('9', 'vestige-core'); ?></option>
                                <option value="10"><?php esc_html_e('10', 'vestige-core'); ?></option>
                                <p class="info"><?php esc_html_e('You can easily add more by duplicating the code after.', 'vestige-core'); ?></p>
                            </select>
                        </div>
                        <div class="option">
                            <label for="list-extra"><?php esc_html_e('Add Extra Class', 'vestige-core'); ?></label>
                            <input id="list-extra" name="list-extra" type="text" value="" />
                        </div>
                    </div>
                    <!--//////////////////////////////
                                                ////	Tabs
                                                //////////////////////////////-->
                    <div id="shortcode-tabs">
                        <h5><?php esc_html_e('Tabs', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="tabs-id"><?php esc_html_e('Tab ID', 'vestige-core'); ?></label>
                            <input id="tabs-id" name="tabs-id" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="tabs-size"><?php esc_html_e('Number of Tabs', 'vestige-core'); ?></label>
                            <input id="tabs-size" name="tabs-size" type="text" value="" />
                        </div>
                    </div>
                    <!--//////////////////////////////
                                                ////	Accordions
                                                //////////////////////////////-->
                    <div id="shortcode-accordion">
                        <h5><?php esc_html_e('Accordions', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="accordion-id"><?php esc_html_e('Accordion ID', 'vestige-core'); ?></label>
                            <input id="accordion-id" name="accordion-id" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="accordion-size"><?php esc_html_e('Number of Accordions', 'vestige-core'); ?></label>
                            <input id="accordion-size" name="accordion-size" type="text" value="" />
                        </div>
                    </div>
                    <!--//////////////////////////////
                                                ////	Toggles
                                                //////////////////////////////-->
                    <div id="shortcode-toggle">
                        <h5><?php esc_html_e('Toggles', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="toggle-id"><?php esc_html_e('Toggle ID', 'vestige-core'); ?></label>
                            <input id="toggle-id" name="toggle-id" type="text" value="" />
                        </div>
                        <div class="option">
                            <label for="toggle-size"><?php esc_html_e('Number of Toggles', 'vestige-core'); ?></label>
                            <input id="toggle-size" name="toggle-size" type="text" value="" />
                        </div>
                    </div>
                    <!--//////////////////////////////
                                                ////	Form
                                                //////////////////////////////-->
                    <div id="shortcode-form">
                        <h5><?php esc_html_e('Form', 'vestige-core'); ?></h5>
                        <div class="option">
                            <label for="form-title"><?php esc_html_e('Title', 'vestige-core'); ?></label>
                            <input id="form-title" name="form-title" type="text" value="" />
                        </div>
                        <!--<div class="option">
                                <label for="toggle-size"><?php esc_html_e('Enter Email with comma seperated', 'vestige-core'); ?></label>
                                <input id="form_email" name="form_email" type="text" value=""/>
                            </div>-->
                    </div>
                    <!--//////////////////////////////
              			//// Event Calendar	
                 		//////////////////////////////-->
                    <div id="shortcode-calendar">
                        <h5><?php esc_html_e('Event Calendar', 'vestige-core'); ?></h5>
                    </div>
                    <!--//////////////////////////////
                 		//// Exhibition Calendar	
                 		//////////////////////////////-->
                    <div id="shortcode-calendar-exhibition">
                        <h5><?php esc_html_e('Exhibition Calendar', 'vestige-core'); ?></h5>
                    </div>
                </fieldset>
                <!-- CLOSE #shortcode_panel -->
            </div>
            <div class="buttons clearfix">
                <input type="submit" id="insert" name="insert" value="<?php esc_html_e('Insert Shortcode', 'vestige-core'); ?>" onClick="embedSelectedShortcode();" />
            </div>
            <!-- CLOSE #shortcode_wrap -->
        </div>
        <!-- CLOSE imicframework_shortcode_form -->
    </form>
    <!-- CLOSE body -->
</body>
<!-- CLOSE html -->

</html>