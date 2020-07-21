<?php

return [
  /*
  |--------------------------------------------------------------------------
  | Real time notifications
  |--------------------------------------------------------------------------
  | Setting this to true requires a broadcast setting configured, asgard
  | comes by default with the Pusher integration (js).
  */
  'real-time' => false,
  
  'defaultEmailView' => 'notification::emails.default.index',
  
  "notificationTypes" => [
    
    ["title" => "SMS", "system_name" => "sms"],
    ["title" => "Whatsapp", "system_name" => "whatsapp"],
    ["title" => "Slack", "system_name" => "slack"],
    ["title" => "Email", "system_name" => "email"],
    ["title" => "Push", "system_name" => "push"],
    ["title" => "Broadcast", "system_name" => "broadcast"],
  
  ],
  
  "providers" => [
    
    "email" => [// EMAIL PROVIDER
      "name" => "Email",
      "systemName" => "email",
      "icon" => "far fa-envelope",
      "color" => "#ff1400",
      "rules" => [
        "email"
      ],
      "fields" => [
        "id" => [
          'value' => null,
        ],
        "senderName" => [
          "name" => "senderName",
          'value' => '',
          "isFakeField" => 'fields',
          'type' => 'input',
          'required' => true,
          'props' => [
            'label' => 'Sender Name *',
            "hint" => "The name the notification should come from"
          ],
        ],
        "senderMail" => [
          "name" => "senderEmail",
          'value' => '',
          'type' => 'email',
          "isFakeField" => 'fields',
          'required' => true,
          'props' => [
            'label' => 'Sender Email *',
            "hint" => "The email address the notification should come from"
          ],
        ],
        "status" => [
          "name" => "status",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Enable',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "default" => [
          "name" => "default",
          'value' => false,
          'type' => 'checkbox',
          'props' => [
            'label' => 'Default',
          ],
        ],
        "type" => ['value' => 'email'],
        "saveInDatabase" => [
          "name" => "saveInDatabase",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Save in database',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
      ],
      
      "settings" => [
        
        "recipients" => [
          "name" => "recipients",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'settings',
          'props' => [
            'label' => 'Recipients',
            "hint" => "Enter recipient email address(es) - separate entries with commas"
          ],
        ],
        "emailTemplate" => [
          "name" => "emailTemplate",
          'value' => '',
          'type' => 'select',
          "isFakeField" => 'settings',
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.notification.templates',
            'select' => ['label' => 'title', 'id' => 'id']
          ],
          'options' => [
            ['label' => 'Default', 'id' => 'default']
          ],
          'props' => [
            'label' => 'Email Template',
            "hint" => "Choose the notification email template. You can create new email templates in Email Templates"
          ],
        ],
        "status" => [
          "name" => "status",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Enable',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "saveInDatabase" => [
          "name" => "saveInDatabase",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Save in database',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
      ]
    ],
    
    "pusher" => [// PUSHER PROVIDER
      "name" => "Pusher",
      "systemName" => "pusher",
      "icon" => "far fa-bell",
      "color" => "#c223ce",
      "rules" => [
        "numeric",
        "min:1",
      ],
      "fields" => [
        "id" => [
          'value' => null,
        ],
        "pusherAppEncrypted" => [
          "name" => "pusherAppEncrypted",
          'value' => true,
          'type' => 'toggle',
          "isFakeField" => 'fields',
          'props' => [
            'label' => 'Pusher App Encrypted',
            'falseValue' => false,
            'trueValue' => true
          ],
          "configRoute" => "broadcasting.connections.pusher.options.encrypted"
        ],
        
        "pusherAppId" => [
          "name" => "pusherAppId",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'fields',
          'required' => true,
          'props' => [
            'label' => 'Pusher App Id *'
          ],
          "configRoute" => "broadcasting.connections.pusher.app_id"
        ],
        
        "pusherAppKey" => [
          "name" => "pusherAppKey",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'fields',
          'required' => true,
          'props' => [
            'label' => 'Pusher App Key *'
          ],
          "configRoute" => "broadcasting.connections.pusher.key"
        ],
        
        "pusherAppSecret" => [
          "name" => "pusherAppSecret",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'fields',
          'required' => true,
          'props' => [
            'label' => 'Pusher App Secret *'
          ],
          "configRoute" => "broadcasting.connections.pusher.secret"
        ],
        
        "pusherAppCluster" => [
          "name" => "pusherAppCluster",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'fields',
          'required' => true,
          'props' => [
            'label' => 'Pusher App Cluster *'
          ],
          "configRoute" => "broadcasting.connections.pusher.options.cluster"
        ],
        "status" => [
          "name" => "status",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Status',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "default" => [
          "name" => "default",
          'value' => false,
          'type' => 'checkbox',
          'props' => [
            'label' => 'Default',
          ]
        ],
        "saveInDatabase" => [
          "name" => "saveInDatabase",
          'value' => '1',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Save in database',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "type" => ['value' => 'broadcast'],
      ],
      "settings" => [
        "recipients" => [
          "name" => "recipients",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'settings',
          'props' => [
            'label' => 'Recipients',
            "hint" => "Enter recipient ID - separate entries with commas"
          ],
        ],
        "status" => [
          "name" => "status",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Enable',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "saveInDatabase" => [
          "name" => "saveInDatabase",
          'value' => '1',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Save in database',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
      ]
    ],
    
    "firebase" => [// PUSHER PROVIDER
      "name" => "Firebase",
      "systemName" => "firebase",
      "icon" => "fas fa-fire-alt",
      "color" => "#fbc02d",
      "rules" => [
        "numeric",
        "min:1",
      ],
      "fields" => [
        "id" => [
          'value' => null,
        ],
        "firebaseApiKey" => [
          "name" => "firebaseApiKey",
          'value' => '',
          'type' => 'input',
          'required' => true,
          "isFakeField" => 'fields',
          'props' => [
            'label' => 'Firebase Api Key *'
          ],
        ],
        "firebaseServerKey" => [
          "name" => "firebaseServerKey",
          'value' => '',
          'type' => 'input',
          'required' => true,
          "isFakeField" => 'fields',
          'props' => [
            'label' => 'Firebase Server Key *'
          ],
        ],
        "status" => [
          "name" => "status",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Enable',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "default" => [
          "name" => "default",
          'value' => false,
          'type' => 'checkbox',
          'props' => [
            'label' => 'Default',
          ]
        ],
        "saveInDatabase" => [
          "name" => "saveInDatabase",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Save in database',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "type" => ['value' => 'broadcast'],
      ],
      "settings" => [
        "recipients" => [
          "name" => "recipients",
          'value' => '',
          'type' => 'input',
          "isFakeField" => 'settings',
          'props' => [
            'label' => 'Recipients',
            "hint" => "Enter recipient ID - separate entries with commas"
          ],
        ],
        "status" => [
          "name" => "status",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Enable',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
        "saveInDatabase" => [
          "name" => "saveInDatabase",
          'value' => '0',
          'type' => 'select',
          'required' => true,
          'props' => [
            'label' => 'Save in database',
            'options' => [
              ["label" => 'enabled', "value" => '1'],
              ["label" => 'disabled', "value" => '0'],
            ],
          ],
        ],
      ]
    ],
  
  
  ]
];
