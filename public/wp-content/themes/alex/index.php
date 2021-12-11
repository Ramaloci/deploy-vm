<!DOCTYPE html>
<html lang="de" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_title(); ?>

    <script type="module">
        document.documentElement.classList.remove("no-js");
        document.documentElement.classList.add("js");
    </script>


    <meta name="description" content="Sie wollen eine neue Website, dann sind Sie hier genau richtig. Alex Mayr designed Ihre Homepage" />
    <meta property="og:title" content="Alex Mayer - Webdesign" />
    <meta property="og:description" content="Sie wollen eine neue Website, dann sind Sie hier genau richtig. Alex Mayr designed Ihre Homepage" />
    <meta property="og:image" content="https://www.alexmayer.com/assets/logo.png" />
    <meta property="og:image:alt" content="Logo von Alex Mayer" />
    <meta property="og:locale" content="de_AT" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:url" content="https://www.alexmayer.com" />
    <link rel="canonical" href="https://www.alexmayer.com" />
    <link rel="apple-touch-icon" sizes="180x180" href=<?php echo get_template_directory_uri() . "/favicon/apple-touch-icon.png" ?> />
    <link rel="icon" type="image/png" sizes="32x32" href=<?php echo get_template_directory_uri() . "/favicon/favicon.ico" ?> />
    <link rel="icon" type="image/png" sizes="16x16" href=<?php echo get_template_directory_uri() . "/favicon/favicon.ico" ?> />
    <link rel="manifest" href="/site.webmanifest" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div id="header-top">
            <h1 id="logo">Alex Mayer</h1>
            <button id="burger" class="hamburger hamburger--collapse" type="button" aria-expanded="false">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>

            <nav id="navigation">
                <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            </nav>
        </div>
    </header>

    <main>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                //TODO HERO text
                $thumbnail  = get_the_post_thumbnail();
                
                // Add whichever attributes you want to exclude here
                $thumbnail = preg_replace('/(width|height|srcset|sizes)="[^"]*"/', '', $thumbnail);
                $thumbnail = preg_replace('/class="[^"]*"/', '/class="hero-img"/', $thumbnail);
                echo $thumbnail;
                break;
            }
        } else {
            //currently no posts
            echo "<p>Derzeit noch keine Beiträge... Bitte komm später wieder zurück</p>";
        }

        ?>
        <section id='maincontent' class="maxwidthcontainer">
            <?php
            //THE LOOP!!!   
            if (have_posts()) {
                while (have_posts()) {
                    //the_post_thumbnail();
                    the_post();
                    the_title();
                    the_content();
                }
            } else {
                //currently no posts
                echo "<p>Derzeit noch keine Beiträge... Bitte komm später wieder zurück</p>";
            }
            ?>
        </section>
        <?php if (is_front_page()) { ?>
            <section id="hero">
                <div class="maxwidthcontainer">
                    <h2><span>Glänzende Ideen für leuchtende Augen</span></h2>
                    <a href="#">Angebot einholen</a>
                </div>
            </section>
            <section id="services" class="maxwidthcontainer">
                <h2 class="section-title">Leistungen</h2>
                <ul id="service-list">
                    <?php
                    $news_query = new WP_Query('cat=4&order=ASC&orderby=date');
                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) :
                            $news_query->the_post(); ?>
                            <li id=<?php the_title(); ?>>
                                <a>
                                    <?php the_content(); ?>
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </li>
                        <?php
                        endwhile;
                    else : ?>
                        <p>Erster Service demnächst...</p>
                    <?php endif;
                    ?>
                </ul>
            </section>

            <section id="news" class="maxwidthcontainer">
                <h2 class="section-title">News</h2>
                <ul id="news-container">
                    <?php
                    $news_query = new WP_Query('cat=3&order=ASC&orderby=date');
                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) :
                            $news_query->the_post(); ?>

                            <li>
                                <a href="#"><?php the_title(); ?></a> -
                                <span class="prewrap"><?php the_content(); ?></span><a href=<?php the_permalink(); ?>> [mehr erfahren]</a>
                            </li>
                        <?php
                        endwhile;
                    else : ?>
                        <p>Erster Post demnächst...</p>
                    <?php endif;
                    ?>
                </ul>
            </section>

            <h2 class="section-title maxwidthcontainer">Referenzen</h2>
            <section id="clients" class="maxwidthcontainer">
                <?php
                $news_query = new WP_Query('cat=5&order=ASC&orderby=date&post_per_page=3');
                $count = 1;
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) :
                        $news_query->the_post(); ?>
                        <article id=<?php echo "client-" . $count; ?> class="article-section">


                            <?php
                            $thumbnail  = get_the_post_thumbnail($post->ID);

                            // Add whichever attributes you want to exclude here
                            $thumbnail = preg_replace('/(width|height|srcset|sizes)="[^"]*"/', '', $thumbnail);
                            $thumbnail = preg_replace('/class="[^"]*"/', '/class="ref-img"/', $thumbnail);
                            echo $thumbnail;



                            // <?php the_post_thumbnail(); 
                            ?>
                            <cite>
                                <?php the_title(); ?>
                            </cite>
                            <?php the_content(); ?>
                            <blockquote>
                                <?php
                                the_field('cite');
                                ?>
                            </blockquote>
                            <?php if ($count === 3) :
                            ?>
                                <div id="quotation-mark">
                                    <img src="<?php echo get_template_directory_uri() . '/images/quotation_mark.svg'; ?>" alt="quote icon" />
                                </div>
                            <?php endif; ?>
                        </article>
                    <?php
                        $count++;
                    endwhile;
                else : ?>
                    <p>Erste Referenz demnächst...</p>
                <?php endif;
                ?>
            </section>

        <?php } ?>

        <?php

        ?>


    </main>
    <footer>
        <div class="top">
            <p>&copy; Alex Mayer <script>document.write( new Date().getFullYear() );</script></p>
            <nav>
                <ul class="nav-footer">
                    <li><a href="#">Impressum</a></li>
                    <li id="line">|</li>
                    <li><a href="#">Datenschutzerklärung</a></li>
                </ul>
            </nav>
            <p id="creater">
                Demo-Wordpress-Seite im Rahmen der LV ‚Content Mangagement Systeme' an
                der FH Salzburg von Reichinger Kerstin und Benjamin Fernerberger
            </p>
        </div>
        <p id="random">Alle Inhalte frei erfunden</p>
        <p>Bildnachweis</p>
        <p>Fotos</p>
        <ul id="sources">
            <li>
                <p>
                    Herofoto Tastatur: Aman Anderson,
                    http://de.freeimages.com/photo/illuminated-keyboard-124228
                </p>
            </li>
            <li>
                <p>
                    Foto Dina Meyer by Dreifachaxel [CC BY-SA 4.0
                    (https://creativecommons.org/licenses/by-sa/4.0)], from Wikimedia
                    Commons
                </p>
            </li>
            <li>
                <p>
                    Foto Thomas Meyer-Hermann By Thomas Meyer-Hermann (Thomas
                    Meyer-Hermann) [GFDL (http://www.gnu.org/ copyleft/fdl.html), CC
                    BY-SA 3.0 (https://creativecommons.org/licenses/by-sa/3.0) or CC
                    BY-SA 3.0 de
                    (https://creativecommons.org/licenses/by-sa/3.0/de/deed.en)], via
                    Wikimedia Commons
                    https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Thomas_Meyer-Hermann_1.jpg/407px-Thomas_Meyer-Hermann_1.jpg
                </p>
            </li>
            <li>
                <p>
                    Foto Vorstand Sparkasse Ülzen [[File:SKUelzen Vorstand
                    2015.jpg|SKUelzen Vorstand 2015]]
                    https://upload.wikimedia.org/wikipedia/commons/3/3e/SKUelzen_Vorstand_2015.jpg
                </p>
            </li>
        </ul>
        <p>Icons</p>
        <ul id="icons">
            <li>
                <p>Icons Freepik (http://www.freepik.com) / www.flaticon.com</p>
            </li>
        </ul>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>