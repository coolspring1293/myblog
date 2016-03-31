<?php
    /**
     * Adding Custom JavaScript
     * @package jqmPhp
     * @filesource
     */

    /**
     * Include the jqmPhp class.
     */
    include '../lib/jqmPhp.php';

    /**
     * Create a new jqmPhp object.
     */
    $jqmPhp = new jqmPhp();
    
    /**
     * Adding custom JavaScript to jqmHead in jqmPhp
     */
    $jqmPhp->head()->title('Custom JS Example');
    $jqmPhp->head()->add(new jqmScript('custom.js'));
    

    /**
     * Create a new jqmPage object.
     */
    $p = new jqmPage('custom-js');
    $p->theme('b');
    $p->title('Custom JS Example');    
    $p->header()->theme('a');
    $bt = $p->header()->addButton('', 'index.php#', 'a', 'home', false, false, true);
    $bt->rel('external')->attribute('data-iconpos', 'notext');
    
    /**
     * Adding Content.
     */
    $p->addContent('<h1>Adding Custom JavaScript</h1>');
    $p->addContent('<p align="justify">To add a custom JS you need add the tag <b>'.htmlspecialchars('<script...></script>').'</b>');
    $p->addContent(' to the jqmHead object [<b>'.htmlspecialchars('$jqmPhp->head()').'</b>] in the jqmPhp instance. ');
    $p->addContent('To facilitate the addition of JS you can use the class <b>jqmScript</b> as example:</p>');
    $p->addContent('<pre class="ui-body-c" style="padding:20px;">$jqmPhp = new jqmPhp();'."\n".'$jqmPhp->head()->add('."\n\t".'new jqmScript(\'custom.js\')'."\n".');</pre>');
    $p->addContent(new jqmTag('p', 'p_js', 'class="ui-body-c" style="padding:20px;"', '&nbsp;'));
    
    
    /**
     * Adding Source Code Links.
     */
    $list = new jqmListview();
    $list->inset(true)->dividerTheme('a');
    $list->addDivider('Source Code');
    $li = $list->addBasic('custom.js', 'custom.js', '', true);
    $li->rel('external')->target('_blank');
    $li = $list->addBasic('custom-js.php', 'custom-js.php.txt', '', true);
    $li->rel('external')->target('_blank');
    $p->addContent($list);
            
    /**
     * Add the page to jqmPhp object.
     */
    $jqmPhp->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $jqmPhp;
?>