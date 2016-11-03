<?php
$this->layout = 'front';
?>

<style>
    .partners {
        width: 200px;
    }

    .img-cci {
        width: 95%;
        margin: auto
    }

    p {
        text-align: justify;
    }

    .panel-footer {
        text-align: right;
    }

    .simplon {
        width: 37%;
    }
    .icon-simplon-body {
        text-align: center;
    }
</style>

<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><strong>Simplon c'est quoi ?</strong></h4>
        </div>
        <div class="panel-body">
            <p><span>Simplon.co est un <strong>réseau de &laquo;&nbsp;fabriques&nbsp;&raquo; </strong>(écoles) qui propose des formations <strong>GRATUITES</strong> pour devenir développeur de sites web et d&rsquo;applications mobiles, intégrateur, référent numérique, datartisan&#8230; Ces formations s&rsquo;adressent prioritairement aux <strong>personnes éloignées de l&#8217;emploi </strong>(jeunes de moins de 25 ans, peu ou pas diplômées, issues des quartiers populaires et des milieux ruraux, aux seniors, aux personnes en situation de handicap)<b> </b>avec un objectif de<b> parité homme femme.</b>.</span>
            </p>
            <br>
            <p><span>Simplon.co est une<strong> entreprise de l&rsquo;économie sociale et solidaire</strong> (agrément ESUS) : ses formations sont <strong>qualifiantes ou certifiantes</strong>, certaines sont<strong> labellisées Grande Ecole du Numérique</strong>, mais toutes sont ouvertes sur critères sociaux sans <strong>aucun pré-requis technique</strong> (débutants acceptés) mais il est obligatoire d&rsquo;avoir une très forte <strong>MOTIVATION</strong>, une <strong>appétence pour le numérique</strong> (et la programmation) et d&rsquo;aimer <strong>travailler en équipe</strong> !</span>
            </p>
        </div>
        <div class="panel-footer">
            <a class="right" href="http://simplon.co/">Plus d'informations sur le réseau Simplon</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><strong>Simplon Epinal</strong></h4>
            </div>
            <div class="panel-body">
                <img class="img-responsive"
                     src="http://www.centpourcent-vosges.fr/art-4013-83-700/a-epinal-le-coworking-decloisonne-les-projets-et-les-idees.jpg"
                     alt="Photo du bâtiment du centre d&#039;affaires de la ville d&#039;Epinal "
                     title="centre d&#039;affaires d&#039;Epinal"/>
                <br>
                <br>
                <p>Simplon Épinal est un projet de «fabrique numérique» initié par la <a
                        href="http://www.agglo-epinal.fr/">Communauté d’agglomération Épinal </a>et <a
                        href="http://www.epinal.fr/">la ville d’Épinal</a>, et porté par <a
                        href="http://www.lorraine.cci.fr/">CCI Lorraine</a> et Simplon.co. La fabrique ouvrira ses
                    portes en avril 2016 à Epinal dans les locaux du Centre d’affaires de la CCI des Vosges, situés à
                    proximité immédiate de la gare.
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4><strong>Un projet novateur pour le Sillon Lorrain</strong></h4>

            </div>
            <div class="panel-body">

                    <p>Le numérique est aujourd’hui un enjeu majeur pour le développement économique du territoire de la
                        Communauté d’Agglomération, en étant par ailleurs un véritable levier d’insertion sociale et
                        professionnelle.</p>
                    <p>Ce projet d’école du numérique est le premier mis en place au sein du Sillon Lorrain.</p>
                    <p>Mené dans une démarche d’innovation sociale en agissant sur l’emploi et la qualification, il relève
                        le défi économique de répondre aux besoins de recrutement des entreprises.</p>

                <div class="row icon-simplon-body">
                    <?= $this->Html->image('Simplon-epinal.jpg', ['alt' => 'Simplon-Epinal', 'class' => 'simplon']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><strong>Simplon Épinal propose une double formation :</strong></h4>
        </div>
        <div class="panel-body">
            <ul>
                <li>Une formation de 8 mois en Développement Web, gratuite et intensive, en présentiel dans les locaux
                    du centre d&rsquo;affaires de CCI Lorraine
                </li>
                <li>Une formation de 6 mois en Développement Web, gratuite, en classe inversée (10 à 15h d&rsquo;apprentissage
                    en ligne et présentiel 1 jour par semaine) dans le quartier de la Justice. Cette formation, en
                    articulation avec la formation de 8 mois est idéale pour ceux qui ne peuvent se consacrer à plein
                    temps à la formation
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <a href="http://simplon.co/les-formations-longues/developpeur-web/">Plus d'informations sur la formation de
                développeur web</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><strong>En partenariat avec :</strong></h4>
        </div>
        <div class="panel-body">
            <img class="partners" src="http://www.filmetaboite.fr/wp-content/uploads/2015/01/logo_CCI_LORRAINE.png"
                 alt="Logo de la CCI Lorraine"/>
            <img class="partners"
                 src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Communaut%C3%A9_d&#039;agglom%C3%A9ration_d&#039;%C3%89pinal.jpg/280px-Communaut%C3%A9_d&#039;agglom%C3%A9ration_d&#039;%C3%89pinal.jpg"
                 alt="Logo de la communauté d&#039;agglomération d&#039;Epinal"/>
        </div>
    </div>
</div>



