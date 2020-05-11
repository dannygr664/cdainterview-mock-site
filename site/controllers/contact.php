<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'text'  => get('text')
        ];

        $rules = [
            'name'  => ['required'],
            'email' => ['required', 'email'],
            'text'  => ['required', 'min' => 3, 'max' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a name.',
            'email' => 'Please enter a valid email address.',
            'text'  => 'Please enter a message between 3 and 3000 characters.'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                $kirby->email([
                    'template' => 'email',
                    'from'     => esc($data['email']),
                    'replyTo'  => esc($data['email']),
                    'to'       => esc($page->email()),
                    'subject'  => esc($data['name']) . ' sent you a message from your contact form',
                    'data'     => [
                        'text'   => esc($data['text']),
                        'sender' => esc($data['name'])
                    ]
                ]);

            } catch (Exception $error) {
                $alert['error'] = "The form could not be sent.";
            }

            // no exception occured, let's send a success message
            if (empty($alert) === true) {
                $success = 'Thank you, your email has been sent. We will get back to you shortly.';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};