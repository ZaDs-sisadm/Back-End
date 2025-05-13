<?php
include('includes/functions.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'get_notes':
            echo json_encode(getNotes());
            break;
        case 'add_note':
            if (isset($_POST['title']) && isset($_POST['content'])) {
                addNote($_POST['title'], $_POST['content']);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid data']);
            }
            break;
        case 'update_note':
            if (isset($_GET['id']) && isset($_POST['title']) && isset($_POST['content'])) {
                updateNote($_GET['id'], $_POST['title'], $_POST['content']);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid data']);
            }
            break;
        case 'delete_note':
            if (isset($_GET['id'])) {
                deleteNote($_GET['id']);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid data']);
            }
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No action specified']);
}
