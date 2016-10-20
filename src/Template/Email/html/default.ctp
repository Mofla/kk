<?php
        /**
        * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
        * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
        *
        * Licensed under The MIT License
        * For full copyright and license information, please see the LICENSE.txt
        * Redistributions of files must retain the above copyright notice.
        *
        * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
        * @link          http://cakephp.org CakePHP(tm) Project
        * @since         0.10.0
        * @license       http://www.opensource.org/licenses/mit-license.php MIT License
        */
        ?>


<table class="body-wrap">
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                        <h4>Nouveau commentaire de <?= $data[0] ?> :</h4>

                    </td>
                </tr>
                <tr>
                    <td class="content">

                        <?php
                                $content = explode("\n", $content);

                                foreach ($content as $line):
                                echo '<p> ' . $line . "</p>\n";
                                endforeach;
                                ?>

                        <table>
                            <tr>
                                <td align="center">
                                    <a href="http://localhost:8765/forums/threads/view/<?= $data[1] ?>">
                                        VOIR
                                    </a> / <a href="http://localhost:8765/forums/posts/add/<?= $data[1] ?>">
                                        REPONDRE
                                    </a>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td class="container">

            <!-- Message start -->
            <table>
                <tr>
                    <td class="content footer" align="center">
                        <p>Ce message est généré par <a href="#">Simplon Epinal by SimplonTeam</a> , merci de ne pas y répondre directement!</p>
                        <p>Pour contacter les développeurs :  <a href="mailto:">simplon.co.epinal@gmail.com</a> </p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

