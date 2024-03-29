<?php

/*
 * This file is part of Cachet.
 *
 * (c) James Brooks <james@cachethq.io>
 * (c) Joseph Cohen <joseph.cohen@dinkbit.com>
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    // Setup form fields
    'setup' => [
        'email'            => 'Adresse email',
        'username'         => 'Identifiant',
        'password'         => 'Mot de passe',
        'site_name'        => 'Nom du site',
        'site_domain'      => 'Domaine du site',
        'site_timezone'    => 'Sélectionnez votre fuseau horaire',
        'site_locale'      => 'Sélectionnez votre langue',
        'enable_google2fa' => 'Enable Google Two Factor Authentication',
    ],

    // Login form fields
    'login' => [
        'email'         => 'Adresse email',
        'password'      => 'Mot de passe',
        '2fauth'        => 'Authentication Code',
        'invalid'       => 'Invalid email or password',
        'invalid-token' => 'Invalid token',
        'cookies'       => 'You must enable cookies to login.',
    ],

    // Incidents form fields
    'incidents' => [
        'name'         => 'Nom',
        'status'       => 'Statut',
        'message'      => 'Message',
        'message-help' => 'Vous pouvez aussi utiliser du Markdown.',

        'templates' => [
            'name'     => 'Nom',
            'template' => 'Modèle',
        ],
    ],

    // Components form fields
    'components' => [
        'name'        => 'Nom',
        'status'      => 'Statut',
        'group'       => 'Groupe',
        'description' => 'Description',
        'link'        => 'Lien',
        'tags'        => 'Tags',
        'tags-help'   => 'Séparé par une virgule.',

        'groups' => [
            'name' => 'Nom',
        ],
    ],

    // Metric form fields
    'metrics' => [
        'name'             => 'Name',
        'suffix'           => 'Suffix',
        'description'      => 'Description',
        'description-help' => 'You may also use Markdown.',
        'display-chart'    => 'Display chart on status page?',
        'calc_type'        => 'Calculation of metrics',
        'type_sum'         => 'Sum',
        'type_avg'         => 'Average',

        'points' => [
            'value' => 'Value',
        ],
    ],

    // Settings
    'settings' => [
        /// Application setup
        'app-setup' => [
            'site-name'           => 'Nom du site',
            'site-url'            => 'URL du site',
            'site-timezone'       => 'Fuseau horaire du site',
            'site-locale'         => 'Langue du site',
            'date-format'         => 'Format de date',
            'display-graphs'      => 'Display graphs on status page?',
            'about-this-page'     => 'À propos de cette page',
            'days-of-incidents'   => 'Nombre de jours à afficher ?',
            'banner'              => 'Bannière',
            'banner-help'         => 'Il est recommandé de télécharger des fichiers de moins de 930 pixels de large.',
            'analytics_google'    => 'Google Analytics code',
            'analytics_gosquared' => 'GoSquared Analytics code',
        ],
        'security' => [
            'allowed-domains'      => 'Domaines autorisés. <small class="help-block"></small>',
            'allowed-domains-help' => 'Séparés par une virgule. Les domaines enregistrés ci-dessus seront automatiquement autorisés par défaut.',
        ],
        'stylesheet' => [
            'custom-css' => 'Feuille de style personnalisée',
        ],
        'theme' => [
            'background-color' => 'Couleur d\'arrière plan',
            'text-color'       => 'Couleur du texte',
        ],
    ],

    'user' => [
        'username'       => 'Identifiant',
        'email'          => 'Adresse email',
        'password'       => 'Mot de passe',
        'api-token'      => 'Jeton API',
        'api-token-help' => 'Regénérer votre jeton API révoquera toutes les applications existantes.',
        '2fa'            => [
            'help' => 'Enabling two factor authentication increases security of your account. You will need to download <a href="https://support.google.com/accounts/answer/1066447?hl=en">Google Authenticator</a> or a similar app on to your mobile device. When you login you will be asked to provide a token generated by the app.',
        ],
    ],

    // Buttons
    'add'    => 'Ajouter',
    'save'   => 'Sauvegarder',
    'update' => 'Mettre à jour',
    'create' => 'Créer',
    'edit'   => 'Éditer',
    'delete' => 'Effacer',
    'submit' => 'Envoyer',
    'cancel' => 'Annuler',
    'remove' => 'Supprimer',

    // Other
    'optional' => '* Optional',
];
