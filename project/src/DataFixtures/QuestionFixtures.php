<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class QuestionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Axe compétences

        $questionsData = [
            [
                'text' => 'Formations pour Apprendre à apprendre, changement de paradigme, "être à la page" (au-delà des compétences "justes" nécessaires)',
                'answer0' => 'Désintérêt pour l\'amélioration de la compétence des équipes',
                'answer1' => 'Nombreuses formations métiers dans le plan de formation',
                'answer2' => 'Possibilité de choisir et de suivre des formations "annexes" au métier et/ou temps dédié pour de la veille ou de l\'auto-formation',
                'categoryReference' => CategoryFixtures::EXCELLENCE_REFERENCE
            ],
            [
                'text' => 'Le co-développement (outil d\'intelligence collective) existe-t-il dans l\'entreprise ?',
                'answer0' => 'Pas du tout',
                'answer1' => 'Quelques initiatives',
                'answer2' => 'Démarche instaurée et pratiquée régulièrement',
                'categoryReference' => CategoryFixtures::EXCELLENCE_REFERENCE
            ],
            [
                'text' => 'Les collaborateurs sont-ils amenés à partager leurs compétences et sous quelles formes ?',
                'answer0' => 'Aucune initiative',
                'answer1' => 'Capitalisation d\'un certain nombre de savoirs',
                'answer2' => 'Véritable communauté de pratiques mise en place',
                'categoryReference' => CategoryFixtures::EXCELLENCE_REFERENCE
            ],
            [
                'text' => 'Le mentoring (fonctionnement en binôme) existe-t-il pour assurer le transfert de compétences ?',
                'answer0' => 'Aucune initiative',
                'answer1' => 'Quelques initiatives',
                'answer2' => 'Systématiquement lors d\'une prise de poste',
                'categoryReference' => CategoryFixtures::EXCELLENCE_REFERENCE
            ],
            [
                'text' => 'Les managers sont-ils aussi formateurs sur certains sujet pour l\'entreprise entière ?',
                'answer0' => 'Non',
                'answer1' => 'Quelques fois',
                'answer2' => 'Quasi systématiquement',
                'categoryReference' => CategoryFixtures::EXCELLENCE_REFERENCE
            ],
            [
                'text' => 'L\'entreprise favorise-t-elle l\'excellence technique ? (Principe 9 du Manifeste Agile)',
                'answer0' => 'Pas du tout',
                'answer1' => 'Oui un peu',
                'answer2' => 'Oui',
                'categoryReference' => CategoryFixtures::EXCELLENCE_REFERENCE
            ],
            [
                'text' => 'Déployez-vous les pratiques du "Faire Agile", c\'est-à-dire une ou plusieurs des "méthodes" agiles ?',
                'answer0' => 'NON, nous les projets sont tous en cycle en V / cascade',
                'answer1' => 'Quelques projets pilotes',
                'answer2' => 'Déploiement systématique d\'une ou plusieurs méthodes',
                'categoryReference' => CategoryFixtures::AGILE_REFERENCE
            ],
            [
                'text' => 'Votre entreprise promeut-elle un "état d\'esprit agile" ?',
                'answer0' => 'Non',
                'answer1' => 'Quelques valeurs agiles promues',
                'answer2' => 'Oui',
                'categoryReference' => CategoryFixtures::AGILE_REFERENCE
            ],
            [
                'text' => 'Votre entreprise gère-t-elle humainement les compétences ?',
                'answer0' => 'Non',
                'answer1' => 'Un peu',
                'answer2' => 'Oui',
                'categoryReference' => CategoryFixtures::RH_REFERENCE
            ],
            [
                'text' => 'Valeur supérieure utilisable livrée plus tôt (Fonction principale utilisable dès les premières versions)',
                'answer0' => 'Pas de phase de validation intermédiaire',
                'answer1' => 'Prototype fonctionnel intermédiaire livré au client',
                'answer2' => 'Principe du MVP respecté : Minimum Viable Product / La version d\'un produit qui permet d\'obtenir un maximum de retours client avec un minimum d\'effort',
                'categoryReference' => CategoryFixtures::VELOCITY_REFERENCE
            ],
            [
                'text' => 'Réactivité face aux impératifs prépondérants',
                'answer0' => 'Pas de modification possible en cours de conception',
                'answer1' => 'Modifications en cours de conception engagées alors du retard',
                'answer2' => 'L\'équipe de conception s\'adapte en cas de modification en cours de conception',
                'categoryReference' => CategoryFixtures::VELOCITY_REFERENCE
            ],
            [
                'text' => 'Mesure de la vélocité de l\'équipe (indicateur de suivi du travail d\'une équipe de conception)',
                'answer0' => 'Jamais',
                'answer1' => 'Suivi des tâches',
                'answer2' => 'Mesure de la vélocité',
                'categoryReference' => CategoryFixtures::VELOCITY_REFERENCE
            ],
            [
                'text' => 'Les installations techniques et de gestion sont modernes (TIC/ERP/CRM)',
                'answer0' => 'Le système d\'information freine toute tentative de réagir rapidement',
                'answer1' => 'Le système d\'information permet avec quelques difficultés d\'avoir de la réactivité',
                'answer2' => 'En cas de besoin, le système d\'information favorise la réactivité',
                'categoryReference' => CategoryFixtures::SOUPLES_REFERENCE
            ],
            [
                'text' => 'Les équipes sont en capacité d\'autonomiser une partie de leurs tâches',
                'answer0' => 'Jamais',
                'answer1' => 'On laisse la possibilité de créer quelques macros Excel/VBA',
                'answer2' => 'L\'entreprise équipe et forme ses équipes à la tâche de se doter de web app via des outils no-code',
                'categoryReference' => CategoryFixtures::SOUPLES_REFERENCE
            ],
            [
                'text' => 'Les équipes s\'inscrivent dans un cadre Agile Lean',
                'answer0' => 'Pas de démarche Agile/Lean initiée dans l\'entreprise',
                'answer1' => 'Plusieurs concepts Agile/Lean sont mis en œuvre dans l\'entreprise',
                'answer2' => 'Les concepts Agile/Lean sont inscrits dans l\'ADN de l\'entreprise : Satisfaction du client avec des livraisons au plus tôt et régulières, accepter les changements, lisser les activités, collaboration quotidienne avec les parties prenantes, proximité terrain, autonomie des équipes dans la résolution de problèmes, amélioration continue...',
                'categoryReference' => CategoryFixtures::SOUPLES_REFERENCE
            ],
            [
                'text' => 'Les mécanismes de livraison et de synchronisation sont matures',
                'answer0' => 'Pas de démarche de tension des flux',
                'answer1' => 'Quelques concepts de juste à temps sont mis en œuvre pour tendre le flux',
                'answer2' => 'Concepts du juste à temps maîtrisés (production rythmée par la demande client, peu d\'en-cours)',
                'categoryReference' => CategoryFixtures::SOUPLES_REFERENCE
            ],
            [
                'text' => 'Les innovations produit tiennent compte de l\'urgence climatique',
                'answer0' => 'Aucune réflexion sur cet axe',
                'answer1' => 'Des premières initiatives ont été lancées',
                'answer2' => 'Systématiquement',
                'categoryReference' => CategoryFixtures::DEFI_REFERENCE
            ],
            [
                'text' => 'Les processus internes sont remis en cause pour diminuer leur impact environnemental',
                'answer0' => 'Aucune réflexion sur cet axe',
                'answer1' => 'Des premières initiatives ont été lancées',
                'answer2' => 'Systématiquement',
                'categoryReference' => CategoryFixtures::DEFI_REFERENCE
            ],
            [
                'text' => 'Les parties prenantes sont sélectionnées en fonction de leur éthique vis-à-vis du développement durable',
                'answer0' => 'Aucune réflexion sur cet axe',
                'answer1' => 'Des premières initiatives ont été lancées',
                'answer2' => 'Systématiquement',
                'categoryReference' => CategoryFixtures::DEFI_REFERENCE
            ],
            [
                'text' => 'Veille stratégique',
                'answer0' => 'Pas de veille',
                'answer1' => 'La veille stratégique de l\'entreprise permet d\'anticiper les évolutions et les innovations nécessaires',
                'answer2' => 'La veille stratégique de l\'entreprise permet d\'anticiper les disruptions majeures',
                'categoryReference' => CategoryFixtures::VEILLE_REFERENCE
            ],
            [
                'text' => 'Votre entreprise dégage-t-elle une part de CA par des produits ou services en ligne',
                'answer0' => 'Moins de 10%',
                'answer1' => 'Oui environ 20%',
                'answer2' => 'Oui environ 30%',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'La mise en place d\'outils numériques a-t-elle permis d\'optimiser les coûts, les délais et la qualité ?',
                'answer0' => 'Aucun',
                'answer1' => 'Oui mais pour tous les critères',
                'answer2' => 'Oui pour tous les critères',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'Comment les outils sont-ils intégrés dans les process de l\'entreprise ?',
                'answer0' => 'Absence d\'outils ou de procédure, uniquement du suivi',
                'answer1' => 'En partie, les outils ne sont pas toujours adaptés à des procédures, souvent aux activités',
                'answer2' => 'À part entière, il existe des procédures de formation aux outils, ces outils sont utilisés par toute l\'entreprise',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'Comment partagez-vous les données numériques avec les parties prenantes (clients, fournisseurs,...) ?',
                'answer0' => 'En mode novice : au mieux par mail ou via le site internet',
                'answer1' => 'En mode collaboratif : quelques outils (plateforme extranet, ou apps drive) pour des sujets plutôt ponctuels',
                'answer2' => 'En mode avancé : des plateformes dédiées (type extranet, applications métier) où chaque acteur peut interagir en temps permanent',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'Mesurez-vous les impacts du numérique sur votre entreprise ?',
                'answer0' => 'Non',
                'answer1' => 'Des outils de mesure sont en place',
                'answer2' => 'Oui des outils de mesure sont en place et sont ajustés régulièrement',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'Quel est l\'impact du numérique sur la démarche RSE de l\'entreprise ?',
                'answer0' => 'Absence de démarche RSE',
                'answer1' => 'C\'est un sujet observé de loin, on traite les questions d\'obligation légales sans aller au-delà',
                'answer2' => 'Le numérique est un sujet totalement rattaché à la démarche RSE',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'Existe-t-il des freins (stratégiques, financiers, ...) à l\'investissement dans les outils numériques ?',
                'answer0' => 'Pas de volonté en faveur du numérique, on n\'investit pas',
                'answer1' => 'L\'entreprise dit que l\'utilisation de chaque outil est nécessaire mais l\'expérience montre le contraire',
                'answer2' => 'Non des budgets sont alloués et des investissements budgétés compris cette nécessité dans la stratégie',
                'categoryReference' => CategoryFixtures::BUSINESS_REFERENCE
            ],
            [
                'text' => 'L\'entreprise dispose-t-elle d\'un site internet, d\'un compte LinkedIn, d\'une page Facebook, d\'un compte Twitter,... ?',
                'answer0' => 'Non le site/la page reste inactif',
                'answer1' => 'Oui mais seulement sur le critère -1 point',
                'answer2' => 'Oui la présence de l\'entreprise sur les réseaux est visible, elle correspond au niveau attendu',
                'categoryReference' => CategoryFixtures::RELATION_REFERENCE
            ],
            [
                'text' => 'Comment utilisez-vous le numérique dans la relation client ? (nouveau modèle de vente, nouveau modèle d\'échanges avec les clients, communauté, story, chat,...)',
                'answer0' => 'Absence de plateforme de service client',
                'answer1' => 'Des accès dédiés pour les échanges sont possibles (extranet) mais l\'expérience montre que le potentiel n\'est pas optimal',
                'answer2' => 'Plusieurs modes d\'utilisation sont possibles pour échanger avec l\'externe, ils sont tous intégrés dans les activités de l\'entreprise',
                'categoryReference' => CategoryFixtures::RELATION_REFERENCE
            ],
            [
                'text' => 'L\'entreprise dispose-t-elle d\'un community manager ?',
                'answer0' => 'Non aucune personne n\'est dédiée',
                'answer1' => 'Non mais une personne anime les réseaux sociaux parmi ses fonctions',
                'answer2' => 'Oui',
                'categoryReference' => CategoryFixtures::RELATION_REFERENCE
            ],
            [
                'text' => 'Certains de vos collaborateurs sont-ils actifs sur les réseaux sociaux au nom de l\'entreprise ?',
                'answer0' => 'Non ou rarement',
                'answer1' => 'Oui sans incitation',
                'answer2' => 'Oui avec des incitations et l\'entreprise y met un point fort pour le faire',
                'categoryReference' => CategoryFixtures::RELATION_REFERENCE
            ],
            [
                'text' => 'Comment mesurez-vous et exploitez-vous les données issues du site de votre entreprise ?',
                'answer0' => 'Absence de suivi',
                'answer1' => 'Des indicateurs sont en place mais plutôt de façon passive, ils servent à mesurer',
                'answer2' => 'Des indicateurs sont en place afin de mesurer l\'efficacité et l\'impact du site sur les réseaux, une recherche de performance est en place pour toucher toujours plus et mieux',
                'categoryReference' => CategoryFixtures::RELATION_REFERENCE
            ],
            [
                'text' => 'Avez-vous observé chez vos concurrents des pratiques innovantes ?',
                'answer0' => 'Non aucun benchmark en ce sens',
                'answer1' => 'Oui ils sont quelques belles idées, si seulement nous avions les mêmes et mieux',
                'answer2' => 'Oui elles servent comme base de réflexion et de développement pour notre propre entreprise. On peut dire qu\'elles servent de filière !',
                'categoryReference' => CategoryFixtures::RELATION_REFERENCE
            ],
            [
                'text' => 'Vos collaborateurs sont-ils équipés de nouveaux équipements numériques de travail (PC portable, tablette, smartphone,...) ?',
                'answer0' => 'Non et l\'ensemble fonctionne toujours sur de la main d\'œuvre papier',
                'answer1' => 'Les fonctions supports ne semblent pas prêtes à la digitalisation, l\'entreprise fonctionne majoritairement sur l\'échange verbal et à distance. L\'informatique fonctionne toujours plus ou moins',
                'answer2' => 'Les processus de travail s\'appuient sur des outils numériques quand ceux-ci sont possibles. L\'ensemble des fonctions de l\'entreprise est équipée pour pouvoir réaliser le travail à distance',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'L\'arrivée des outils digitaux a-t-elle eu un impact sur les pratiques et la culture de l\'entreprise ?',
                'answer0' => 'Non au contraire, peu de monde y adhère',
                'answer1' => 'Oui dans l\'ensemble toutefois nous rencontrons parfois des contraintes (pratiques, techniques,...)',
                'answer2' => 'Oui gain de temps, facilité, économies et fiabilité',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'Comment vous êtes-vous approprié et comment avez-vous accompagné ces évolutions ?',
                'answer0' => 'Absence de communication et d\'accompagnement',
                'answer1' => 'La communication n\'est pas parfaite, les équipes restent figées sur les difficultés de ses nouvelles pratiques, pas forcément considérées',
                'answer2' => 'Tout est en place pour faciliter la compréhension et l\'adhésion aux nouveaux outils/pratiques',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'Les nouvelles possibilités technologiques ont-elles fait évoluer le modèle d\'organisation de l\'entreprise et/ou votre management, vers plus de collaboration avec des acteurs internes ou externes ?',
                'answer0' => 'Absence de projets en ce sens et pas d\'interactions avec les autres sites',
                'answer1' => 'Oui quelques évolutions s\'opèrent pour travailler en inter-service ou avec l\'externe, toutefois le potentiel n\'est pas toujours exploité',
                'answer2' => 'Oui on sort complètement du mode ancien et on favorise le mode collaboratif',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'Mobilisez-vous des outils de veille et mettez-vous en œuvre des modalités de curation et de partage de l\'information ?',
                'answer0' => 'Absence de veille',
                'answer1' => 'Il y a un peu de suivi toutefois les décisions d\'évolutions sont un peu plus tardives qu\'elles ne le devraient',
                'answer2' => 'Oui l\'entreprise est capable de se réinventer et de réagir aux surprises du marché',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'Les fonctionnalités des outils sont-elles augmentées par la pratique de vos collaborateurs ?',
                'answer0' => 'Absence de prise en compte des pratiques terrain',
                'answer1' => 'Oui mais les outils restent vieillissants, il n\'y a pas de nouvelles fonctionnalités',
                'answer2' => 'Oui quand il y a une observation des bonnes pratiques, elles sont remontées et ajoutées',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'Comment accompagnez-vous vos collaborateurs dans la transition numérique ?',
                'answer0' => 'Absence d\'accompagnement',
                'answer1' => 'L\'entreprise accompagne en faisant son mieux sauf par l\'aspect des temps, il y a parfois des oublis. J\'aimerais parfois faire moi-même',
                'answer2' => 'L\'entreprise est pro-active par la création de nouveaux outils et l\'adhésion aux outils numériques. J\'adhère',
                'categoryReference' => CategoryFixtures::MANAGEMENT_REFERENCE
            ],
            [
                'text' => 'Comment la chaîne logistique / la production / la maintenance intègrent-elles le numérique ?',
                'answer0' => 'Néant',
                'answer1' => 'Ponctuellement',
                'answer2' => 'Omniprésence du numérique',
                'categoryReference' => CategoryFixtures::INDUSTRIAL_REFERENCE
            ],
            [
                'text' => 'Les outils numériques permettent-ils de générer de la performance industrielle au sein de votre entreprise ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui, mais ce n\'est pas le maillon essentiel à nos processus',
                'answer2' => 'Oui, sans eux nous serions beaucoup moins efficaces',
                'categoryReference' => CategoryFixtures::INDUSTRIAL_REFERENCE
            ],
            [
                'text' => 'Existe-t-il des partenariats pour développer, intégrer ou acquérir les nouvelles technologies ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui, pour optimiser des process de bases, il y a du matériel à développer et innover bien plus',
                'answer2' => 'Oui, les développements sont plutôt constants',
                'categoryReference' => CategoryFixtures::INDUSTRIAL_REFERENCE
            ],
            [
                'text' => 'Les outils numériques vous ont-ils permis de mieux intégrer le client dans le processus d\'innovation ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui par la force des choses, sans forcément une réelle démarche de satisfaction interne/externe',
                'answer2' => 'C\'est une source importante de progrès, les outils sont pensés pour mieux satisfaire le client interne/externe d\'une manière ou d\'une autre, il y a du benchmark/d\'es réflexions en ce sens',
                'categoryReference' => CategoryFixtures::INDUSTRIAL_REFERENCE
            ],
            [
                'text' => 'Des projets numériques sont-ils mis en place dans votre service ?',
                'answer0' => 'Néant',
                'answer1' => 'Ponctuellement',
                'answer2' => 'Omniprésence du numérique dans les projets',
                'categoryReference' => CategoryFixtures::MARKETING_REFERENCE
            ],
            [
                'text' => 'Des actions d\'accompagnement à la transition numérique sont-elles proposées par votre service ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui, pas systématiquement',
                'answer2' => 'Oui, systématiquement (information, formation, tutot, accompagnement à la prise en main, support aux questions/difficultés)',
                'categoryReference' => CategoryFixtures::MARKETING_REFERENCE
            ],
            [
                'text' => 'Comment votre service reste à la page dans ce domaine en constante mutation ?',
                'answer0' => 'Avec les moyens du bord',
                'answer1' => 'Par une veille régulière et un budget alloué sur lequel nous définissons des priorités pour avancer',
                'answer2' => 'Par une veille permanente, des formations et des moyens alloués en conséquence pour innover et être les "premiers sur le coup"',
                'categoryReference' => CategoryFixtures::MARKETING_REFERENCE
            ],
            [
                'text' => 'En quoi votre service est-il un acteur du déploiement de la stratégie de votre entreprise ?',
                'answer0' => 'Nous contribuons à l\'image de l\'entreprise et sa promotion',
                'answer1' => 'Nous contribuons à la performance numérique, l\'image et la promotion de l\'entreprise',
                'answer2' => 'Nos actions s\'inscrivent dans la dynamique stratégique de l\'entreprise pour contribuer à la performance, l\'image, la notoriété, la modernité des communications et pratiques mais aussi à sensibiliser les collaborateurs internes aux nouvelles tendances',
                'categoryReference' => CategoryFixtures::MARKETING_REFERENCE
            ],
            [
                'text' => 'Les projets numérique sont-ils mis en place dans votre service RH ? (SIRH, dématérialisation, self-service RH,...)',
                'answer0' => 'Néant',
                'answer1' => 'Oui, pas à tous les niveaux',
                'answer2' => 'Oui, à tous les niveaux',
                'categoryReference' => CategoryFixtures::RH_REFERENCE
            ],
            [
                'text' => 'Le numérique a-t-il impacté les différentes missions et pratiques du service RH ? (recrutement, formation, paie, GPEC, communication interne/externe,...)',
                'answer0' => 'Néant',
                'answer1' => 'Oui, pas à tous les niveaux',
                'answer2' => 'Oui, à tous les niveaux',
                'categoryReference' => CategoryFixtures::RH_REFERENCE
            ],
            [
                'text' => 'Des actions d\'accompagnement à la transition numérique sont-elles proposées par le service RH aux managers et aux collaborateurs ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui, pas systématiquement',
                'answer2' => 'Oui, systématiquement (information, formation, accompagnement à la prise en main, support aux questions/difficultés)',
                'categoryReference' => CategoryFixtures::RH_REFERENCE
            ],
            [
                'text' => 'Le service RH intègre-t-il les opportunités du numérique pour faire évoluer les modalités et espaces de travail (télétravail, homeoffice, mobileworking, coworking, desk sharing,...) ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui avec parcimonie, la stratégie de l\'entreprise n\'est pas portée sur un développement maximum de ces pratiques',
                'answer2' => 'Oui, il y a une volonté pour développer ces tendances et ouvrir toutes les opportunités',
                'categoryReference' => CategoryFixtures::RH_REFERENCE
            ],
            [
                'text' => 'Le service RH (en direct ou via les managers) sensibilise-t-il les collaborateurs sur les pratiques de travail à distance ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui les pratiques sont encadrées par des textes/règles, le suivi peut parfois manquer',
                'answer2' => 'Oui, des informations et communications régulières sont diffusées (droit à la déconnexion, charte de télétravail, note interne, ...)',
                'categoryReference' => CategoryFixtures::RH_REFERENCE
            ],
            [
                'text' => 'Le SI s\'est-il adapté à l\'évolution des modes de travail et management ? (travail à distance, réunion à distance, collaborateur nomade,…)',
                'answer0' => 'Néant',
                'answer1' => 'Oui tardivement, les systèmes sont mis en place par la force des choses. Des difficultés sont rencontrées dans l\'utilisation des outils développés',
                'answer2' => 'Oui totalement, avec une synergie terrain notable et durable',
                'categoryReference' => CategoryFixtures::SI_REFERENCE
            ],
            [
                'text' => 'Comment sont traités l\'accès et la diffusion de l\'information orientée métier et/ou hiérarchique ?',
                'answer0' => 'Néant',
                'answer1' => 'Une configuration grosse maille est en place, des difficultés d\'utilisation et/ou d\'accès aux outils sont rencontrés',
                'answer2' => 'Des niveaux hiérarchiques sont paramétrés pour le traitement et l\'accès aux informations. Chaque collaborateur bénéficie de son paramétrage en fonction de son profil (utilisation et accès aux outils/logicielles)',
                'categoryReference' => CategoryFixtures::SI_REFERENCE
            ],
            [
                'text' => 'Existe-t-il une démarche de sécurisation des données numériques dans votre entreprise ?',
                'answer0' => 'Néant',
                'answer1' => 'Certains accès sont bien paramétrés et sécurisés mais pas tous ou alors parfois trop, ce qui peut rendre l\'accès à des données utiles dans le cadre du travail quotidien difficile',
                'answer2' => 'Dans le strict respect des réglementations (RGPD) et de manière adaptée en fonction des profils (exemple : accès au dossier numérique du personnel pour un collaborateur VS un manager)',
                'categoryReference' => CategoryFixtures::SI_REFERENCE
            ],
            [
                'text' => 'En quoi votre service SI est-il un acteur du déploiement de la stratégie digitale de votre entreprise ?',
                'answer0' => 'Le SI est essentiellement chargé de maintenir les équipements et services en place',
                'answer1' => 'Le SI est missionné pour concevoir et maintenir des solutions numériques utiles à l\'entreprise, nous rencontrons parfois des difficultés de moyens et de ressources pour aller plus loin dans les innovations',
                'answer2' => 'Le service SI répond lui-même à la stratégie globale de l\'entreprise pour développer, déployer et maintenir à jour les moyens nécessaires à la performance numérique de l\'entité',
                'categoryReference' => CategoryFixtures::SI_REFERENCE
            ],
            [
                'text' => 'Les nouvelles capacités technologiques permettent-elles de générer de l\'efficacité opérationnelle au sein de votre entreprise ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui mais ce n\'est pas le maillon essentiel à nos pratiques/performances',
                'answer2' => 'Oui, sans elles nous serions beaucoup moins efficaces',
                'categoryReference' => CategoryFixtures::BTP_REFERENCE
            ],
            [
                'text' => 'Le service QSE s’est-il approprié les outils numériques pour garantir le respect des exigences QSE dans un contexte d’évolutions des modes de travail ? (télétravail, tiers lieu, site distant,…)',
                'answer0' => 'Néant',
                'answer1' => 'Ponctuellement',
                'answer2' => 'Omniprésence du numérique',
                'categoryReference' => CategoryFixtures::QSERSE_REFERENCE
            ],
            [
                'text' => 'Les outils numériques sont-ils intégrés pour optimiser le pilotage des processus QSE ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui mais ce n\'est pas le maillon essentiel à nos processus',
                'answer2' => 'Oui, sans eux nous serions beaucoup moins efficaces',
                'categoryReference' => CategoryFixtures::QSERSE_REFERENCE
            ],
            [
                'text' => 'L\'arrivée du BIM ou plus globalement du numérique a-t-il permis à votre entreprise d\'améliorer ses processus ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui les outils numériques sont totalement intégrés à la veille et la communication, ils sont parfois doublonnés ou complétés par d\'autres supports',
                'answer2' => 'Oui les outils numériques sont aujourd\'hui excluvisement utiilisés pour la veille et la communication',
                'categoryReference' => CategoryFixtures::QSERSE_REFERENCE
            ],
            [
                'text' => 'Utilisez-vous des outils numériques pour faire de la veille réglementaire et diffuser l’information aux collaborateurs ?',
                'answer0' => 'Néant',
                'answer1' => 'Oui cependant les outils sont encore parfois manuscrits ou bien les documents transitent par mails entre plusieurs collaborateurs pour modification progressive',
                'answer2' => 'Oui grâce à des outils numériques performants qui nous permettent de concevoir les supports informatiques en instantané et en collectif',
                'categoryReference' => CategoryFixtures::QSERSE_REFERENCE
            ],
            [
                'text' => 'La gestion des réclamations client est-elle intégrée dans le SI de l’entreprise ?',
                'answer0' => 'Non',
                'answer1' => 'Oui toutefois le paramétrage ne permet pas un suivi précis et en temps réel du traitement de chaque réclamation',
                'answer2' => 'Oui, le suivi est assuré grâce à un paramétrage de gestion des réclamations qui vient tracer en temps réel l\'avancement de son traitement',
                'categoryReference' => CategoryFixtures::QSERSE_REFERENCE
            ],
        ];

        foreach ($questionsData as $i => $data) {
            $question = new Question();
            $question->setText($data['text']);
            $question->setAnswer0($data['answer0']);
            $question->setAnswer1($data['answer1']);
            $question->setAnswer2($data['answer2']);
            $question->setCategory($this->getReference($data['categoryReference']));
            $manager->persist($question);
            $this->addReference('question_' . ((int) $i + 1), $question);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
