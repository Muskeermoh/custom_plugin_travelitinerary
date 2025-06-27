
<?php
function generate_itinerary($user_data) {
    $api_key = 'your-openai-api-key';
    $url = 'https://api.openai.com/v1/chat/completions';
    
    $headers = array(
        'Authorization' => 'Bearer ' . $api_key,
        'Content-Type' => 'application/json'
    );

    $prompt = "Generate a detailed travel itinerary for the following input: "
        . "Number of people: " . $user_data['num_people'] . ", "
        . "Children details: " . $user_data['children_details'] . ", "
        . "Preferences: " . $user_data['preferences'] . ", "
        . "Travel type: " . $user_data['travel_type'] . ", "
        . "Duration: " . $user_data['duration'] . " days, "
        . "Location: " . $user_data['location'] . ", "
        . "Pre-selected activities: " . $user_data['activities'] . ", "
        . "Specific destinations: " . $user_data['specific_destination'];

    $data = array(
        'model' => 'gpt-4',
        'messages' => array(
            array('role' => 'user', 'content' => $prompt)
        )
    );

    $response = wp_remote_post($url, array(
        'headers' => $headers,
        'body' => json_encode($data)
    ));

    if (is_wp_error($response)) {
        return 'There was an error generating your itinerary.';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    return $data['choices'][0]['message']['content'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_data = array(
        'num_people' => $_POST['num_people'],
        'children_details' => $_POST['children_details'],
        'preferences' => $_POST['preferences'],
        'travel_type' => $_POST['travel_type'],
        'duration' => $_POST['duration'],
        'location' => $_POST['location'],
        'activities' => $_POST['activities'],
        'specific_destination' => $_POST['specific_destination']
    );

    $itinerary = generate_itinerary($user_data);
    echo "<div><strong>Your Generated Itinerary:</strong><br>$itinerary</div>";
}
?>
