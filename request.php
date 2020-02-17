<?php

include __DIR__ . '/includes/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

if (strtoupper($method) == 'GET') {
    switch ($action) {
        case 'contact':
            $contact = new Contact;
            echo json_encode($contact->get());
            break;

        default:
            echo "It's Request Controller";
            break;
    }
}

if (strtoupper($method) == 'POST') {
    switch ($action) {
        case 'contact':
            $contact = new Contact;
            echo json_encode($contact->save());
        break;

        default:
            echo "It's Request Controller";
            break;
    }
}
