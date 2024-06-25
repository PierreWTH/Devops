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

        $question = new Question();
        $question->setText('Formations pour Apprendre à apprendre, changement de paradigme, "être à la page" (au-delà des compétences "justes" nécessaires)');
        $question->setAnswer0('Désintérêt pour l\'amélioration de la compétence des équipes');
        $question->setAnswer1('Nombreuses formations métiers dans le plan de formation');
        $question->setAnswer2('Possibilité de choisir et de suivre des formations "annexes" au métier et/ou temps dédié pour de la veille ou de l\'auto-formation');
        $question->setCategory($this->getReference(CategoryFixtures::EXCELLENCE_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Le co-développement (outil d\'intelligence collective) existe-t-il dans l\'entreprise ?');
        $question->setAnswer0('Pas du tout');
        $question->setAnswer1('Quelques initiatives');
        $question->setAnswer2('Démarche instaurée et pratiquée régulièrement');
        $question->setCategory($this->getReference(CategoryFixtures::EXCELLENCE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les collaborateurs sont-ils amenés à partager leurs compétences et sous quelles formes ?');
        $question->setAnswer0('Aucune initiative');
        $question->setAnswer1('Capitalisation d\'un certain nombre de savoirs');
        $question->setAnswer2('Véritable communauté de pratiques mise en place');
        $question->setCategory($this->getReference(CategoryFixtures::EXCELLENCE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Le mentoring (fonctionnement en binôme) existe-t-il pour assurer le transfert de compétences ?');
        $question->setAnswer0('Aucune initiative');
        $question->setAnswer1('Quelques initiatives');
        $question->setAnswer2('Systématiquement lors d\'une prise de poste');
        $question->setCategory($this->getReference(CategoryFixtures::EXCELLENCE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les managers sont-ils aussi formateurs sur certains sujet pour l\'entreprise entière ?');
        $question->setAnswer0('Non');
        $question->setAnswer1('Quelques fois');
        $question->setAnswer2('Quasi systématiquement');
        $question->setCategory($this->getReference(CategoryFixtures::EXCELLENCE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('L\'entreprise favorise-t-elle l\'excellence technique ? (Principe 9 du Manifeste Agile)');
        $question->setAnswer0('Pas du tout');
        $question->setAnswer1('Oui un peu');
        $question->setAnswer2('Oui');
        $question->setCategory($this->getReference(CategoryFixtures::EXCELLENCE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Déployez-vous les pratiques du "Faire Agile", c\'est-à-dire une ou plusieurs des "méthodes" agiles ?');
        $question->setAnswer0('NON, nous les projets sont tous en cycle en V / cascade');
        $question->setAnswer1('Quelques projets pilotes');
        $question->setAnswer2('Déploiement systématique d\'une ou plusieurs méthodes');
        $question->setCategory($this->getReference(CategoryFixtures::AGILE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Votre entreprise promeut-elle un "état d\'esprit agile" ?');
        $question->setAnswer0('Non');
        $question->setAnswer1('Quelques valeurs agiles promues');
        $question->setAnswer2('Oui');
        $question->setCategory($this->getReference(CategoryFixtures::AGILE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Votre entreprise gère-t-elle humainement les compétences ?');
        $question->setAnswer0('Non');
        $question->setAnswer1('Un peu');
        $question->setAnswer2('Oui');
        $question->setCategory($this->getReference(CategoryFixtures::RH_REFERENCE));
        $manager->persist($question);

        // Axe réactivité

        $question = new Question();
        $question->setText('Valeur supérieure utilisable livrée plus tôt (Fonction principale utilisable dès les premières versions)');
        $question->setAnswer0('Pas de phase de validation intermédiaire');
        $question->setAnswer1('Prototype fonctionnel intermédiaire livré au client');
        $question->setAnswer2('Principe du MVP respecté : Minimum Viable Product / La version d\'un produit qui permet d\'obtenir un maximum de retours client avec un minimum d\'effort');
        $question->setCategory($this->getReference(CategoryFixtures::VELOCITY_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Réactivité face aux impératifs prépondérants');
        $question->setAnswer0('Pas de modification possible en cours de conception');
        $question->setAnswer1('Modifications en cours de conception engagées alors du retard');
        $question->setAnswer2('L\'équipe de conception s\'adapte en cas de modification en cours de conception');
        $question->setCategory($this->getReference(CategoryFixtures::VELOCITY_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Mesure de la vélocité de l\'équipe (indicateur de suivi du travail d\'une équipe de conception)');
        $question->setAnswer0('Jamais');
        $question->setAnswer1('Suivi des tâches');
        $question->setAnswer2('Mesure de la vélocité');
        $question->setCategory($this->getReference(CategoryFixtures::VELOCITY_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les installations techniques et de gestion sont modernes (TIC/ERP/CRM)');
        $question->setAnswer0('Le système d\'information freine toute tentative de réagir rapidement');
        $question->setAnswer1('Le système d\'information permet avec quelques difficultés d\'avoir de la réactivité');
        $question->setAnswer2('En cas de besoin, le système d\'information favorise la réactivité');
        $question->setCategory($this->getReference(CategoryFixtures::SOUPLES_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les équipes sont en capacité d\'autonomiser une partie de leurs tâches');
        $question->setAnswer0('Jamais');
        $question->setAnswer1('On laisse la possibilité de créer quelques macros Excel/VBA');
        $question->setAnswer2('L\'entreprise équipe et forme ses équipes à la tâche de se doter de web app via des outils no-code');
        $question->setCategory($this->getReference(CategoryFixtures::SOUPLES_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les équipes s\'inscrivent dans un cadre Agile Lean');
        $question->setAnswer0('Pas de démarche Agile/Lean initiée dans l\'entreprise');
        $question->setAnswer1('Plusieurs concepts Agile/Lean sont mis en œuvre dans l\'entreprise');
        $question->setAnswer2('Les concepts Agile/Lean sont inscrits dans l\'ADN de l\'entreprise : Satisfaction du client avec des livraisons au plus tôt et régulières, accepter les changements, lisser les activités, collaboration quotidienne avec les parties prenantes, proximité terrain, autonomie des équipes dans la résolution de problèmes, amélioration continue...');
        $question->setCategory($this->getReference(CategoryFixtures::SOUPLES_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les mécanismes de livraison et de synchronisation sont matures');
        $question->setAnswer0('Pas de démarche de tension des flux');
        $question->setAnswer1('Quelques concepts de juste à temps sont mis en œuvre pour tendre le flux');
        $question->setAnswer2('Concepts du juste à temps maîtrisés (production rythmée par la demande client, peu d\'en-cours)');
        $question->setCategory($this->getReference(CategoryFixtures::SOUPLES_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les innovations produit tiennent compte de l\'urgence climatique');
        $question->setAnswer0('Aucune réflexion sur cet axe');
        $question->setAnswer1('Des premières initiatives ont été lancées');
        $question->setAnswer2('Systématiquement');
        $question->setCategory($this->getReference(CategoryFixtures::DEFI_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les processus internes sont remis en cause pour diminuer leur impact environnemental');
        $question->setAnswer0('Aucune réflexion sur cet axe');
        $question->setAnswer1('Des premières initiatives ont été lancées');
        $question->setAnswer2('Systématiquement');
        $question->setCategory($this->getReference(CategoryFixtures::DEFI_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les parties prenantes sont sélectionnées en fonction de leur éthique vis-à-vis du développement durable');
        $question->setAnswer0('Aucune réflexion sur cet axe');
        $question->setAnswer1('Des premières initiatives ont été lancées');
        $question->setAnswer2('Systématiquement');
        $question->setCategory($this->getReference(CategoryFixtures::DEFI_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Veille stratégique');
        $question->setAnswer0('Pas de veille');
        $question->setAnswer1('La veille stratégique de l\'entreprise permet d\'anticiper les évolutions et les innovations nécessaires');
        $question->setAnswer2('La veille stratégique de l\'entreprise permet d\'anticiper les disruptions majeures');
        $question->setCategory($this->getReference(CategoryFixtures::VEILLE_REFERENCE));
        $manager->persist($question);

        // Axe numérique

        $question = new Question();
        $question->setText('Votre entreprise dégage-t-elle une part de CA par des produits ou services en ligne');
        $question->setAnswer0('Moins de 10%');
        $question->setAnswer1('Oui environ 20%');
        $question->setAnswer2('Oui environ 30%');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('La mise en place d\'outils numériques a-t-elle permis d\'optimiser les coûts, les délais et la qualité ?');
        $question->setAnswer0('Aucun');
        $question->setAnswer1('Oui mais pour tous les critères');
        $question->setAnswer2('Oui pour tous les critères');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Comment les outils sont-ils intégrés dans les process de l\'entreprise ?');
        $question->setAnswer0('Absence d\'outils ou de procédure, uniquement du suivi');
        $question->setAnswer1('En partie, les outils ne sont pas toujours adaptés à des procédures, souvent aux activités');
        $question->setAnswer2('À part entière, il existe des procédures de formation aux outils, ces outils sont utilisés par toute l\'entreprise');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Comment partagez-vous les données numériques avec les parties prenantes (clients, fournisseurs,...) ?');
        $question->setAnswer0('En mode novice : au mieux par mail ou via le site internet');
        $question->setAnswer1('En mode collaboratif : quelques outils (plateforme extranet, ou apps drive) pour des sujets plutôt ponctuels');
        $question->setAnswer2('En mode avancé : des plateformes dédiées (type extranet, applications métier) où chaque acteur peut interagir en temps permanent');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Mesurez-vous les impacts du numérique sur votre entreprise ?');
        $question->setAnswer0('Non');
        $question->setAnswer1('Des outils de mesure sont en place');
        $question->setAnswer2('Oui des outils de mesure sont en place et sont ajustés régulièrement');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Quel est l\'impact du numérique sur la démarche RSE de l\'entreprise ?');
        $question->setAnswer0('Absence de démarche RSE');
        $question->setAnswer1('C\'est un sujet observé de loin, on traite les questions d\'obligation légales sans aller au-delà');
        $question->setAnswer2('Le numérique est un sujet totalement rattaché à la démarche RSE');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Existe-t-il des freins (stratégiques, financiers, ...) à l\'investissement dans les outils numériques ?');
        $question->setAnswer0('Pas de volonté en faveur du numérique, on n\'investit pas');
        $question->setAnswer1('L\'entreprise dit que l\'utilisation de chaque outil est nécessaire mais l\'expérience montre le contraire');
        $question->setAnswer2('Non des budgets sont alloués et des investissements budgétés compris cette nécessité dans la stratégie');
        $question->setCategory($this->getReference(CategoryFixtures::BUSINESS_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('L\'entreprise dispose-t-elle d\'un site internet, d\'un compte LinkedIn, d\'une page Facebook, d\'un compte Twitter,... ?');
        $question->setAnswer0('Non le site/la page reste inactif');
        $question->setAnswer1('Oui mais seulement sur le critère -1 point');
        $question->setAnswer2('Oui la présence de l\'entreprise sur les réseaux est visible, elle correspond au niveau attendu');
        $question->setCategory($this->getReference(CategoryFixtures::RELATION_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Comment utilisez-vous le numérique dans la relation client ? (nouveau modèle de vente, nouveau modèle d\'échanges avec les clients, communauté, story, chat,...)');
        $question->setAnswer0('Absence de plateforme de service client');
        $question->setAnswer1('Des accès dédiés pour les échanges sont possibles (extranet) mais l\'expérience montre que le potentiel n\'est pas optimal');
        $question->setAnswer2('Plusieurs modes d\'utilisation sont possibles pour échanger avec l\'externe, ils sont tous intégrés dans les activités de l\'entreprise');
        $question->setCategory($this->getReference(CategoryFixtures::RELATION_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('L\'entreprise dispose-t-elle d\'un community manager ?');
        $question->setAnswer0('Non aucune personne n\'est dédiée');
        $question->setAnswer1('Non mais une personne anime les réseaux sociaux parmi ses fonctions');
        $question->setAnswer2('Oui');
        $question->setCategory($this->getReference(CategoryFixtures::RELATION_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Certains de vos collaborateurs sont-ils actifs sur les réseaux sociaux au nom de l\'entreprise ?');
        $question->setAnswer0('Non ou rarement');
        $question->setAnswer1('Oui sans incitation');
        $question->setAnswer2('Oui avec des incitations et l\'entreprise y met un point fort pour le faire');
        $question->setCategory($this->getReference(CategoryFixtures::RELATION_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Comment mesurez-vous et exploitez-vous les données issues du site de votre entreprise ?');
        $question->setAnswer0('Absence de suivi');
        $question->setAnswer1('Des indicateurs sont en place mais plutôt de façon passive, ils servent à mesurer');
        $question->setAnswer2('Des indicateurs sont en place afin de mesurer l\'efficacité et l\'impact du site sur les réseaux, une recherche de performance est en place pour toucher toujours plus et mieux');
        $question->setCategory($this->getReference(CategoryFixtures::RELATION_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Avez-vous observé chez vos concurrents des pratiques innovantes ?');
        $question->setAnswer0('Non aucun benchmark en ce sens');
        $question->setAnswer1('Oui ils sont quelques belles idées, si seulement nous avions les mêmes et mieux');
        $question->setAnswer2('Oui elles servent comme base de réflexion et de développement pour notre propre entreprise. On peut dire qu\'elles servent de filière !');
        $question->setCategory($this->getReference(CategoryFixtures::RELATION_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Vos collaborateurs sont-ils équipés de nouveaux équipements numériques de travail (PC portable, tablette, smartphone,...) ?');
        $question->setAnswer0('Non et l\'ensemble fonctionne toujours sur de la main d\'œuvre papier');
        $question->setAnswer1('Les fonctions supports ne semblent pas prêtes à la digitalisation, l\'entreprise fonctionne majoritairement sur l\'échange verbal et à distance. L\'informatique fonctionne toujours plus ou moins');
        $question->setAnswer2('Les processus de travail s\'appuient sur des outils numériques quand ceux-ci sont possibles. L\'ensemble des fonctions de l\'entreprise est équipée pour pouvoir réaliser le travail à distance');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('L\'arrivée des outils digitaux a-t-elle eu un impact sur les pratiques et la culture de l\'entreprise ?');
        $question->setAnswer0('Non au contraire, peu de monde y adhère');
        $question->setAnswer1('Oui dans l\'ensemble toutefois nous rencontrons parfois des contraintes (pratiques, techniques,...)');
        $question->setAnswer2('Oui gain de temps, facilité, économies et fiabilité');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Comment vous êtes-vous approprié et comment avez-vous accompagné ces évolutions ?');
        $question->setAnswer0('Absence de communication et d\'accompagnement');
        $question->setAnswer1('La communication n\'est pas parfaite, les équipes restent figées sur les difficultés de ses nouvelles pratiques, pas forcément considérées');
        $question->setAnswer2('Tout est en place pour faciliter la compréhension et l\'adhésion aux nouveaux outils/pratiques');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);


        $question = new Question();
        $question->setText('Les nouvelles possibilités technologiques ont-elles fait évoluer le modèle d\'organisation de l\'entreprise et/ou votre management, vers plus de collaboration avec des acteurs internes ou externes ?');
        $question->setAnswer0('Absence de projets en ce sens et pas d\'interactions avec les autres sites');
        $question->setAnswer1('Oui quelques évolutions s\'opèrent pour travailler en inter-service ou avec l\'externe, toutefois le potentiel n\'est pas toujours exploité');
        $question->setAnswer2('Oui on sort complètement du mode ancien et on favorise le mode collaboratif');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Mobilisez-vous des outils de veille et mettez-vous en œuvre des modalités de curation et de partage de l\'information ?');
        $question->setAnswer0('Absence de veille');
        $question->setAnswer1('Il y a un peu de suivi toutefois les décisions d\'évolutions sont un peu plus tardives qu\'elles ne le devraient');
        $question->setAnswer2('Oui l\'entreprise est capable de se réinventer et de réagir aux surprises du marché');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les fonctionnalités des outils sont-elles augmentées par la pratique de vos collaborateurs ?');
        $question->setAnswer0('Absence de prise en compte des pratiques terrain');
        $question->setAnswer1('Oui mais les outils restent vieillissants, il n\'y a pas de nouvelles fonctionnalités');
        $question->setAnswer2('Oui quand il y a une observation des bonnes pratiques, elles sont remontées et ajoutées');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Comment accompagnez-vous vos collaborateurs dans la transition numérique ?');
        $question->setAnswer0('Absence d\'accompagnement');
        $question->setAnswer1('L\'entreprise accompagne en faisant son mieux sauf par l\'aspect des temps, il y a parfois des oublis. J\'aimerais parfois faire moi-même');
        $question->setAnswer2('L\'entreprise est pro-active par la création de nouveaux outils et l\'adhésion aux outils numériques. J\'adhère');
        $question->setCategory($this->getReference(CategoryFixtures::MANAGEMENT_REFERENCE));
        $manager->persist($question);

        // Analyse numérique par métier

        $question = new Question();
        $question->setText('Comment la chaîne logistique / la production / la maintenance intègrent-elles le numérique ?');
        $question->setAnswer2('Omniprésence du numérique');
        $question->setAnswer1('Ponctuellement');
        $question->setAnswer0('Néant');
        $question->setCategory($this->getReference(CategoryFixtures::INDUSTRIAL_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les outils numériques permettent-ils de générer de la performance industrielle au sein de votre entreprise ?');
        $question->setAnswer2('Oui, sans eux nous serions beaucoup moins efficaces');
        $question->setAnswer1('Oui, mais ce n\'est pas le maillon essentiel à nos processus');
        $question->setAnswer0('Néant');
        $question->setCategory($this->getReference(CategoryFixtures::INDUSTRIAL_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Existe-t-il des partenariats pour développer, intégrer ou acquérir les nouvelles technologies ?');
        $question->setAnswer2('Oui, les développements sont plutôt constants');
        $question->setAnswer1('Oui, pour optimiser des process de bases, il y a du matériel à développer et innover bien plus');
        $question->setAnswer0('Néant');
        $question->setCategory($this->getReference(CategoryFixtures::INDUSTRIAL_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Les outils numériques vous ont-ils permis de mieux intégrer le client dans le processus d\'innovation ?');
        $question->setAnswer2('C\'est une source importante de progrès, les outils sont pensés pour mieux satisfaire le client interne/externe d\'une manière ou d\'une autre, il y a du benchmark/d\'es réflexions en ce sens');
        $question->setAnswer1('Oui par la force des choses, sans forcément une réelle démarche de satisfaction interne/externe');
        $question->setAnswer0('Néant');
        $question->setCategory($this->getReference(CategoryFixtures::INDUSTRIAL_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('Des projets numériques sont-ils mis en place dans votre service ?');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Ponctuellement');
        $question->setAnswer2('Omniprésence du numérique dans les projets');
        $question->setCategory($this->getReference(CategoryFixtures::MARKETING_REFERENCE));
        $manager->persist($question);
    

        // Question 7
        $question = new Question();
        $question->setText('Des actions d\'accompagnement à la transition numérique sont-elles proposées par votre service ?');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui, pas systématiquement');
        $question->setAnswer2('Oui, systématiquement (information, formation, tutot, accompagnement à la prise en main, support aux questions/difficultés)');
        $question->setCategory($this->getReference(CategoryFixtures::MARKETING_REFERENCE));
        $manager->persist($question);

        // Question 8
        $question = new Question();
        $question->setText('Comment votre service reste à la page dans ce domaine en constante mutation ?');
        $question->setAnswer0('Avec les moyens du bord');
        $question->setAnswer1('Par une veille régulière et un budget alloué sur lequel nous définissons des priorités pour avancer');
        $question->setAnswer2('Par une veille permanente, des formations et des moyens alloués en conséquence pour innover et être les "premiers sur le coup"');
        $question->setCategory($this->getReference(CategoryFixtures::MARKETING_REFERENCE));
        $manager->persist($question);


        // Question 9
        $question = new Question();
        $question->setText('En quoi votre service est-il un acteur du déploiement de la stratégie de votre entreprise ?');
        $question->setAnswer0('Nous contribuons à l\'image de l\'entreprise et sa promotion');
        $question->setAnswer1('Nous contribuons à la performance numérique, l\'image et la promotion de l\'entreprise');
        $question->setAnswer2('Nos actions s\'inscrivent dans la dynamique stratégique de l\'entreprise pour contribuer à la performance, l\'image, la notoriété, la modernité des communications et pratiques mais aussi à sensibiliser les collaborateurs internes aux nouvelles tendances');
        $question->setCategory($this->getReference(CategoryFixtures::MARKETING_REFERENCE));
        $manager->persist($question);


        // Question 10
        $question = new Question();
        $question->setText('Les projets numérique sont-ils mis en place dans votre service RH ? (SIRH, dématérialisation, self-service RH,...)');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui, pas à tous les niveaux');
        $question->setAnswer2('Oui, à tous les niveaux');
        $question->setCategory($this->getReference(CategoryFixtures::RH_REFERENCE));
        $manager->persist($question);
        

        // Question 11
        $question = new Question();
        $question->setText('Le numérique a-t-il impacté les différentes missions et pratiques du service RH ? (recrutement, formation, paie, GPEC, communication interne/externe,...)');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui, pas à tous les niveaux');
        $question->setAnswer2('Oui, à tous les niveaux');
        $question->setCategory($this->getReference(CategoryFixtures::RH_REFERENCE));
        $manager->persist($question);


        // Question 12
        $question = new Question();
        $question->setText('Des actions d\'accompagnement à la transition numérique sont-elles proposées par le service RH aux managers et aux collaborateurs ?');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui, pas systématiquement');
        $question->setAnswer2('Oui, systématiquement (information, formation, accompagnement à la prise en main, support aux questions/difficultés)');
        $question->setCategory($this->getReference(CategoryFixtures::RH_REFERENCE));
        $manager->persist($question);

        // Question 13
        $question = new Question();
        $question->setText('Le service RH intègre-t-il les opportunités du numérique pour faire évoluer les modalités et espaces de travail (télétravail, homeoffice, mobileworking, coworking, desk sharing,...) ?');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui avec parcimonie, la stratégie de l\'entreprise n\'est pas portée sur un développement maximum de ces pratiques');
        $question->setAnswer2('Oui, il y a une volonté pour développer ces tendances et ouvrir toutes les opportunités');
        $question->setCategory($this->getReference(CategoryFixtures::RH_REFERENCE));
        $manager->persist($question);

        // Question 14
        $question = new Question();
        $question->setText('Le service RH (en direct ou via les managers) sensibilise-t-il les collaborateurs sur les pratiques de travail à distance ?');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui les pratiques sont encadrées par des textes/règles, le suivi peut parfois manquer');
        $question->setAnswer2('Oui, des informations et communications régulières sont diffusées (droit à la déconnexion, charte de télétravail, note interne, ...)');
        $question->setCategory($this->getReference(CategoryFixtures::RH_REFERENCE));
        $manager->persist($question);

        $question1 = new Question();
        $question1->setText('Le SI s\'est-il adapté à l\'évolution des modes de travail et management ? (travail à distance, réunion à distance, collaborateur nomade,…)');
        $question1->setAnswer0('Néant');
        $question1->setAnswer1('Oui tardivement, les systèmes sont mis en place par la force des choses. Des difficultés sont rencontrées dans l\'utilisation des outils développés');
        $question1->setAnswer2('Oui totalement, avec une synergie terrain notable et durable');
        $question->setCategory($this->getReference(CategoryFixtures::SI_REFERENCE));
        $manager->persist($question1);

        $question2 = new Question();
        $question2->setText('Comment sont traités l\'accès et la diffusion de l\'information orientée métier et/ou hiérarchique ?');
        $question2->setAnswer0('Néant');
        $question2->setAnswer1('Une configuration grosse maille est en place, des difficultés d\'utilisation et/ou d\'accès aux outils sont rencontrés');
        $question2->setAnswer2('Des niveaux hiérarchiques sont paramétrés pour le traitement et l\'accès aux informations. Chaque collaborateur bénéficie de son paramétrage en fonction de son profil (utilisation et accès aux outils/logicielles)');
        $question->setCategory($this->getReference(CategoryFixtures::SI_REFERENCE));
        $manager->persist($question2);

        $question3 = new Question();
        $question3->setText('Existe-t-il une démarche de sécurisation des données numériques dans votre entreprise ?');
        $question3->setAnswer0('Néant');
        $question3->setAnswer1('Certains accès sont bien paramétrés et sécurisés mais pas tous ou alors parfois trop, ce qui peut rendre l\'accès à des données utiles dans le cadre du travail quotidien difficile');
        $question3->setAnswer2('Dans le strict respect des réglementations (RGPD) et de manière adaptée en fonction des profils (exemple : accès au dossier numérique du personnel pour un collaborateur VS un manager)');
        $question->setCategory($this->getReference(CategoryFixtures::SI_REFERENCE));
        $manager->persist($question3);

        $question4 = new Question();
        $question4->setText('En quoi votre service SI est-il un acteur du déploiement de la stratégie digitale de votre entreprise ?');
        $question4->setAnswer0('Le SI est essentiellement chargé de maintenir les équipements et services en place');
        $question4->setAnswer1('Le SI est missionné pour concevoir et maintenir des solutions numériques utiles à l\'entreprise, nous rencontrons parfois des difficultés de moyens et de ressources pour aller plus loin dans les innovations');
        $question4->setAnswer2('Le service SI répond lui-même à la stratégie globale de l\'entreprise pour développer, déployer et maintenir à jour les moyens nécessaires à la performance numérique de l\'entité');
        $question->setCategory($this->getReference(CategoryFixtures::SI_REFERENCE));
        $manager->persist($question4);

        $question5 = new Question();
        $question5->setText('Les nouvelles capacités technologiques permettent-elles de générer de l\'efficacité opérationnelle au sein de votre entreprise ?');
        $question5->setAnswer0('Néant');
        $question5->setAnswer1('Oui mais ce n\'est pas le maillon essentiel à nos pratiques/performances');
        $question5->setAnswer2('Oui, sans elles nous serions beaucoup moins efficaces');
        $question->setCategory($this->getReference(CategoryFixtures::BTP_REFERENCE));
        $manager->persist($question5);


        $question6 = new Question();
        $question6->setText('Le service QSE s’est-il approprié les outils numériques pour garantir le respect des exigences QSE dans un contexte d’évolutions des modes de travail ? (télétravail, tiers lieu, site distant,…)');
        $question6->setAnswer0('Néant');
        $question6->setAnswer1('Ponctuellement');
        $question6->setAnswer2('Omniprésence du numérique');
        $question->setCategory($this->getReference(CategoryFixtures::QSERSE_REFERENCE));
        $manager->persist($question6);

        $question7 = new Question();
        $question7->setText('Les outils numériques sont-ils intégrés pour optimiser le pilotage des processus QSE ?');
        $question7->setAnswer0('Néant');
        $question7->setAnswer1('Oui mais ce n\'est pas le maillon essentiel à nos processus');
        $question7->setAnswer2('Oui, sans eux nous serions beaucoup moins efficaces');
        $question->setCategory($this->getReference(CategoryFixtures::QSERSE_REFERENCE));
        $manager->persist($question7);

        $question8 = new Question();
        $question8->setText('L\'arrivée du BIM ou plus globalement du numérique a-t-il permis à votre entreprise d\'améliorer ses processus ?');
        $question8->setAnswer0('Néant');
        $question8->setAnswer1('Oui les outils numériques sont totalement intégrés à la veille et la communication, ils sont parfois doublonnés ou complétés par d\'autres supports');
        $question8->setAnswer2('Oui les outils numériques sont aujourd\'hui excluvisement utiilisés pour la veille et la communication');
        $question->setCategory($this->getReference(CategoryFixtures::QSERSE_REFERENCE));
        $manager->persist($question8);

        $question = new Question();
        $question->setText('Utilisez-vous des outils numériques pour faire de la veille réglementaire et diffuser l’information aux collaborateurs ?');
        $question->setAnswer0('Néant');
        $question->setAnswer1('Oui cependant les outils sont encore parfois manuscrits ou bien les documents transitent par mails entre plusieurs collaborateurs pour modification progressive');
        $question->setAnswer2('Oui grâce à des outils numériques performants qui nous permettent de concevoir les supports informatiques en instantané et en collectif');
        $question->setCategory($this->getReference(CategoryFixtures::QSERSE_REFERENCE));
        $manager->persist($question);

        $question = new Question();
        $question->setText('La gestion des réclamations client est-elle intégrée dans le SI de l’entreprise ?');
        $question->setAnswer0('Non');
        $question->setAnswer1('Oui toutefois le paramétrage ne permet pas un suivi précis et en temps réel du traitement de chaque réclamation');
        $question->setAnswer2('Oui, le suivi est assuré grâce à un paramétrage de gestion des réclamations qui vient tracer en temps réel l\'avancement de son traitement');
        $question->setCategory($this->getReference(CategoryFixtures::QSERSE_REFERENCE));
        $manager->persist($question);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
