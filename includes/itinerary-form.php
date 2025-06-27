
<?php
function itinerary_input_form() {
    ?>
    <style>
        #itinerary-form label {
            display: block;
            margin: 10px 0;
        }
        #itinerary-form input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #itinerary-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    <form method="POST" action="" id="itinerary-form">
        <label for="num_people">Number of People:</label>
        <input type="number" id="num_people" name="num_people" required>
        
        <label for="children_details">Children Details (Ages, Inclusion):</label>
        <input type="text" id="children_details" name="children_details">
        
        <label for="preferences">Preferences (Day/Night Activities):</label>
        <input type="text" id="preferences" name="preferences" required>
        
        <label for="travel_type">Travel Type:</label>
        <input type="text" id="travel_type" name="travel_type" required>
        
        <label for="duration">Travel Duration (days):</label>
        <input type="number" id="duration" name="duration" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        
        <label for="activities">Pre-selected Activities/Locations:</label>
        <input type="text" id="activities" name="activities">
        
        <label for="specific_destination">Include Specific Destinations:</label>
        <input type="text" id="specific_destination" name="specific_destination">
        
        <input type="submit" value="Generate Itinerary">
    </form>
    <?php
}
add_shortcode('itinerary_form', 'itinerary_input_form');
