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


<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class='bgBody'>
    <tr>
        <td>
            <table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
                <tr>
                    <td>


                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
                            <tr>
                                <td class='movableContentContainer bgItem'>

                                    <div class='movableContent'>
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
                                            <tr height="40">
                                                <td width="200">&nbsp;</td>
                                                <td width="200">&nbsp;</td>
                                                <td width="200">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width="200" valign="top">&nbsp;</td>
                                                <td width="200" valign="top" align="center">
                                                    <div class="contentEditableContainer contentImageEditable">
                                                        <div class="contentEditable" align='center' >

                                                            <img src="http://img4.hostingpics.net/pics/441614Simplon.png" width="410" height="146"  alt='Logo'  data-default="placeholder" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="200" valign="top">&nbsp;</td>
                                            </tr>
                                            <tr height="25">
                                                <td width="200">&nbsp;</td>
                                                <td width="200">&nbsp;</td>
                                                <td width="200">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class='movableContent'>
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
                                            <tr>
                                                <td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
                                                    <div class="contentEditableContainer contentTextEditable">
                                                        <div class="contentEditable" align='left' >
                                                            <h4 >Nom : <?=$data[0] ?> </h4>
                                                        </div>
                                                        <div class="contentEditable" align='left' >
                                                            <h4 >Email : <?=$data[1] ?> </h4>
                                                        </div>
                                                        <div class="contentEditable" align='left' >
                                                            <h4 >Téléphone : <?=$data[2] ?> </h4>
                                                        </div><br><br>

                                                        <div class="contentEditable" align='center' >
                                                            <h3 >Contenu du message :</h3>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100">&nbsp;</td>
                                                <td width="400" align="center">
                                                    <div class="contentEditableContainer contentTextEditable">
                                                        <div class="contentEditable" align='left' >
                                                            <?php
                                                                    $content = explode("\n", $content);

                                                                    foreach ($content as $line):
                                                                    echo '<p> ' . $line . "</p>\n";
                                                                    endforeach;
                                                                    ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td width="100">&nbsp;</td>
                                            </tr>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
                                            <tr>
                                                <td width="200">&nbsp;</td>
                                                <td width="200" align="center" style="padding-top:25px;">
                                                    <table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
                                                        <tr>
                                                            <td bgcolor="#f38531" align="center" style="border-radius:4px;" width="200" height="50">
                                                                <div class="contentEditableContainer contentTextEditable">
                                                                    <div class="contentEditable" align='center' >
                                                                        <a href="mailto:<?=$data[1] ?>?subject=Suite à votre demande d'informations"><h3>REPONDRE</h3></a>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="200">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class='movableContent'>
                                        <table>
                                            <tr>
                                                <td class="content footer" align="center">
                                                    <p>Ce message est généré automatiquement, merci de ne pas y répondre directement!</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>


                                </td>
                            </tr>
                        </table>




                    </td></tr></table>

        </td>
    </tr>
</table>

